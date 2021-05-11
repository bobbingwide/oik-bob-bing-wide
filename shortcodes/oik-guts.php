<?php
// (C) Copyright Bobbing Wide 2018-2021

/**
 * Implement [guts] shortcode
 *
 * Displays information about WordPress and/or Gutenberg
 *
 */

function oik_block_guts( $atts, $content, $tag ) {
	global $wp_version;
	sdiv( "guts");
	p( "WordPress version: " . $wp_version );
	p( "Gutenberg version: " . oik_block_gutenberg_version() );
	//oik_block_display_constant( "GUTENBERG_VERSION", "string" );
	oik_block_display_constant( "GUTENBERG_LOAD_VENDOR_SCRIPTS", "bool" );
	oik_block_display_constant( "GUTENBERG_LIST_VENDOR_ASSETS", "bool" );
	oik_block_display_constant( "GUTENBERG_DEVELOPMENT_MODE", "bool" );
	ediv();
	return bw_ret();
}

/**
 * Returns the Gutenberg version, if it's activated
 *
 * @return string value of GUTENBERG_VERSION constant
 */
function oik_block_gutenberg_version() {
	$version=null;
	if ( defined( 'GUTENBERG_VERSION' ) ) {
		$version=GUTENBERG_VERSION;
	}
	if ( ! $version ) {
		if ( defined( 'GUTENBERG_DEVELOPMENT_MODE' ) ) {
			oik_require_lib( 'oik-depends' );
			$active=bw_get_active_plugins();
			$plugin=bw_array_get( $active, 'gutenberg', null );
			//print_r( $active );
			$version=$plugin;
			if ( $plugin ) {
				$plugin =WP_PLUGIN_DIR . '/' . $plugin;
				$data   =get_plugin_data( $plugin );
				$version.=' ';
				$version.=$data['Version'];
			}
		}
	}

	return $version;
}


/**
 * Display the value of a constant
 *
 * But only if it's defined
 */
function oik_block_display_constant( $field, $type, $extra=null ) {
	$displayed=defined( $field );
	if ( $displayed ) {
		$value=constant( $field );
		p( "$field $value $type $extra" );
		//$this->tablerow( $field, $value, $type, $extra );
	} else {
		//p( "$field undefined $type $extra" );
	}

	return ( $displayed );
}