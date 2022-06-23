<?php
/**
 * Plugin Name: Filter
 * Description: Define the tracking ID with a filter
 * Version:     1.0.0
 * Author:      Clayton Collie
 * License:     GPLv2 or later
 */

add_filter( 'tracking_code_for_google_analytics_id', function( string $tracking_id ) : string {
    $tracking_id = 'filter';
	return $tracking_id;
});