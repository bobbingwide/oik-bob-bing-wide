<?php // (C) Copyright Bobbing Wide 2017

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
	 * Unit test equivalent to [bw_post]
	 * 
	 * Note: We need to call bw_do_shortcode() in order to test oik's logic for PHP 7.1
	 * 
	 */
	function test_bw_post_no_params() {
    $expected_output = '<a href="http://example.com/wp-admin/post-new.php" title="Add New Post"><span class="dashicons dashicons-admin-post "></span></a>';
		$expected_output = str_replace( "http://example.com", site_url(), $expected_output );
		$html = bw_do_shortcode( "[bw_post]" );
		bw_trace2( $expected_output, "Expected output" );
		bw_trace2( $html, "Actual output" );
		$this->assertEquals( $expected_output, $html );
	}
	
	
	/**
	 * Unit test equivalent to [bw_page]
	 * 
	 * Note: We need to call bw_do_shortcode() in order to test oik's logic for PHP 7.1
	 * 
	 */
	function test_bw_page_no_params() {
    $expected_output = '<a href="http://example.com/wp-admin/post-new.php?post_type=page" title="Add New Page"><span class="dashicons dashicons-admin-page "></span></a>';
		$expected_output = str_replace( "http://example.com", site_url(), $expected_output );
		$html = bw_do_shortcode( "[bw_page]" );
		bw_trace2( $expected_output, "Expected output" );
		bw_trace2( $html, "Actual output" );
		$this->assertEquals( $expected_output, $html );
	}
	
	/**
	 * Test Add FAQ 
	 * [bw_page post_type=oik-faq icon=sos]
	 *
	 * Note: This may depends on the oik-faq post type being defined.
	 */
	function test_bw_page_post_type_oik_faq() {
    $expected_output = '<a href="http://example.com/wp-admin/post-new.php?post_type=oik-faq" title="Create New FAQ"><span class="dashicons dashicons-sos "></span></a>';
		$expected_output = str_replace( "http://example.com", site_url(), $expected_output );
		$html = bw_do_shortcode( "[bw_page post_type=oik-faq icon=sos]" );
		bw_trace2( $expected_output, "Expected output" );
		bw_trace2( $html, "Actual output" );
		$this->assertEquals( $expected_output, $html );
	}

}
