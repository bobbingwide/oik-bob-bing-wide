<?php // (C) Copyright Bobbing Wide 2014

/**
 * Implement "bw_action_default" action for oik-bob-bing-wide
 *
 * Since actions and filters are basically alike we can use bw_action_default
 * as if it were a filter.
 *
 * @param string $content
 * @return string - whatever was passed 
 */ 
function bw_action_default( $content=null ) {
  e( "Performing default action: " . __FUNCTION__ );
  e( $content );
  return( $content );
}

/**
 * Implement [bw_action] shortcode 
 *
 * We need to find a way of passing the parameters to the action so that it can handle them appropriately.
 * The simplest is to define a protocol of passing 2 parameters - $args and $content
 * with $content being the first since that's what we do when filtering.
 * 
 * We can provide options to make it work differently when we want to pass IDs.
 * Here we'll use the unnamed parameters as the positional parameters
 * and maybeunserialize() them? 
 *
 *
 * @param array $atts 
 * @param string $content
 * @param string $tag
 * @return string - generated HTML
 */
function bw_action( $atts=null, $content=null, $tag=null ) {
  $action = bw_array_get_from( $atts, "action,0", null );
  
  if ( null == $action ) {
    $action = "bw_action_default";
    add_action( $action, $action );
  }
  
  $unkeyed = bw_array_get_unkeyed( $atts );
  if ( count( $unkeyed ) > 1 ) {
    array_shift( $unkeyed );
    $ret = apply_filters_ref_array( $action, $unkeyed ); 
  } else {
    //$a1 = bw_array_get_from( $atts, "1", null );
    $ret = apply_filters( $action, $content, $atts );
  }  
  if ( $ret ) {
    e( $ret );
  }
  return( bw_ret() );
}


