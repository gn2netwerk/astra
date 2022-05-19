<?php
/**
 * Bottom Footer Options for Astra Theme.
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Sidebar_Layout_Configs' ) ) {

	/**
	 * Register Astra Sidebar Layout Configurations.
	 */
	class Astra_Sidebar_Layout_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Register Astra Sidebar Layout Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.4.3
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: Default Sidebar Position
				 */
				array(
					'name'     => ASTRA_THEME_SETTINGS . '[site-sidebar-layout]',
					'type'     => 'control',
					'control'  => 'ast-select',
					'section'  => 'section-sidebars',
					'default'  => astra_get_option( 'site-sidebar-layout' ),
					'priority' => 5,
					'title'    => __( 'Default Layout', 'astra' ),
					'choices'  => array(
						'no-sidebar'    => __( 'No Sidebar', 'astra' ),
						'left-sidebar'  => __( 'Left Sidebar', 'astra' ),
						'right-sidebar' => __( 'Right Sidebar', 'astra' ),
					),
					'divider'  => array( 'ast_class' => 'ast-bottom-divider' ),
				),

				/**
				 * Option: Sidebar Page
				 */

				array(
					'name'              => ASTRA_THEME_SETTINGS . '[single-page-sidebar-layout]',
					'type'              => 'control',
					'control'           => 'ast-radio-image',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
					'section'           => 'section-page-dynamic-group',
					'default'           => astra_get_option( 'single-page-sidebar-layout' ),
					'priority'          => 5,
					'title'             => __( 'Sidebar Layout', 'astra' ),
					'choices'           => array(
						'default'       => array(
							'label' => __( 'Default', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'blog-layout-1', false ) : '',
						),
						'no-sidebar'    => array(
							'label' => __( 'No Sidebar', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'blog-layout-2', false ) : '',
						),
						'left-sidebar'  => array(
							'label' => __( 'Left Sidebar', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'blog-layout-3', false ) : '',
						),
						'right-sidebar' => array(
							'label' => __( 'Right Sidebar', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'blog-layout-3', false ) : '',
						),
					),
				),



				/**
				 * Option: Primary Content Width
				 */
				array(
					'name'        => ASTRA_THEME_SETTINGS . '[site-sidebar-width]',
					'type'        => 'control',
					'control'     => 'ast-slider',
					'default'     => astra_get_option( 'site-sidebar-width' ),
					'section'     => 'section-sidebars',
					'priority'    => 15,
					'title'       => __( 'Sidebar Width', 'astra' ),
					'suffix'      => '%',
					'transport'   => 'postMessage',
					'input_attrs' => array(
						'min'  => 15,
						'step' => 1,
						'max'  => 50,
					),
				),

				array(
					'name'     => ASTRA_THEME_SETTINGS . '[site-sidebar-width-description]',
					'type'     => 'control',
					'control'  => 'ast-description',
					'section'  => 'section-sidebars',
					'priority' => 15,
					'title'    => '',
					'help'     => __( 'Sidebar width will apply only when one of the above sidebar is set.', 'astra' ),
					'settings' => array(),
				),
			);

			return array_merge( $configurations, $_configs );
		}
	}
}


new Astra_Sidebar_Layout_Configs();





