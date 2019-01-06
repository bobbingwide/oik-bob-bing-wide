# oik-bob-bing-wide 
![banner](https://raw.githubusercontent.com/bobbingwide/oik-bob-bing-wide/master/assets/oik-bob-bing-wide-banner-772x250.jpg)
* Contributors: bobbingwide
* Donate link: https://www.oik-plugins.com/oik/oik-donate/
* Tags: shortcodes, smart, lazy, [bw_csv], [bw_plug], [bw_search], [bw_page], [bw_post], oik, WordPress, WPMS, BuddyPress, bbPress, Artisteer, Drupal, github, [bw_archive]
* Requires at least: 4.9.8
* Tested up to: 5.0.2
* Stable tag: 1.31.2
* Gutenberg compatible: Likely-yes
* License: GPLv2 or later
* License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description 
* More lazy smart shortcodes: bw_csv, bw_plug, bw_search, bw_page, bw_post, oik, wp, wpms, bp, artisteer, drupal and github

New in v1.31.1
[bw_archive] - display category archives

New in v1.30.2
https://github.com - create links to GitHub repositories, issues etc

New in v1.30.1
[bw_csv] - supports dash icon mapping for "Y" and "N"

New in v1.30
[bw_csv] - supports pagination and 4 display formats; table, ordered list, unordered list and definition list

New in v1.28 and 1.29
[bw_text] - shortcode to texturize (prototype)

New in v1.27
[bw_option] - shortcode to display WordPress option fields

New in v1.25
[bw_graphviz] - shortcode to display Grapviz diagrams
[bw_crumbs] - wrapper to [wpseo_breadcrumbs]

New in v1.24
[bw_action] - Perform a WordPress action/filter hook
[bw_dash]   - Display a dashicon
[bw_rpt]    - Display a Responsive Pricing Table

New in v1.23
[bw_search] - Display a simple Search form

## Installation 
1. Upload the contents of the oik-bob-bing-wide plugin to the `/wp-content/plugins/oik-bob-bing-wide' directory
1. Activate the oik-bob-bing-wide plugin through the 'Plugins' menu in WordPress
1. Use the shortcodes in your content and widgets

## Frequently Asked Questions 
# Where is the FAQ? 
[oik FAQ](http://www.oik-plugins.com/oik/oik-faq)

# What shortcodes does this plugin provide? 
In alphabetical order:
* [artisteer]
* [bp]
* [bw_action]	- prototype
* [bw_archive] - category archives new in v1.31.1
* [bw_crumbs]
* [bw_csv] - improved in v1.30, v1.30.1
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
# 1.31.2 
Update for the new SVG icon for the Archives block

# 1.31.1 
Update for [bw_archive] shortcode to display category archives. Upgrade for peaceful coexistence with Gutenberg.

# 1.31.0 
Update if using Gutenberg - the new block editor for WordPress 5.0

# 1.30.8 
Updated so that [bw_plug] works with recent changes to api.wordpress.org

# 1.30.7 
Contains improvements to the [bw_csv] shortcode. Tested with WordPress 4.7.5

# 1.30.6 
Contains improvements to the [bw_plug] shortcode. Tested with WordPress 4.7.2

# 1.30.5 
Contains a fix for bw_plug displaying banner images. Tested with WordPress 4.7

# 1.30.4 
[bw_option] now supports display of serialized data, https://github.com now displays the GitHub genericon. Tested with WordPress 4.6

# 1.30.3 
Required for oik-ajax pagination of content in the [bw_csv] shortcode

# 1.30.2 
Upgrade to use the https://github.com shortcode. Requires latest version of the bw_trace2 API (v2.0.5)

# 1.30.1 
Upgrade for improved support of dash icons in the [bw_csv] shortcode

# 1.30 
* Improved [bw_csv]: Added pagination. Added uo=o|ol|u|ul|d|dl parameter to display different styles of list

# 1.29 
Fixes the performance problem due to [bw_plug] cache logic having never worked, since August 2011!

# 1.28 
Upgrade if you want to set the class= parameter for [bw_csv] or use [bw_dash] for genericons or texticons.

# 1.27 
For oik-plugins and any other site wanting to display data from wp_options

# 1.26 
Required for AumAbsFitnessStudios.com.

# 1.25 
Upgrade if you want to use [bw_graphviz] or [bw_crumbs]

# 1.24 
* Upgrade if you want to use the new shortcodes: [bw_action], [bw_dash] or [bw_rpt]

# 1.23 
Upgrade if you want to use [bw_search] to replace Artisteer's [search].

# 1.22 
* Needed for sites using [bw_csv] with nested shortcodes. Note: We now only support WordPress 3.9 and above.

# 1.21 
Now dependent upon oik v2.2-alpha.0403 or higher. Shortcodes will be inactive until the oik base plugin is upgraded.

# 1.20 
Now dependent upon oik v2.1 or higher

# 1.19 
Only required for websites which need these shortcodes

# 1.18 
This version is dependent upon oik v1.17 or higher

# 1.17 
This version is a standalone version from www.oik-plugins.co.uk
This version matches the child plugin oik-bob-bing-wide in oik v1.17

## Changelog 
# 1.31.2 
* Changed: Updated SVG icon for archive - Archives block, https://github.com/bobbingwide/oik-bob-bing-wide/issues/26
* Tested: With WordPress 5.0.2
* Tested: With Gutenberg 4.7.1
* Tested: With PHP 7.2

# 1.31.1 
* Added: [bw_archive] shortcode to wrap wp_get_archives https://github.com/bobbingwide/oik-bob-bing-wide/issues/28
* Changed: Depends on oik v3.2.8
* Tested: With WordPress 5.0
* Tested: With Gutenberg 4.6.1
* Tested: With PHP 7.1 and 7.2

# 1.31.0 
* Changed: work towards making the plugin 100% translatable and localizable https://github.com/bobbingwide/oik-bob-bing-wide/issues/23
* Changed: [bw_dash] - Update for WordPress 5.0 and the new editor https://github.com/bobbingwide/oik-bob-bing-wide/issues/26
* Fixed: Add support for https: protocol in PHPUnit tests https://github.com/bobbingwide/oik-bob-bing-wide/issues/24
* Fixed: update test_bw_plug_banner_image_url https://github.com/bobbingwide/oik-bob-bing-wide/issues/18
* Tested: With PHP 7.1. and 7.2
* Tested: With WordPress 4.9.5 and 5.0-alpha and WordPress Multisite
* Tested: With Gutenberg 2.7.0

# 1.30.8 
* Changed: Adjusted requests to api.wordpress.org https://github.com/bobbingwide/oik-bob-bing-wide/issues/21
* Fixed: Avoid Warning message when local plugin doesn't have a readme.txt file https://github.com/bobbingwide/oik-bob-bing-wide/issues/22

# 1.30.7 
* Changed: Allow bw_csv to use vertical bar delimiter characters instead of comma https://github.com/bobbingwide/oik-bob-bing-wide/issues/20
* Changed: Obtain info from WordPress.org when displaying a bw_plug table https://github.com/bobbingwide/oik-bob-bing-wide/issues/19

# 1.30.6 
* Changed: Improve [bw_plug] when oik-plugins CPT defined locally https://github.com/bobbingwide/oik-bob-bing-wide/issues/19/
* Changed: Add test for [bw_post] and [bw_page] post_type and icon parameters https://github.com/bobbingwide/oik-bob-bing-wide/issues/17
* Changed: Extend bw_dash to display multiple icons https://github.com/bobbingwide/oik-bob-bing-wide/issues/16
* Changed: Cater for br tags added during the_content filtering https://github.com/bobbingwide/oik-bob-bing-wide/issues/14
* Changed: Cater for plugininfo being array or object https://github.com/bobbingwide/oik-bob-bing-wide/issues/15
* Added: Add dashicons added between v4.1 and v4.7  https://github.com/bobbingwide/oik-bob-bing-wide/issues/13/
* Added: Add unit tests for issue #11 and issue #12

# 1.30.5 
* Changed: Add support for type parameter being GitHub repository file name,https://github.com/bobbingwide/oik-bob-bing-wide/issues/11
* Fixed: Update URL for [bw_plug] banner images from wordpress.org,https://github.com/bobbingwide/oik-bob-bing-wide/issues/12
* Tested: With WordPress 4.7 and WordPress Multisite

# 1.30.4 
* Changed: [bw_option] to suppport serialized fields https://github.com/bobbingwide/oik-bob-bing-wide/issues/6
* Changed: https://github.com now displays the GitHub genericon [github bobbingwide oik-bob-bing-wide issue 10]
* Changed: Add the y=Y and n=N parameters in bw_csv__syntax https://github.com/bobbingwide/oik-bob-bing-wide/issues/9/
* Tested: With WordPress 4.6 and WordPress Multisite

# 1.30.3 
* Added: A few language versions
* Changed: Coreq changes for ajaxified pagination https://github.com/bobbingwide/oik-ajax/issues/1
* Changed: Minor tweaks to [bw_plug] shortcode https://github.com/bobbingwide/oik-bob-bing-wide/issues/4
* Fixed: Autocorrect the https://github.com type parameter [github bobbingwide oik-bobbing-wide issue 3]

# 1.30.2 
* Added: https://github.com shortcode - Issue #1
* Changed: Some bw_trace2() calls

# 1.30.1 
* Changed: [bw_csv] now supports y=Y and n=N parameters to ease the use of dashicons
* Fixed: [bw_plug] casts $pluginfo from array to object when required
* Fixed: [bw_plug] detects WP_error returned from oik_lazy_pluginsapi()
* Changed: Now using semantic versioning.
* Changed: Now depends on oik v2.6-alpha.0724
* Tested: With WordPress 4.3-beta4

# 1.30 
* Changed: [bw_csv] now supports pagination. Use posts_per_page= parameter
* Changed: [bw_csv] now supports 4 styles: table (default), ordered, unordered and definition lists. Use uo= parameter
* Changed: [bw_graphviz] works for a symlinked plugin

# 1.29 
* Fixed: [bw_plug] shortcode now actually caches the results, for half a day
* Deprecated: The bobbingwide babble shortcodes are no longer active
* Added: [bw_text] shortcode - prototype logic for wptexturize on demand
* Changed: [lwp]/[lwpms] shortcodes - remove the www.prefix
* Changed: [bw_dash] shortcode now supports new WordPress 4.1 dashicons, plus many others previously omitted.
* Changed: Updated plugin dependency checks.

# 1.28 
* Added: Support for class= parameter on [bw_csv]
* Added: Support for genericons v3.2 in [bw_dash]
* Addded: Support for texticons in [bw_dash]: cent, css, shortcode, sterling, euro, yen, dollar
* Changed: [bw_csv] ignores empty lines

# 1.27 
* Added: [bw_option] shortcode - to help in examples where the result depends on the current value of an option field
* Changed: Now dependent upon oik v2.3 or higher

# 1.26 
* Added: Help and syntax hooks for [bw_crumbs] and [bw_graphviz] shortcodes
* Changed: Dashicons now displayed in span rather than div
* Changed: Dashicons support embedded content.
* Changed: Improved docblocks
* Changed: [bw_post] and [bw_page] shortcodes now use dashicons and support post_type= icon= and text= parameters
* Changed: [bw_rpt] shortcode now accepts class= parameter to allow styling of multiple tables being displayed
* Fixed: incorrect variable used in bw_action()


# 1.25 
* Added: [bw_graphviz] shortcode. A lazy smart shortcode equivalent of wp-graphviz
* Added: [bw_crumbs] shortcode. A wrapper to [wpseo_breadcrumbs]
* Added: jquery folder containing the vis.js and vis-public.js files
* Changed: Improved some docblock comments

# 1.24 
* Added: [bw_action] shortcode - Perform a WordPress action/filter hook
* Added: [bw_dash] shortcode - Display a dashicon
* Added: [bw_rpt] shortcode - Display a Responsive Pricing Table. Sponsored by Aum Abs Fitness Studios
* Added: classes/class-oik-tables.php - OIK_table class used by [bw_rpt] shortcode

# 1.23 
* Added: [bw_search] shortcode

# 1.22 
* Changed: [bw_csv] will now expands nested shortcodes
* Changed: Improved plugin dependency checking
* Changed: No longer performs relocation

# 1.21 
* Changed: Moved much of the code from the oik base plugin to the oik-bob-bing-wide shortcodes folder
* Changed: Now responds to "oik_add_shortcodes" action, so shortcodes are only registered when shortcodes are being used.
* Tested: with WordPress 3.9-beta3

# 1.20 
* Added: [bw_csv] shortcode
* Changed: Plugin dependency
* Changed: Some docblocks
* Changed: bwlink.css no longer enqueued by default

# 1.19 
* Added: Moved bwlink.css from oik and stripped right down
* Changed: bwlink.css is no longer automatically enqueued
* Changed: Restructured to match oik plugins new styling

# 1.18 
* Added: Dependency logic ( see admin/oik-activation.php )

# 1.17 
* Added: Code to relocate from part of oik to a separate plugin
* Added: Updates are provided from oik-plugins

# up to 1.16 
* Please see the change log in oik for versions prior to 1.17

## Further reading 
If you want to read more about the oik plugins then please visit the
[oik plugin](http://www.oik-plugins.com/oik)
**"the oik plugin - for often included key-information"**

