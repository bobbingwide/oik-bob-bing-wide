=== oik-bob-bing-wide ===
Contributors: bobbingwide
Donate link: https://www.oik-plugins.com/oik/oik-donate/
Tags: blocks, shortcodes, smart, lazy, [bw_csv], [bw_plug], [bw_search], [bw_page], [bw_post], oik, WordPress, WPMS, BuddyPress, bbPress, Artisteer, Drupal, github, [bw_archive]
Requires at least: 5.0
Tested up to: 6.7-beta3
Stable tag: 2.3.0
Gutenberg compatible: Yes
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
More blocks and lazy smart shortcodes for the WordPress block editor.

Blocks:

* CSV - Displays CSV content
* Dashicon - Displays over 680 SVG icons
* GitHub Issue - Displays links to GitHub issues
* Search - Displays a search form
* WordPress - Displays information about WordPress and PHP versions or Gutenberg

Updated shortcodes in v2.2.1

* bw_csv - Added totals= and prefixes= parameter
* bw_plug - Improved styling capabilities
* github -  Links to GitHub owners, repositories, issues, etcetera

== Installation ==
1. Upload the contents of the oik-bob-bing-wide plugin to the `/wp-content/plugins/oik-bob-bing-wide' directory
1. Activate the oik-bob-bing-wide plugin through the 'Plugins' menu in WordPress
1. Use the shortcodes in your content and widgets

== Frequently Asked Questions ==
= Where is the FAQ? =
[oik FAQ](https://www.oik-plugins.com/oik/oik-faq)

= What shortcodes does this plugin provide? =
In alphabetical order:
* [artisteer]
* [bp]
* [bw_action]	- prototype
* [bw_archive] - category archives new in v1.31.1
* [bw_crumbs]
* [bw_csv] - improved in v1.30, v1.30.1 & v1.35.0
* [bw_dash]
* [bw_graphviz]
* [bw_option] - new in v1.27
* [bw_page] - improved in v1.30.1
* [bw_plug]
* [bw_post]
* [bw_rpt]
* [bw_search]
* [bw_text] - new in v1.28, prototype
* [drupal]
* [github] - new in v1.30.2
* [lartisteer]
* [lbp]
* [lbw]
* [ldrupal]
* [loik]
* [lwp]
* [lwpms]
* [oik]
* [OIK]
* [wp]
* [wpms]

= Which shortcodes have been deprecated? =

The following shortcodes have been deprecated.
Implement them using diy-oik if required.

* [bing]
* [bob]
* [bong]
* [fob]
* [hide]
* [wide]
* [wow]
* [WoW]
* [WOW]


== Screenshots ==
1. oik-bob-bing-wide sample shortcodes
2. [ bw_plug name="oik,oik-bob-bing-wide"]

== Upgrade Notice ==
= 2.3.0 =
Update for new SVG icons including the social-links icons

== Changelog ==
= 2.3.0 =
* Fixed: Correct SVG tag clip-rule and fill-rule attribute names #69
* Fixed: Correct server side rendering of SVG tags attributes  #69
* Changed: Ensure dashicons is enqueued in the block editor #69
* Fixed: Correct renderCustom. Adjust labels #69
* Changed: Update icons from Gutenberg source #69
* Changed: Add social-link icons copied from Gutenberg and oldicons no longer part of @wordpress/icons #69
* Changed: Change classname to clsx #69
* Changed: Update wp-scripts to v30.1.0 #69
* Tested: With WordPress 6.7-beta3 and WordPress Multisite
* Tested: With PHP 8.3
* Tested: With PHPUnit 9.6

== Further reading ==
If you want to read more about the oik plugins then please visit the
[oik plugin](https://www.oik-plugins.com/oik)
**"the oik plugin - for often included key-information"**