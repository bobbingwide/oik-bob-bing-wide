<?php // (C) Copyright Bobbing Wide 2011-2014 

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
