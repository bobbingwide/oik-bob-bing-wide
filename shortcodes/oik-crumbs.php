<?php // (C) Copyright Bobbing Wide 2014
/**
 * Implement [bw_crumbs] shortcode
 *
 * Uses Yoast Breadcrumbs
 */
function bw_crumbs( $atts=null, $content=null, $tag=null ) {

 if ( function_exists('yoast_breadcrumb') ) {
   $result = yoast_breadcrumb('<p id="breadcrumbs">','</p>', false);
 } else {
   $result = null;
   bw_trace2( "yoast_breadcrumb not available" );
 }
 return( $result );
} 

/**
 * Implement help hook for [bw_crumbs] shortcode
 */
function bw_crumbs__help( $shortcode="bw_crumbs" ) {
  return( "Display breadcrumbs" );
}

/**
 * Implement syntax hook for [bw_crumbs] shortcode 
 */
function bw_crumbs__syntax( $shortcode="bw_crumbs" ) {
  $syntax = array();
  return( $syntax );
}  
