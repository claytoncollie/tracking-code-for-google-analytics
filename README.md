# Google Analytics Tracking Code

Google Analytics Tracking Code is a simple, lightweight WordPress plugin for inserting your Google Analytics tracking code. The plugin does one thing and one thing only; prints the standard Google Analytics tacking script to the `<head>` of your website. To insert your tracking  code ID, navigate to Settings > General and then scroll to the bottom of the page.

### Getting Started

1. Upload `google-analytics-tracking-code` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Navigate to Settings > General > scroll to the bottom of the page
4. Insert your tracking code ID
5. Save your changes

### Composer

`composer require claytoncollie/google-analytics-tracking-code`

### Filters

If you want to set the tracking code ID without using the wp-admin user interface, use the filter below.

```php
add_filter(
	'google_analytics_tracking_code_id',
	/**
	 * Set Google Analytics tracking code ID.
	 *
	 * @param string $tracking_code_id Tracking code ID.
	 *
	 * @return string
	 */
	function ( $tracking_code_id ) {
	    return 'UA-7654321';
	}
);
```

### Frequently Asked Questions

##### Why did you build this plugin?

The plugins I have used in the past to solve this problem have too many features for my liking. This plugin is comprised two functions. One for registering a settings field on the Options General page. And another for printing the tracking code to the frontend. I want a lightweight solution for the websites that I build without all of the extra bells and whistles. If you are expecting this plugin to do more or grow in the future, please do not use it.

##### Where is the tracking code inserted?

The tracking code is inserted into the `<head>` section.

##### Will this plugin slow down my website?

No. This plugin is intentionally lightweight. All it does is register a settings field, saves to the database, and then inserts the tracking code. Nothing more.

##### I found a bug. How do I report it?

https://github.com/claytoncollie/google-analytics-tracking-code/issues

##### Can I use this plugin with Composer?

https://packagist.org/packages/claytoncollie/google-analytics-tracking-code

### Contributing

While the purpose of this plugin is to be very tightly scoped, issues and pull requests are welcome, but I do not guarantee that everything will be merged or support will be given.

1. Clone the repository to your `wp-content/plugins/` directory.

`git clone git@github.com:claytoncollie/google-analytics-tracking-code.git`

2. Navigate into the directory.

`cd google-analytics-tracking-code`

3. Install Composer dependencies.

`composer install`
