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
	$tracking_id = tracking_code_for_google_analytics_id();

	if ( '' === $tracking_id ) {
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
		esc_attr( $tracking_id )
	);
}
