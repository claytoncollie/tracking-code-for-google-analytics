<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics\Tests;

use function Tracking_Code_For_Google_Analytics\global_site_tag;
use const Tracking_Code_For_Google_Analytics\OPTION_NAME;

class TestPublic extends \WP_UnitTestCase {

	public function test_global_site_tag_prints_script_with_tracking_id() {
		// Set a test tracking ID
		update_option( OPTION_NAME, 'GA-123456789' );
		
		ob_start();
		global_site_tag();
		$output = ob_get_clean();

		$this->assertStringContainsString( '<script async src="https://www.googletagmanager.com/gtag/js?id=GA-123456789', $output );
		$this->assertStringContainsString( 'window.dataLayer = window.dataLayer || [];', $output );
		$this->assertStringContainsString( 'gtag("js", new Date());', $output );
		$this->assertStringContainsString( 'gtag("config", "GA-123456789"', $output );
		$this->assertStringContainsString( '</script>', $output );
	}

	public function test_global_site_tag_does_not_print_script_when_tracking_id_is_empty() {
		// Clear the tracking ID
		delete_option( OPTION_NAME );
		
		ob_start();
		global_site_tag();
		$output = ob_get_clean();

		$this->assertEmpty( $output );
	}
}