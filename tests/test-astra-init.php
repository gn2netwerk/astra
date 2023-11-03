<?php
/**
 * Class TestAstraInit
 *
 * @package Astra
 */

/**
 * Tests Theme Initialization.
 *
 * @group themes
 */
class Tests_Astra_Init extends WP_UnitTestCase {
	/**
	 * Testing Astra Initialization.
	 */
	public function testConstants() {
		$this->assertTrue( defined( 'ASTRA_THEME_VERSION' ) );
		$this->assertTrue( defined( 'ASTRA_THEME_SETTINGS' ) );
		$this->assertTrue( defined( 'ASTRA_THEME_DIR' ) );
		$this->assertTrue( defined( 'ASTRA_THEME_URI' ) );
	}

	/**
	 * Check loaders.
	 */
	public function testAutoloader() {
		$this->assertTrue( class_exists( 'Astra_Admin_Loader' ) );
		$this->assertTrue( class_exists( 'Astra_After_Setup_Theme' ) );
		$this->assertTrue( class_exists( 'Astra_Customizer' ) );
		$this->assertTrue( class_exists( 'Astra_Dynamic_CSS' ) );
	}
}
