<?php
/**
 * Easy Digital Downloads Content Style Options for our theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra x.x.x
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Edd_Content_Style_Configs' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Astra_Edd_Content_Style_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Astra Easy Digital Downloads Content Style Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since x.x.x
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(
				/**
				 * Option: Content Style Option.
				 */
				array(
					'name'              => ASTRA_THEME_SETTINGS . '[edd-content-style]',
					'type'              => 'control',
					'control'           => 'ast-radio-image',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
					'section'           => 'section-edd-general',
					'default'           => astra_get_option( 'edd-content-style' ),
					'priority'          => 5,
					'title'             => __( 'Container Content Style', 'astra' ),
					'choices'           => array(
						'default'         => array(
							'label' => __( 'Default', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'layout-default', false ) : '',
						),
						'unboxed'         => array(
							'label' => __( 'Unboxed', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'archive-content-style-unboxed' ) : '',
						),
						'boxed'           => array(
							'label' => __( 'Boxed', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'archive-content-style-boxed' ) : '',
						),
					),
					'divider'           => array( 'ast_class' => 'ast-bottom-section-divider' )
				),
			);

			return array_merge( $configurations, $_configs );

		}
	}
}

new Astra_Edd_Content_Style_Configs();



