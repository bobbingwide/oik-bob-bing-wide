<?php
/*
Plugin Name: oik bob bing wide shortcodes
Plugin URI: https://www.oik-plugins.com/oik-plugins/oik-bob-bing-wide-plugin
Description: More lazy smart shortcodes: bw_csv, bw_plug, bw_page, bw_post, oik and loik, wp, wpms, bp, artisteer, drupal, bw_search, bw_dash, bw_rpt, bw_graphviz, bw_option, github, bw_archive
Version: 2.2.5
Author: bobbingwide
Author URI: https://www.bobbingwide.com/about-bobbing-wide
Text Domain: oik-bob-bing-wide
Domain Path: /languages/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

    Copyright 2010-2024 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/
/**
 * Implement "oik_add_shortcodes" for oik-bob-bing-wide
 *
 * Note: as of version 2.1-alpha.1108 bwlink.css is no longer included in the oik base plugin.
 * It's been moved to this plugin and has been stripped right down anyway; since people didn't like the CSS styling.
 *
 * The original styling is commented out. Only the styling for "bobbing wide" as a logo remains.
 *
 * In order to include it you can add it to your oik custom CSS file.
 *
 * If the oik_version is less than 2.2-alpha we load oik's shortcodes functions to prevent
 * attempted redeclaration of functions.
 * In fact, we have to load it for all versions since
 * 1. It contains functions needed by some of these shortcodes
 * 2. oik_version() currently only works in wp-admin
 *
 *
 * Note: But if that's the case then we won't even register our shortcodes so it doesn't matter
 * once the new code for each version is correct.
 * So this is definitely belt and braces code.
 *
 */
