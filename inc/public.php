<?php

add_action( 'wp_head', 'google_analytics_tracking_code_do_the_script', 1 );
/**
 * Output the tracking code snippet to the frontend.
 * 
 * @return void
 * @since 1.0.0
 */
function google_analytics_tracking_code_do_the_script() {
	/**
	 * Filter the google_analytics_tracking_code_id variable to support other methods of setting this value.
	 *
	 * @param string $sitetracking_code_id_container_id The Google Analytics tracking code ID.
     * @return string
     * @since 1.0.0
	 */
	$tracking_code_id = apply_filters( 'google_analytics_tracking_code_id', get_option( 'google_analytics_tracking_code', '' ) );

    if ( !empty( $tracking_code_id ) ) {

        printf( '
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=%1$s"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag("js", new Date());
            gtag("config", "%1$s");
            </script>
            ',
            esc_attr( $tracking_code_id )
        );

    }
	
}