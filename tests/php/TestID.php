<?php
/**
 * PHPUnit tests for getting the ID.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics\Tests;

use function Tracking_Code_For_Google_Analytics\get_the_id;
use const Tracking_Code_For_Google_Analytics\FILTER_NAME;
use const Tracking_Code_For_Google_Analytics\OPTION_NAME;

class TestID extends \WP_UnitTestCase {

	/**
	 * Test get_the_id() function with filter.
	 */
	public function test_get_the_id_with_filter() {
		add_filter( FILTER_NAME, function() {
			return 'UA-FILTER';
		});
		$this->assertEquals( 'UA-FILTER', get_the_id() );
		
		// Clean up
		remove_all_filters( FILTER_NAME );
	}

	/**
	 * Test get_the_id() function with option.
	 */
	public function test_get_the_id_with_option() {
		update_option( OPTION_NAME, 'UA-OPTION' );
		$this->assertEquals( 'UA-OPTION', get_the_id() );
		
		// Clean up
		delete_option( OPTION_NAME );
	}

	/**
	 * Test get_the_id() function with no tracking id defined.
	 */
	public function test_get_the_id_with_no_tracking_id_defined() {
		// Ensure no option is set
		delete_option( OPTION_NAME );
		$this->assertEquals( '', get_the_id() );
	}
}