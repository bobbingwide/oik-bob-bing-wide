<?php // (C) Copyright Bobbing Wide 2011-2014 

/**
 * New implementation of [bw_post] shortcode using dashicons
 */
function bw_post( $atts=null, $content=null, $tag=null ) {
  $atts['post_type'] = bw_array_get_from( $atts, "post_type,0", "post" ); 
  //$atts['text'] = bw_array_get( $atts, 'text', "Add Post" );
  return( bw_dash_link( $atts ) );
}

/**
 * New implementation of [bw_page] shortcode using dashicons
 *
 */
function bw_page( $atts=null, $content=null, $tag=null ) {
  $atts['post_type'] = bw_array_get_from( $atts, "post_type,0", "page" ); 
  //$atts['text'] = bw_array_get( $atts, 'text', "Add Page" );
  //$atts['icon'] = bw_array_get( $atts, "icon", "admin-page" );
  return( bw_dash_link( $atts ) );
}




/** 
 * Create an Add Post button. If the text parameter is passed create "Add Post" regardless of the text
 * 
 * Others we can consider doing are: links, plugins, users, dashboard
 * but it's not really necessary with WordPress 3.2.1 and above since there's an admin menu once you're logged in.
 *
*/
if ( !function_exists( "bw_post" ) ) {
function bw_post( $atts ) {
  $text = bw_array_get( $atts, 'text', "Add Post" );
  $img = retimage( null, oik_url( 'images/post_48.png'), $text );
  
  if ( bw_is_wordpress() )
     $url = site_url( "/wp-admin/post-new.php" );
  else 
     $url = site_url( '/node/add/blog' );   
  alink( null, $url, $img, $text );
  return( bw_ret());
}
}

/** 
 * Create an Add Page button. Similar code to bw_post()
 */
if ( !function_exists( "bw_page" ) ) { 
function bw_page( $atts ) {
  $text = bw_array_get( $atts, 'text', "Add Page" );
  $img = retimage( null, oik_url( 'images/page_48.png'), $text );

  if ( bw_is_wordpress() )
    $url = site_url( "/wp-admin/post-new.php?post_type=page" );
  else
    $url = site_url( '/node/add/page' );  
  alink( null, $url, $img, $text);
  return( bw_ret());
}
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
  $icon = bw_array_get( $atts, "icon", null );
  $text = bw_array_get( $atts, "text", null );
  $post_object = get_post_type_object( $post_type ); 
  if ( $post_object ) {
    //bw_trace2( $post_object );
    if ( !$text ) { 
      $text = $post_object->labels->add_new_item;
    }
    if ( !$icon ) {  
      if ( $post_object->menu_icon ) {
        $icon = " " . $post_object->menu_icon;
      } else {
        if ( $post_type == "page" ) {
          $icon = "admin-page";
        } else {
          $icon = "admin-post";
        }
          
      }  
    }     
  } else {
    bw_trace2( $post_type, "Invalid post_type" );
  }   
  $dash_atts = array( $icon );
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

 
