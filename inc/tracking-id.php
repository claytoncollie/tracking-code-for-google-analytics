<?php
/**
 * Get the tracking iD.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Get the tracking ID.
 *
 * @return string
 * @since 1.1.0
 */
function tracking_code_for_google_analytics_id() : string {
	$tracking_id = '';

	// Get option value from database.
	$tracking_id = get_option( 'tracking_code_for_google_analytics' );

	/**
	 * Filter the tracking_id variable to support other methods of setting this value.
	 *
	 * @param string $tracking_id The Google Analytics measurement ID.
	 * @return string
	 * @since 1.0.0
	 */
	$tracking_id = apply_filters( 'tracking_code_for_google_analytics_id', $tracking_id );

	/**
	 * In addition to the filter above, this plugin also supports wp-config definitions.
	 *
	 * @see https://www.wpbeginner.com/glossary/wp-config-php/
	 * @since 1.1.0
	 */
	$tracking_id = defined( 'TRACKING_CODE_FOR_GOOGLE_ANALYTICS_ID' ) ? \TRACKING_CODE_FOR_GOOGLE_ANALYTICS_ID : $tracking_id;

	return $tracking_id;
}
