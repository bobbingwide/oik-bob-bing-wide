<?php // (C) Copyright Bobbing Wide 2016

/**
 * @package oik-bob-bing-wide
 * 
 * Test the functions in shortcodes/oik-github.php
 */
class Tests_oik_github extends BW_UnitTestCase {

	function setUp() : void {
		parent::setUp();
		oik_require( "shortcodes/oik-github.php", "oik-bob-bing-wide" );
	}

	/**
	 * Unit test equivalent to [github bobbingwide oik-bob-bing-wide assets/oik-bob-bing-wide-banner-772x250.jpg]
	 */
	function test_github_type_is_file() {
		$expected_output = '<a href="https://github.com/bobbingwide/oik-bob-bing-wide"';
		$expected_output .= ' title="bobbingwide oik-bob-bing-wide">';
		$expected_output .= '<img class="" src="https://raw.githubusercontent.com/bobbingwide/oik-bob-bing-wide/master/assets/oik-bob-bing-wide-banner-772x250.jpg"';
		$expected_output .= ' title="bobbingwide oik-bob-bing-wide" alt="bobbingwide oik-bob-bing-wide"  />';
		$expected_output .= '</a>';
	
		$html = bw_github( array( 'bobbingwide', 'oik-bob-bing-wide', 'assets/oik-bob-bing-wide-banner-772x250.jpg' ) );
		bw_trace2( $expected_output, "Expected output" );
		bw_trace2( $html, "Actual output" );
		$this->assertEquals( $expected_output, $html );
		
	}

}
