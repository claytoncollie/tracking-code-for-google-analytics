<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics;

use function Tracking_Code_For_Google_Analytics\get_the_id;

add_action( 'wp_head', __NAMESPACE__ . '\global_site_tag' );
/**
 * Maybe print the tracking code snippet on the frontend.
 *
 * @return void
 *
 * @since 1.0.0
 */
function global_site_tag() : void {
	$tracking_id = get_the_id();

	// Bail early if empty.
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
