=== Tracking Code for Google Analytics ===
Contributors: claytoncollie
Donate link: https://github.com/sponsors/claytoncollie
Tags: google, analytics, tracking code, google analytics, gtag
Requires at least: 5.2
Tested up to: 6.9
Requires PHP: 7.2
Stable tag: 2.0.4
License: GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Simple, lightweight solution for inserting your Google Analytics tracking code.

== Description ==

Tracking Code For Google Analytics is a simple, lightweight WordPress plugin for inserting your Google Analytics tracking code. The plugin does one thing and one thing only; prints the standard Google Analytics gtag.js tracking script to the `<head>` of your website. To insert your tracking ID, navigate to Settings > General and then scroll to the bottom of the page.

### Composer

`composer require claytoncollie/tracking-code-for-google-analytics`

### Definitions

You can also define the tracking ID in your wp-config.php file with the following snippet. When a definition is set, the admin input field will be disabled.

`define( 'TRACKING_CODE_FOR_GOOGLE_ANALYTICS_ID', 'G-XXXXXXXXXX' );`

### Filters

If you want to set the tracking ID without using the wp-admin user interface, use the filter below. When a filter is set, the admin input field will be disabled.

`add_filter(
	'tracking_code_for_google_analytics_id',
	/**
	 * Set Google Analytics tracking ID.
	 *
	 * @param string $tracking_id Tracking ID.
	 *
	 * @return string
	 */
	function ( string $tracking_id ) : string {
		$tracking_id = 'G-XXXXXXXXXX';
		return $tracking_id;
	}
);`

### Related Plugins

* [Tracking Code for Google Tag Manager](https://wordpress.org/plugins/tracking-code-for-google-tag-manager/)
* [Tracking Code for LinkedIn Insights Tag](https://wordpress.org/plugins/tracking-code-for-linkedin-insights-tag/)
* [Tracking Code for Pinterest Pixel](https://wordpress.org/plugins/tracking-code-for-pinterest-pixel/)
* [Tracking Code for Twitter Pixel](https://wordpress.org/plugins/tracking-code-for-twitter-pixel/)

### Contributing

While the purpose of this plugin is to be very tightly scoped, [issues and pull requests are welcome on GitHub](https://github.com/claytoncollie/tracking-code-for-google-analytics). I do not guarantee that everything will be merged or support will be given.

== Installation ==

1. Upload `tracking-code-for-google-analytics` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to Settings > General > scroll to the bottom of the page
4. Insert your tracking ID
5. Save your changes

== Frequently Asked Questions ==

= Why did I build this plugin? =

The plugins I have used in the past to solve this problem have too many features for my liking. This plugin is comprised of two functions. One for registering a settings field on the Options General page. And another for printing the tracking code to the frontend. I want a lightweight solution for the websites that I build without all of the extra bells and whistles. If you are expecting this plugin to do more or grow in the future, please do not use it.

= Where is the tracking code inserted? =

The tracking code is inserted into the `<head>` section.

= Will this plugin slow down my website? =

No. This plugin is intentionally lightweight. All it does is register a settings field, saves to the database, and then inserts the tracking code. Nothing more.

= I found a bug. How do I report it? =

https://github.com/claytoncollie/tracking-code-for-google-analytics/issues

= Can I use this plugin with Composer? =

https://packagist.org/packages/claytoncollie/tracking-code-for-google-analytics

== Changelog ==

= 2.0.4 =
* Update Tested up to WordPress 6.9
* Update minimum WordPress version to 5.2
* Replace Universal Analytics references with Google Analytics
* Update example ID format from UA-1234567 to G-XXXXXXXXXX
* Add Related Plugins section
* Standardize donate link to GitHub Sponsors

= 2.0.3 =
* Fix readme markdown
* Bump patch version to deploy

= 2.0.2 =
* Fix readme markdown
* Bump patch version to deploy

= 2.0.1 =
* Patch version bump to deploy properly

= 2.0.0 =
* Major version. Possible breaking changes. Test locally before updating.
* Change callback names. Possible breaking change.
* Bump PHP required version to 7.2
* Add PHP Namespaces
* Add PHP parameter type hinting
* Add PHP return type hinting
* Add automated static analysis GitHub action
* Add automated code linting GitHub action
* Add automated acceptance tests GitHub action
* Add automated WordPress version checker  GitHub action
* Fix URLs in readme files
* Fix markdown syntax for changelog in readme.txt
* Ignore phpstan config from deployed plugin
* Ignore CONTRIBUTING.md from deployed plugin

= 1.1.0 =
* Add ability to define tracking in wp-config.php
* Update documentation
* Test with WordPress 6.0.0

= 1.0.1 =
* Update documentation
* Test with WordPress version 5.6.0

= 1.0.0 =
* Initial release
