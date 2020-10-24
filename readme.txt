=== Google Analytics Tracking Code ===
Contributors: claytoncollie
Donate link: https://www.claytoncollie.com/
Tags: google, analytics, tracking, code, ID
Requires at least: 4.5
Tested up to: 5.5.1
Requires PHP: 5.6
Stable tag: 0.1.0
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple, lightweight solution for inserting your Google Analytics tracking code.

== Description ==

Google Analytics Tracking Code is a simple, lightweight solution for inserting your Google Analytics tracking code. The plugin does one thing and one thing only; prints the standard Google Analytics tacking script to the `<head>` of your website. To insert your tracking  code ID, navigate to Settings > General and then scroll to the bottom of the page.

### Filters

If you want to set the tracking code ID without using the wp-admin user interface, use the filter below.

```
add_filter( 'google_analytics_tracking_code_id', 'my_prefix_google_analytics_id' );
/**
 * Filter the Google Analytics tracking ID.
 *
 * @param string $tracking_code_id Tracking code ID.
 * @return string
 */
function my_prefix_google_analytics_id( $tracking_code_id ) {
    $tracking_code_id = 'UA-7654321';
	return $tracking_code_id;
}
```

### Composer

This plugin is available on Packagist.

https://packagist.org/packages/claytoncollie/google-analytics-tracking-code

### Contributing

While the purpose of this plugin is to be very tightly scoped, issues and pull requests are welcome, but I do not guarantee that everything will be merged or support will be given.

https://github.com/claytoncollie/google-analytics-tracking-code

== Installation ==

1. Upload `google-analytics-tracking-code` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to Settings > General > scroll to the bottom of the page
4. Insert your tracking code ID
5. Save your changes

== Frequently Asked Questions ==

= Why did you build this plugin? =

The plugins I have used in the past to solve this problem have too many features for my liking. This plugin is comprised two functions. One for registering a settings field on the Options General page. And another for printing the tracking code to the frontend. I want a lightweight solution for the websites that I build without all of the extra bells and whistles. If you are expecting this plugin to do more or grow in the future, please do not use it.

= Where is the tracking code inserted? =

The tracking code is inserted into the `<head>` section.

= Will this plugin slow down my website? =

No. This plugin is intentionally lightweight. All it does is register a settings field, saves to the database, and then inserts the tracking code. Nothing more.

= I found a bug. How do I report it? =

https://github.com/claytoncollie/google-analytics-tracking-code/issues

= Can I use this plugin with Composer? =

https://packagist.org/packages/claytoncollie/google-analytics-tracking-code

== Changelog ==

= 1.0.0 =
* Initial release
