<?php

add_filter( 'tracking_code_for_google_analytics_id', function( string $tracking_id ) : string {
    $tracking_id = 'filter';
	return $tracking_id;
});