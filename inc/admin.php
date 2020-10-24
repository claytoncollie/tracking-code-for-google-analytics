<?php
/**
 * Admin facing features.
 *
 * @package Google_Analytics_Tracking_Code
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_init', 'google_analytics_tracking_code_add_settings_field' );
/**
 * Register the settings field for the tracking code ID.
 *
 * @return void
 * @since 1.0.0
 */
function google_analytics_tracking_code_add_settings_field() {
	add_settings_field(
		'google_analytics_tracking_code_id_field',
		esc_html__( 'Google Analytics', 'google-analytics-tracking-code' ),
		'google_analytics_tracking_code_text_settings_field',
		'general',
		'default',
		array(
			'id'          => 'google-analytics-tracking-code',
			'name'        => 'google_analytics_tracking_code',
			'value'       => get_option( 'google_analytics_tracking_code', '' ),
			'description' => esc_html__( 'Enter your Google Analytics tracking code ID eg. UA-1234567', 'google-analytics-tracking-code' ),
		)
	);

	register_setting(
		'general',
		'google_analytics_tracking_code',
		array(
			'type'              => 'string',
			'description'       => esc_html__( 'Google Analytics tracking code ID', 'google-analytics-tracking-code' ),
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => '',
		)
	);
}

/**
 * Text field for tracking code ID.
 *
 * @param array<string, string> $args The field settings.
 * @return void
 * @since 1.0.0
 */
function google_analytics_tracking_code_text_settings_field( $args ) {
	$args = wp_parse_args(
		$args,
		array(
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'description' => '',
		)
	);

	printf(
		'<input type="text" id="%1$s" name="%1$s" value="%2$s" aria-describedby="%3$s-description" class="regular-text ltr" />%4$s',
		esc_attr( $args['name'] ),
		esc_attr( $args['value'] ),
		esc_attr( $args['id'] ),
		$args['description'] ? sprintf(
			'<p class="description" id="%1$s-description">%2$s</p>',
			esc_attr( $args['id'] ),
			esc_html( $args['description'] )
		) : ''
	);
}
