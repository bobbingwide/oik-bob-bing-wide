<?php
/*
Plugin Name: oik bob bing wide shortcodes
Plugin URI: https://www.oik-plugins.com/oik-plugins/oik-bob-bing-wide-plugin
Description: More lazy smart shortcodes: bw_csv, bw_plug, bw_page, bw_post, oik and loik, wp, wpms, bp, artisteer, drupal, bw_search, bw_dash, bw_rpt, bw_graphviz, bw_option, github, bw_archive
Version: 1.31.2
Author: bobbingwide
Author URI: https://www.oik-plugins.com/author/bobbingwide
Text Domain: oik-bob-bing-wide
Domain Path: /languages/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

    Copyright 2010-2019 Bobbing Wide (email : herb@bobbingwide.com )

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
  oik_require( "shortcodes/oik-bob-bing-wide.php" );
  //  define( "OIK_WP_LOADED",  true );
  //}  

  /* Shortcodes for each of the more useful bobbingwide babbles  */
  if ( false ) {
  bw_add_shortcode( 'bob', 'bw_bob', oik_path("shortcodes/oik-bob-bing-wide.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( 'fob', 'bw_fob', oik_path("shortcodes/oik-bob-bing-wide.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( 'bing', 'bw_bing', oik_path("shortcodes/oik-bob-bing-wide.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( 'bong', 'bw_bong', oik_path("shortcodes/oik-bob-bing-wide.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( 'wide', 'bw_wide', oik_path("shortcodes/oik-bob-bing-wide.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( 'hide', 'bw_hide', oik_path("shortcodes/oik-bob-bing-wide.php", "oik-bob-bing-wide" ), true );

  bw_add_shortcode( 'wow', 'bw_wow', oik_path("shortcodes/oik-wow.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( 'WoW', 'bw_wow', oik_path("shortcodes/oik-wow.php", "oik-bob-bing-wide" ), true );
  bw_add_shortcode( 'WOW', 'bw_wow_long', oik_path("shortcodes/oik-wow.php", "oik-bob-bing-wide" ), true);
  }
  
  // Note: The bw_oik() & bw_oik_long() functions are actually delivered from bobbcomp.inc 
  bw_add_shortcode( 'oik', 'bw_oik', oik_path("shortcodes/oik-bob-bing-wide.php"), true );  
  bw_add_shortcode( 'loik', 'bw_loik', oik_path("shortcodes/oik-bob-bing-wide.php"), false ); // Link to the plugin  
  bw_add_shortcode( 'OIK', 'bw_oik_long', oik_path("shortcodes/oik-bob-bing-wide.php"), true); // Spells out OIK Information kit
  bw_add_shortcode( 'lbw', 'bw_lbw', oik_path("shortcodes/oik-bob-bing-wide.php"), false); // Link to Bobbing Wide or other websites

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
 
 * This code will produce a message when oik-bob-bing-widee is activated but oik isn't.
 *
 * Version | Dependency
 * ------- | --------------
 * v1.30.6 | oik v3.2.3
 * v1.31.1 | oik v3.2.8
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
  $depends = "oik:3.2.8";
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
  add_action( "oik_add_shortcodes", "oik_bob_bing_wide_init" );
  add_action( "admin_notices", "oik_bob_bing_wide_activation", 11 );
  add_action( "oik_admin_menu", "oik_bob_bing_wide_admin_menu" );
	add_filter( "oik_block_gather_site_opinions", "oik_bob_bing_wide_gather_site_opinions" );
}

oik_bob_bing_wide_loaded();




