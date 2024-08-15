# oik-bob-bing-wide 
![banner](assets/oik-bob-bing-wide-banner-772x250.jpg)
* Contributors: bobbingwide
* Donate link: https://www.oik-plugins.com/oik/oik-donate/
* Tags: blocks, shortcodes, smart, lazy, [bw_csv], [bw_plug], [bw_search], [bw_page], [bw_post], oik, WordPress, WPMS, BuddyPress, bbPress, Artisteer, Drupal, github, [bw_archive]
* Requires at least: 5.0
* Tested up to: 6.6.1
* Stable tag: 2.2.5
* Gutenberg compatible: Yes
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description 
More blocks and lazy smart shortcodes for the WordPress block editor.

Blocks:

* CSV - Displays CSV content
* Dashicon - Displays over 600 SVG icons
* GitHub Issue - Displays links to GitHub issues
* Search - Displays a search form
* WordPress - Displays information about WordPress and PHP versions or Gutenberg

Updated shortcodes in v2.2.1

* bw_csv - Added totals= and prefixes= parameter
* bw_plug - Improved styling capabilities
* github -  Links to GitHub owners, repositories, issues, etcetera

## Installation 
1. Upload the contents of the oik-bob-bing-wide plugin to the `/wp-content/plugins/oik-bob-bing-wide' directory
1. Activate the oik-bob-bing-wide plugin through the 'Plugins' menu in WordPress
1. Use the shortcodes in your content and widgets

## Frequently Asked Questions 
# Where is the FAQ? 
[oik FAQ](https://www.oik-plugins.com/oik/oik-faq)

# What shortcodes does this plugin provide? 
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
* https://github.com - new in v1.30.2
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

# Which shortcodes have been deprecated? 

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


## Screenshots 
1. oik-bob-bing-wide sample shortcodes
2. [ bw_plug name="oik,oik-bob-bing-wide"]

## Upgrade Notice 
# 2.2.5 
Update for PHP 8.3 support

## Changelog 
# 2.2.5 
* Changed: Reconcile shared library file libs/bobbfunc.php #63
* Fixed: Only respond to oik_add_shortcodes after oik_loaded has been run #67
* Fixed: Correct readme Tested up to and Stable tag #63
* Tested: With WordPress 6.6.1 and WordPress Multisite
* Tested: With PHP 8.3
* Tested: With PHPUnit 9.6

## Further reading 
If you want to read more about the oik plugins then please visit the
[oik plugin](https://www.oik-plugins.com/oik)
**"the oik plugin - for often included key-information"**
