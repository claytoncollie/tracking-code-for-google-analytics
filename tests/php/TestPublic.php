<?php
/**
 * Public facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics\Tests;

use function Tracking_Code_For_Google_Analytics\get_the_id;

class Public_Tests extends \WP_UnitTestCase {

	public function test_global_site_tag_prints_script() {
		ob_start();
		global_site_tag();
		$output = ob_get_clean();

		$this->assertStringContainsString( '<script async src="https://www.googletagmanager.com/gtag/js?id=', $output );
		$this->assertStringContainsString( 'window.dataLayer = window.dataLayer || [];', $output );
		$this->assertStringContainsString( 'gtag("js", new Date());', $output );
		$this->assertStringContainsString( 'gtag("config", "', $output );
		$this->assertStringContainsString( '</script>', $output );
	}

	public function test_global_site_tag_does_not_print_script_when_tracking_id_is_empty() {
		ob_start();
		$original_tracking_id = get_the_id();
		set_the_id( '' );
		global_site_tag();
		$output = ob_get_clean();
		set_the_id( $original_tracking_id );

		$this->assertEmpty( $output );
	}
}