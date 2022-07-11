<?php
/**
 * Plugin Name:     Tracking Code For Google Analytics
 * Plugin URI:      https://github.com/claytoncollie/tracking-code-for-google-analytics
 * Description:     Simple, lightweight solution for inserting your Google Analytics tracking code.
 * Author:          Clayton Collie
 * Author URI:      https://github.com/claytoncollie
 * Text Domain:     tracking-code-for-google-analytics
 * Version:         2.0.3
 *
 * @package         Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics;

const OPTION_NAME = 'tracking_code_for_google_analytics';
const FILTER_NAME = 'tracking_code_for_google_analytics_id';
const CONFIG_NAME = 'TRACKING_CODE_FOR_GOOGLE_ANALYTICS_ID';

require_once __DIR__ . '/inc/tracking-id.php';
require_once __DIR__ . '/inc/admin.php';
require_once __DIR__ . '/inc/public.php';
