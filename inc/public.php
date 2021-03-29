<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_head', __NAMESPACE__ . '\do_the_script' );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function do_the_script() : void {
	/**
	 * Filter the measurement_id variable to support other methods of setting this value.
	 *
	 * @param string $measurement_id The Google Analytics measurement ID.
	 * @return string
	 * @since 1.0.0
	 */
	$measurement_id = apply_filters( 'tracking_code_for_google_analytics_id', get_option( 'tracking_code_for_google_analytics', '' ) );

	if ( '' === $measurement_id ) {
		return;
	}

	printf(
		// phpcs:disable
		'
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=%1$s"></script>
		<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag("js", new Date());
		gtag("config", "%1$s");
		</script>
		',
		// phpcs:enable
		esc_attr( $measurement_id )
	);
}
