<?php
/**
 * PHPUnit tests for getting the ID.
 *
 * @package Tracking_Code_For_Google_Analytics
 */

namespace Tracking_Code_For_Google_Analytics\Tests;

use function Tracking_Code_For_Google_Analytics\get_the_id;

class The_ID_Tests extends \WP_UnitTestCase {

	/**
	 * Test get_the_id() function with defined constant.
	 */
	public function test_get_the_id_with_defined_constant() {
		define('Tracking_Code_For_Google_Analytics\\TRACKING_CODE_FOR_GOOGLE_ANALYTICS_ID', 'UA-DEFINITION');
		$this->assertEquals('UA-DEFINITION', get_the_id());
	}

	/**
	 * Test get_the_id() function with filter.
	 */
	public function test_get_the_id_with_filter() {
		add_filter('Tracking_Code_For_Google_Analytics\\FILTER_NAME', function() {
			return 'UA-FILTER';
		});
		$this->assertEquals('UA-FILTER', get_the_id());
	}

	/**
	 * Test get_the_id() function with option.
	 */
	public function test_get_the_id_with_option() {
		update_option('Tracking_Code_For_Google_Analytics\\OPTION_NAME', 'UA-OPTION');
		$this->assertEquals('UA-OPTION', get_the_id());
	}

	/**
	 * Test get_the_id() function with no tracking id defined.
	 */
	public function test_get_the_id_with_no_tracking_id_defined() {
		$this->assertEquals('', get_the_id());
	}
}