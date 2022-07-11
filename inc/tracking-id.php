<?php
/**
 * Get the tracking iD.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics;

use const Tracking_Code_For_Google_Analytics\CONFIG_NAME;
use const Tracking_Code_For_Google_Analytics\FILTER_NAME;
use const Tracking_Code_For_Google_Analytics\OPTION_NAME;

/**
 * Get the tracking ID.
 *
 * @return string
 * @since 1.1.0
 */
function get_the_id() : string {
	/**
	 * Define the tracking ID in your wp-config file.
	 *
	 * @see https://www.wpbeginner.com/glossary/wp-config-php/
	 *
	 * @since 1.1.0
	 */
	if ( defined( CONFIG_NAME ) ) {
		return \TRACKING_CODE_FOR_GOOGLE_ANALYTICS_ID;
	}

	/**
	 * Define the tracking ID in with a filter.
	 *
	 * @param string $tracking_id The Google Analytics tracking ID.
	 *
	 * @return string
	 *
	 * @since 1.0.0
	 */
	if ( has_filter( FILTER_NAME ) ) {
		return apply_filters( FILTER_NAME, '' );
	}

	/**
	 * If we are not defining the tracking ID with a definition in our wp-config file,
	 * and we are not defining the tracking ID with a PHP filter,
	 * then we will query the tracking ID from the database.
	 *
	 * @since 1.0.0
	 */
	return get_option( OPTION_NAME, '' );

}
