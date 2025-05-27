<?php
/**
 * PHPUnit tests for Admin facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics\Tests;

use function Tracking_Code_For_Google_Analytics\input_field;
use function Tracking_Code_For_Google_Analytics\register_setting;

use const Tracking_Code_For_Google_Analytics\OPTION_NAME;

class TestAdmin extends \WP_UnitTestCase {

	public function test_register_setting() {
		// Test if the register_setting() function is defined.
		$this->assertTrue( function_exists( 'Tracking_Code_For_Google_Analytics\register_setting' ) );

		// Simulate that admin_init action fires
		do_action( 'admin_init' );
		
		// Check if the setting was registered
		$this->assertTrue( get_option( OPTION_NAME ) !== false );
	}

	public function test_input_field() {
		// Test if the input_field() function is defined.
		$this->assertTrue( function_exists( 'Tracking_Code_For_Google_Analytics\input_field' ) );

		// Test if the input_field() function outputs the expected HTML.
		ob_start();
		input_field( array(
			'id'          => 'test-id',
			'name'        => 'test-name',
			'value'       => 'test-value',
			'description' => 'test-description',
			'disabled'    => '',
		) );
		$output = ob_get_clean();
		$this->assertStringContainsString( 'name="test-name"', $output );
		$this->assertStringContainsString( 'value="test-value"', $output );
		$this->assertStringContainsString( 'aria-describedby="test-id-description"', $output );
		$this->assertStringContainsString( 'class="regular-text ltr"', $output );
		$this->assertStringContainsString( 'test-description', $output );
	}

}