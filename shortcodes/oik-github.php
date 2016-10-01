<?php // (C) Copyright Bobbing Wide 2015,2016
/**
 * Implement [github] shortcode
 *
 * Create a link to a github repository, version, release, issue, comment or whatever
 *
 * Link type | Example
 * --------- | --------------------------------------------------------------------
 * issues | https://github.com/fusioneng/shortcake/issues 
 * archive   | https://github.com/bobbingwide/oik-privacy-policy/archive/v1.3.1.zip
 * repository | 
 * owner | https://github.com/bobbingwide
 * 
 * @TODO This first version is very simple. It's being used to create links to Issues.
 * It will need to be extended to do other things and cater for shortcuts in the shortcode parameters
 * Perhaps it just needs to parse $atts[0] and reconstitute it... much like bw_link tries to do.
 *
 * @TODO See also https://wordpress.org/plugins/github-release-downloads
 * @TODO Jetpack already provides the [gist] shortcode to embed Gists from GitHub
 * 
 * @param array $atts shortcode parameters
 * @param string $content optional content
 * @param string $tag shortcode tag
 * @return string link to GitHub
 */ 
function bw_github( $atts=null, $content=null, $tag=null ) {
	$owner = bw_array_get_from( $atts, "owner,0", null ); 
	$repository = bw_array_get_from( $atts, "repo,1", null );
	$type = bw_array_get_from( $atts, "type,2", null );
	$number = bw_array_get_from( $atts, "3", null );
	$url = bw_array_get_from( $atts, "url", "https://github.com" );
	$github = array();
	if ( false != strpos( $type, "." ) ) {
		bw_github_file( $url, $owner, $repository, $type );
	} else {
		$class = "github";
		$text = bw_github_genericon( "github", $class );
	
		$github[] = $url;
		if ( $owner ) {
			$github[] = $owner;
			$text .= $owner;
		}
		if ( $repository ) {
			$github[] = $repository;
			$text .= '/';
			$text .= $repository;
		}
		if ( $type ) {
			$github[] = bw_github_sanitize_type( $type );
			//$text .= " ". $type; 
			$class .= " $type-link";
		}
		if ( $number ) {
			$github[] = $number;
			$text .= "#" . $number;
		}
		$target = implode( "/", $github );
		alink( $class, $target, $text );
	}	 
	return( bw_ret() );
}


/**
 * Autocorrect the type if we used singular by mistake
 * 
 * Also convert to lower case
 *
 * @param string $type 
 * @return string autocorrected and sanitized
 */

function bw_github_sanitize_type( $type ) {
	$type = strtolower( $type );

	$types = array( "issue" => "issues" 
								, "release" => "releases" 
								);
	$type = bw_array_get( $types, $type, $type );
	return( $type ); 
}


function github__help( $shortcode="github" ) {
	return( "Link to GitHub" );
}

/** 
 * Syntax hook for [github] shortcode
 * 
 */
function github__syntax( $shortcode="github" ) {
	$syntax = array( "owner,0" => bw_skv( null, "<i>owner</i>", "Repository owner" ) 
								 , "repo,1" => bw_skv( null, "<i>repository</i>", "Repository name" )
								 , "type,2" => bw_skv( null, "issues|archives/releases", "Content type" )
								 , "3" => bw_skv( null, "<i>identifier</i>", "Identifier" )
								 , "url" => bw_skv( "https://github.com", "<i>URL</i>", "GitHub URL" )
								 );
	return( $syntax );
}

/**
 * Example hook for [github] shortcode
 */
function github__example( $shortcode="github" ) {
	$text = "Link to GitHub Issue #1 for bobbingwide/oik-bob-bing-wide" ;
	$example = "bobbingwide oik-bob-bing-wide issues 1" ;
	bw_invoke_shortcode( $shortcode, $example, $text );
}


/**
 * Display the github genericon
 * 
 * Code copied/cobbled from bw_follow_link_gener()
 * 
 * @param string $lc_social 
 * @param string $class
 * @return string the HTML for the "github" genericon
 */
function bw_github_genericon( $lc_social="github", $class=null) {	
  if ( !wp_style_is( 'genericons', 'registered' ) ) {
    wp_register_style( 'genericons', oik_url( 'css/genericons/genericons.css' ), false );
  }
  wp_enqueue_style( 'genericons' );
  $dash = retstag( "span", "genericon genericon-$lc_social bw_follow_me $class" );
  $dash .= retetag( "span" );
	return( $dash );
}

/**
 * Display a github file link
 *
 * @param string $url The GitHub URL
 * @param string $owner
 * @param string $repository
 * @param string $type
 */
function bw_github_file( $url, $owner, $repository, $type ) {
	if ( bw_github_maybe_image( $type ) ) {
		$full_file = bw_github_image_file( $owner, $repository, $type );
		$image = retimage( null, $full_file, "$owner $repository" );
		$link = bw_github_repo_url( $url, $owner, $repository );
		alink( null, $link, $image, "$owner $repository" ); 
	} else {
	
		$link = bw_github_file_url( $url, $owner, $repository, $type );
		alink( null, $link, "$owner $repository $type" ); 
		
	}
}

/**
 * Check if the file may be an image
 * 
 * Note: 
 * - test what happens with a file extension of 0 or 1 or any other index value
 * 
 * @param string $file
 * @return bool - true when it could be an image
 */
function bw_github_maybe_image( $file ) {
	$maybe_image = false;
	$ext = pathinfo( $file, PATHINFO_EXTENSION );
	$ext = strtolower( $ext );
	//e( $ext );
	$images = array( "jpg", "png" );
	if ( in_array( $ext, $images) ) {
		$maybe_image = true;
	}
	return( $maybe_image );
} 

/**
 * Return a GitHub image file name
 */ 
function bw_github_image_file( $owner, $repository, $file ) {
	$github[] = "https://raw.githubusercontent.com";
	$github[] = $owner;
	$github[] = $repository;
	$github[] = "master";
	$github[] = $file;
	$target = implode( "/", $github );
	return( $target );
}

/**
 * Return a GitHub repo URL
 *
 * @param string $url The GitHub URL
 * @param string $owner
 * @param string $repository
 * @param string $type
 * @param string $number
 * @return string the full URL
 */
function bw_github_repo_url( $url, $owner=null, $repository=null, $type=null, $number=null ) {
	$github[] = $url;
	if ( $owner ) {
		$github[] = $owner;
	}
	if ( $repository ) {
		$github[] = $repository;
	}
	if ( $type ) {
	 	$github[] = bw_github_sanitize_type( $type );
	}
	if ( $number ) {
		$github[] = $number;
		}
	$target = implode( "/", $github );
	return( $target );
}

/**
 * Return a GitHub file URL
 * 
 * @param string $url The GitHub URL
 * @param string $owner
 * @param string $repository
 * @param string $file
 * @param string $type - blob, raw, blame, commits
 * @param string $branch - master
 * @return string the full URL
 */
function bw_github_file_url( $url, $owner=null, $repository=null, $file=null, $type='blob', $branch='master' ) {
	$github[] = $url;
	$github[] = $owner;
	$github[] = $repository;
	$github[] = $type;
	$github[] = $branch;
	$github[] = $file;
	$target = implode( "/", $github );
	return( $target );
}

