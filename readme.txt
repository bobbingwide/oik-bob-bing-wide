=== oik-bob-bing-wide ===
Contributors: bobbingwide
Donate link: http://www.oik-plugins.com/oik/oik-donate/
Tags: shortcodes, smart, lazy, [bw_plug], [bw_search], [bw_page], [bw_post], oik, WordPress, WPMS, BuddyPress, bbPress, Artisteer, Drupal
Requires at least: 3.9
Tested up to: 4.0-beta2
Stable tag: 1.25
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==
More lazy smart shortcodes: bw_csv, bw_plug, bw_search, bw_page, bw_post, bob/fob, bing/bong, wide/hide, & wow, oik and loik, wp, wpms, bp, artisteer, drupal

New in v1.25
[bw_graphviz] - shortcode to display Grapviz diagrams
[bw_crumbs] - wrapper to [wpseo_breadcrumbs] 

New in v1.24
[bw_action] - Perform a WordPress action/filter hook
[bw_dash]   - Display a dashicon
[bw_rpt]    - Display a Responsive Pricing Table

New in v1.23
[bw_search] - Display a simple Search form 

== Installation ==
1. Upload the contents of the oik-bob-bing-wide plugin to the `/wp-content/plugins/oik-bob-bing-wide' directory
1. Activate the oik-bob-bing-wide plugin through the 'Plugins' menu in WordPress
1. Use the shortcodes in your content and widgets

== Frequently Asked Questions ==
= Where is the FAQ? =
[oik FAQ](http://www.oik-plugins.com/oik/oik-faq)

= What shortcodes does this plugin provide? =
In alphabetical order:
* [artisteer]
* [bing] 
* [bob]
* [bong]
* [bp]
* [bw_action]
* [bw_crumbs]
* [bw_csv]
* [bw_dash]
* [bw_graphviz]
* [bw_page] 
* [bw_plug]
* [bw_post]
* [bw_rpt]
* [bw_search]
* [drupal]
* [fob] 
* [hide]
* [lartisteer]
* [lbp]
* [lbw]
* [ldrupal]
* [loik]
* [lwp]
* [lwpms]
* [oik]
* [OIK]
* [wide]
* [wow]
* [WoW]
* [WOW]
* [wp]
* [wpms]



== Screenshots ==
1. oik-bob-bing-wide sample shortcodes
2. [ bw_plug name="oik,oik-bob-bing-wide"] 

== Upgrade Notice ==
= 1.25 =
Upgrade if you want to use [bw_graphviz] or [bw_crumbs]

= 1.24 =
Upgrade if you want to use the new shortcodes: [bw_action], [bw_dash] or [bw_rpt]

= 1.23 =
Upgrade if you want to use [bw_search] to replace Artisteer's [search].

= 1.22 = 
Needed for sites using [bw_csv] with nested shortcodes. Note: We now only support WordPress 3.9 and above.

= 1.21 =
Now dependent upon oik v2.2-alpha.0403 or higher. Shortcodes will be inactive until the oik base plugin is upgraded.

= 1.20 =
Now dependent upon oik v2.1 or higher

= 1.19 =
Only required for websites which need these shortcodes

= 1.18 =
This version is dependent upon oik v1.17 or higher

= 1.17 =
This version is a standalone version from www.oik-plugins.co.uk
This version matches the child plugin oik-bob-bing-wide in oik v1.17

== Changelog ==
= 1.25 =
* Added: [bw_graphviz] shortcode. A lazy smart shortcode equivalent of wp-graphviz
* Added: [bw_crumbs] shortcode. A wrapper to [wpseo_breadcrumbs]
* Added: jquery folder containing the vis.js and vis-public.js files
* Changed: Improved some docblock comments

= 1.24 =
* Added: [bw_action] shortcode - Perform a WordPress action/filter hook
* Added: [bw_dash] shortcode - Display a dashicon
* Added: [bw_rpt] shortcode - Display a Responsive Pricing Table. Sponsored by Aum Abs Fitness Studios
* Added: classes/class-oik-tables.php - OIK_table class used by [bw_rpt] shortcode

= 1.23 =
* Added: [bw_search] shortcode

= 1.22 =
* Changed: [bw_csv] will now expands nested shortcodes
* Changed: Improved plugin dependency checking
* Changed: No longer performs relocation

= 1.21 = 
* Changed: Moved much of the code from the oik base plugin to the oik-bob-bing-wide shortcodes folder
* Changed: Now responds to "oik_add_shortcodes" action, so shortcodes are only registered when shortcodes are being used.
* Tested: with WordPress 3.9-beta3

= 1.20 =
* Added: [bw_csv] shortcode
* Changed: Plugin dependency 
* Changed: Some docblocks
* Changed: bwlink.css no longer enqueued by default
 
= 1.19 =
* Added: Moved bwlink.css from oik and stripped right down
* Changed: bwlink.css is no longer automatically enqueued
* Changed: Restructured to match oik plugins new styling

= 1.18 =
* Added: Dependency logic ( see admin/oik-activation.php )

= 1.17 =
* Added: Code to relocate from part of oik to a separate plugin
* Added: Updates are provided from oik-plugins

= up to 1.16 =
* Please see the change log in oik for versions prior to 1.17

== Further reading ==
If you want to read more about the oik plugins then please visit the
[oik plugin](http://www.oik-plugins.com/oik) 
**"the oik plugin - for often included key-information"**

