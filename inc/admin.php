<?php
/**
 * Admin facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'admin_init', __NAMESPACE__ . '\add_settings_field' );
/**
 * Register the settings field for the tracking ID.
 *
 * @return void
 * @since 1.0.0
 */
function add_settings_field() : void {
	\add_settings_field(
		'tracking_code_for_google_analytics_id_field',
		esc_html__( 'Google Analytics', 'tracking-code-for-google-analytics' ),
		__NAMESPACE__ . '\text_settings_field',
		'general',
		'default',
		array(
			'id'          => 'tracking-code-for-google-analytics',
			'name'        => 'tracking_code_for_google_analytics',
			'value'       => tracking_code_for_google_analytics_id(),
			'description' => esc_html__( 'Enter your Google Analytics tracking ID eg. UA-1234567', 'tracking-code-for-google-analytics' ),
			'disabled'    => defined( 'TRACKING_CODE_FOR_GOOGLE_ANALYTICS_ID' ) || has_filter( 'tracking_code_for_google_analytics_id' ) ? 'disabled' : '',
		)
	);

	\register_setting(
		'general',
		'tracking_code_for_google_analytics',
		array(
			'type'              => 'string',
			'description'       => esc_html__( 'Google Analytics tracking ID', 'tracking-code-for-google-analytics' ),
			'sanitize_callback' => 'sanitize_text_field',
			'show_in_rest'      => true,
			'default'           => '',
		)
	);
}

/**
 * Text field for tracking ID.
 *
 * @param array $args The field settings.
 * @return void
 * @since 1.0.0
 */
function text_settings_field( array $args ) : void {
	$args = wp_parse_args(
		$args,
		array(
			'id'          => '',
			'name'        => '',
			'value'       => '',
			'description' => '',
			'disabled'    => '',
		)
	);

	printf(
		'<input type="text" id="%1$s" name="%1$s" value="%2$s" aria-describedby="%3$s-description" class="regular-text ltr" %5$s /><p class="description" id="%3$s-description">%4$s</p>',
		esc_attr( $args['name'] ),
		esc_attr( $args['value'] ),
		esc_attr( $args['id'] ),
		esc_html( $args['description'] ),
		esc_html( $args['disabled'] )
	);
}
