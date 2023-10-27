<?php
/**
 * Class TestAstraInit
 *
 * @package Astra
 */

/**
 * Check if test cases working fine.
 */
class TestAstraInit extends WP_UnitTestCase {

	/**
	 * Setup the tests class.
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		// Additional setup if needed.
	}
	public function tearDown() {
		parent::tearDown();
		// Additional cleanup if needed.
	}

	/**
	 * A basic test example.
	 *
	 * @return void
	 */
	public function test_true_is_true() {
		$this->assertTrue( true );
	}
}
