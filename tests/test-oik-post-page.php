<?php // (C) Copyright Bobbing Wide 2017, 2019

/**
 * @package oik-bob-bing-wide
 * 
 * Test the functions in shortcodes/oik-post-page.php
 */
class Tests_oik_post_page extends BW_UnitTestCase {

	function setUp() {
		//parent::setUp();
		//oik_require( "shortcodes/oik-post-page.php", "oik-bob-bing-wide" );
		oik_do_shortcode( '[bw] ');
	}
	
	
	/**
	 * Now here's a daft thing...
	 * When running in batch site_url() may not be https:// even though that's what set in the 'siteurl' option.
	 * It all depends on whether or not the request is_ssl().
	 * 
	 * home_url() on the other hand does respect the setting. 
	 * and admin_url() tests the value in force_ssl_admin().
	 *
	 * This has now been catered for in oik-batch. So all the comparing assertions should be assertEquals.
	 */
	function test_site_url() {
		$siteurl = get_option("siteurl" );
		$homeurl = get_option( "home" );
		$this->assertEquals( $siteurl, $homeurl );
		$site_url = site_url();
		$home_url = home_url();
		$this->assertEquals( $site_url, $home_url );
		
		$force_ssl = force_ssl_admin();
		$this->assertTrue( $force_ssl );
		$site_url = site_url( 'wp-admin/', 'admin');
		$admin_url = admin_url();
		$this->assertEquals( $admin_url, $site_url );
	}

	/**
	 * Unit test equivalent to [bw_post]
	 * 
	 * Note: We need to call bw_do_shortcode() in order to test oik's logic for PHP 7.1
	 * 
	 */
	function test_bw_post_no_params() {
    $expected_output = '<a href="http://example.com/wp-admin/post-new.php" title="Add New Post"><span class="dashicons dashicons-admin-post "></span></a>';
		$expected_output = str_replace( "http://example.com", home_url(), $expected_output );
		$html = bw_do_shortcode( "[bw_post]" );
		//bw_trace2( $expected_output, "Expected output" );
		//bw_trace2( $html, "Actual output" );
		$html = $this->replace_home_url( $html );
		//$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		//$this->assertEquals( $expected_output, $html );
	}
	
	
	/**
	 * Unit test equivalent to [bw_page]
	 * 
	 * Note: We need to call bw_do_shortcode() in order to test oik's logic for PHP 7.1
	 * 
	 */
	function test_bw_page_no_params() {
    $expected_output = '<a href="http://example.com/wp-admin/post-new.php?post_type=page" title="Add New Page"><span class="dashicons dashicons-admin-page "></span></a>';
		$expected_output = str_replace( "http://example.com", home_url(), $expected_output );
		$html = bw_do_shortcode( "[bw_page]" );
		//bw_trace2( $expected_output, "Expected output" );
		//bw_trace2( $html, "Actual output" );
		$html = $this->replace_home_url( $html );
		//$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		//$this->assertEquals( $expected_output, $html );
	}
	
	/**
	 * Test Add FAQ 
	 * [bw_page post_type=oik-faq icon=sos]
	 *
	 * Note: This may depend on the oik-faq post type being defined.
	 * The test should be updated for the new dashicon logic using SVG! 
	 * 
	 */
	function test_bw_page_post_type_oik_faq() {
    $expected_output = '<a href="http://example.com/wp-admin/post-new.php?post_type=oik-faq" title="Create New FAQ"><span class="dashicons dashicons-sos "></span></a>';
		$expected_output = str_replace( "http://example.com", home_url(), $expected_output );
		$html = bw_do_shortcode( "[bw_page post_type=oik-faq icon=sos]" );
		bw_trace2( $expected_output, "Expected output" );
		bw_trace2( $html, "Actual output" );
		$html = $this->replace_home_url( $html );
		//$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		//$this->assertEquals( $expected_output, $html );
	}

}
