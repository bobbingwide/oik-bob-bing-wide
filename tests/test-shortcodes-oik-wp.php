<?php // (C) Copyright Bobbing Wide 2017

/** 
 * Unit tests for the shortcodes\oik-wp.php file
 * 
 *
 */
class Tests_shortcodes_oik_wp extends BW_UnitTestCase {

	/** 
	 * set up logic
	 * 
	 * - ensure any database updates are rolled back
	 * - we need oik-googlemap to load the functions we're testing
	 */
	function setUp() : void {
		parent::setUp();
		oik_require( "shortcodes/oik-wp.php", "oik-bob-bing-wide" );
	}
	
	function test_wp__example() {
		$this->switch_to_locale( "en_GB" );
		$html = bw_ret( wp__example( null ) );
    //$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
	}
	
	/**
	 * Note: Having removed the e.g. the bb_BB version produces the same result as the en_GB version. 
	 */
	function test_wp__example_bb_BB() {
		//$this->setExpectedDeprecated( "bw_translate" );
		$this->switch_to_locale( "bb_BB" );
		$html = bw_ret( wp__example( null ) );
    //$this->generate_expected_file( $html );
		$this->assertArrayEqualsFile( $html );
		$this->switch_to_locale( "en_GB" );
	}
}
