<?php
/**
 * Below Footer Styling Loader for Astra theme.
 *
 * @package     Astra Builder
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Below Footer Initialization
 *
 * @since 3.0.0
 */
class Astra_Below_Footer_Component_Loader {

	/**
	 * Constructor
	 *
	 * @since 3.0.0
	 */
	public function __construct() {
		add_action( 'customize_preview_init', array( $this, 'preview_scripts' ), 110 );
	}

	/**
	 * Customizer Preview
	 *
	 * @since 3.0.0
	 */
	public function preview_scripts() {
		/**
		 * Load unminified if SCRIPT_DEBUG is true.
		 */
		/* Directory and Extension */
		$dir_name    = ( SCRIPT_DEBUG ) ? 'unminified' : 'minified';
		$file_prefix = ( SCRIPT_DEBUG ) ? '' : '.min';
		wp_enqueue_script( 'astra-footer-below-footer-customizer-preview-js', ASTRA_BUILDER_FOOTER_BELOW_FOOTER_URI . '/assets/js/' . $dir_name . '/customizer-preview' . $file_prefix . '.js', array( 'customize-preview', 'astra-customizer-preview-js' ), ASTRA_THEME_VERSION, true );

		$inner_elements_layout         = astra_get_option( 'hb-stack' );
		$inner_elements_layout_desktop = ( isset( $inner_elements_layout['desktop'] ) ) ? $inner_elements_layout['desktop'] : '';
		$horizontal_alignment_prop     = 'stack' === $inner_elements_layout_desktop ? 'justify-self' : 'justify-content';

		// Localize variables for Footer JS.
		wp_localize_script(
			'astra-footer-below-footer-customizer-preview-js',
			'AstraBuilderBelowFooterData',
			array(
				'horizontal_alignment_prop' => $horizontal_alignment_prop,
			)
		);

	}
}

/**
*  Kicking this off by creating the object of the class.
*/
new Astra_Below_Footer_Component_Loader();
