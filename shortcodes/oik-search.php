<?php // (C) Copyright Bobbing Wide 2014

/**
 * Implement [bw_search] shortcode
 *
 * Needed when not using an Artisteer theme - which implements the [search] shortcode
 * So should we implement it as the search shortcode?
 * 
 * @param array $atts - shortcode parameters
 * @param string $content - not expected
 * @param string $tag - shortcode tag
 * @return string - generated HTML for the search form
 *
 
 <form class="art-search" method="get" name="searchform" action="http://qw/wordpress/">
  <input name="s" type="text" value="" /> 
  <input class="art-search-button" type="submit" value="" /> 
  </form>  
 */
function bw_search( $atts=null, $content=null, $tag=null ) {
	$form = get_search_form( false );
  return( $form );
}


function bw_search__help( $shortcode="bw_search" ) {
  return( "Display search form" );
} 

function bw_search__syntax( $shortcode="bw_search" ) {
  $syntax = array();
  return( $syntax );
}