function oik_bob_bing_wide_init() {
  // wp_enqueue_style( 'bwlinkCSS', WP_PLUGIN_URL . '/oik/bwlink.css', 'oikCSS' );
  //if ( version_compare( oik_version(), "2.2-alpha.0403", "<" ) ) {
  //oik_require( "shortcodes/oik-bob-bing-wide.php" );
  //  define( "OIK_WP_LOADED",  true );
  //}
	oik_require_lib( 'class-BW-');
 // Note: The bw_oik() & bw_oik_long() functions are actually delivered from oik's includes/bobbcomp.php
 // If includes/bobbcomp.php exists we reckon shortcodes/oik-bob-bing-wide.php will do too.
  $bobbcomp_file = oik_path( 'includes/bobbcomp.php' );
  if ( file_exists( $bobbcomp_file ) ) {
	  bw_add_shortcode( 'oik', 'bw_oik', $bobbcomp_file, true );
	  bw_add_shortcode( 'loik', 'bw_loik', oik_path( "shortcodes/oik-bob-bing-wide.php" ), false ); // Link to the plugin
	  bw_add_shortcode( 'OIK', 'bw_oik_long', $bobbcomp_file, true ); // Spells out OIK Information kit
	  bw_add_shortcode( 'lbw', 'bw_lbw', oik_path( "shortcodes/oik-bob-bing-wide.php" ), false ); // Link to Bobbing Wide or other websites
  }

  bw_add_shortcode( 'bw_page', 'bw_page', oik_path("shortcodes/oik-post-page.php", "oik-bob-bing-wide" ), false );
  bw_add_shortcode( 'bw_post', 'bw_post', oik_path("shortcodes/oik-post-page.php", "oik-bob-bing-wide" ), false );
  bw_add_shortcode( 'bw_plug', 'bw_plug', oik_path("shortcodes/oik-plug.php", "oik-bob-bing-wide" ), false );

  // Dropped support for bw_module as it didn't work anyway
  //bw_add_shortcode( 'bw_module',  'bw_module', oik_path("shortcodes/oik-bob-bing-wide.php"), false );

  bw_add_shortcode( 'bp', 'bw_bp', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true );   // BuddyPress
  bw_add_shortcode( 'lwp', 'bw_lwp', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), false ); // Link to WordPress.org
  bw_add_shortcode( 'lbp', 'bw_lbp', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), false ); // Link to BuddyPress.org
  bw_add_shortcode( 'wpms', 'bw_wpms', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true );   // WordPress Multisite
  bw_add_shortcode( 'lwpms', 'bw_lwpms', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), false ); // Link to WordPress multisite - .org
  bw_add_shortcode( 'drupal', 'bw_drupal', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true );   // Drupal
  bw_add_shortcode( 'ldrupal', 'bw_ldrupal', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), false ); // Link to Drupal.org
  bw_add_shortcode( 'artisteer', 'bw_art', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true ); // Artisteer
  bw_add_shortcode( 'lartisteer', 'bw_lart', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), false ); // Link to artisteer.com
  // This is just a bit of code to help determine if a fix to shortcodes (ticket #17657) has been implemented or not
  // whether or not a shortcode containing hyphen(s) is handled depends on when it's registered.
  // if it's registered before the shortcode that is the same as the prefix before the '-' it's OK
  // it it's registed after, then the shorter shortcode will take precedence
  // 2012/11/25 - Ticket has been fixed so no need to include these dummy shortcodes any more, just [wp]
  //bw_add_shortcode( 'wp-1', 'wp1', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true);
  //bw_add_shortcode( 'wp-2', 'wp2', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true);
  bw_add_shortcode( 'wp', 'bw_wp', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true );   // WordPress
  //bw_add_shortcode( 'wp-3', 'wp3', oik_path("shortcodes/oik-wp.php", "oik-bob-bing-wide"), true);
  bw_add_shortcode( "bw_csv", "bw_csv", oik_path( "shortcodes/oik-csv.php", "oik-bob-bing-wide" ), false );
  // Decided to put bw_related in oik-fields as it deals with noderef which are oik base/oik-fields related
  //bw_add_shortcode( "bw_related", "bw_related", oik_path( "shortcodes/oik-related.php", "oik-bob-bing-wide" ), false );
  bw_add_shortcode( "bw_search", "bw_search", oik_path( "shortcodes/oik-search.php", "oik-bob-bing-wide" ), true );
  // bw_navi added briefly before put into the oik base plugin as there were other changes required to the base.
  bw_add_shortcode( "bw_dash", "bw_dash", oik_path( "shortcodes/oik-dash.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( "bw_action", "bw_action", oik_path( "shortcodes/oik-action.php", "oik-bob-bing-wide" ), false );
  bw_add_shortcode( "bw_rpt", "bw_rpt", oik_path( "shortcodes/oik-pricing-table.php", "oik-bob-bing-wide" ), false );
  bw_add_shortcode( "bw_graphviz", "bw_graphviz", oik_path( "shortcodes/oik-graphviz.php", "oik-bob-bing-wide" ), false );
  bw_add_shortcode( "bw_crumbs", "bw_crumbs", oik_path( "shortcodes/oik-crumbs.php", "oik-bob-bing-wide"), false );
  bw_add_shortcode( "bw_option", "bw_option", oik_path( "shortcodes/oik-option.php", "oik-bob-bing-wide"), false );
  bw_add_shortcode( "bw_text", "bw_text", oik_path( "shortcodes/oik-text.php", "oik-bob-bing-wide" ), false );
	bw_add_shortcode( "github", "bw_github", oik_path( "shortcodes/oik-github.php", "oik-bob-bing-wide" ), false );
	bw_add_shortcode( "bw_archive", "bw_archive", oik_path( "shortcodes/oik-archive.php", "oik-bob-bing-wide" ), false );



	add_filter( "_sc__help", "oik_bob_bing_wide_sc__help", 10, 2 );
}
/**
 * Implements "_sc__help" filter for oik-bob-bing-wide
 *
 * @param array $help array of translated help keyed by shortcode
 * @param string $shortcode
 * @param array updated help array
 */
function oik_bob_bing_wide_sc__help( $help, $shortcode ) {
	switch ( $shortcode ) {
		case "OIK": $l10n_help = __( 'Spells out the oik backronym', 'oik-bob-bing-wide' ); break;
		//case "WOW": $l10n_help = __( 'Spells out Wonder of WordPress', 'oik-bob-bing-wide' ); break;
		//case "WoW": $l10n_help = __( 'Spells out Wonder of WordPress', 'oik-bob-bing-wide' ); break;
		case "artisteer": $l10n_help = __( 'Styled form of Artisteer', 'oik-bob-bing-wide' ); break;
		//case "bing": $l10n_help = __( 'Styled form of bing', 'oik-bob-bing-wide' ); break;
		//case "bob": $l10n_help = __( 'Styled form of bob', 'oik-bob-bing-wide' ); break;
		//case "bong": $l10n_help = __( 'Styled form of bong', 'oik-bob-bing-wide' ); break;
		case "bp": $l10n_help = __( 'Styled form of BuddyPress', 'oik-bob-bing-wide' ); break;
		case "bw_page": $l10n_help = __( 'Add page button', 'oik-bob-bing-wide' ); break;
		case "bw_plug": $l10n_help = __( 'Show plugin information', 'oik-bob-bing-wide' ); break;
		case "bw_post": $l10n_help = __( 'Add Post button', 'oik-bob-bing-wide' ); break;
		//case "fob": $l10n_help = __( 'Styled form of fob', 'oik-bob-bing-wide' ); break;
		//case "hide": $l10n_help = __( 'Styled form of hide', 'oik-bob-bing-wide' ); break;
		case "lartisteer": $l10n_help = __( 'Link to Artisteer ', 'oik-bob-bing-wide' ); break;
		case "lbp": $l10n_help = __( 'Link to BuddyPress', 'oik-bob-bing-wide' ); break;
		case "lbw": $l10n_help = __( 'Link to Bobbing Wide sites', 'oik-bob-bing-wide' ); break;
		case "ldrupal": $l10n_help = __( 'Link to drupal.org', 'oik-bob-bing-wide' ); break;
		case "loik": $l10n_help = __( 'Link to [oik]-plugins', 'oik-bob-bing-wide' ); break;
		case "lwp": $l10n_help = __( 'Link to WordPress.org', 'oik-bob-bing-wide' ); break;
		case "lwpms": $l10n_help = __( 'Link to WordPress Multi Site', 'oik-bob-bing-wide' ); break;
		//case "oik": $ __( 'Expand to the logo for oik', 'oik-bob-bing-wide' ); break;case "oik" ),
		//case "wide": $l10n_help = __( 'Styled form of wide', 'oik-bob-bing-wide' ); break;
		//case "wow": $l10n_help = __( 'Styled form of WoW', 'oik-bob-bing-wide' ); break;
		case "wp": $l10n_help = __( 'Display a styled form of WordPress. ', 'oik-bob-bing-wide' ); break;
		//"wp-1": $l10n_help = __( 'Sample hyphenated shortcode', 'oik-bob-bing-wide' ); break;
		//"wp-2": $l10n_help = __( 'Sample hyphenated shortcode', 'oik-bob-bing-wide' ); break;
		//"wp-3": $l10n_help = __( 'Sample hyphenated shortcode', 'oik-bob-bing-wide' ); break;
		case "wpms": $l10n_help = __( 'Styled form of WordPress Multi Site', 'oik-bob-bing-wide' ); break;

		default:
			$l10n_help = null;
	}

	if ( $l10n_help ) {
		$help[ $shortcode ] = $l10n_help;
	}
	return $help;

}



/**
 * Implement "oik_admin_menu" action for oik-bob-bing-wide
 *
 * Set the plugin server
 * It should no longer be necessary to relocate the plugin to become its own plugin
 *
 */
function oik_bob_bing_wide_admin_menu() {
  oik_register_plugin_server( __FILE__ );
  // bw_add_relocation( 'oik/oik-bob-bing-wide.php', 'oik-bob-bing-wide/oik-bob-bing-wide.php' );
}

/**
 * Implements "admin_notices" action for oik_bob_bing_wide

 * This code will produce a message when oik-bob-bing-wide is activated but oik isn't.
 *
 * Version | Dependency
 * ------- | --------------
 * v1.30.6 | oik v3.2.3
 * v1.31.1 | oik v3.2.8
 * v1.33.0 | oik v3.3.7
 *
 */
function oik_bob_bing_wide_activation() {
  static $plugin_basename = null;
  if ( !$plugin_basename ) {
    $plugin_basename = plugin_basename(__FILE__);
    add_action( "after_plugin_row_oik-bob-bing-wide/oik-bob-bing-wide.php", "oik_bob_bing_wide_activation" );
    if ( !function_exists( "oik_plugin_lazy_activation" ) ) {
      require_once( "admin/oik-activation.php" );
    }
  }
  $depends = "oik:3.3.7";
  oik_plugin_lazy_activation( __FILE__, $depends, "oik_plugin_plugin_inactive" );
}

function oik_bob_bing_wide_gather_site_opinions( $opinions ) {
	$opinions[] = new oik_block_editor_opinion( 'C', false, 'S', "Shortcodes [bw_csv] and [bw_graphviz] should be converted to blocks" );
	return $opinions;
}

/**
 * Function to invoke when oik-bob-bing-wide is loaded
 */
function oik_bob_bing_wide_loaded() {
	add_action( 'oik_loaded', 'oik_bob_bing_wide_oik_loaded' );

  //add_action( "admin_notices", "oik_bob_bing_wide_activation", 11 );
  add_action( "oik_admin_menu", "oik_bob_bing_wide_admin_menu" );
  add_filter( "oik_block_gather_site_opinions", "oik_bob_bing_wide_gather_site_opinions" );
add_action( 'init', 'oik_bob_bing_wide_init_blocks', 100);
}

function oik_bob_bing_wide_oik_loaded() {
	add_action( "oik_add_shortcodes", "oik_bob_bing_wide_init" );
}

/**
 * This logic is expected to run independent of oik and oik-blocks
 */
function oik_bob_bing_wide_init_blocks() {
	oik_bob_bing_wide_plugins_loaded();
	$library_file = oik_require_lib( 'oik-blocks');
	//oik\oik_blocks\oik_blocks_register_editor_scripts(  'oik-bob-bing-wide', 'oik-bob-bing-wide');
	//oik\oik_blocks\oik_blocks_register_block_styles( 'oik-bob-bing-wide' );
	oik_bob_bing_wide_register_dynamic_blocks();

}

/**
* Implements 'init' action for oik-bob-bing-wide.
 *
 * Prepares use of shared libraries if this has not already been done.
 */
function oik_bob_bing_wide_plugins_loaded() {
	oik_bob_bing_wide_boot_libs();
	oik_require_lib( 'bwtrace' );
	// Do other plugins need to perform this test on bobbfunc?
	oik_bob_bing_wide_standalone_compat( 'bw_array_get_from', 'includes/bobbcomp.php' , 'bobbfunc' );
	oik_bob_bing_wide_standalone_compat( 'bw_as_array', 'libs/bobbfunc.php', 'bobbfunc');
	oik_bob_bing_wide_standalone_compat( 'bw_add_shortcode', 'oik-add-shortcodes.php', 'oik-shortcodes' );
	/** Enable localization of blocks */
	bw_load_plugin_textdomain( "oik-bob-bing-wide");

}

/**
 * Backward compatibility with oik v3.3.7 or earlier.
 *
 * Even when it's not activated.
 *
 * @param string $function The function we're looking for.
 * @param string $oik_file the relative path in oik.
 * @param string $library The shared library to load.
 */
function oik_bob_bing_wide_standalone_compat( $function, $oik_file, $library ) {
	if ( ! function_exists( $function ) ) {
		$oik_file_path = oik_path( $oik_file );
		if ( file_exists( $oik_file_path ) ) {
			/* Don't load oik-shortcodes library */
			require_once $oik_file_path;
		} else {
			oik_require_lib( $library );
		}
	}
}

/**
 * Boot up process for shared libraries
 *
 * ... if not already performed
 */
function oik_bob_bing_wide_boot_libs() {
	if ( ! function_exists( 'oik_require' ) ) {
		$oik_boot_file = __DIR__ . '/libs/oik_boot.php';
		$loaded        = include_once( $oik_boot_file );
	}
	oik_lib_fallback( __DIR__ . '/libs' );
}

/**
 * Registers action/filter hooks for oik-bob-bing-wide's dynamic blocks
 *
 * We have to do this during init, which comes after _enqueue_ stuff
 *
 * script, style, editor_script, and editor_style
 */
function oik_bob_bing_wide_register_dynamic_blocks() {
	if ( function_exists( "register_block_type" ) ) {
		add_filter( 'block_type_metadata', 'oik_bob_bing_wide_block_type_metadata', 10 );

		$args = [ 'render_callback' => 'oik_bob_bing_wide_dynamic_block_csv'];
		$registered = register_block_type_from_metadata( __DIR__ .'/src/oik-csv', $args );
		//bw_trace2( $registered, "registered");

		$args = [ 'render_callback' => 'oik_bob_bing_wide_dynamic_block_search'];
		$registered = register_block_type_from_metadata( __DIR__ .'/src/oik-search', $args );

       	$args = [ 'render_callback' => 'oik_bob_bing_wide_dynamic_block_wp'];
	    $registered = register_block_type_from_metadata( __DIR__ . '/src/oik-wp', $args );

		$args = [ 'render_callback' => 'oik_bob_bing_wide_dynamic_block_github'];
		$registered = register_block_type_from_metadata( __DIR__ .'/src/github', $args );

		$args = [ 'render_callback' => 'oik_bob_bing_wide_dynamic_block_dashicon'];
		$registered = register_block_type_from_metadata( __DIR__ .'/src/oik-dashicon', $args );

		/**
		 * Localise the script by loading the required strings for the build/index.js file
		 * from the locale specific .json file in the languages folder.
		 */
		$ok = wp_set_script_translations( 'oik-bbw-csv-editor-script', 'oik-bob-bing-wide' , __DIR__ .'/languages' );
		$ok = wp_set_script_translations( 'oik-bbw-search-editor-script', 'oik-bob-bing-wide' , __DIR__ .'/languages' );
		$ok = wp_set_script_translations( 'oik-bbw-wp-editor-script', 'oik-bob-bing-wide' , __DIR__ .'/languages' );
		$ok = wp_set_script_translations( 'oik-bbw-github-editor-script', 'oik-bob-bing-wide' , __DIR__ .'/languages' );
		$ok = wp_set_script_translations( 'oik-bbw-dashicon-editor-script', 'oik-bob-bing-wide' , __DIR__ .'/languages' );
		bw_trace2( $ok, "OK?");
		add_filter( 'load_script_textdomain_relative_path', 'oik_bob_bing_wide_load_script_textdomain_relative_path', 10, 2 );
	}

	/**
	 * Filters $relative so that md5's match what's expected.
	 *
	 * Depending on how it was built the `build/entry-point.js` may be preceded by `./` or `src/block-name/../../`.
	 * In either of these situations we want the $relative value to be returned as `build/entry-point.js`.
	 * This then produces the correct md5 value and the .json file is found.
	 *
	 * @param $relative
	 * @param $src
	 *
	 * @return mixed
	 */
	function oik_bob_bing_wide_load_script_textdomain_relative_path( $relative, $src ) {
		//bw_trace2();
		if ( false !== strpos( $src, '/oik-bob-bing-wide/src/' )) {
			$relative = 'build/' . basename( $relative );
		}
		//bw_trace2( $relative, "relative", false);
		return $relative;

	}
}

/**
 * Implements block_type_metadata filter to set the textdomain if not set.
 *
 * Note: $metadata['name'] will be set for each block.
 *
 * @param $metadata
 * @return mixed
 */
function oik_bob_bing_wide_block_type_metadata( $metadata ) {
	if ( !isset( $metadata['textdomain']) ) {
		$name = $metadata['name'];
		$name_parts = explode( '/', $name );
		$textdomain = $name_parts[0];
		if ( 'oik-bbw' == $textdomain ) {
			$textdomain = 'oik-bob-bing-wide';
			$metadata['textdomain'] = $textdomain;
		}
	}
	return $metadata;
}

/**
 * Server rendering dynamic CSV block
 *
 *
 * @param array $attributes
 * @return string generated HTML
 */
function oik_bob_bing_wide_dynamic_block_csv( $attributes ) {
	//bw_backtrace();
	$html = \oik\oik_blocks\oik_blocks_check_server_func( "shortcodes/oik-csv.php", "oik-bob-bing-wide", "bw_csv");
	if ( !$html ) {
		if ( function_exists( "oik_is_block_renderer") ) {
			oik_is_block_renderer( true );
		}
		do_action( "oik_add_shortcodes");
		$content = bw_array_get( $attributes, "content", null );
		bw_trace2( $content, "Content", true, BW_TRACE_VERBOSE );
		//oik_require( "shortcodes/oik-csv.php", "oik-bob-bing-wide" );
		$html = bw_csv( $attributes, $content );
		$html = oik_bob_bing_wide_server_side_wrapper( $attributes, $html );
		bw_trace2( $html, "html", false, BW_TRACE_VERBOSE );
	}
	return $html;
}

/**
 * Implements wrapper for Server Side Rendered blocks.
 *
 * Here we have to specifically add `has-text-align-something`
 * to the classes in order to support left, center or right alignment.
 *
 * @param $attributes
 * @param $html
 * @return string
 */
function oik_bob_bing_wide_server_side_wrapper( $attributes, $html ) {
	$align_class_name=empty( $attributes['textAlign'] ) ? '' : "has-text-align-{$attributes['textAlign']}";
	$align_class_name .= empty( $attributes['align'] ) ? '' : " has-text-align-{$attributes['align']}";
	$extra_attributes  =[ 'class'=>$align_class_name ];
	$wrapper_attributes = get_block_wrapper_attributes( $extra_attributes );
	$html=sprintf(
		'<div %1$s>%2$s</div>',
		$wrapper_attributes,
		$html
	);
	return $html;
}

/**
 * Renders the Search block
 *
 * @param array $attributes
 */
function oik_bob_bing_wide_dynamic_block_search( $attributes ) {
	$html = get_search_form( false );
	return $html;
}

/**
 * Renders the WordPress block.
 *
 * Uses the oik_block_guts() function from oik-bob-bing-wide/shortcodes/oik-guts.php
 * No longer calls the same function from the oik-block plugin.
 *
 * @param array $attributes v, m, p, g
 */
function oik_bob_bing_wide_dynamic_block_wp( $attributes ) {
	$html=\oik\oik_blocks\oik_blocks_check_server_func( "shortcodes/oik-guts.php", "oik-bob-bing-wide", "oik_block_guts" );
	if ( ! $html ) {
		$html = oik_block_guts( $attributes, null, null );
		$html = oik_bob_bing_wide_server_side_wrapper( $attributes, $html );
	}
	return $html;
}

/**
 * Renders the GitHub block.
 *
 * @param array $attributes repo, owner, issue
 */
function oik_bob_bing_wide_dynamic_block_github( $attributes ) {
	$html=\oik\oik_blocks\oik_blocks_check_server_func( "shortcodes/oik-github.php", "oik-bob-bing-wide", "bw_github" );
	if ( ! $html ) {
		$issue = bw_array_get( $attributes, 'issue', null );
		if ( $issue && is_numeric( $issue )) {
			$attributes['type']='issue';
		}
		$html = bw_github( $attributes, null, null );
		$html = oik_bob_bing_wide_server_side_wrapper( $attributes, $html );
	}
	return $html;
}

/**
 * Renders the Dashicon block.
 *
 * Use the logic for the [bw_dash] shortcode rendering the SVG version of the dashicon.
 *
 * @param array $attributes v, m, p, g
 */
function oik_bob_bing_wide_dynamic_block_dashicon( $attributes ) {
	$html=\oik\oik_blocks\oik_blocks_check_server_func( "shortcodes/oik-dash.php", "oik-bob-bing-wide", "bw_dash" );
	if ( ! $html ) {
		$attributes['icon'] = bw_array_get( $attributes, 'dashicon', 'heart');
		$html = bw_dash( $attributes, null, null );
		$html = oik_bob_bing_wide_server_side_wrapper( $attributes, $html );
	}
	return $html;
}

oik_bob_bing_wide_loaded();
