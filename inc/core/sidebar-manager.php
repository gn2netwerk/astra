<?php
/**
 * Sidebar Manager functions
 *
 * @package     Astra
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Site Sidebar
 */
if ( ! function_exists( 'astra_page_layout' ) ) {

	/**
	 * Site Sidebar
	 *
	 * Default 'right sidebar' for overall site.
	 */
	function astra_page_layout() {

		$supported_post_types = Astra_Posts_Structure_Loader::get_supported_post_types();

		if ( is_singular() ) {

			// If post meta value is empty,
			// Then get the POST_TYPE sidebar.
			$layout = astra_get_option_meta( 'site-sidebar-layout', '', true );

			if ( empty( $layout ) ) {

				$post_type = strval( get_post_type() );

				if ( in_array( $post_type, $supported_post_types ) ) {

					$layout = astra_get_option( 'single-' . $post_type . '-sidebar-layout' );
				}

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = astra_get_option( 'site-sidebar-layout' );
				}
			}
		} else {

			if ( is_search() ) {

				// Check only post type archive option value.
				$layout = astra_get_option( 'archive-post-sidebar-layout' );

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = astra_get_option( 'site-sidebar-layout' );
				}
			} else {

				$post_type = strval( get_post_type() );
				$layout    = '';

				if ( in_array( $post_type, $supported_post_types ) ) {
					$layout = astra_get_option( 'archive-' . $post_type . '-sidebar-layout' );
				}

				if ( 'default' == $layout || empty( $layout ) ) {

					// Get the global sidebar value.
					// NOTE: Here not used `true` in the below function call.
					$layout = astra_get_option( 'site-sidebar-layout' );
				}
			}
		}

		return apply_filters( 'astra_page_layout', $layout );
	}
}

// Removing the sidebar if layout is FW Stretched.
add_filter(
	'astra_page_layout',

	/**
	 * Remove Sidebar if current layout is Fullwidth.
	 * Old users - yes
	 * New users - no
	 * @param mixed $sidebar_layout
	 * @return mixed $sidebar_layout
	 * @since x.x.x
	 */
	function( $sidebar_layout ) { // phpcs:ignore PHPCompatibility.FunctionDeclarations.NewClosure.Found
		$ast_container_layout = astra_get_content_layout();
		if ( 'page-builder' === $ast_container_layout && astra_fullwidth_sidebar_support() ) {
			return 'no-sidebar';
		}
		return $sidebar_layout;
	}
);

/**
 * Check if fullwidth layout with sidebar is supported.
 * Old users - yes.
 * New users - no.
 */
if ( ! function_exists( 'astra_fullwidth_sidebar_support' ) ) {

	/**
	 * Check if fullwidth layout with sidebar is supported.
	 * Old users - yes
	 * New users - no
	 * @return bool true|false.
	 * @since x.x.x
	 */
	function astra_fullwidth_sidebar_support() {
		$astra_settings = get_option( ASTRA_THEME_SETTINGS );
		return apply_filters( 'astra_get_option_fullwidth_sidebar_support', isset( $astra_settings['fullwidth_sidebar_support'] ) ? false : true );
	}
}
