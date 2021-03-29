<?php
/**
 * Plugin Name:     Tracking Code For Google Analytics
 * Plugin URI:      https://github.com/claytoncollie/tracking-code-for-google-analytics
 * Description:     Simple, lightweight solution for inserting your Google Analytics tracking code.
 * Author:          Clayton Collie
 * Author URI:      https://github.com/claytoncollie
 * Text Domain:     tracking-code-for-google-analytics
 * Version:         1.1.0
 *
 * @package         Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/inc/admin.php';
require_once __DIR__ . '/inc/public.php';
