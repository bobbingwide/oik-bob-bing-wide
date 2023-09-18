<?php
/**
 * @package oik-bob-bing-wide
 * @copyright (C) Bobbing Wide 2023
 *
 * Test that all files load without Deprecation messages... for PHP 8.2
 */
class Tests_load_all_files extends BW_UnitTestCase {

	function setUp() : void {
		parent::setUp();
	}

	function test_all_admin_files() {
		oik_require( 'admin/oik-activation.php', 'oik-bob-bing-wide');
		$this->assertTrue( true );
	}

	/**
	 * Shared library files should normally be loaded with oik_require_lib()
	 * @return void
	 */
	function test_all_libs_files() {
		oik_require( 'libs/bobbforms.php', 'oik-bob-bing-wide');
		oik_require( 'libs/bobbfunc.php', 'oik-bob-bing-wide');
		oik_require( 'libs/bwtrace.php', 'oik-bob-bing-wide');
		oik_require( 'libs/class-BW-.php', 'oik-bob-bing-wide');
		oik_require( 'libs/class-oik-attachment-contents.php', 'oik-bob-bing-wide');
		oik_require( 'libs/class-oik-csv-totals.php', 'oik-bob-bing-wide');
		oik_require( 'libs/class-oik-svg-icons.php', 'oik-bob-bing-wide');
		oik_require( 'libs/oik-blocks.php', 'oik-bob-bing-wide');
		oik_require( 'libs/oik-dash-svg-list.php', 'oik-bob-bing-wide');
		oik_require( 'libs/oik-depends.php', 'oik-bob-bing-wide');
		oik_require( 'libs/oik-shortcodes.php', 'oik-bob-bing-wide');
		oik_require( 'libs/oik_boot.php', 'oik-bob-bing-wide');


		$this->assertTrue( true );
	}

	function test_all_shortcodes_files() {
		oik_require( 'shortcodes/oik-action.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-archive.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-bob-bing-wide.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-crumbs.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-csv.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-dash.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-gener.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-github.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-graphviz.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-guts.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-option.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-plug.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-post-page.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-pricing-table.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-search.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-text.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-wow.php', 'oik-bob-bing-wide');
		oik_require( 'shortcodes/oik-wp.php', 'oik-bob-bing-wide');

		$this->assertTrue( true );

	}
}
