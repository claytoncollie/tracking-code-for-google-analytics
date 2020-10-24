<?php

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
		[
            'id'          => 'google-analytics-tracking-code',
			'name'        => 'google_analytics_tracking_code',
			'value'       => get_option( 'google_analytics_tracking_code', '' ),
			'description' => esc_html__( 'Enter your Google Analytics tracking code ID eg. UA-1234567', 'google-analytics-tracking-code' ),
		]
	);

	register_setting( 'general', 'google_analytics_tracking_code', 'sanitize_text_field' );
}

/**
 * Text field for tracking code ID.
 *
 * @param array $args The field settings.
 * @return void
 * @since 1.0.0
 */
function google_analytics_tracking_code_text_settings_field( $args ) {
	$args = wp_parse_args( $args, [
        'id'          => '',
		'name'        => '',
		'value'       => '',
		'description' => '',
	 ] );

	printf( '<input type="text" id="%1$s" name="%1$s" value="%2$s" aria-describedby="%3$s-description" class="regular-text ltr" />%4$s',
		esc_attr( $args['name'] ),
        esc_attr( $args['value'] ),
        esc_attr( $args['id'] ),
        $args['description'] ? sprintf( '<p class="description" id="%1$s-description">%2$s</p>', 
            esc_attr( $args['id'] ),
            esc_html( $args['description'] ) 
        ) : ''
	);
}