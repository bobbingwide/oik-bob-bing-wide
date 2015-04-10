<?php // (C) Copyright Bobbing Wide 2014
/**
 * Implement [bw_option] shortcode to display the value for an option field
 * 
 * WordPress stores option fields in the wp_options table.
 * They can either be simple fields or more complex such as serialised fields.
 * 
 * In my development database there are over 1300 option fields!
 * We wouldn't want a shortcode for each different option_name
 * 
 * I wonder what percentage can be displayed using this shortcode?
 *  
 * 
 * This shortcode allows certain option fields to be displayed.
 * It uses oik-fields technology for formatting
 * **?** so should this be in oik-fields? 
 *
 * Should this shortcode also allow the field to be set?
 * If so, how do we reset it after use?
 *
 * Example:
 * 
 * [bw_option bw_css_options.bw_autop checkbox]
 * 
 * 
 *
 */
function bw_option( $atts=null, $content=null, $tag=null ) {
  $option = bw_array_get_from( $atts, "option,0", null );
  $type = bw_array_get_from( $atts, "type,1", null );
  if ( false !== strpos( $option, "." ) ) {
    list( $set, $option ) = explode( ".", $option ); 
    $value = bw_get_option( $option, $set );
  } else {
    $value = get_option( $option );
  }
  $field = array( '#field_type' => $type );
  bw_theme_field( $option, $value, $field ); 
  return( bw_ret()); 
}
 
function bw_option__help( $shortcode="bw_option" ) {
  return( "Display the value of an option field" );
}
 
function bw_option__syntax( $shortcode="bw_option" ) {
  $syntax = array( "option,0" =>  bw_skv( null, "<i>name</i>", "Option name" )
                 , "type,1" => bw_skv( "text", "<i>field_type</i>", "Field type. e.g. URL, textarea" )
                 );
 return( $syntax );
} 

/**
 * Example hook for bw_option shortcode
 *
 * Display the value of oik options 
 */

function bw_option__example( $shortcode="bw_option" ) {
    
 
 
}               
