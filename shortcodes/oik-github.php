<?php // (C) Copyright Bobbing Wide 2015
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
	$text = null;
	$class = "github";
	
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
		$github[] = $type;
		//$text .= " ". $type; 
		$class .= " $type-link";
	}
	if ( $number ) {
		$github[] = $number;
		$text .= "#" . $number;
	}
	$target = implode( "/", $github );
	alink( $class, $target, $text ); 
	return( bw_ret() );
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


