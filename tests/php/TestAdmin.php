<?php
/**
 * PHPUnit tests for Admin facing features.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics\Tests;

class Admin_Tests extends \WP_UnitTestCase {

	public function test_register_setting() {
		// Test if the register_setting() function is defined.
		$this->assertTrue( function_exists( __NAMESPACE__ . '\register_setting' ) );

		// Test if the add_settings_field() function is called with the correct parameters.
		ob_start();
		register_setting();
		$output = ob_get_clean();
		$this->assertStringContainsString( 'Google Analytics', $output );
		$this->assertStringContainsString( OPTION_NAME, $output );
	}

	public function test_input_field() {
		// Test if the input_field() function is defined.
		$this->assertTrue( function_exists( __NAMESPACE__ . '\input_field' ) );

		// Test if the input_field() function outputs the expected HTML.
		ob_start();
		input_field( array(
			'id'          => 'test-id',
			'name'        => 'test-name',
			'value'       => 'test-value',
			'description' => 'test-description',
			'disabled'    => 'test-disabled',
		) );
		$output = ob_get_clean();
		$this->assertStringContainsString( 'id="test-id"', $output );
		$this->assertStringContainsString( 'name="test-name"', $output );
		$this->assertStringContainsString( 'value="test-value"', $output );
		$this->assertStringContainsString( 'aria-describedby="test-id-description"', $output );
		$this->assertStringContainsString( 'class="regular-text ltr"', $output );
		$this->assertStringContainsString( 'disabled="test-disabled"', $output );
		$this->assertStringContainsString( 'test-description', $output );
	}

}