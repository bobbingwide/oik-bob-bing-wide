<?php // (C) Copyright Bobbing Wide 2014

/**
 * Implement the [bob] shortcode
 */
if ( !function_exists( "bw_bob" ) ) { 
function bw_bob( $class = NULL) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_b1 bold">b</span>';
  $bw .= '<span class="bw_o bold">o</span>'; 
  $bw .= '<span class="bw_b2 bold">b</span>';
  $bw .= nullretetag( "span", $class );
  return( $bw );
}
}

/**
 * Implement the [fob] shortcode
 */
if ( !function_exists( "bw_fob" ) ) { 
function bw_fob( $class = NULL) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_W bold">f</span>';
  $bw .= '<span class="bw_i2 bold">o</span>'; 
  $bw .= '<span class="bw_d bold">b</span>';
  $bw .= nullretetag( "span", $class );
  return( $bw );
}
}

/**
 * Implement the [bing] shortcode
 */
if ( !function_exists( "bw_bing" ) ) { 
function bw_bing( $class = NULL) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_b3 bold">b</span>';
  $bw .= '<span class="bw_i1 bold">i</span>';
  $bw .= '<span class="bw_n bold">n</span>';
  $bw .= '<span class="bw_g bold">g</span>';
  $bw .= nullretetag( "span", $class ); 
  return( $bw );
}
}

/**
 * Implement the [bong] shortcode
 */
if ( !function_exists( "bw_bong" ) ) { 
function bw_bong( $class = NULL) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_w">b</span>';
  $bw .= '<span class="bw_i2">o</span>';
  $bw .= '<span class="bw_d">n</span>';
  $bw .= '<span class="bw_e">g</span>';
  $bw .= nullretetag( "span", $class ); 
  return( $bw );
}
}
 
/**
 * Implement the [wide] shortcode
 */
if ( !function_exists( "bw_wide" ) ) { 
function bw_wide( $class=NULL ) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_w">w</span>';
  $bw .= '<span class="bw_i2">i</span>';
  $bw .= '<span class="bw_d">d</span>';
  $bw .= '<span class="bw_e">e</span>';
  $bw .= nullretetag( "span", $class ); 
  return( $bw );
}
} 

/**
 * Implement the [hide] shortcode
 */
if ( !function_exists( "bw_hide" ) ) { 
function bw_hide( $class = NULL) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_w">h</span>';
  $bw .= '<span class="bw_i2">i</span>';
  $bw .= '<span class="bw_d">d</span>';
  $bw .= '<span class="bw_e">e</span>';
  $bw .= nullretetag( "span", $class ); 
  return( $bw );
}
}
