<?php // (C) Copyright Bobbing Wide 2011-2021

/**
 * New implementation of [bw_post] shortcode using dashicons
 *
 * @param array $atts
 * @param string $content
 * @param string $tag
 * @return string Generated HTML
 */
function bw_post( $atts=null, $content=null, $tag=null ) {
  //	bw_trace2();
  $atts['post_type'] = bw_array_get_from( $atts, "post_type,0", "post" );
  // bw_trace2( $atts, "atts", false);
  return( bw_dash_link( $atts ) );
}

/**
 * New implementation of [bw_page] shortcode using dashicons
 *
 * @param array $atts
 * @param string $content
 * @param string $tag
 * @return string Generated HTML
 */
function bw_page( $atts=null, $content=null, $tag=null ) {
  $atts['post_type'] = bw_array_get_from( $atts, "post_type,0", "page" );
  return( bw_dash_link( $atts ) );
}

/**
 * Create an Add new link for a selected post_type using a dashicon
 *
 * We may already have the right values from bw_page() or bw_post() or the user
 * could have passed in overrides
 *
 * @param array $atts - shortcode parameters
 * @param string $content - not expected - but it could be "Add new" or something
 * @param string $tag
 * @return string - the generated HTML
 *
 */
function bw_dash_link( $atts, $content=null, $tag=null ) {
  $post_type = bw_array_get_from( $atts, "post_type,0", "post" );
  bw_trace2( $post_type, 'post_type', false, BW_TRACE_VERBOSE );
  $icon = bw_array_get( $atts, "icon", null );
  $text = bw_array_get( $atts, "text", null );
  $post_object = get_post_type_object( $post_type );
  if ( $post_object ) {
    //bw_trace2( $post_object );
    if ( !$text ) {
      $text = $post_object->labels->add_new_item;
    }
    if ( !$icon ) {
    	if ( $post_type === "page" ) {
	        $icon = "admin-page";
        } elseif ( 'post' === $post_type ) {
	        $icon = "admin-post";
        } elseif ( $post_object->menu_icon ) {
      	    // Why is there a blank prefix?
            $icon = " " . $post_object->menu_icon;
            //$icon = $post_object->menu_icon;
        }
    }
  } else {
    bw_trace2( $post_type, "Invalid post_type", true, BW_TRACE_WARNING );
  }
  $dash_atts = array( $icon );
  bw_trace2( $dash_atts, "dash_atts", false, BW_TRACE_VERBOSE );
  oik_require( "shortcodes/oik-dash.php", "oik-bob-bing-wide" );
  $dash = bw_dash( $dash_atts );
  $url = admin_url( "post-new.php" );
  if ( $post_type !== "post" ) {
    $url .= "?post_type=$post_type";
  }
  alink( null, $url, $dash , $text );
  return( bw_ret() );
}

function bw_post__syntax( $shortcode="bw_post" ) {
  $syntax = array( "post_type" => bw_skv( "post", "<i>post_type</i>", "Post type to add" )
                 , "icon" => bw_skv( null, "<i>dash icon</i>", "Dash icon override" )
                 , "text" => bw_skv( null, "<i>text</i>", "tooltip text override" )
                 );
  return( $syntax );
}

function bw_page__syntax( $shortcode="bw_page" ) {
  $syntax = array( "post_type" => bw_skv( "page", "<i>post_type</i>", "Post type to add" )
                 , "icon" => bw_skv( null, "<i>dash icon</i>", "Dash icon override" )
                 , "text" => bw_skv( null, "<i>text</i>", "tooltip text override" )
                 );
  return( $syntax );
}


