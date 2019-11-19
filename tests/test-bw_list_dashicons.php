<?php // (C) Copyright Bobbing Wide 2019

/**
 * @package oik-bob-bing-wide
 *
 * Test the functions in shortcodes/oik-dash.php
 */
class Tests_bw_list_dashicons extends BW_UnitTestCase {

	function setUp() : void {
		parent::setUp();
		oik_require( "shortcodes/oik-dash.php", "oik-bob-bing-wide" );
	}

	/**
	 * We need a list of dashicons for oik-block
	 *
	 * TIL that asort() is very strange indeed!
	 * $icons[0] may not refer to the first element!
	 */
	function test_bw_list_dashicons() {
		$icons = bw_list_dashicons();
		//print_r( $icons );

		$this->assertEquals( $icons[0], "menu" );
		//$this->write_dashicons( $icons );
		sort( $icons );
		//print_r( $icons );
		//$this->write_dashicons( $icons );

		$this->assertEquals( $icons[0], "admin-appearance");

	}

	/**
	 * This method was used to create oik-blocks\blocks\oik-dashicon\dashiconslist.js
	 * @param
	 */
	function write_dashicons( $icons ) {
		echo PHP_EOL;
		echo "const dashicons = [";
		echo PHP_EOL;
		foreach ( $icons as $icon ) {
			echo "'$icon',";
			echo PHP_EOL;
		}
		echo "];";
		echo PHP_EOL;
	}


}
