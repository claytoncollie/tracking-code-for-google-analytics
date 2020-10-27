<?php
/**
 * Admin facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_init', 'tracking_code_for_google_analytics_add_settings_field' );
/**
 * Register the settings field for the tracking code ID.
 *
 * @return void
 * @since 1.0.0
 */
function tracking_code_for_google_analytics_add_settings_field() {
	add_settings_field(
		'tracking_code_for_google_analytics_id_field',
		esc_html__( 'Google Analytics', 'tracking-code-for-google-analytics' ),
		'tracking_code_for_google_analytics_text_settings_field',
		'general',
		'default',
		array(
			'id'          => 'tracking-code-for-google-analytics',
			'name'        => 'tracking_code_for_google_analytics',
			'value'       => get_option( 'tracking_code_for_google_analytics', '' ),
			'description' => esc_html__( 'Enter your Google Analytics tracking code ID eg. UA-1234567', 'tracking-code-for-google-analytics' ),
		)
	);

	register_setting(
		'general',
		'tracking_code_for_google_analytics',
		array(
			'type'              => 'string',
			'description'       => esc_html__( 'Google Analytics tracking code ID', 'tracking-code-for-google-analytics' ),
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => '',
		)
	);
}

/**
 * Text field for tracking code ID.
 *
 * @param array $args The field settings.
 * @return void
 * @since 1.0.0
 */
function tracking_code_for_google_analytics_text_settings_field( $args ) {
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
