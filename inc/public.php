<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'wp_head', 'tracking_code_for_google_analytics_do_the_script', 1, 0 );
/**
 * Output the tracking code snippet to the frontend.
 *
 * @return void
 * @since 1.0.0
 */
function tracking_code_for_google_analytics_do_the_script() {
	/**
	 * Filter the measurement_id variable to support other methods of setting this value.
	 *
	 * @param string $measurement_id The Google Analytics tracking code ID.
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
