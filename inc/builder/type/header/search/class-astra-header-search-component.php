<?php
/**
 * Search for Astra theme.
 *
 * @package     astra-builder
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ASTRA_HEADER_SEARCH_DIR', ASTRA_THEME_DIR . 'inc/builder/type/header/search' );
define( 'ASTRA_HEADER_SEARCH_URI', ASTRA_THEME_URI . 'inc/builder/type/header/search' );

/**
 * Heading Initial Setup
 *
 * @since 3.0.0
 */
class Astra_Header_Search_Component {

	/**
	 * Constructor function that initializes required actions and hooks
	 */
	public function __construct() {

		// @codingStandardsIgnoreStart WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once ASTRA_HEADER_SEARCH_DIR . '/class-astra-header-search-component-loader.php';

		// Include front end files.
		if ( ! is_admin() ) {
			require_once ASTRA_HEADER_SEARCH_DIR . '/dynamic-css/dynamic.css.php';
		}
		// @codingStandardsIgnoreEnd WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

		add_filter( 'rest_post_query', array( $this, 'astra_update_rest_post_query' ), 10, 2 );
	}

	/**
	 * Update REST Post Query for live search.
	 *
	 * @since x.x.x
	 * @param array $args Query args.
	 * @param array $request Request args.
	 * @return array
	 */
	public function astra_update_rest_post_query( $args, $request ) {
		if (
			isset( $request['post_type'] )
			&&
			( strpos( $request['post_type'], 'ast_queried' ) !== false )
		) {
			$search_post_types = explode( ':', sanitize_text_field( $request['post_type'] ) );

			$args = [
				'posts_per_page' => $args['posts_per_page'],
				'post_type' => $search_post_types,
				'paged' => 1,
				's' => $args['s'],
			];
		}

		if (
			is_array( $args['post_type'] )
			&&
			in_array( 'product', $args['post_type'] )
		) {
			if ( 'yes' === get_option( 'woocommerce_hide_out_of_stock_items' ) ) {
				$meta_query = array();

				if ( isset( $args[ 'meta_query' ] ) ) {
					$meta_query = $args['meta_query'];
				}

				$meta_query[] = array(
					'key'     => '_stock_status',
					'value'   => 'outofstock',
					'compare' => '!=',
				);

				$args['meta_query'] = $meta_query;
			}

			if ( function_exists( 'wc_get_product_visibility_term_ids' ) ) {
				$exclude_product_terms = wc_get_product_visibility_term_ids();

				$tax_query = array();

				if ( isset( $args['tax_query'] ) ) {
					$tax_query = $args['tax_query'];
				}

				$tax_query['relation'] = 'AND';

				$tax_query[] = array(
					array(
						'taxonomy' => 'product_visibility',
						'field' => 'term_taxonomy_id',
						'terms' => $exclude_product_terms['exclude-from-search'],
						'operator' => 'NOT IN',
					)
				);

				$args['tax_query'] = $tax_query;
			}
		}

		return $args;
	}
}

/**
 *  Kicking this off by creating an object.
 */
new Astra_Header_Search_Component();
