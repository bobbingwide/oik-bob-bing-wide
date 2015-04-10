<?php // (C) Copyright Bobbing Wide 2014

/** 
 * Implement the [bw_text] shortcode - wptexturize on demand
 * 
 * This shortcode will invoke wptexturize() on the result of expanding the content
 *  
 * @param array $atts - shortcode parameters
 * @param string $content - shortcode content
 * &param string $tag  - shortcode tag
 * @return string - the generated HTML
 */
function bw_text( $atts=null, $content=null, $tag=null ) {
  //gobang();
  $text = bw_array_get_from( $atts, "text,0", null );
  $text .= $content;
  bw_trace2( $text, "text before wptexturize" );
  $texturized = wptexturize( $text );
  bw_trace2( $texturized, "texturized" );
  return( $texturized );
 }
 
