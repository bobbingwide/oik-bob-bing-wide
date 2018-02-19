<?php // (C) Copyright Bobbing Wide 2014
if ( !defined( "OIK_WP_LOADED" ) ) {
define( "OIK_WP_LOADED", true );


/**
 * Implement [bp] shortcode for BuddyPress
 */
function bw_bp( ) {
  $bw = nullretstag( "span", "buddypress"); 
  $bw .= '<span class="bw_buddy">Buddy</span>';
  $bw .= '<span class="bw_bpress">Press</span>';
  $bw .= nullretetag( "span", "buddypress" ); 
  return( $bw );
}

/**
 * Implement [lwp] shortcode for link to wordpress.org
 * 
 * Changed to remove the www. prefix
 */
function bw_lwp() {
  alink( "bw_lwp", "http://wordpress.org", bw_wp( true ), "Visit WordPress.org" ); 
  return( bw_ret());
}

/**
 * Implement [lwpms] shortcode for link to wordpress.org for multisite
 * 
 * Changed to remove the www.prefix
 */ 
function bw_lwpms() {
  alink( "bw_lwpms", "http://wordpress.org", bw_wpms(), "Visit WordPress.org for MultiSite" ); 
  return( bw_ret());
}

/**
 * Implement [lbp] shortcode for link to buddypress.org
 */ 
function bw_lbp() {
  alink( NULL, "http://www.buddypress.org", bw_bp(), "Visit BuddyPress.org" ); 
  return( bw_ret());
}

/**
 * Implement [ldrupal] shortcode for link to Drupal.org
 */
function bw_ldrupal() {
  alink( NULL, "http://www.drupal.org", bw_drupal(), "Visit Drupal.org" ); 
  return( bw_ret());
}

/**
 * Implement [lartisteer] shortcode for link to Artisteer.com
 */
function bw_lart() {
  alink( NULL, "http://www.artisteer.com", bw_art(), "Visit Artisteer.com" ); 
  return( bw_ret());
}

/**
 * Implement [wpms] shortcode for WordPress Multisite
 */   
function bw_wpms( $suffix=false ) {
  $bw = bw_wp( $suffix );
  $bw .= ' ';
  $bw .= '<span class="bw_multisite">Multisite</span>';
  return( $bw );
}

/**
 * Implement [drupal] shortcode for Drupal
 */
function bw_drupal() {
  $bw = '<span class="bw_drupal">Drupal</span>';
  return( $bw );
} 

/**
 * Implement [artisteer] shortcode for Artisteer
 *
 * Also displays Artisteer version if required
 */
function bw_art( $atts=null, $content=null, $tag=null ) {
  $bw = '<span class="bw_artisteer">Artisteer</span>';
  $version = bw_array_get( $atts, 0, null );
  if ( $version ) {
    oik_require( "shortcodes/oik-blocks.php" );
    $current_setting = bw_artisteer_version( false );
    $actual_setting = bw_artisteer_version( true );
    $bw .= " current=$current_setting";
    $bw .= " actual=$actual_setting";
  }
  return( $bw );
} 
 
/**
 * Example for [wp] shortcode
 *
 * Do we really need the e.g.? 
 */
function wp__example() {  
  e( bw_wp());
}


} /* end !defined OIK_WP_LOADED */
