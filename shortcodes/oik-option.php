<?php // (C) Copyright Bobbing Wide 2014-2016
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
 * `
 * [bw_option bw_css_options.bw_autop checkbox]
 * `
 *
 * 
 * If the field is serialized then get_option will return an array.
 * So we need to detect this, rather than use oik-fields.
 * 
 *
 * Example
 * `
 * [bw_option wpseo_xml serialized]
 * `
 * 
 * Passing a type of serialized is unnecessary in this case. 
 * 
 * The dot notation could also return an array.
 * 
 *
 * @param array $atts shortcode parameters
 * @param string $content not expected... but it could be the title
 * @param string $tag the shortcode
 * @return string the generated HTML
 */
function bw_option( $atts=null, $content=null, $tag=null ) {
	oik_require( "includes/bw_fields.inc" );
  $option = bw_array_get_from( $atts, "option,0", null );
  $type = bw_array_get_from( $atts, "type,1", null );
  if ( false !== strpos( $option, "." ) ) {
    list( $set, $option ) = explode( ".", $option ); 
    $value = bw_get_option( $option, $set );
  } else {
    $value = get_option( $option );
  }
	if ( is_array( $value ) ) {
		bw_option_unserialized_array( $value );
	} else {
    $field = array( '#field_type' => $type );
		bw_theme_field( $option, $value, $field ); 
	}
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


               
/**
 * Display the unserialized array
 *
 * We need to process this a bit like print_r but using spans for formatting
 *  
 * Format each field as span class="key level" 
 * span class=value then the values
 *
 * @param array $unserialized a unserialized array
 * @param 
 */
if ( !function_exists( "bw_option_unserialized_array" ) ) {
function bw_option_unserialized_array( $unserialized, $level=0 ) {
	if ( count( $unserialized ) ) {
		foreach ( $unserialized as $key => $value ) {
			if ( is_array( $value ) ) {
				bw_option_unserialized_array( $value, ++$level );
			} else {
				sdiv( "bw_unserialized" );
				span( "$key level$level" );
				e( str_repeat( "&nbsp;", $level ) );
				e( $key );
				e( "=" );
				epan();
				span( "value" );
				e( $value );
				epan();
				ediv();
			}
		}
	}
}
}
