<?php // (C) Copyright Bobbing Wide 2016, 2017, 2019

/**
 * @package oik-bob-bing-wide
 * 
 * Test the functions in shortcodes/oik-plug.php
 */
class Tests_bw_plug extends BW_UnitTestCase {

	function setUp() {
		parent::setUp();
		oik_require( "shortcodes/oik-plug.php", "oik-bob-bing-wide" );
	}

	/**
	 * Unit test equivalent to [bw_plug oik banner=j]
	 * 
	 * The img src is now expected to be http://ps.w.org
	 *
	 * Note: This test can fail if the oik-plugins plugin is activated.
	 * 
	 */
	function test_bw_plug_banner_image_url() {
		$expected_output = '<div class="bw_plug">';
		$expected_output .= '<a class="bw_banner" href="https://wordpress.org/plugins/oik" title="https://ps.w.org/oik/assets/banner-772x250.jpg">';
		$expected_output .= '<img class="bw_banner" src="https://ps.w.org/oik/assets/banner-772x250.jpg" title="oik" alt="oik"  />';
		$expected_output .= '</a>';
		//$expected_output .= '<a class="plugin" href="https://wordpress.org/plugins/oik" title="Link to the oik (oik: Over 80 advanced, powerful shortcodes for displaying the content of your WordPress website.) plugin">oik</a>';
		$expected_output .= '</div>';
	
		$html = bw_plug( array( 'banner' => 'j' ) );
		bw_trace2( $expected_output, "Expected output" );
		bw_trace2( $html, "Actual output" );
		$this->assertEquals( $expected_output, $html );
		
	}

}
