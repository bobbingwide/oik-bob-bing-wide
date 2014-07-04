<?php // (C) Copyright Bobbing Wide 2014

/**
 * Implement the [wow] and [WoW] shortcodes
 */
if ( !function_exists( "bw_wow" ) ) { 
function bw_wow ( $class = NULL ) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_B1">W</span>';
  $bw .= '<span class="bw_o">o</span>';
  $bw .= '<span class="bw_B2">W</span>';
  $bw .= nullretetag( "span", $class ); 
  return( $bw );
}
}

/**
 * Implement the [WOW] shortcode
 * 
 * These are non-translatable strings 
 */
if ( !function_exists( "bw_wow_long" ) ) { 
function bw_wow_long ( $class = NULL ) {
  $bw = nullretstag( "span", $class ); 
  $bw .= '<span class="bw_B1">Wonder</span>';
  $bw .= ' ';
  $bw .= '<span class="bw_o">of</span>';
  $bw .= ' ';
  $bw .= '<span class="bw_B2">WordPress</span>';
  $bw .= nullretetag( "span", $class ); 
  return( $bw );
}
}
