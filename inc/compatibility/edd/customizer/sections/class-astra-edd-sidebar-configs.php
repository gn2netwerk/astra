<?php
/**
 * Easy Digital Downloads Sidebar Options for our theme.
 *
 * @package     Astra
 * @author      Brainstorm Force
 * @copyright   Copyright (c) 2020, Brainstorm Force
 * @link        https://www.brainstormforce.com
 * @since       Astra 1.5.5
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Astra_Edd_Sidebar_Configs' ) ) {

	/**
	 * Customizer Sanitizes Initial setup
	 */
	class Astra_Edd_Sidebar_Configs extends Astra_Customizer_Config_Base {

		/**
		 * Getting context for sidebar.
		 * Case: Hide sidebar for Full-width layout.
		 *
		 * @param string $post_type On basis of this will decide to hide sidebar control or not.
		 * @return mixed
		 * @since x.x.x
		 */
		public function get_sidebar_context() {
			return array(
				'relation' => 'AND',
				Astra_Builder_Helper::$general_tab_config,
				array(
					'setting'  => ASTRA_THEME_SETTINGS . '[edd-new-content-layout]',
					'operator' => '!=',
					'value'    => 'full-width-container',
				),
				array(
					'relation' => 'OR',
					array(
						'setting'  => ASTRA_THEME_SETTINGS . '[edd-new-content-layout]',
						'operator' => '!=',
						'value'    => 'default',
					),
					array(
						'setting'  => ASTRA_THEME_SETTINGS . '[new-site-content-layout]',
						'operator' => '!=',
						'value'    => 'full-width-container',
					),
				),
			);
		}

		/**
		 * Register Astra Easy Digital Downloads Sidebar Configurations.
		 *
		 * @param Array                $configurations Astra Customizer Configurations.
		 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
		 * @since 1.5.5
		 * @return Array Astra Customizer Configurations with updated configurations.
		 */
		public function register_configuration( $configurations, $wp_customize ) {

			$_configs = array(

				/**
				 * Option: General Sidebar Layout.
				 */

				array(
					'name'              => ASTRA_THEME_SETTINGS . '[edd-general-sidebar-layout]',
					'type'              => 'control',
					'control'           => 'ast-radio-image',
					'sanitize_callback' => array( 'Astra_Customizer_Sanitizes', 'sanitize_choices' ),
					'section'           => 'section-edd-general',
					'default'           => astra_get_option( 'edd-general-sidebar-layout' ),
					'context'           => $this->get_sidebar_context(),
					'priority'          => 6,
					'title'             => __( 'Sidebar Layout', 'astra' ),
					'choices'           => array(
						'default'       => array(
							'label' => __( 'Default', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'layout-default', false ) : '',
						),
						'no-sidebar'    => array(
							'label' => __( 'No Sidebar', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'no-sidebar', false ) : '',
						),
						'left-sidebar'  => array(
							'label' => __( 'Left Sidebar', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'left-sidebar', false ) : '',
						),
						'right-sidebar' => array(
							'label' => __( 'Right Sidebar', 'astra' ),
							'path'  => ( class_exists( 'Astra_Builder_UI_Controller' ) ) ? Astra_Builder_UI_Controller::fetch_svg_icon( 'right-sidebar', false ) : '',
						),
					),
				),
			);

			return array_merge( $configurations, $_configs );

		}
	}
}

new Astra_Edd_Sidebar_Configs();



