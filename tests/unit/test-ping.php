<?php
/**
 * Class TestPing
 *
 * @package Astra
 */

/**
 * Check if test cases working fine.
 */
class TestPing extends WP_UnitTestCase {

	/**
	 * User ID for a editor user..
	 *
	 * @var int
	 */
	private $admin_user_id;

	/**
	 * Setup the tests class.
	 *
	 * @return void
	 */
	public function setUp() {
		$this->admin_user_id = self::factory()->user->create(
			array(
				'role' => 'administrator',
			)
		);
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
