<?php
/**
 * Live Search - Dynamic CSS
 *
 * @package astra
 * @since x.x.x
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'astra_dynamic_theme_css', 'astra_live_search_css', 12 );

/**
 * Live Search - Dynamic CSS.
 *
 * @param string $dynamic_css
 * @since x.x.x
 */
function astra_live_search_css( $dynamic_css ) {
	$ltr_left = is_rtl() ? 'right' : 'left';
	$ltr_right = is_rtl() ? 'left' : 'right';

	$heading_base_color = astra_get_option( 'heading-base-color' );

	$static_css = '
		form.search-form {
			position: relative;
		}
		.ast-live-search-results {
			position: absolute;
			width: 100%;
			top: 60px;
			padding: 4px 16px;
			max-height: 400px;
			height: auto;
			overflow-x: hidden;
			overflow-y: auto;
			background: #fff;
			z-index: 999999;
			border-radius: 4px;
			box-shadow: 0 4px 10px -2px rgba(0, 0, 0, 0.1);
		}
		.ast-live-search-results > * {
			-js-display: flex;
			display: flex;
			justify-content: ' . esc_attr( $ltr_left ) . ';
			flex-wrap: wrap;
			align-items: center;
			padding: 12px 0;
		}
		label.ast-search--posttype-heading {
			text-transform: uppercase;
			border-bottom: 1px solid var(--ast-border-color);
			margin-bottom: 10px;
			font-weight: 500;
			color: ' . esc_attr( $heading_base_color ) . ';
		}
		a.ast-search-item {
			position: relative;
		}
		img.ast-search-result-img {
			max-width: 40px;
			border-radius: 2px;
			margin-' . esc_attr( $ltr_right ) . ': 15px;
		}
		a.ast-search-page-link {
			justify-content: center;
			justify-content: center;
			border: 1px solid var(--ast-border-color);
			margin-top: 10px;
		}
	';

	$dynamic_css .= Astra_Enqueue_Scripts::trim_css( $static_css );

	$search_style = astra_get_option( 'header-search-box-type' );
	if ( ! defined( 'ASTRA_EXT_VER' ) || ( defined( 'ASTRA_EXT_VER' ) && ( 'slide-search' === $search_style || 'search-box' === $search_style ) ) ) {
		$search_width    = astra_get_option( 'header-search-width' );
		$search_selector = '.ast-header-search .ast-search-menu-icon';

		$container_css = array(
			$search_selector . ' .search-field'           => array(
				'width'    => ! empty( $search_width['desktop'] ) ? astra_get_css_value( $search_width['desktop'], 'px' ) : 'auto',
			),
		);
		$container_css_tablet = array(
			$search_selector . ' .search-field'           => array(
				'width'    => ! empty( $search_width['tablet'] ) ? astra_get_css_value( $search_width['tablet'], 'px' ) : '100%',
			),
		);
		$container_css_mobile = array(
			$search_selector . ' .search-field'           => array(
				'width'    => ! empty( $search_width['mobile'] ) ? astra_get_css_value( $search_width['mobile'], 'px' ) : '100%',
			),
		);

		$dynamic_css .= astra_parse_css( $container_css );
		$dynamic_css .= astra_parse_css( $container_css_tablet, '', astra_get_tablet_breakpoint() );
		$dynamic_css .= astra_parse_css( $container_css_mobile, '', astra_get_mobile_breakpoint() );
	}

	return $dynamic_css;
}
