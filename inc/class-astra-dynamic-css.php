<?php
/**
 * Custom Styling output for Astra Theme.
 *
 * @package     Astra
 * @subpackage  Class
 * @author      Astra
 * @copyright   Copyright (c) 2020, Astra
 * @link        https://wpastra.com/
 * @since       Astra 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Dynamic CSS
 */
if ( ! class_exists( 'Astra_Dynamic_CSS' ) ) {

	/**
	 * Dynamic CSS
	 */
	class Astra_Dynamic_CSS {

		/**
		 * Return CSS Output
		 *
		 * @param  string $dynamic_css          Astra Dynamic CSS.
		 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
		 * @return string Generated CSS.
		 */
		public static function return_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			/**
			 *
			 * Contents
			 * - Variable Declaration
			 * - Global CSS
			 * - Typography
			 * - Page Layout
			 *   - Sidebar Positions CSS
			 *      - Full Width Layout CSS
			 *   - Fluid Width Layout CSS
			 *   - Box Layout CSS
			 *   - Padded Layout CSS
			 * - Blog
			 *   - Single Blog
			 * - Typography of Headings
			 * - Header
			 * - Footer
			 *   - Main Footer CSS
			 *     - Small Footer CSS
			 * - 404 Page
			 * - Secondary
			 * - Global CSS
			 */

			/**
			 * - Variable Declaration
			 */
			$is_site_rtl                = is_rtl();
			$site_content_width         = astra_get_option( 'site-content-width', 1200 );
			$narrow_container_max_width = astra_get_option( 'narrow-container-max-width', apply_filters( 'astra_narrow_container_width', 750 ) );
			$header_logo_width          = astra_get_option( 'ast-header-responsive-logo-width' );
			$container_layout           = astra_get_option( 'site-content-layout' );
			$title_color                = astra_get_option( 'header-color-site-title' );
			$title_hover_color          = astra_get_option( 'header-color-h-site-title' );
			$tagline_color              = astra_get_option( 'header-color-site-tagline' );
			$site_title_setting         = astra_get_option( 'display-site-title-responsive' );
			$desktop_title_visibility   = $site_title_setting['desktop'] ? 'block' : 'none';
			$tablet_title_visibility    = $site_title_setting['tablet'] ? 'block' : 'none';
			$mobile_title_visibility    = $site_title_setting['mobile'] ? 'block' : 'none';
			$site_tagline_setting       = astra_get_option( 'display-site-tagline-responsive' );
			$desktop_tagline_visibility = ( $site_tagline_setting['desktop'] ) ? 'block' : 'none';
			$tablet_tagline_visibility  = ( $site_tagline_setting['tablet'] ) ? 'block' : 'none';
			$mobile_tagline_visibility  = ( $site_tagline_setting['mobile'] ) ? 'block' : 'none';

			// Site Background Color.
			$box_bg_obj = astra_get_option( 'site-layout-outside-bg-obj-responsive' );

			// Color Options.
			$text_color         = astra_get_option( 'text-color' );
			$theme_color        = astra_get_option( 'theme-color' );
			$link_color         = astra_get_option( 'link-color', $theme_color );
			$link_hover_color   = astra_get_option( 'link-h-color' );
			$heading_base_color = astra_get_option( 'heading-base-color' );

			// Typography.
			$body_font_size       = astra_get_option( 'font-size-body' );
			$body_line_height     = astra_get_font_extras( astra_get_option( 'body-font-extras' ), 'line-height', 'line-height-unit' );
			$para_margin_bottom   = astra_get_option( 'para-margin-bottom' );
			$body_text_transform  = astra_get_font_extras( astra_get_option( 'body-font-extras' ), 'text-transform' );
			$body_letter_spacing  = astra_get_font_extras( astra_get_option( 'body-font-extras' ), 'letter-spacing', 'letter-spacing-unit' );
			$body_text_decoration = astra_get_font_extras( astra_get_option( 'body-font-extras' ), 'text-decoration' );

			$site_title_font_size   = astra_get_option( 'font-size-site-title' );
			$site_tagline_font_size = astra_get_option( 'font-size-site-tagline' );

			$archive_post_title_font_size = astra_get_option( 'font-size-page-title' );
			$heading_h1_font_size         = astra_get_option( 'font-size-h1' );
			$heading_h2_font_size         = astra_get_option( 'font-size-h2' );
			$heading_h3_font_size         = astra_get_option( 'font-size-h3' );
			$heading_h4_font_size         = astra_get_option( 'font-size-h4' );
			$heading_h5_font_size         = astra_get_option( 'font-size-h5' );
			$heading_h6_font_size         = astra_get_option( 'font-size-h6' );

			/**
			 * Heading Typography - h1 - h3.
			 */
			$headings_font_family    = astra_get_option( 'headings-font-family' );
			$headings_font_weight    = astra_get_option( 'headings-font-weight' );
			$headings_line_height    = astra_get_font_extras( astra_get_option( 'headings-font-extras' ), 'line-height', 'line-height-unit' );
			$headings_font_transform = astra_get_font_extras( astra_get_option( 'headings-font-extras' ), 'text-transform' );

			$h1_font_family     = astra_get_option( 'font-family-h1' );
			$h1_font_weight     = astra_get_option( 'font-weight-h1' );
			$h1_line_height     = astra_get_font_extras( astra_get_option( 'font-extras-h1' ), 'line-height', 'line-height-unit' );
			$h1_text_transform  = astra_get_font_extras( astra_get_option( 'font-extras-h1' ), 'text-transform' );
			$h1_letter_spacing  = astra_get_font_extras( astra_get_option( 'font-extras-h1' ), 'letter-spacing', 'letter-spacing-unit' );
			$h1_text_decoration = astra_get_font_extras( astra_get_option( 'font-extras-h1' ), 'text-decoration' );

			$h2_font_family     = astra_get_option( 'font-family-h2' );
			$h2_font_weight     = astra_get_option( 'font-weight-h2' );
			$h2_line_height     = astra_get_font_extras( astra_get_option( 'font-extras-h2' ), 'line-height', 'line-height-unit' );
			$h2_text_transform  = astra_get_font_extras( astra_get_option( 'font-extras-h2' ), 'text-transform' );
			$h2_letter_spacing  = astra_get_font_extras( astra_get_option( 'font-extras-h2' ), 'letter-spacing', 'letter-spacing-unit' );
			$h2_text_decoration = astra_get_font_extras( astra_get_option( 'font-extras-h2' ), 'text-decoration' );

			$h3_font_family     = astra_get_option( 'font-family-h3' );
			$h3_font_weight     = astra_get_option( 'font-weight-h3' );
			$h3_line_height     = astra_get_font_extras( astra_get_option( 'font-extras-h3' ), 'line-height', 'line-height-unit' );
			$h3_text_transform  = astra_get_font_extras( astra_get_option( 'font-extras-h3' ), 'text-transform' );
			$h3_letter_spacing  = astra_get_font_extras( astra_get_option( 'font-extras-h3' ), 'letter-spacing', 'letter-spacing-unit' );
			$h3_text_decoration = astra_get_font_extras( astra_get_option( 'font-extras-h3' ), 'text-decoration' );

			$h4_font_family     = '';
			$h4_font_weight     = '';
			$h4_line_height     = '';
			$h4_text_transform  = '';
			$h4_letter_spacing  = '';
			$h4_text_decoration = '';


			$h5_font_family     = '';
			$h5_font_weight     = '';
			$h5_line_height     = '';
			$h5_text_transform  = '';
			$h5_letter_spacing  = '';
			$h5_text_decoration = '';

			$h6_font_family     = '';
			$h6_font_weight     = '';
			$h6_line_height     = '';
			$h6_text_transform  = '';
			$h6_letter_spacing  = '';
			$h6_text_decoration = '';

			$is_widget_title_support_font_weight = self::support_font_css_to_widget_and_in_editor();
			$font_weight_prop                    = ( $is_widget_title_support_font_weight ) ? 'inherit' : 'normal';

			$update_customizer_strctural_defaults = astra_check_is_structural_setup();

			// Fallback for H1 - headings typography.
			if ( 'inherit' == $h1_font_family ) {
				$h1_font_family = $headings_font_family;
			}
			if ( $font_weight_prop === $h1_font_weight ) {
				$h1_font_weight = $headings_font_weight;
			}
			if ( '' == $h1_text_transform ) {
				$h1_text_transform = $headings_font_transform;
			}
			if ( '' == $h1_line_height ) {
				$h1_line_height = $headings_line_height;
			}

			// Fallback for H2 - headings typography.
			if ( 'inherit' == $h2_font_family ) {
				$h2_font_family = $headings_font_family;
			}
			if ( $font_weight_prop === $h2_font_weight ) {
				$h2_font_weight = $headings_font_weight;
			}
			if ( '' == $h2_text_transform ) {
				$h2_text_transform = $headings_font_transform;
			}
			if ( '' == $h2_line_height ) {
				$h2_line_height = $headings_line_height;
			}

			// Fallback for H3 - headings typography.
			if ( 'inherit' == $h3_font_family ) {
				$h3_font_family = $headings_font_family;
			}
			if ( $font_weight_prop === $h3_font_weight ) {
				$h3_font_weight = $headings_font_weight;
			}
			if ( '' == $h3_text_transform ) {
				$h3_text_transform = $headings_font_transform;
			}
			if ( '' == $h3_line_height ) {
				$h3_line_height = $headings_line_height;
			}

			// Fallback for H4 - headings typography.
			$h4_line_height = $headings_line_height;

			// Fallback for H5 - headings typography.
			$h5_line_height = $headings_line_height;

			// Fallback for H6 - headings typography.
			$h6_line_height = $headings_line_height;

			if ( astra_has_gcp_typo_preset_compatibility() ) {

				$h4_font_family     = astra_get_option( 'font-family-h4' );
				$h4_font_weight     = astra_get_option( 'font-weight-h4' );
				$h4_line_height     = astra_get_font_extras( astra_get_option( 'font-extras-h4' ), 'line-height', 'line-height-unit' );
				$h4_text_transform  = astra_get_font_extras( astra_get_option( 'font-extras-h4' ), 'text-transform' );
				$h4_letter_spacing  = astra_get_font_extras( astra_get_option( 'font-extras-h4' ), 'letter-spacing', 'letter-spacing-unit' );
				$h4_text_decoration = astra_get_font_extras( astra_get_option( 'font-extras-h4' ), 'text-decoration' );

				$h5_font_family     = astra_get_option( 'font-family-h5' );
				$h5_font_weight     = astra_get_option( 'font-weight-h5' );
				$h5_line_height     = astra_get_font_extras( astra_get_option( 'font-extras-h5' ), 'line-height', 'line-height-unit' );
				$h5_text_transform  = astra_get_font_extras( astra_get_option( 'font-extras-h5' ), 'text-transform' );
				$h5_letter_spacing  = astra_get_font_extras( astra_get_option( 'font-extras-h5' ), 'letter-spacing', 'letter-spacing-unit' );
				$h5_text_decoration = astra_get_font_extras( astra_get_option( 'font-extras-h5' ), 'text-decoration' );

				$h6_font_family     = astra_get_option( 'font-family-h6' );
				$h6_font_weight     = astra_get_option( 'font-weight-h6' );
				$h6_line_height     = astra_get_font_extras( astra_get_option( 'font-extras-h6' ), 'line-height', 'line-height-unit' );
				$h6_text_transform  = astra_get_font_extras( astra_get_option( 'font-extras-h6' ), 'text-transform' );
				$h6_letter_spacing  = astra_get_font_extras( astra_get_option( 'font-extras-h6' ), 'letter-spacing', 'letter-spacing-unit' );
				$h6_text_decoration = astra_get_font_extras( astra_get_option( 'font-extras-h6' ), 'text-decoration' );

				// Fallback for H4 - headings typography.
				if ( 'inherit' == $h4_font_family ) {
					$h4_font_family = $headings_font_family;
				}
				if ( $font_weight_prop === $h4_font_weight ) {
					$h4_font_weight = $headings_font_weight;
				}
				if ( '' == $h4_text_transform ) {
					$h4_text_transform = $headings_font_transform;
				}

				// Fallback for H5 - headings typography.
				if ( 'inherit' == $h5_font_family ) {
						$h5_font_family = $headings_font_family;
				}
				if ( $font_weight_prop === $h5_font_weight ) {
					$h5_font_weight = $headings_font_weight;
				}
				if ( '' == $h5_text_transform ) {
					$h5_text_transform = $headings_font_transform;
				}

				// Fallback for H6 - headings typography.
				if ( 'inherit' == $h6_font_family ) {
						$h6_font_family = $headings_font_family;
				}
				if ( $font_weight_prop === $h6_font_weight ) {
					$h6_font_weight = $headings_font_weight;
				}
				if ( '' == $h6_text_transform ) {
					$h6_text_transform = $headings_font_transform;
				}
			}

			// Button Styling.
			$btn_border_radius_fields = astra_get_option( 'button-radius-fields' );
			$theme_btn_padding        = astra_get_option( 'theme-button-padding' );
			$highlight_theme_color    = astra_get_foreground_color( $theme_color );

			// Submenu Bordercolor.
			$submenu_border               = astra_get_option( 'primary-submenu-border' );
			$primary_submenu_item_border  = astra_get_option( 'primary-submenu-item-border' );
			$primary_submenu_b_color      = astra_get_option( 'primary-submenu-b-color', $theme_color );
			$primary_submenu_item_b_color = astra_get_option( 'primary-submenu-item-b-color', '#eaeaea' );

			// Astra and WordPress-5.8 compatibility.
			$is_wp_5_8_support_enabled = self::is_block_editor_support_enabled();

			// Gutenberg editor improvement.
			/** @psalm-suppress InvalidScalarArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
			$improve_gb_ui = astra_get_option( 'improve-gb-editor-ui', true );
			/** @psalm-suppress InvalidScalarArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort

			$block_editor_legacy_setup = astra_block_based_legacy_setup();

			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
				// Footer Bar Colors.
				$footer_bg_obj       = astra_get_option( 'footer-bg-obj' );
				$footer_color        = astra_get_option( 'footer-color' );
				$footer_link_color   = astra_get_option( 'footer-link-color' );
				$footer_link_h_color = astra_get_option( 'footer-link-h-color' );

				// Color.
				$footer_adv_bg_obj             = astra_get_option( 'footer-adv-bg-obj' );
				$footer_adv_text_color         = astra_get_option( 'footer-adv-text-color' );
				$footer_adv_widget_title_color = astra_get_option( 'footer-adv-wgt-title-color' );
				$footer_adv_link_color         = astra_get_option( 'footer-adv-link-color' );
				$footer_adv_link_h_color       = astra_get_option( 'footer-adv-link-h-color' );

				// Header Break Point.
				$header_break_point = astra_header_break_point();

				// Custom Buttom menu item.
				$header_custom_button_style          = astra_get_option( 'header-main-rt-section-button-style' );
				$header_custom_button_text_color     = astra_get_option( 'header-main-rt-section-button-text-color' );
				$header_custom_button_text_h_color   = astra_get_option( 'header-main-rt-section-button-text-h-color' );
				$header_custom_button_back_color     = astra_get_option( 'header-main-rt-section-button-back-color' );
				$header_custom_button_back_h_color   = astra_get_option( 'header-main-rt-section-button-back-h-color' );
				$header_custom_button_spacing        = astra_get_option( 'header-main-rt-section-button-padding' );
				$header_custom_button_radius         = astra_get_option( 'header-main-rt-section-button-border-radius' );
				$header_custom_button_border_color   = astra_get_option( 'header-main-rt-section-button-border-color' );
				$header_custom_button_border_h_color = astra_get_option( 'header-main-rt-section-button-border-h-color' );
				$header_custom_button_border_size    = astra_get_option( 'header-main-rt-section-button-border-size' );

				$header_custom_trans_button_text_color     = astra_get_option( 'header-main-rt-trans-section-button-text-color' );
				$header_custom_trans_button_text_h_color   = astra_get_option( 'header-main-rt-trans-section-button-text-h-color' );
				$header_custom_trans_button_back_color     = astra_get_option( 'header-main-rt-trans-section-button-back-color' );
				$header_custom_trans_button_back_h_color   = astra_get_option( 'header-main-rt-trans-section-button-back-h-color' );
				$header_custom_trans_button_spacing        = astra_get_option( 'header-main-rt-trans-section-button-padding' );
				$header_custom_trans_button_radius         = astra_get_option( 'header-main-rt-trans-section-button-border-radius' );
				$header_custom_trans_button_border_color   = astra_get_option( 'header-main-rt-trans-section-button-border-color' );
				$header_custom_trans_button_border_h_color = astra_get_option( 'header-main-rt-trans-section-button-border-h-color' );
				$header_custom_trans_button_border_size    = astra_get_option( 'header-main-rt-trans-section-button-border-size' );

			}

			$global_custom_button_border_size = astra_get_option( 'theme-button-border-group-border-size' );
			$btn_border_color                 = astra_get_option( 'theme-button-border-group-border-color' );
			$btn_border_h_color               = astra_get_option( 'theme-button-border-group-border-h-color' );

			/**
			 * Theme Button Typography
			 */
			$theme_btn_font_family     = astra_get_option( 'font-family-button' );
			$theme_btn_font_size       = astra_get_option( 'font-size-button' );
			$theme_btn_font_weight     = astra_get_option( 'font-weight-button' );
			$theme_btn_text_transform  = astra_get_font_extras( astra_get_option( 'font-extras-button' ), 'text-transform' );
			$theme_btn_line_height     = astra_get_font_extras( astra_get_option( 'font-extras-button' ), 'line-height', 'line-height-unit' );
			$theme_btn_letter_spacing  = astra_get_font_extras( astra_get_option( 'font-extras-button' ), 'letter-spacing', 'letter-spacing-unit' );
			$theme_btn_text_decoration = astra_get_font_extras( astra_get_option( 'font-extras-button' ), 'text-decoration' );

			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
				/**
				 * Custom Header Button Typography
				 */
				$header_custom_btn_font_family    = astra_get_option( 'primary-header-button-font-family' );
				$header_custom_btn_font_weight    = astra_get_option( 'primary-header-button-font-weight' );
				$header_custom_btn_font_size      = astra_get_option( 'primary-header-button-font-size' );
				$header_custom_btn_text_transform = astra_get_option( 'primary-header-button-text-transform' );
				$header_custom_btn_line_height    = astra_get_option( 'primary-header-button-line-height' );
				$header_custom_btn_letter_spacing = astra_get_option( 'primary-header-button-letter-spacing' );

				$footer_adv_border_width = astra_get_option( 'footer-adv-border-width' );
				$footer_adv_border_color = astra_get_option( 'footer-adv-border-color' );
			}

			/**
			 * Apply text color depends on link color
			 */
			$btn_text_color = astra_get_option( 'button-color' );
			if ( empty( $btn_text_color ) ) {
				$btn_text_color = astra_get_foreground_color( $theme_color );
			}

			/**
			 * Apply text hover color depends on link hover color
			 */
			$btn_text_hover_color = astra_get_option( 'button-h-color' );
			if ( empty( $btn_text_hover_color ) ) {
				$btn_text_hover_color = astra_get_foreground_color( $link_hover_color );
			}
			$btn_bg_color     = astra_get_option( 'button-bg-color', $theme_color );
			$btn_preset_style = astra_get_option( 'button-preset-style' );

			if ( 'button_04' === $btn_preset_style || 'button_05' === $btn_preset_style || 'button_06' === $btn_preset_style ) {

				if ( empty( $btn_border_color ) ) {
					$btn_border_color = $btn_bg_color;
				}

				if ( '' === astra_get_option( 'button-bg-color' ) && '' === astra_get_option( 'button-color' ) ) {
					$btn_text_color = $theme_color;
				} elseif ( '' === astra_get_option( 'button-color' ) ) {
						$btn_text_color = $btn_bg_color;
				}

				$btn_bg_color = 'transparent';
			}

			$btn_bg_hover_color = astra_get_option( 'button-bg-h-color', $link_hover_color );

			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
				// Spacing of Big Footer.
				$small_footer_divider_color = astra_get_option( 'footer-sml-divider-color' );
				$small_footer_divider       = astra_get_option( 'footer-sml-divider' );

				/**
				 * Small Footer Styling
				 */
				$small_footer_layout = astra_get_option( 'footer-sml-layout', 'footer-sml-layout-1' );
				$astra_footer_width  = astra_get_option( 'footer-layout-width' );
			}

			// Blog Post Title Typography Options.
			$single_post_max                        = astra_get_option( 'blog-single-width' );
			$single_post_max_width                  = astra_get_option( 'blog-single-max-width' );
			$blog_width                             = astra_get_option( 'blog-width' );
			$blog_max_width                         = astra_get_option( 'blog-max-width' );
			$mobile_header_toggle_btn_style_color   = astra_get_option( 'mobile-header-toggle-btn-style-color', $btn_bg_color );
			$mobile_header_toggle_btn_border_radius = astra_get_option( 'mobile-header-toggle-btn-border-radius' );
			/** @psalm-suppress InvalidArgument */ // phpcs:ignore Generic.Commenting.DocComment.MissingShort
			$btn_style_color = astra_get_option( 'mobile-header-toggle-btn-style-color', false );

			if ( ! $btn_style_color ) {
				// button text color.
				$menu_btn_color = esc_attr( astra_get_option( 'button-color' ) );
			} else {
				// toggle button color.
				$menu_btn_color = astra_get_foreground_color( $btn_style_color );
			}

			$css_output = array();
			// Body Font Family.
			$body_font_family = astra_body_font_family();
			$body_font_weight = astra_get_option( 'body-font-weight' );

			if ( is_array( $body_font_size ) ) {
				$body_font_size_desktop = ( isset( $body_font_size['desktop'] ) && '' != $body_font_size['desktop'] ) ? $body_font_size['desktop'] : 15;
			} else {
				$body_font_size_desktop = ( '' != $body_font_size ) ? $body_font_size : 15;
			}
			// check the selection color incase of empty/no theme color.
			$selection_text_color = ( 'transparent' === $highlight_theme_color ) ? '' : $highlight_theme_color;

			$h4_properties = array(
				'font-size'   => astra_responsive_font( $heading_h4_font_size, 'desktop' ),
				'line-height' => esc_attr( $headings_line_height ),
			);

			$h5_properties = array(
				'font-size'   => astra_responsive_font( $heading_h5_font_size, 'desktop' ),
				'line-height' => esc_attr( $headings_line_height ),
			);

			$h6_properties = array(
				'font-size'   => astra_responsive_font( $heading_h6_font_size, 'desktop' ),
				'line-height' => esc_attr( $headings_line_height ),
			);

			if ( astra_has_gcp_typo_preset_compatibility() ) {
				$h4_font_properties = array(
					'font-weight'     => astra_get_css_value( $h4_font_weight, 'font' ),
					'font-family'     => astra_get_css_value( $h4_font_family, 'font' ),
					'text-transform'  => esc_attr( $h4_text_transform ),
					'line-height'     => esc_attr( $h4_line_height ),
					'text-decoration' => esc_attr( $h4_text_decoration ),
					'letter-spacing'  => esc_attr( $h4_letter_spacing ),

				);

				$h4_properties = array_merge( $h4_properties, $h4_font_properties );

				$h5_font_properties = array(
					'font-weight'     => astra_get_css_value( $h5_font_weight, 'font' ),
					'font-family'     => astra_get_css_value( $h5_font_family, 'font' ),
					'text-transform'  => esc_attr( $h5_text_transform ),
					'line-height'     => esc_attr( $h5_line_height ),
					'text-decoration' => esc_attr( $h5_text_decoration ),
					'letter-spacing'  => esc_attr( $h5_letter_spacing ),
				);

				$h5_properties = array_merge( $h5_properties, $h5_font_properties );

				$h6_font_properties = array(
					'font-weight'     => astra_get_css_value( $h6_font_weight, 'font' ),
					'font-family'     => astra_get_css_value( $h6_font_family, 'font' ),
					'text-transform'  => esc_attr( $h6_text_transform ),
					'line-height'     => esc_attr( $h6_line_height ),
					'text-decoration' => esc_attr( $h6_text_decoration ),
					'letter-spacing'  => esc_attr( $h6_letter_spacing ),
				);

				$h6_properties = array_merge( $h6_properties, $h6_font_properties );
			}

			$link_selector = ( true === $update_customizer_strctural_defaults ) ? 'a' : 'a, .page-title';

			$css_output = array(

				':root'                                  => array(
					'--ast-container-default-xlg-padding' => ( true === $update_customizer_strctural_defaults ) ? '3em' : '6.67em',
					'--ast-container-default-lg-padding'  => ( true === $update_customizer_strctural_defaults ) ? '3em' : '5.67em',
					'--ast-container-default-slg-padding' => ( true === $update_customizer_strctural_defaults ) ? '2em' : '4.34em',
					'--ast-container-default-md-padding'  => ( true === $update_customizer_strctural_defaults ) ? '3em' : '3.34em',
					'--ast-container-default-sm-padding'  => ( true === $update_customizer_strctural_defaults ) ? '3em' : '6.67em',
					'--ast-container-default-xs-padding'  => ( true === $update_customizer_strctural_defaults ) ? '2.4em' : '2.4em',
					'--ast-container-default-xxs-padding' => ( true === $update_customizer_strctural_defaults ) ? '1.8em' : '1.4em',
					'--ast-code-block-background'         => ( true === self::astra_check_default_color_typo() ) ? '#ECEFF3' : '#EEEEEE',
					'--ast-comment-inputs-background'     => ( true === self::astra_check_default_color_typo() ) ? '#F9FAFB' : '#FAFAFA',
				),

				// HTML.
				'html'                                   => array(
					'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
				),
				$link_selector                           => array(
					'color' => esc_attr( $link_color ),
				),
				'a:hover, a:focus'                       => array(
					'color' => esc_attr( $link_hover_color ),
				),
				'body, button, input, select, textarea, .ast-button, .ast-custom-button' => array(
					'font-family'     => astra_get_font_family( $body_font_family ),
					'font-weight'     => esc_attr( $body_font_weight ),
					'font-size'       => astra_responsive_font( $body_font_size, 'desktop' ),
					'line-height'     => esc_attr( $body_line_height ),
					'text-transform'  => esc_attr( $body_text_transform ),
					'text-decoration' => esc_attr( $body_text_decoration ),
					'letter-spacing'  => esc_attr( $body_letter_spacing ),
				),
				'blockquote'                             => array(
					'border-color' => astra_hex_to_rgba( $link_color, 0.15 ),
				),
				'p, .entry-content p'                    => array(
					'margin-bottom' => astra_get_css_value( $para_margin_bottom, 'em' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a, .site-title, .site-title a',
					'h1, .entry-content h1, h2, .entry-content h2, h3, .entry-content h3, h4, .entry-content h4, h5, .entry-content h5, h6, .entry-content h6, .site-title, .site-title a'
				)                                        => astra_get_font_array_css( astra_get_option( 'headings-font-family' ), astra_get_option( 'headings-font-weight' ), array(), 'headings-font-extras' ),

				'.ast-site-identity .site-title a'       => array(
					'color' => esc_attr( $title_color ),
				),
				'.ast-site-identity .site-title a:hover' => array(
					'color' => esc_attr( $title_hover_color ),
				),
				'.ast-site-identity .site-description'   => array(
					'color' => esc_attr( $tagline_color ),
				),
				'.site-title'                            => array(
					'font-size' => astra_responsive_font( $site_title_font_size, 'desktop' ),
					'display'   => esc_attr( $desktop_title_visibility ),
				),
				'header .custom-logo-link img'           => array(
					'max-width' => astra_get_css_value( $header_logo_width['desktop'], 'px' ),
				),
				'.astra-logo-svg'                        => array(
					'width' => astra_get_css_value( $header_logo_width['desktop'], 'px' ),
				),
				'.astra-logo-svg:not(.sticky-custom-logo .astra-logo-svg, .transparent-custom-logo .astra-logo-svg, .advanced-header-logo .astra-logo-svg)' => array(
					'height' => astra_get_css_value( ( ! empty( $header_logo_width['desktop-svg-height'] ) && ! is_customize_preview() ) ? $header_logo_width['desktop-svg-height'] : '', 'px' ),
				),
				'.site-header .site-description'         => array(
					'font-size' => astra_responsive_font( $site_tagline_font_size, 'desktop' ),
					'display'   => esc_attr( $desktop_tagline_visibility ),
				),
				'.entry-title'                           => array(
					'font-size' => astra_responsive_font( $archive_post_title_font_size, 'desktop' ),
				),
				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a',
					'h1, .entry-content h1'
				)                                        => array(
					'font-size'       => astra_responsive_font( $heading_h1_font_size, 'desktop' ),
					'font-weight'     => astra_get_css_value( $h1_font_weight, 'font' ),
					'font-family'     => astra_get_css_value( $h1_font_family, 'font' ),
					'line-height'     => esc_attr( $h1_line_height ),
					'text-transform'  => esc_attr( $h1_text_transform ),
					'text-decoration' => esc_attr( $h1_text_decoration ),
					'letter-spacing'  => esc_attr( $h1_letter_spacing ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h2, .entry-content h2, .entry-content h2 a',
					'h2, .entry-content h2'
				)                                        => array(
					'font-size'       => astra_responsive_font( $heading_h2_font_size, 'desktop' ),
					'font-weight'     => astra_get_css_value( $h2_font_weight, 'font' ),
					'font-family'     => astra_get_css_value( $h2_font_family, 'font' ),
					'line-height'     => esc_attr( $h2_line_height ),
					'text-transform'  => esc_attr( $h2_text_transform ),
					'text-decoration' => esc_attr( $h2_text_decoration ),
					'letter-spacing'  => esc_attr( $h2_letter_spacing ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h3, .entry-content h3, .entry-content h3 a',
					'h3, .entry-content h3'
				)                                        => array(
					'font-size'       => astra_responsive_font( $heading_h3_font_size, 'desktop' ),
					'font-weight'     => astra_get_css_value( $h3_font_weight, 'font' ),
					'font-family'     => astra_get_css_value( $h3_font_family, 'font' ),
					'line-height'     => esc_attr( $h3_line_height ),
					'text-transform'  => esc_attr( $h3_text_transform ),
					'text-decoration' => esc_attr( $h3_text_decoration ),
					'letter-spacing'  => esc_attr( $h3_letter_spacing ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h4, .entry-content h4, .entry-content h4 a',
					'h4, .entry-content h4'
				)                                        => $h4_properties,

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h5, .entry-content h5, .entry-content h5 a',
					'h5, .entry-content h5'
				)                                        => $h5_properties,

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h6, .entry-content h6, .entry-content h6 a',
					'h6, .entry-content h6'
				)                                        => $h6_properties,

				// Global CSS.
				'::selection'                            => array(
					'background-color' => esc_attr( $theme_color ),
					'color'            => esc_attr( $selection_text_color ),
				),

				// Conditionally select selectors with annchors or withour anchors for text color.
				self::conditional_headings_css_selectors(
					'body, h1, .entry-title a, .entry-content h1, .entry-content h1 a, h2, .entry-content h2, .entry-content h2 a, h3, .entry-content h3, .entry-content h3 a, h4, .entry-content h4, .entry-content h4 a, h5, .entry-content h5, .entry-content h5 a, h6, .entry-content h6, .entry-content h6 a',
					'body, h1, .entry-title a, .entry-content h1, h2, .entry-content h2, h3, .entry-content h3, h4, .entry-content h4, h5, .entry-content h5, h6, .entry-content h6'
				)                                        => array(
					'color' => esc_attr( $text_color ),
				),

				// Typography.
				'.tagcloud a:hover, .tagcloud a:focus, .tagcloud a.current-item' => array(
					'color'            => astra_get_foreground_color( $link_color ),
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
				),

				// Input tags.
				'input:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, textarea:focus' => array(
					'border-color' => esc_attr( $link_color ),
				),
				'input[type="radio"]:checked, input[type=reset], input[type="checkbox"]:checked, input[type="checkbox"]:hover:checked, input[type="checkbox"]:focus:checked, input[type=range]::-webkit-slider-thumb' => array(
					'border-color'     => esc_attr( $link_color ),
					'background-color' => esc_attr( $link_color ),
					'box-shadow'       => 'none',
				),

				// Small Footer.
				'.site-footer a:hover + .post-count, .site-footer a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),

				'.single .nav-links .nav-previous, .single .nav-links .nav-next' => array(
					'color' => esc_attr( $link_color ),
				),

				// Blog Post Meta Typography.
				'.entry-meta, .entry-meta *'             => array(
					'line-height' => '1.45',
					'color'       => esc_attr( $link_color ),
				),
				'.entry-meta a:hover, .entry-meta a:hover *, .entry-meta a:focus, .entry-meta a:focus *, .page-links > .page-link, .page-links .page-link:hover, .post-navigation a:hover' => array(
					'color' => esc_attr( $link_hover_color ),
				),

				// Blockquote Text Color.
				'blockquote'                             => array(
					'color' => astra_adjust_brightness( $text_color, 75, 'darken' ),
				),

				'#cat option, .secondary .calendar_wrap thead a, .secondary .calendar_wrap thead a:visited' => array(
					'color' => esc_attr( $link_color ),
				),
				'.secondary .calendar_wrap #today, .ast-progress-val span' => array(
					'background' => esc_attr( $link_color ),
				),
				'.secondary a:hover + .post-count, .secondary a:focus + .post-count' => array(
					'background'   => esc_attr( $link_color ),
					'border-color' => esc_attr( $link_color ),
				),
				'.calendar_wrap #today > a'              => array(
					'color' => astra_get_foreground_color( $link_color ),
				),

				// Pagination.
				'.page-links .page-link, .single .post-navigation a' => array(
					'color' => esc_attr( $link_color ),
				),

				// Menu Toggle Border Radius.
				'.ast-header-break-point .main-header-bar .ast-button-wrap .menu-toggle' => array(
					'border-radius' => ( '' !== $mobile_header_toggle_btn_border_radius ) ? esc_attr( $mobile_header_toggle_btn_border_radius ) . 'px' : '',
				),

			);

			/* Compatibility with cost calculator plugin range slider*/
			if ( defined( 'CALC_VERSION' ) ) {
				$css_output['.calc-range-slider input::-webkit-slider-runnable-track'] = array(
					'height'        => 'auto',
					'box-shadow'    => 'none',
					'background'    => 'transparent',
					'border-radius' => 'none',
					'border'        => 'none',
				);

				$css_output['.calc-range-slider input::-moz-range-track'] = array(
					'height'        => 'auto',
					'box-shadow'    => 'none',
					'background'    => 'transparent',
					'border-radius' => 'none',
					'border'        => 'none',
				);

				$css_output['.calc-range-slider input::-webkit-slider-thumb'] = array(
					'margin-top' => 'auto',
				);
			}

			if ( astra_has_global_color_format_support() ) {
				$css_output['.ast-archive-title'] = array(
					'color' => esc_attr( $heading_base_color ),
				);
			}

			if ( ! $block_editor_legacy_setup && false === $update_customizer_strctural_defaults ) {
				$css_output['.wp-block-latest-posts > li > a'] = array(
					'color' => esc_attr( $heading_base_color ),
				);
			}

			// Default widget title color.
			$css_output['.widget-title'] = array(
				'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 1.428571429 ),
				'color'     => astra_has_global_color_format_support() ? esc_attr( $heading_base_color ) : esc_attr( $text_color ),
			);

			// Remove this condition after 2-3 updates of add-on.
			if ( defined( 'ASTRA_EXT_VER' ) && version_compare( ASTRA_EXT_VER, '3.0.1', '>=' ) ) {
				$css_output['.single .ast-author-details .author-title'] = array(
					'color' => esc_attr( $link_hover_color ),
				);
			}

			if ( 'no-sidebar' !== astra_page_layout() ) {
				$css_output['#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea'] = array(
					'font-size' => astra_responsive_font( $body_font_size, 'desktop' ),
				);
			}

			// Add underline to every link in content area.
			$content_links_underline = astra_get_option( 'underline-content-links' );

			if ( $content_links_underline ) {
				$css_output['.ast-single-post .entry-content a, .ast-comment-content a:not(.ast-comment-edit-reply-wrap a)'] = array(
					'text-decoration' => 'underline',
				);

				$reset_underline_from_anchors = self::unset_builder_elements_underline();

				$excluding_anchor_selectors = $reset_underline_from_anchors ? '.ast-single-post .wp-block-button .wp-block-button__link, .ast-single-post .elementor-button-wrapper .elementor-button, .ast-single-post .entry-content .uagb-tab a, .ast-single-post .entry-content .uagb-ifb-cta a, .ast-single-post .entry-content .wp-block-uagb-buttons a, .ast-single-post .entry-content .uabb-module-content a, .ast-single-post .entry-content .uagb-post-grid a, .ast-single-post .entry-content .uagb-timeline a, .ast-single-post .entry-content .uagb-toc__wrap a, .ast-single-post .entry-content .uagb-taxomony-box a, .ast-single-post .entry-content .woocommerce a, .entry-content .wp-block-latest-posts > li > a, .ast-single-post .entry-content .wp-block-file__button' : '.ast-single-post .wp-block-button .wp-block-button__link, .ast-single-post .elementor-button-wrapper .elementor-button';

				$excluding_anchor_selectors = apply_filters( 'astra_remove_underline_anchor_links', $excluding_anchor_selectors );

				$css_output[ $excluding_anchor_selectors ] = array(
					'text-decoration' => 'none',
				);
			}

			// Accessibility options.
			$enable_site_accessibility        = astra_get_option( 'site-accessibility-toggle', false );
			$html_selectors_focus_visible     = 'a:focus-visible, .ast-menu-toggle:focus-visible, .site .skip-link:focus-visible, 
 .wp-block-loginout input:focus-visible, .wp-block-search.wp-block-search__button-inside .wp-block-search__inside-wrapper, .ast-header-navigation-arrow:focus-visible, .woocommerce .wc-proceed-to-checkout > .checkout-button:focus-visible, .woocommerce .woocommerce-MyAccount-navigation ul li a:focus-visible, .ast-orders-table__row .ast-orders-table__cell:focus-visible, .woocommerce .woocommerce-order-details .order-again > .button:focus-visible, .woocommerce .woocommerce-message a.button.wc-forward:focus-visible';

			$html_selectors_focus_only_inputs = 'input:focus, input[type="text"]:focus, input[type="email"]:focus, 
 input[type="url"]:focus, input[type="password"]:focus, input[type="reset"]:focus, input[type="search"]:focus, 
 input[type="number"]:focus, textarea:focus, .wp-block-search__input:focus, [data-section="section-header-mobile-trigger"] .ast-button-wrap .ast-mobile-menu-trigger-minimal:focus, .ast-mobile-popup-drawer.active .menu-toggle-close:focus, .woocommerce-ordering select.orderby:focus, #ast-scroll-top:focus, #coupon_code:focus, .woocommerce-page #comment:focus, .woocommerce #reviews #respond input#submit:focus, .woocommerce a.add_to_cart_button:focus, .woocommerce .button.single_add_to_cart_button:focus, .woocommerce .woocommerce-cart-form button:focus, .woocommerce .woocommerce-cart-form__cart-item .quantity .qty:focus, .woocommerce .woocommerce-billing-fields .woocommerce-billing-fields__field-wrapper .woocommerce-input-wrapper > .input-text:focus, .woocommerce #order_comments:focus, .woocommerce #place_order:focus, .woocommerce .woocommerce-address-fields .woocommerce-address-fields__field-wrapper .woocommerce-input-wrapper > .input-text:focus, .woocommerce .woocommerce-MyAccount-content form button:focus, .woocommerce .woocommerce-MyAccount-content .woocommerce-EditAccountForm .woocommerce-form-row .woocommerce-Input.input-text:focus, .woocommerce .ast-woocommerce-container .woocommerce-pagination ul.page-numbers li a:focus, body #content .woocommerce form .form-row .select2-container--default .select2-selection--single:focus';

			if ( $enable_site_accessibility ) {
				$outline_style = astra_get_option( 'site-accessibility-highlight-type' );
				$outline_color = astra_get_option( 'site-accessibility-highlight-color' );

				$outline_input_style = astra_get_option( 'site-accessibility-highlight-input-type' );
				$outline_input_color = astra_get_option( 'site-accessibility-highlight-input-color' );

				$css_output[ $html_selectors_focus_visible ] = array(
					'outline-style' => $outline_style ? $outline_style : 'inherit',
					'outline-color' => $outline_color ? $outline_color : 'inherit',
					'outline-width' => 'thin',
					'border-color'  => 'transparent',
				);

				if ( 'disable' !== $outline_input_style ) {
					$css_output[ $html_selectors_focus_only_inputs ] = array(
						'border-style'  => $outline_input_style ? $outline_input_style : 'inherit',
						'border-color'  => $outline_input_color ? $outline_input_color : 'inherit',
						'border-width'  => 'thin',
						'outline-color' => 'transparent',
					);
				} else {
					$css_output[ $html_selectors_focus_only_inputs ] = array(
						'border-style'  => $outline_style ? $outline_style : 'inherit',
						'border-color'  => $outline_color ? $outline_color : 'inherit',
						'border-width'  => 'thin',
						'outline-color' => 'transparent',
					);
				}
			}

			if ( false === $enable_site_accessibility ) {
				$css_output[ $html_selectors_focus_only_inputs . ', ' . $html_selectors_focus_visible ] = array(
					'outline-style' => 'none',
				);
			}



			/**
			 * Loaded the following CSS conditionally because of following scenarios -
			 *
			 * 1. $text_color is applying to menu-link anchors as well though $link_color should apply over there.
			 * 2. $link_color applying in old header as hover color for menu-anchors.
			 *
			 * @since 3.0.0
			 */
			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
				// Header - Main Header CSS.
				$css_output['.main-header-menu .menu-link, .ast-header-custom-item a'] = array(
					'color' => esc_attr( $text_color ),
				);
				// Main - Menu Items.
				$css_output['.main-header-menu .menu-item:hover > .menu-link, .main-header-menu .menu-item:hover > .ast-menu-toggle, .main-header-menu .ast-masthead-custom-menu-items a:hover, .main-header-menu .menu-item.focus > .menu-link, .main-header-menu .menu-item.focus > .ast-menu-toggle, .main-header-menu .current-menu-item > .menu-link, .main-header-menu .current-menu-ancestor > .menu-link, .main-header-menu .current-menu-item > .ast-menu-toggle, .main-header-menu .current-menu-ancestor > .ast-menu-toggle'] = array(
					'color' => esc_attr( $link_color ),
				);
				$css_output['.header-main-layout-3 .ast-main-header-bar-alignment'] = array(
					'margin-right' => 'auto',
				);
				if ( $is_site_rtl ) {
					$css_output['.header-main-layout-2 .site-header-section-left .ast-site-identity'] = array(
						'text-align' => 'right',
					);
				} else {
					$css_output['.header-main-layout-2 .site-header-section-left .ast-site-identity'] = array(
						'text-align' => 'left',
					);
				}
			}

			$page_header_logo = ( defined( 'ASTRA_EXT_VER' ) && Astra_Ext_Extension::is_active( 'advanced-headers' ) && Astra_Ext_Advanced_Headers_Loader::astra_advanced_headers_design_option( 'logo-url' ) ) ? true : false;

			if ( astra_get_option( 'logo-title-inline' ) ) {
				$css_output['.ast-logo-title-inline .site-logo-img'] = array(
					'padding-right' => '1em',
				);
			}

			if ( get_theme_mod( 'custom_logo' )
				|| astra_get_option( 'transparent-header-logo' )
				|| astra_get_option( 'sticky-header-logo' )
				|| $page_header_logo
				|| is_customize_preview() ) {

				$css_output['.site-logo-img img'] = array(
					' transition' => 'all 0.2s linear',
				);
			}

			$parse_css = '';
			if ( $block_editor_legacy_setup ) {
				$parse_css .= '
					.ast-no-sidebar .entry-content .alignfull {
						margin-left: calc( -50vw + 50%);
						margin-right: calc( -50vw + 50%);
						max-width: 100vw;
						width: 100vw;
					}
					.ast-no-sidebar .entry-content .alignwide {
						margin-left: calc(-41vw + 50%);
						margin-right: calc(-41vw + 50%);
						max-width: unset;
						width: unset;
					}
					.ast-no-sidebar .entry-content .alignfull .alignfull, .ast-no-sidebar .entry-content .alignfull .alignwide, .ast-no-sidebar .entry-content .alignwide .alignfull, .ast-no-sidebar .entry-content .alignwide .alignwide,
					.ast-no-sidebar .entry-content .wp-block-column .alignfull, .ast-no-sidebar .entry-content .wp-block-column .alignwide{
						width: 100%;
						margin-left: auto;
						margin-right: auto;
					}
					.wp-block-gallery,
						.blocks-gallery-grid {
						margin: 0;
					}
					.wp-block-separator {
						max-width: 100px;
					}
					.wp-block-separator.is-style-wide, .wp-block-separator.is-style-dots {
						max-width: none;
					}
					.entry-content .has-2-columns .wp-block-column:first-child {
						padding-right: 10px;
					}
					.entry-content .has-2-columns .wp-block-column:last-child {
						padding-left: 10px;
					}
					@media (max-width: 782px) {
						.entry-content .wp-block-columns .wp-block-column {
							flex-basis: 100%;
						}
						.entry-content .has-2-columns .wp-block-column:first-child {
							padding-right: 0;
						}
						.entry-content .has-2-columns .wp-block-column:last-child {
							padding-left: 0;
						}
					}
					body .entry-content .wp-block-latest-posts {
						margin-left: 0;
					}
					body .entry-content .wp-block-latest-posts li {
						list-style: none;
					}
					.ast-no-sidebar .ast-container .entry-content .wp-block-latest-posts {
						margin-left: 0;
					}
					.ast-header-break-point .entry-content .alignwide {
						margin-left: auto;
						margin-right: auto;
					}
					.entry-content .blocks-gallery-item img {
						margin-bottom: auto;
					}
					.wp-block-pullquote {
						border-top: 4px solid #555d66;
						border-bottom: 4px solid #555d66;
						color: #40464d;
					}
				';
			}

			/* Parse CSS from array() */
			$parse_css .= astra_parse_css( $css_output );

			if ( ! Astra_Builder_Helper::$is_header_footer_builder_active ) {

				$old_header_mobile_toggle = array(
					// toggle style
					// Menu Toggle Minimal.
					'.ast-header-break-point .ast-mobile-menu-buttons-minimal.menu-toggle' => array(
						'background' => 'transparent',
						'color'      => esc_attr( $mobile_header_toggle_btn_style_color ),
					),

					// Menu Toggle Outline.
					'.ast-header-break-point .ast-mobile-menu-buttons-outline.menu-toggle' => array(
						'background' => 'transparent',
						'border'     => '1px solid ' . $mobile_header_toggle_btn_style_color,
						'color'      => esc_attr( $mobile_header_toggle_btn_style_color ),
					),

					// Menu Toggle Fill.
					'.ast-header-break-point .ast-mobile-menu-buttons-fill.menu-toggle' => array(
						'background' => esc_attr( $mobile_header_toggle_btn_style_color ),
						'color'      => $menu_btn_color,
					),
				);

				$parse_css .= astra_parse_css( $old_header_mobile_toggle );
			}

			$parse_css .= astra_container_layout_css();

			if ( 'no-sidebar' !== astra_page_layout() ) {
				$parse_css .= Astra_Enqueue_Scripts::trim_css( self::load_sidebar_static_css() );
			}

			if ( true === Astra_Builder_Helper::$is_header_footer_builder_active ) {

				$parse_css .= astra_parse_css(
					array(
						'#ast-desktop-header' => array(
							'display' => 'none',
						),
					),
					'',
					astra_get_tablet_breakpoint()
				);

				$parse_css .= astra_parse_css(
					array(
						'#ast-mobile-header' => array(
							'display' => 'none',
						),
					),
					astra_get_tablet_breakpoint()
				);
			}

			// Comments CSS.
			if ( ! Astra_Builder_Helper::apply_flex_based_css() ) {
				require_once ASTRA_THEME_DIR . 'inc/dynamic-css/comments.php'; // PHPCS:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			} else {
				require_once ASTRA_THEME_DIR . 'inc/dynamic-css/comments-flex.php'; // PHPCS:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}

			if ( Astra_Builder_Helper::is_component_loaded( 'woo-cart', 'header' ) || Astra_Builder_Helper::is_component_loaded( 'edd-cart', 'header' ) ) {
				$parse_css .= Astra_Enqueue_Scripts::trim_css( self::load_cart_static_css() );

				$parse_css .= astra_parse_css(
					array(
						'.astra-cart-drawer.active' => array(
							'width' => '80%',
						),
					),
					'',
					astra_get_tablet_breakpoint()
				);

				$parse_css .= astra_parse_css(
					array(
						'.astra-cart-drawer.active' => array(
							'width' => '100%',
						),
					),
					'',
					astra_get_mobile_breakpoint()
				);
			}

			if ( ! Astra_Builder_Helper::$is_header_footer_builder_active ) {
				$footer_css_output = array(
					'.ast-small-footer'               => array(
						'color' => esc_attr( $footer_color ),
					),
					'.ast-small-footer > .ast-footer-overlay' => astra_get_background_obj( $footer_bg_obj ),

					'.ast-small-footer a'             => array(
						'color' => esc_attr( $footer_link_color ),
					),
					'.ast-small-footer a:hover'       => array(
						'color' => esc_attr( $footer_link_h_color ),
					),

					// Advanced Footer colors/fonts.
					'.footer-adv .footer-adv-overlay' => array(
						'border-top-style' => 'solid',
						'border-top-width' => astra_get_css_value( $footer_adv_border_width, 'px' ),
						'border-top-color' => esc_attr( $footer_adv_border_color ),
					),
					'.footer-adv .widget-title,.footer-adv .widget-title a' => array(
						'color' => esc_attr( $footer_adv_widget_title_color ),
					),

					'.footer-adv'                     => array(
						'color' => esc_attr( $footer_adv_text_color ),
					),

					'.footer-adv a'                   => array(
						'color' => esc_attr( $footer_adv_link_color ),
					),

					'.footer-adv .tagcloud a:hover, .footer-adv .tagcloud a.current-item' => array(
						'border-color'     => esc_attr( $footer_adv_link_color ),
						'background-color' => esc_attr( $footer_adv_link_color ),
					),

					'.footer-adv a:hover, .footer-adv .no-widget-text a:hover, .footer-adv a:focus, .footer-adv .no-widget-text a:focus' => array(
						'color' => esc_attr( $footer_adv_link_h_color ),
					),

					'.footer-adv .calendar_wrap #today, .footer-adv a:hover + .post-count' => array(
						'background-color' => esc_attr( $footer_adv_link_color ),
					),

					'.footer-adv-overlay'             => astra_get_background_obj( $footer_adv_bg_obj ),

				);

				$parse_css .= astra_parse_css( $footer_css_output );
			}

			// Paginaiton CSS.
			require_once ASTRA_THEME_DIR . 'inc/dynamic-css/pagination.php'; // PHPCS:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			// Related Posts Dynamic CSS.

			/**
			 *
			 * Fix button aligment issue comming from the gutenberg plugin (v9.3.0).
			 */
			$gtn_plugin_button_center_alignment = array(
				'.wp-block-buttons.aligncenter' => array(
					'justify-content' => 'center',
				),
			);
			$parse_css                         .= astra_parse_css( $gtn_plugin_button_center_alignment );

			$ast_container_layout = astra_get_content_layout();

			/**
			 * If transparent header is activated then it adds top 1.5em padding space, so this CSS will fix this issue.
			 * This issue is only visible on responsive devices.
			 *
			 * @since 2.6.0
			 */
			if ( self::gutenberg_core_blocks_css_comp() && is_singular() ) {
				$trans_header_responsive_top_space_css_fix = array(
					'.ast-theme-transparent-header #primary, .ast-theme-transparent-header #secondary' => array(
						'padding' => 0,
					),
				);

				/* Parse CSS from array() -> max-width: (tablet-breakpoint)px CSS */
				$parse_css .= astra_parse_css( $trans_header_responsive_top_space_css_fix, '', astra_get_tablet_breakpoint() );
			}

			/**
			 * Remove #primary padding on mobile devices which compromises deigned layout.
			 *
			 * @since 2.6.1
			 */
			if ( self::gutenberg_media_text_block_css_compat() && is_singular() ) {
				$remove_primary_padding_on_mobile_css = array(
					'.ast-plain-container.ast-no-sidebar #primary' => array(
						'padding' => 0,
					),
				);

				/* Parse CSS from array() -> max-width: (tablet-breakpoint)px CSS */
				$parse_css .= astra_parse_css( $remove_primary_padding_on_mobile_css, '', astra_get_tablet_breakpoint() );
			}

			/**
			 * Remove margin top when Primary Header is not set and No Sidebar is added in Full-Width / Contained Layout.
			 *
			 * @since 2.5.0
			 */
			if ( self::gtn_group_cover_css_comp() && is_singular() ) {
				$display_header = get_post_meta( get_the_ID(), 'ast-main-header-display', true );
				if ( 'disabled' === $display_header && apply_filters( 'astra_content_margin_full_width_contained', true ) || ( Astra_Ext_Transparent_Header_Markup::is_transparent_header() ) || ( self::gutenberg_core_blocks_css_comp() ) ) {
					$gtn_margin_top = array(
						'.ast-plain-container.ast-no-sidebar #primary' => array(
							'margin-top'    => '0',
							'margin-bottom' => '0',
						),
					);
					$parse_css     .= astra_parse_css( $gtn_margin_top );
				}
				/**
				 * Re-add margin top when FullWidth Contained layout is set.
				 *
				 * @since 3.8.3
				 */
				if ( true === $update_customizer_strctural_defaults ) {
					$display_title = get_post_meta( get_the_ID(), 'site-post-title', true );
					if ( 'disabled' !== $display_title && ! Astra_Ext_Transparent_Header_Markup::is_transparent_header() && apply_filters( 'astra_contained_layout_primary_spacing', true ) ) {
						$gtn_margin_top = array(
							'.ast-plain-container.ast-no-sidebar #primary' => array(
								'margin-top'    => '60px',
								'margin-bottom' => '60px',
							),
						);
						/* Parse CSS from array() -> min-width: (1200)px CSS */
						$parse_css .= astra_parse_css( $gtn_margin_top, '1200' );
					}
				}
			}

			$single_post_outside_spacing = astra_get_option( 'single-post-outside-spacing' );

			$single_post_outside_spacing_css_desktop = array(
				'.ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container.ast-single-post #primary, .ast-plain-container.ast-single-post #primary, .ast-narrow-container.ast-single-post #primary' => array(
					'margin-top'    => astra_responsive_spacing( $single_post_outside_spacing, 'top', 'desktop' ),
					'margin-bottom' => astra_responsive_spacing( $single_post_outside_spacing, 'bottom', 'desktop' ),
				),
				'.ast-left-sidebar.ast-single-post #primary, .ast-right-sidebar.ast-single-post #primary, .ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container.ast-single-post #primary, .ast-narrow-container.ast-single-post #primary' => array(
					'padding-left'  => astra_responsive_spacing( $single_post_outside_spacing, 'left', 'desktop' ),
					'padding-right' => astra_responsive_spacing( $single_post_outside_spacing, 'right', 'desktop' ),
				),
			);

			$parse_css .= astra_parse_css( $single_post_outside_spacing_css_desktop );

			$single_post_outside_spacing_css_tablet = array(
				'.ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container.ast-single-post #primary, .ast-plain-container #primary, .ast-narrow-container #primary' => array(
					'margin-top'    => astra_responsive_spacing( $single_post_outside_spacing, 'top', 'tablet' ),
					'margin-bottom' => astra_responsive_spacing( $single_post_outside_spacing, 'bottom', 'tablet' ),
				),
				'.ast-left-sidebar #primary, .ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container #primary, .ast-narrow-container #primary' => array(
					'padding-left'  => astra_responsive_spacing( $single_post_outside_spacing, 'left', 'tablet' ),
					'padding-right' => astra_responsive_spacing( $single_post_outside_spacing, 'right', 'tablet' ),
				),
				'.ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container.ast-single-post #primary, .ast-plain-container.ast-single-post #primary, .ast-narrow-container.ast-single-post #primary' => array(
					'margin-top'    => astra_responsive_spacing( $single_post_outside_spacing, 'top', 'tablet' ),
					'margin-bottom' => astra_responsive_spacing( $single_post_outside_spacing, 'bottom', 'tablet' ),
				),
				'.ast-left-sidebar.ast-single-post #primary, .ast-right-sidebar.ast-single-post #primary, .ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container.ast-single-post #primary, .ast-narrow-container.ast-single-post #primary' => array(
					'padding-left'  => astra_responsive_spacing( $single_post_outside_spacing, 'left', 'tablet' ),
					'padding-right' => astra_responsive_spacing( $single_post_outside_spacing, 'right', 'tablet' ),
				),
			);

			$parse_css .= astra_parse_css( $single_post_outside_spacing_css_tablet, '', astra_get_tablet_breakpoint() );

			$single_post_outside_spacing_css_mobile = array(
				'.ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container.ast-single-post #primary, .ast-plain-container.ast-single-post #primary, .ast-narrow-container.ast-single-post #primary' => array(
					'margin-top'    => astra_responsive_spacing( $single_post_outside_spacing, 'top', 'mobile' ),
					'margin-bottom' => astra_responsive_spacing( $single_post_outside_spacing, 'bottom', 'mobile' ),
				),
				'.ast-left-sidebar.ast-single-post #primary, .ast-right-sidebar.ast-single-post #primary, .ast-separate-container.ast-single-post.ast-right-sidebar #primary, .ast-separate-container.ast-single-post.ast-left-sidebar #primary, .ast-separate-container.ast-single-post #primary, .ast-narrow-container.ast-single-post #primary' => array(
					'padding-left'  => astra_responsive_spacing( $single_post_outside_spacing, 'left', 'mobile' ),
					'padding-right' => astra_responsive_spacing( $single_post_outside_spacing, 'right', 'mobile' ),
				),
			);

			$parse_css .= astra_parse_css( $single_post_outside_spacing_css_mobile, '', astra_get_mobile_breakpoint() );

			/**
			 * Single Post Outer spacing
			 */
			// To apply Container Outside Spacing we need to remove default top padding given from the theme.
			$remove_single_post_top_padding_container = array(
				'.ast-separate-container #primary, .ast-narrow-container #primary' => array(
					'padding-top' => astra_get_css_value( 0, 'px' ),
				),
			);

			// To apply Container Outside Spacing we need to remove default bottom padding given from the theme.
			$remove_single_post_bottom_padding_container = array(
				'.ast-separate-container #primary, .ast-narrow-container #primary' => array(
					'padding-bottom' => astra_get_css_value( 0, 'px' ),
				),
			);

			if ( isset( $single_post_outside_spacing['desktop']['top'] ) && '' != $single_post_outside_spacing['desktop']['top'] ) {
				$parse_css .= astra_parse_css( $remove_single_post_top_padding_container );
			}
			if ( isset( $single_post_outside_spacing['tablet']['top'] ) && '' != $single_post_outside_spacing['tablet']['top'] ) {
				$parse_css .= astra_parse_css( $remove_single_post_top_padding_container, '', astra_get_tablet_breakpoint() );
			}
			if ( isset( $single_post_outside_spacing['mobile']['top'] ) && '' != $single_post_outside_spacing['mobile']['top'] ) {
				$parse_css .= astra_parse_css( $remove_single_post_top_padding_container, '', astra_get_mobile_breakpoint() );
			}

			if ( isset( $single_post_outside_spacing['desktop']['top'] ) && '' != $single_post_outside_spacing['desktop']['top'] ) {
				$parse_css .= astra_parse_css( $remove_single_post_bottom_padding_container );
			}
			if ( isset( $single_post_outside_spacing['tablet']['top'] ) && '' != $single_post_outside_spacing['tablet']['top'] ) {
				$parse_css .= astra_parse_css( $remove_single_post_bottom_padding_container, '', astra_get_tablet_breakpoint() );
			}
			if ( isset( $single_post_outside_spacing['mobile']['top'] ) && '' != $single_post_outside_spacing['mobile']['top'] ) {
				$parse_css .= astra_parse_css( $remove_single_post_bottom_padding_container, '', astra_get_mobile_breakpoint() );
			}

			if ( $block_editor_legacy_setup ) {
				/*
				* Fix the wide width issue in gutenberg
				* check if the current user is existing user or new user.
				* if new user load the CSS bty default if existing provide a filter
				*/
				if ( self::gtn_image_group_css_comp() ) {

					if ( false === $improve_gb_ui && ( 'content-boxed-container' == $ast_container_layout || 'boxed-container' == $ast_container_layout ) ) {
						$parse_css .= astra_parse_css(
							array(
								'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-image.alignfull,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-image.alignfull,.ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignfull,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignfull' => array(
									'margin-left'  => '-6.67em',
									'margin-right' => '-6.67em',
									'max-width'    => 'unset',
									'width'        => 'unset',
								),
								'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-image.alignwide,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-image.alignwide,.ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignwide,.ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignwide' => array(
									'margin-left'  => '-20px',
									'margin-right' => '-20px',
									'max-width'    => 'unset',
									'width'        => 'unset',
								),
							),
							'1200'
						);
					}

					$gtn_full_wide_image_css = array(
						'.wp-block-group .has-background' => array(
							'padding' => '20px',
						),
					);
					$parse_css              .= astra_parse_css( $gtn_full_wide_image_css, '1200' );

				} else {

					$gtn_tablet_column_css = array(
						'.entry-content .wp-block-columns .wp-block-column' => array(
							'margin-left' => '0px',
						),
					);

					$parse_css .= astra_parse_css( $gtn_tablet_column_css, '', '782' );
				}

				if ( self::gtn_group_cover_css_comp() ) {

					if ( 'no-sidebar' !== astra_page_layout() ) {

						switch ( $ast_container_layout ) {
							case 'content-boxed-container':
							case 'boxed-container':
								if ( true === $improve_gb_ui ) {
									break;
								}
								$parse_css .= astra_parse_css(
									array(
										// With container - Sidebar.
										'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-group.alignwide, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-group.alignwide, .ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignwide, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignwide' => array(
											'margin-left'  => '-20px',
											'margin-right' => '-20px',
											'padding-left' => '20px',
											'padding-right' => '20px',
										),
										'.ast-separate-container.ast-right-sidebar .entry-content .wp-block-group.alignfull, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-group.alignfull, .ast-separate-container.ast-right-sidebar .entry-content .wp-block-cover.alignfull, .ast-separate-container.ast-left-sidebar .entry-content .wp-block-cover.alignfull' => array(
											'margin-left'  => '-6.67em',
											'margin-right' => '-6.67em',
											'padding-left' => '6.67em',
											'padding-right' => '6.67em',
										),
									),
									'1200'
								);
								break;

							case 'plain-container':
								$parse_css .= astra_parse_css(
									array(
										// Without container - Sidebar.
										'.ast-plain-container.ast-right-sidebar .entry-content .wp-block-group.alignwide, .ast-plain-container.ast-left-sidebar .entry-content .wp-block-group.alignwide, .ast-plain-container.ast-right-sidebar .entry-content .wp-block-group.alignfull, .ast-plain-container.ast-left-sidebar .entry-content .wp-block-group.alignfull' => array(
											'padding-left' => '20px',
											'padding-right' => '20px',
										),
									),
									'1200'
								);
								break;

							case 'page-builder':
								$parse_css .= astra_parse_css(
									array(
										'.ast-page-builder-template.ast-left-sidebar .entry-content .wp-block-cover.alignwide, .ast-page-builder-template.ast-right-sidebar .entry-content .wp-block-cover.alignwide, .ast-page-builder-template.ast-left-sidebar .entry-content .wp-block-cover.alignfull, .ast-page-builder-template.ast-right-sidebar .entry-content .wp-block-cover.alignful' => array(
											'padding-right' => '0',
											'padding-left' => '0',
										),
									),
									'1200'
								);
								break;
						}
					} else {

						switch ( $container_layout ) {
							case 'content-boxed-container':
							case 'boxed-container':
								if ( true === $improve_gb_ui ) {
									break;
								}

								$parse_css .= astra_parse_css(
									array(
										// With container - No Sidebar.
										'.ast-no-sidebar.ast-separate-container .entry-content .wp-block-group.alignwide, .ast-no-sidebar.ast-separate-container .entry-content .wp-block-cover.alignwide' => array(
											'margin-left'  => '-20px',
											'margin-right' => '-20px',
											'padding-left' => '20px',
											'padding-right' => '20px',
										),
										'.ast-no-sidebar.ast-separate-container .entry-content .wp-block-cover.alignfull, .ast-no-sidebar.ast-separate-container .entry-content .wp-block-group.alignfull' => array(
											'margin-left'  => '-6.67em',
											'margin-right' => '-6.67em',
											'padding-left' => '6.67em',
											'padding-right' => '6.67em',
										),
									),
									'1200'
								);
								break;

							case 'plain-container':
								$parse_css .= astra_parse_css(
									array(
										// Without container - No Sidebar.
										'.ast-plain-container.ast-no-sidebar .entry-content .alignwide .wp-block-cover__inner-container, .ast-plain-container.ast-no-sidebar .entry-content .alignfull .wp-block-cover__inner-container' => array(
											'width' => astra_get_css_value( $site_content_width + 40, 'px' ),
										),
									),
									'1200'
								);
								break;

							case 'page-builder':
								$parse_css .= astra_parse_css(
									array(
										'.ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-cover.alignwide, .ast-page-builder-template.ast-no-sidebar .entry-content .wp-block-cover.alignfull' => array(
											'padding-right' => '0',
											'padding-left' => '0',
										),
									),
									'1200'
								);
								break;
						}
					}

					$parse_css .= astra_parse_css(
						array(
							'.wp-block-cover-image.alignwide .wp-block-cover__inner-container, .wp-block-cover.alignwide .wp-block-cover__inner-container, .wp-block-cover-image.alignfull .wp-block-cover__inner-container, .wp-block-cover.alignfull .wp-block-cover__inner-container' => array(
								'width' => '100%',
							),
						),
						'1200'
					);
				}

				if ( self::gutenberg_core_blocks_css_comp() ) {
					$desktop_screen_gb_css = array(
						// Group block, Columns block, Gallery block, Table block & has-text-align-center selector compatibility Desktop CSS.
						'.wp-block-columns'         => array(
							'margin-bottom' => 'unset',
						),
						'.wp-block-image.size-full' => array(
							'margin' => '2rem 0',
						),
						'.wp-block-separator.has-background' => array(
							'padding' => '0',
						),
						'.wp-block-gallery'         => array(
							'margin-bottom' => '1.6em',
						),
						'.wp-block-group'           => array(
							'padding-top'    => '4em',
							'padding-bottom' => '4em',
						),
						'.wp-block-group__inner-container .wp-block-columns:last-child, .wp-block-group__inner-container :last-child, .wp-block-table table' => array(
							'margin-bottom' => '0',
						),
						'.blocks-gallery-grid'      => array(
							'width' => '100%',
						),
						'.wp-block-navigation-link__content' => array(
							'padding' => '5px 0',
						),
						'.wp-block-group .wp-block-group .has-text-align-center, .wp-block-group .wp-block-column .has-text-align-center' => array(
							'max-width' => '100%',
						),
						'.has-text-align-center'    => array(
							'margin' => '0 auto',
						),
					);

					/* Parse CSS from array() -> Desktop CSS */
					$parse_css .= astra_parse_css( $desktop_screen_gb_css );

					if ( false === $improve_gb_ui ) {
						$middle_screen_min_gb_css = array(
							// Group & Column block > align compatibility (min-width:1200px) CSS.
							'.wp-block-cover__inner-container, .alignwide .wp-block-group__inner-container, .alignfull .wp-block-group__inner-container' => array(
								'max-width' => '1200px',
								'margin'    => '0 auto',
							),
							'.wp-block-group.alignnone, .wp-block-group.aligncenter, .wp-block-group.alignleft, .wp-block-group.alignright, .wp-block-group.alignwide, .wp-block-columns.alignwide' => array(
								'margin' => '2rem 0 1rem 0',
							),
						);
						/* Parse CSS from array() -> min-width: (1200)px CSS */
						$parse_css .= astra_parse_css( $middle_screen_min_gb_css, '1200' );
					}

					$middle_screen_max_gb_css = array(
						// Group & Column block (max-width:1200px) CSS.
						'.wp-block-group'                 => array(
							'padding' => '3em',
						),
						'.wp-block-group .wp-block-group' => array(
							'padding' => '1.5em',
						),
						'.wp-block-columns, .wp-block-column' => array(
							'margin' => '1rem 0',
						),
					);

					/* Parse CSS from array() -> max-width: (1200)px CSS */
					$parse_css .= astra_parse_css( $middle_screen_max_gb_css, '', '1200' );

					$tablet_screen_min_gb_css = array(
						// Columns inside Group block compatibility (min-width: tablet-breakpoint) CSS.
						'.wp-block-columns .wp-block-group' => array(
							'padding' => '2em',
						),
					);

					/* Parse CSS from array() -> min-width: (tablet-breakpoint)px CSS */
					$parse_css .= astra_parse_css( $tablet_screen_min_gb_css, astra_get_tablet_breakpoint() );

					$mobile_screen_max_gb_css = array(
						// Content | image | video inside Media & Text block, Cover block, Image inside cover block compatibility (max-width: mobile-breakpoint) CSS.
						'.wp-block-cover-image .wp-block-cover__inner-container, .wp-block-cover .wp-block-cover__inner-container' => array(
							'width' => 'unset',
						),
						'.wp-block-cover, .wp-block-cover-image' => array(
							'padding' => '2em 0',
						),
						'.wp-block-group, .wp-block-cover' => array(
							'padding' => '2em',
						),
						'.wp-block-media-text__media img, .wp-block-media-text__media video' => array(
							'width'     => 'unset',
							'max-width' => '100%',
						),
						'.wp-block-media-text.has-background .wp-block-media-text__content' => array(
							'padding' => '1em',
						),
					);

					if ( ! self::gutenberg_media_text_block_css_compat() ) {
						// Added this [! self::gutenberg_media_text_block_css_compat()] condition as we update the same selector CSS in gutenberg_media_text_block_css_compat() function with new padding: 8% 0; CSS for max-width: (mobile-breakpoint).
						$mobile_screen_max_gb_css['.wp-block-media-text .wp-block-media-text__content'] = array(
							'padding' => '3em 2em',
						);
					}

					/* Parse CSS from array() -> max-width: (mobile-breakpoint)px CSS */
					$parse_css .= astra_parse_css( $mobile_screen_max_gb_css, '', astra_get_mobile_breakpoint() );
				}

				$is_legacy_setup = ( 'legacy' === astra_get_option( 'wp-blocks-ui' ) ) ? true : false;

				if ( $is_legacy_setup && astra_wp_version_compare( '6.0', '>=' ) ) {
					// Image block align center CSS.
					$image_block_center_align = array(
						'.wp-block-image.aligncenter' => array(
							'margin-left'  => 'auto',
							'margin-right' => 'auto',
						),
					);
					$parse_css               .= astra_parse_css( $image_block_center_align );
				}

				if ( $is_legacy_setup ) {
					// Table block align center CSS.
					$table_block_center_align = array(
						'.wp-block-table.aligncenter' => array(
							'margin-left'  => 'auto',
							'margin-right' => 'auto',
						),
					);
					$parse_css               .= astra_parse_css( $table_block_center_align );
				}

				if ( self::gutenberg_media_text_block_css_compat() ) {
					$media_text_block_padding_css = array(
						// Media & Text block CSS compatibility (min-width: mobile-breakpoint) CSS.
						'.entry-content .wp-block-media-text.has-media-on-the-right .wp-block-media-text__content' => array(
							'padding' => '0 8% 0 0',
						),
						'.entry-content .wp-block-media-text .wp-block-media-text__content' => array(
							'padding' => '0 0 0 8%',
						),
						'.ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-left > *, .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-bottom-right > *, .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-left > *, .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-top-right > *, .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-right > *, .ast-plain-container .site-content .entry-content .has-custom-content-position.is-position-center-left > *'  => array(
							'margin' => 0,
						),
					);

					/* Parse CSS from array() -> min-width: (mobile-breakpoint)px CSS */
					$parse_css .= astra_parse_css( $media_text_block_padding_css, astra_get_mobile_breakpoint() );

					$mobile_screen_media_text_block_css = array(
						// Media & Text block padding CSS for (max-width: mobile-breakpoint) CSS.
						'.entry-content .wp-block-media-text .wp-block-media-text__content' => array(
							'padding' => '8% 0',
						),
						'.wp-block-media-text .wp-block-media-text__media img' => array(
							'width'     => 'auto',
							'max-width' => '100%',
						),
					);

					/* Parse CSS from array() -> max-width: (mobile-breakpoint)px CSS */
					$parse_css .= astra_parse_css( $mobile_screen_media_text_block_css, '', astra_get_mobile_breakpoint() );
				}
			}

			/**
			 * When supporting GB button outline patterns in v3.3.0 we have given 2px as default border for GB outline button, where we restrict button border for flat type buttons.
			 * But now while reverting this change there is no need of default border because whatever customizer border will set it should behave accordingly. Although it is empty ('') WP applying 2px as default border for outline buttons.
			 *
			 * @since 3.6.3
			 */
			$default_border_size = '2px';
			if ( astra_button_default_padding_updated() ) {
				$default_border_size = '';
			}

			// Outline Gutenberg button compatibility CSS.
			$theme_btn_top_border    = ( isset( $global_custom_button_border_size['top'] ) && ( '' !== $global_custom_button_border_size['top'] && '0' !== $global_custom_button_border_size['top'] ) ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : $default_border_size;
			$theme_btn_right_border  = ( isset( $global_custom_button_border_size['right'] ) && ( '' !== $global_custom_button_border_size['right'] && '0' !== $global_custom_button_border_size['right'] ) ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : $default_border_size;
			$theme_btn_left_border   = ( isset( $global_custom_button_border_size['left'] ) && ( '' !== $global_custom_button_border_size['left'] && '0' !== $global_custom_button_border_size['left'] ) ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : $default_border_size;
			$theme_btn_bottom_border = ( isset( $global_custom_button_border_size['bottom'] ) && ( '' !== $global_custom_button_border_size['bottom'] && '0' !== $global_custom_button_border_size['bottom'] ) ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : $default_border_size;

			if ( self::gutenberg_core_patterns_compat() ) {

				$outline_button_css = array(
					'.wp-block-button.is-style-outline .wp-block-button__link' => array(
						'border-color'        => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'border-top-width'    => esc_attr( $theme_btn_top_border ),
						'border-right-width'  => esc_attr( $theme_btn_right_border ),
						'border-bottom-width' => esc_attr( $theme_btn_bottom_border ),
						'border-left-width'   => esc_attr( $theme_btn_left_border ),
					),
					'div.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color), div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color)' => array(
						'color' => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
					),
					'.wp-block-button.is-style-outline .wp-block-button__link:hover, div.wp-block-button.is-style-outline .wp-block-button__link:focus, div.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color):hover, div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color):hover' => array(
						'color'            => esc_attr( $btn_text_hover_color ),
						'background-color' => esc_attr( $btn_bg_hover_color ),
						'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),
					),
					// Adding CSS to highlight current paginated number.
					'.post-page-numbers.current .page-link, .ast-pagination .page-numbers.current'                    => array(
						'color'            => astra_get_foreground_color( $theme_color ),
						'border-color'     => esc_attr( $theme_color ),
						'background-color' => esc_attr( $theme_color ),
						'border-radius'    => '2px',
					),
				);

				/* Parse CSS from array() -> All media CSS */
				$parse_css .= astra_parse_css( $outline_button_css );

				if ( $block_editor_legacy_setup ) {

					if ( ! astra_button_default_padding_updated() ) {
						// Tablet CSS.
						$outline_button_tablet_css = array(
							'.wp-block-button.is-style-outline .wp-block-button__link' => array(
								'padding-top'    => 'calc(15px - ' . (int) $theme_btn_top_border . 'px)',
								'padding-right'  => 'calc(30px - ' . (int) $theme_btn_right_border . 'px)',
								'padding-bottom' => 'calc(15px - ' . (int) $theme_btn_bottom_border . 'px)',
								'padding-left'   => 'calc(30px - ' . (int) $theme_btn_left_border . 'px)',
							),
						);

						$parse_css .= astra_parse_css( $outline_button_tablet_css, '', astra_get_tablet_breakpoint() );

						// Mobile CSS.
						$outline_button_mobile_css = array(
							'.wp-block-button.is-style-outline .wp-block-button__link' => array(
								'padding-top'    => 'calc(15px - ' . (int) $theme_btn_top_border . 'px)',
								'padding-right'  => 'calc(30px - ' . (int) $theme_btn_right_border . 'px)',
								'padding-bottom' => 'calc(15px - ' . (int) $theme_btn_bottom_border . 'px)',
								'padding-left'   => 'calc(30px - ' . (int) $theme_btn_left_border . 'px)',
							),
						);

						$parse_css .= astra_parse_css( $outline_button_mobile_css, '', astra_get_mobile_breakpoint() );
					}

					if ( $is_site_rtl ) {
						$gb_patterns_min_mobile_css = array(
							'.entry-content > .alignleft'  => array(
								'margin-left' => '20px',
							),
							'.entry-content > .alignright' => array(
								'margin-right' => '20px',
							),
						);
					} else {
						$gb_patterns_min_mobile_css = array(
							'.entry-content > .alignleft'  => array(
								'margin-right' => '20px',
							),
							'.entry-content > .alignright' => array(
								'margin-left' => '20px',
							),
						);
					}

					if ( ! astra_button_default_padding_updated() ) {
						$gb_patterns_min_mobile_css['.wp-block-group.has-background'] = array(
							'padding' => '20px',
						);
					}

					/* Parse CSS from array() -> min-width: (mobile-breakpoint) px CSS  */
					$parse_css .= astra_parse_css( $gb_patterns_min_mobile_css, astra_get_mobile_breakpoint() );
				}
			}

			if ( astra_button_default_padding_updated() ) {
				$outline_button_css = array(
					'.wp-block-button.is-style-outline .wp-block-button__link' => array(
						'border-top-width'    => esc_attr( $theme_btn_top_border ),
						'border-right-width'  => esc_attr( $theme_btn_right_border ),
						'border-bottom-width' => esc_attr( $theme_btn_bottom_border ),
						'border-left-width'   => esc_attr( $theme_btn_left_border ),
					),
				);

				/* Parse CSS from array() -> All media CSS */
				$parse_css .= astra_parse_css( $outline_button_css );
			}

			if ( $is_widget_title_support_font_weight ) {
				$widget_title_font_weight_support = array(
					'h1.widget-title' => array(
						'font-weight' => esc_attr( $h1_font_weight ),
					),
					'h2.widget-title' => array(
						'font-weight' => esc_attr( $h2_font_weight ),
					),
					'h3.widget-title' => array(
						'font-weight' => esc_attr( $h3_font_weight ),
					),
				);

				/* Parse CSS from array() -> All media CSS */
				$parse_css .= astra_parse_css( $widget_title_font_weight_support );
			}

			$static_layout_css = array(
				'.ast-separate-container #primary, .ast-separate-container #secondary' => array(
					'padding' => '1.5em 0',
				),
				'#primary, #secondary' => array(
					'padding' => '1.5em 0',
					'margin'  => 0,
				),
				'.ast-left-sidebar #content > .ast-container' => array(
					'display'        => 'flex',
					'flex-direction' => 'column-reverse',
					'width'          => '100%',
				),
			);

			if ( true === $update_customizer_strctural_defaults ) {
				$is_site_rtl               = is_rtl() ? true : false;
				$ltr_left                  = $is_site_rtl ? esc_attr( 'right' ) : esc_attr( 'left' );
				$ltr_right                 = $is_site_rtl ? esc_attr( 'left' ) : esc_attr( 'right' );
				$default_layout_update_css = array(
					'#page'                           => array(
						'display'        => 'flex',
						'flex-direction' => 'column',
						'min-height'     => '100vh',
					),
					'.ast-404-layout-1 h1.page-title' => array(
						'color' => 'var(--ast-global-color-2)',
					),
					'.single .post-navigation a'      => array(
						'line-height' => '1em',
						'height'      => 'inherit',
					),
					'.error-404 .page-sub-title'      => array(
						'font-size'   => '1.5rem',
						'font-weight' => 'inherit',
					),
					'.search .site-content .content-area .search-form' => array(
						'margin-bottom' => '0',
					),
					'#page .site-content'             => array(
						'flex-grow' => '1',
					),
					'.widget'                         => array(
						'margin-bottom' => '3.5em',
					),
					'#secondary li'                   => array(
						'line-height' => '1.5em',
					),
					'#secondary .wp-block-group h2'   => array(
						'margin-bottom' => '0.7em',
					),
					'#secondary h2'                   => array(
						'font-size' => '1.7rem',
					),
					'.ast-separate-container .ast-article-post, .ast-separate-container .ast-article-single, .ast-separate-container .ast-comment-list li.depth-1, .ast-separate-container .comment-respond' => array(
						'padding' => '3em',
					),
					'.ast-separate-container .ast-comment-list li.depth-1, .hentry' => array(
						'margin-bottom' => '2em',
					),
					'.ast-separate-container .ast-archive-description, .ast-separate-container .ast-author-box' => array(
						'background-color' => 'var(--ast-global-color-5)',
						'border-bottom'    => '1px solid var(--ast-border-color)',
					),
					'.ast-separate-container .comments-title' => array(
						'padding' => '2em 2em 0 2em',
					),
					'.ast-page-builder-template .comment-form-textarea, .ast-comment-formwrap .ast-grid-common-col' => array(
						'padding' => '0',
					),
					'.ast-comment-formwrap'           => array(
						'padding'    => '0 20px',
						'display'    => 'inline-flex',
						'column-gap' => '20px',
					),
					'.archive.ast-page-builder-template .entry-header' => array(
						'margin-top' => '2em',
					),
					'.ast-page-builder-template .ast-comment-formwrap' => array(
						'width' => '100%',
					),
					'.entry-title'                    => array(
						'margin-bottom' => '0.5em',
					),
					'.ast-archive-description p'      => array(
						'font-size'   => 'inherit',
						'font-weight' => 'inherit',
						'line-height' => 'inherit',
					),
				);
				/* Parse CSS from array() -> Desktop CSS */
				$parse_css .= astra_parse_css( $default_layout_update_css );

				$default_tablet_layout_css = array(
					'.ast-left-sidebar.ast-page-builder-template #secondary, .archive.ast-right-sidebar.ast-page-builder-template .site-main' => array(
						'padding-' . $ltr_left  => '20px',
						'padding-' . $ltr_right => '20px',
					),
				);

				/* Parse CSS from array() -> min-width: tablet-breakpoint CSS */
				$parse_css .= astra_parse_css( $default_tablet_layout_css, astra_get_tablet_breakpoint() );

				$default_mobile_layout_css = array(
					'.ast-comment-formwrap.ast-row' => array(
						'column-gap' => '10px',
						'display'    => 'inline-block',
					),
					'#ast-commentform .ast-grid-common-col' => array(
						'position' => 'relative',
						'width'    => '100%',
					),
				);

				/* Parse CSS from array() -> max-width: mobile-breakpoint CSS */
				$parse_css .= astra_parse_css( $default_mobile_layout_css, '', astra_get_mobile_breakpoint() );

				if ( is_user_logged_in() ) {
					$admin_bar_specific_page_css = array(
						'.admin-bar #page' => array(
							'min-height' => 'calc(100vh - 32px)',
						),
					);
					$parse_css                  .= astra_parse_css( $admin_bar_specific_page_css );

					$admin_bar_responsive_page_css = array(
						'.admin-bar #page' => array(
							'min-height' => 'calc(100vh - 46px)',
						),
					);
					$parse_css                    .= astra_parse_css( $admin_bar_responsive_page_css, '', '782' );
				}

				$default_medium_layout_css = array(
					'.ast-separate-container .ast-article-post, .ast-separate-container .ast-article-single, .ast-separate-container .ast-author-box, .ast-separate-container .ast-404-layout-1, .ast-separate-container .no-results' => array(
						'padding' => '3em',
					),
				);

				/* Parse CSS from array() -> min-width: 1201px CSS */
				$parse_css .= astra_parse_css( $default_medium_layout_css, '1201' );

				if ( is_author() ) {
					$default_author_css = array(
						'.ast-author-box img.avatar' => array(
							'margin' => '0',
						),
					);
					/* Parse CSS from array() -> Desktop CSS */
					$parse_css                    .= astra_parse_css( $default_author_css );
					$default_tablet_min_author_css = array(
						'.ast-author-box img.avatar' => array(
							'width'  => '100px',
							'height' => '100px',
						),
						'.ast-author-box'            => array(
							'column-gap' => '50px',
						),
					);
					/* Parse CSS from array() -> min-width: (tablet-breakpoint) CSS */
					$parse_css                    .= astra_parse_css( $default_tablet_min_author_css, astra_get_tablet_breakpoint() );
					$default_max_tablet_author_css = array(
						'.ast-author-avatar' => array(
							'margin-top' => '20px',
						),
					);
					/* Parse CSS from array() -> max-width: (tablet-breakpoint) CSS */
					$parse_css                             .= astra_parse_css( $default_max_tablet_author_css, '', astra_get_tablet_breakpoint() );
					$default_tablet_min_extra_px_author_css = array(
						'.ast-author-box' => array(
							'align-items' => 'center',
						),
					);
					/* Parse CSS from array() -> min-width: (tablet-breakpoint + 1) CSS */
					$parse_css .= astra_parse_css( $default_tablet_min_extra_px_author_css, astra_get_tablet_breakpoint( '', 1 ) );
				}
			} else {
				$static_layout_css['.ast-separate-container .ast-article-post, .ast-separate-container .ast-article-single'] = array(
					'padding' => '1.5em 2.14em',
				);
				$static_layout_css['.ast-author-box img.avatar'] = array(
					'margin' => '20px 0 0 0',
				);
			}

			/* Parse CSS from array() -> max-width: (tablet-breakpoint)px CSS */
			$parse_css .= astra_parse_css( $static_layout_css, '', astra_get_tablet_breakpoint() );

			if ( is_author() && false === $update_customizer_strctural_defaults ) {
				$parse_css .= astra_parse_css(
					array(
						'.ast-author-box img.avatar' => array(
							'margin' => '20px 0 0 0',
						),
					),
					astra_get_tablet_breakpoint()
				);
			}

			if ( 'no-sidebar' !== astra_page_layout() ) {
				$static_secondary_layout_css = array(
					'#secondary.secondary' => array(
						'padding-top' => 0,
					),
					'.ast-separate-container.ast-right-sidebar #secondary' => array(
						'padding-left'  => '1em',
						'padding-right' => '1em',
					),
					'.ast-separate-container.ast-two-container #secondary' => array(
						'padding-left'  => 0,
						'padding-right' => 0,
					),
					'.ast-page-builder-template .entry-header #secondary, .ast-page-builder-template #secondary' => array(
						'margin-top' => '1.5em',
					),
				);
				$parse_css                  .= astra_parse_css( $static_secondary_layout_css, '', astra_get_tablet_breakpoint() );
			}

			if ( 'no-sidebar' !== astra_page_layout() ) {
				if ( $is_site_rtl ) {
					$static_layout_lang_direction_css = array(
						'.ast-right-sidebar #primary'  => array(
							'padding-left' => 0,
						),
						'.ast-page-builder-template.ast-left-sidebar #secondary, ast-page-builder-template.ast-right-sidebar #secondary' => array(
							'padding-left'  => '20px',
							'padding-right' => '20px',
						),
						'.ast-right-sidebar #secondary, .ast-left-sidebar #primary' => array(
							'padding-right' => 0,
						),
						'.ast-left-sidebar #secondary' => array(
							'padding-left' => 0,
						),
					);
				} else {
						$static_layout_lang_direction_css = array(
							'.ast-right-sidebar #primary'  => array(
								'padding-right' => 0,
							),
							'.ast-page-builder-template.ast-left-sidebar #secondary, .ast-page-builder-template.ast-right-sidebar #secondary' => array(
								'padding-right' => '20px',
								'padding-left'  => '20px',
							),
							'.ast-right-sidebar #secondary, .ast-left-sidebar #primary' => array(
								'padding-left' => 0,
							),
							'.ast-left-sidebar #secondary' => array(
								'padding-right' => 0,
							),
						);
				}
				/* Parse CSS from array() -> max-width: (tablet-breakpoint)px CSS */
				$parse_css .= astra_parse_css( $static_layout_lang_direction_css, '', astra_get_tablet_breakpoint() );
			}

			$static_layout_css_min = array(
				'.ast-separate-container.ast-right-sidebar #primary, .ast-separate-container.ast-left-sidebar #primary' => array(
					'border' => 0,
				),
				'.search-no-results.ast-separate-container #primary' => array(
					'margin-bottom' => '4em',
				),
			);

			if ( is_author() ) {
				$author_table_css      = array(
					'.ast-author-box' => array(
						'-js-display' => 'flex',
						'display'     => 'flex',
					),
					'.ast-author-bio' => array(
						'flex' => '1',
					),
				);
				$static_layout_css_min = array_merge( $static_layout_css_min, $author_table_css );
			}

			/* Parse CSS from array() -> min-width: (tablet-breakpoint + 1)px CSS */
			$parse_css .= astra_parse_css( $static_layout_css_min, astra_get_tablet_breakpoint( '', '1' ) );

			// 404 Page.
			if ( is_404() ) {

				$page_404   = array(
					'.ast-404-layout-1 .ast-404-text' => array(
						'font-size' => astra_get_font_css_value( '200' ),
					),
				);
				$parse_css .= astra_parse_css( $page_404 );

				$parse_css .= astra_parse_css(
					array(
						'.error404.ast-separate-container #primary' => array(
							'margin-bottom' => '4em',
						),
					),
					astra_get_tablet_breakpoint( '', '1' )
				);

				$parse_css .= astra_parse_css(
					array(
						'.ast-404-layout-1 .ast-404-text' => array(
							'font-size' => astra_get_font_css_value( 100 ),
						),
					),
					'',
					'920'
				);
			}

			if ( 'no-sidebar' !== astra_page_layout() ) {

				if ( $is_site_rtl ) {
					$static_layout_min_lang_direction_css = array(
						'.ast-right-sidebar #primary'   => array(
							'border-left' => '1px solid var(--ast-border-color)',
						),
						'.ast-right-sidebar #secondary' => array(
							'border-right' => '1px solid var(--ast-border-color)',
							'margin-right' => '-1px',
						),
						'.ast-left-sidebar #primary'    => array(
							'border-right' => '1px solid var(--ast-border-color)',
						),
						'.ast-left-sidebar #secondary'  => array(
							'border-left' => '1px solid var(--ast-border-color)',
							'margin-left' => '-1px',
						),
						'.ast-separate-container.ast-two-container.ast-right-sidebar #secondary' => array(
							'padding-right' => '30px',
							'padding-left'  => 0,
						),
						'.ast-separate-container.ast-two-container.ast-left-sidebar #secondary' => array(
							'padding-left'  => '30px',
							'padding-right' => 0,
						),
						'.ast-separate-container.ast-right-sidebar #secondary, .ast-separate-container.ast-left-sidebar #secondary' => array(
							'border'       => 0,
							'margin-left'  => 'auto',
							'margin-right' => 'auto',
						),
						'.ast-separate-container.ast-two-container #secondary .widget:last-child' => array(
							'margin-bottom' => 0,
						),
					);
				} else {
					$static_layout_min_lang_direction_css = array(
						'.ast-right-sidebar #primary'   => array(
							'border-right' => '1px solid var(--ast-border-color)',
						),
						'.ast-left-sidebar #primary'    => array(
							'border-left' => '1px solid var(--ast-border-color)',
						),
						'.ast-right-sidebar #secondary' => array(
							'border-left' => '1px solid var(--ast-border-color)',
							'margin-left' => '-1px',
						),
						'.ast-left-sidebar #secondary'  => array(
							'border-right' => '1px solid var(--ast-border-color)',
							'margin-right' => '-1px',
						),
						'.ast-separate-container.ast-two-container.ast-right-sidebar #secondary' => array(
							'padding-left'  => '30px',
							'padding-right' => 0,
						),
						'.ast-separate-container.ast-two-container.ast-left-sidebar #secondary' => array(
							'padding-right' => '30px',
							'padding-left'  => 0,
						),
						'.ast-separate-container.ast-right-sidebar #secondary, .ast-separate-container.ast-left-sidebar #secondary' => array(
							'border'       => 0,
							'margin-left'  => 'auto',
							'margin-right' => 'auto',
						),
						'.ast-separate-container.ast-two-container #secondary .widget:last-child' => array(
							'margin-bottom' => 0,
						),
					);
				}

				/* Parse CSS from array() -> min-width: (tablet-breakpoint + 1)px CSS */
				$parse_css .= astra_parse_css( $static_layout_min_lang_direction_css, astra_get_tablet_breakpoint( '', '1' ) );
			}

			/**
			 * Elementor & Gutenberg button backward compatibility for default styling.
			 */
			if ( self::page_builder_button_style_css() ) {

				$search_button_selector       = ( ! $block_editor_legacy_setup || $is_wp_5_8_support_enabled ) ? ', form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button' : '';
				$search_button_hover_selector = ( ! $block_editor_legacy_setup || $is_wp_5_8_support_enabled ) ? ', form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:hover, form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:focus' : '';

				$file_block_button_selector       = ( ! $block_editor_legacy_setup || $improve_gb_ui ) ? ', body .wp-block-file .wp-block-file__button' : '';
				$file_block_button_hover_selector = ( ! $block_editor_legacy_setup || $improve_gb_ui ) ? ', body .wp-block-file .wp-block-file__button:hover, body .wp-block-file .wp-block-file__button:focus' : '';
				$search_page_btn_selector         = ( true === $update_customizer_strctural_defaults ) ? ', .search .search-submit' : '';
				$woo_btns_selector                = ( true === self::astra_woo_support_global_settings() ) ? ', .woocommerce a.button, .woocommerce button.button, .woocommerce .woocommerce-message a.button, .woocommerce #respond input#submit.alt, .woocommerce input.button.alt, .woocommerce input.button,.woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled], .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce #respond input#submit, .woocommerce button.button.alt.disabled, .wc-block-grid__products .wc-block-grid__product .wp-block-button__link, .wc-block-grid__product-onsale, [CLASS*="wc-block"] button, .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping), .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout, .woocommerce button.button.alt.disabled.wc-variation-selection-needed' : '';
				$woo_btns_hover_selector          = ( true === self::astra_woo_support_global_settings() ) ? ', .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce .woocommerce-message a.button:hover,.woocommerce #respond input#submit:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce input.button.alt:hover, .woocommerce input.button:hover, .woocommerce button.button.alt.disabled:hover, .wc-block-grid__products .wc-block-grid__product .wp-block-button__link:hover, [CLASS*="wc-block"] button:hover, .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping):hover, .woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout:hover, .woocommerce button.button.alt.disabled.wc-variation-selection-needed:hover' : '';

				/**
				 * Global button CSS - Desktop.
				 */
				$global_button_desktop = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' . $search_button_selector . $file_block_button_selector . $search_page_btn_selector . $woo_btns_selector => array(
						'border-style'               => 'solid',
						'border-top-width'           => ( isset( $global_custom_button_border_size['top'] ) && '' !== $global_custom_button_border_size['top'] ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : '0',
						'border-right-width'         => ( isset( $global_custom_button_border_size['right'] ) && '' !== $global_custom_button_border_size['right'] ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : '0',
						'border-left-width'          => ( isset( $global_custom_button_border_size['left'] ) && '' !== $global_custom_button_border_size['left'] ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : '0',
						'border-bottom-width'        => ( isset( $global_custom_button_border_size['bottom'] ) && '' !== $global_custom_button_border_size['bottom'] ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : '0',
						'color'                      => esc_attr( $btn_text_color ),
						'border-color'               => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'background-color'           => esc_attr( $btn_bg_color ),
						'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
						'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
						'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
						'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
						'font-family'                => astra_get_font_family( $theme_btn_font_family ),
						'font-weight'                => esc_attr( $theme_btn_font_weight ),
						'font-size'                  => astra_get_font_css_value( $theme_btn_font_size['desktop'], $theme_btn_font_size['desktop-unit'] ),
						'line-height'                => esc_attr( $theme_btn_line_height ),
						'text-transform'             => esc_attr( $theme_btn_text_transform ),
						'text-decoration'            => esc_attr( $theme_btn_text_decoration ),
						'letter-spacing'             => esc_attr( $theme_btn_letter_spacing ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'desktop' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'desktop' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'desktop' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'desktop' ),
					),
					'button:focus, .menu-toggle:hover, button:hover, .ast-button:hover, .ast-custom-button:hover .button:hover, .ast-custom-button:hover , input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus' . $search_button_hover_selector . $file_block_button_hover_selector . $woo_btns_hover_selector => array(
						'color'            => esc_attr( $btn_text_hover_color ),
						'background-color' => esc_attr( $btn_bg_hover_color ),
						'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),

					),
				);

				/**
				 * Global button CSS - Tablet.
				 */
				$global_button_tablet = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' . $search_button_selector . $file_block_button_selector . $search_page_btn_selector . $woo_btns_selector => array(
						'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
						'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
						'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
						'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
						'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'tablet' ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'tablet' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'tablet' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'tablet' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'tablet' ),
					),
				);

				/**
				 * Global button CSS - Mobile.
				 */
				$global_button_mobile = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' . $search_button_selector . $file_block_button_selector . $search_page_btn_selector . $woo_btns_selector => array(
						'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
						'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
						'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
						'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
						'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'mobile' ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'mobile' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'mobile' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'mobile' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'mobile' ),
					),
				);

				$btn_text_color_selectors = '.wp-block-button .wp-block-button__link';

				if ( 'color-typo' === self::elementor_default_color_font_setting() || 'color' === self::elementor_default_color_font_setting() || 'typo' === self::elementor_default_color_font_setting() ) {
					$ele_btn_default_desktop = array(
						'.elementor-button-wrapper .elementor-button' => array(
							'border-style'        => 'solid',
							'text-decoration'     => 'none',
							'border-top-width'    => ( isset( $global_custom_button_border_size['top'] ) && '' !== $global_custom_button_border_size['top'] ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : '0',
							'border-right-width'  => ( isset( $global_custom_button_border_size['right'] ) && '' !== $global_custom_button_border_size['right'] ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : '0',
							'border-left-width'   => ( isset( $global_custom_button_border_size['left'] ) && '' !== $global_custom_button_border_size['left'] ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : '0',
							'border-bottom-width' => ( isset( $global_custom_button_border_size['bottom'] ) && '' !== $global_custom_button_border_size['bottom'] ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : '0',
						),
						'body .elementor-button.elementor-size-sm, body .elementor-button.elementor-size-xs, body .elementor-button.elementor-size-md, body .elementor-button.elementor-size-lg, body .elementor-button.elementor-size-xl, body .elementor-button' => array(
							'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'desktop' ),
							'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'desktop' ),
							'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'desktop' ),
							'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'desktop' ),
							'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
							'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
							'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
							'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_default_desktop );

					$ele_btn_default_tablet = array(
						'.elementor-button-wrapper .elementor-button.elementor-size-sm, .elementor-button-wrapper .elementor-button.elementor-size-xs, .elementor-button-wrapper .elementor-button.elementor-size-md, .elementor-button-wrapper .elementor-button.elementor-size-lg, .elementor-button-wrapper .elementor-button.elementor-size-xl, .elementor-button-wrapper .elementor-button' => array(
							'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
							'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
							'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
							'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
							'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'tablet' ),
							'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'tablet' ),
							'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'tablet' ),
							'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'tablet' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_default_tablet, '', astra_get_tablet_breakpoint() );

					$ele_btn_default_mobile = array(
						'.elementor-button-wrapper .elementor-button.elementor-size-sm, .elementor-button-wrapper .elementor-button.elementor-size-xs, .elementor-button-wrapper .elementor-button.elementor-size-md, .elementor-button-wrapper .elementor-button.elementor-size-lg, .elementor-button-wrapper .elementor-button.elementor-size-xl, .elementor-button-wrapper .elementor-button' => array(
							'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
							'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
							'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
							'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
							'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'mobile' ),
							'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'mobile' ),
							'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'mobile' ),
							'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'mobile' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_default_mobile, '', astra_get_mobile_breakpoint() );
				}

				if ( 'color-typo' === self::elementor_default_color_font_setting() || 'color' === self::elementor_default_color_font_setting() ) {
					// Check if Global Elementor - Theme Style - button color is set. If yes then remove ( :visited ) CSS for the compatibility.
					if ( false === self::is_elementor_kit_button_color_set() ) {
						$btn_text_color_selectors .= ' , .elementor-button-wrapper .elementor-button, .elementor-button-wrapper .elementor-button:visited';
					} else {
						$btn_text_color_selectors .= ' , .elementor-button-wrapper .elementor-button';
					}

					$ele_btn_color_builder_desktop = array(
						'.elementor-button-wrapper .elementor-button' => array(
							'border-color'     => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
							'background-color' => esc_attr( $btn_bg_color ),
						),
						'.elementor-button-wrapper .elementor-button:hover, .elementor-button-wrapper .elementor-button:focus' => array(
							'color'            => esc_attr( $btn_text_hover_color ),
							'background-color' => esc_attr( $btn_bg_hover_color ),
							'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),

						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_color_builder_desktop );
				}

				$global_button_page_builder_text_color_desktop = array(
					$btn_text_color_selectors => array(
						'color' => esc_attr( $btn_text_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_text_color_desktop );

				if ( 'color-typo' === self::elementor_default_color_font_setting() || 'typo' === self::elementor_default_color_font_setting() ) {
					$ele_btn_typo_builder_desktop = array(
						'.elementor-button-wrapper .elementor-button' => astra_get_font_array_css( astra_get_option( 'font-family-button' ), astra_get_option( 'font-weight-button' ), $theme_btn_font_size, 'font-extras-button' ),
						'body .elementor-button.elementor-size-sm, body .elementor-button.elementor-size-xs, body .elementor-button.elementor-size-md, body .elementor-button.elementor-size-lg, body .elementor-button.elementor-size-xl, body .elementor-button' => array(
							'font-size' => astra_responsive_font( $theme_btn_font_size, 'desktop' ),
						),
					);

					/* Parse CSS from array() */
					$parse_css .= astra_parse_css( $ele_btn_typo_builder_desktop );
				}

				$global_button_page_builder_desktop = array(
					'.wp-block-button .wp-block-button__link:hover, .wp-block-button .wp-block-button__link:focus' => array(
						'color'            => esc_attr( $btn_text_hover_color ),
						'background-color' => esc_attr( $btn_bg_hover_color ),
						'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),
					),
					'.elementor-widget-heading h1.elementor-heading-title' => array(
						'line-height' => esc_attr( $h1_line_height ),
					),
					'.elementor-widget-heading h2.elementor-heading-title' => array(
						'line-height' => esc_attr( $h2_line_height ),
					),
					'.elementor-widget-heading h3.elementor-heading-title' => array(
						'line-height' => esc_attr( $h3_line_height ),
					),
					'.elementor-widget-heading h4.elementor-heading-title' => array(
						'line-height' => esc_attr( $h4_line_height ),
					),
					'.elementor-widget-heading h5.elementor-heading-title' => array(
						'line-height' => esc_attr( $h5_line_height ),
					),
					'.elementor-widget-heading h6.elementor-heading-title' => array(
						'line-height' => esc_attr( $h6_line_height ),
					),
				);

				if ( $block_editor_legacy_setup && self::gutenberg_core_patterns_compat() && ! astra_button_default_padding_updated() ) {
					$theme_outline_gb_btn_top_border    = ( isset( $global_custom_button_border_size['top'] ) && ( '' !== $global_custom_button_border_size['top'] && '0' !== $global_custom_button_border_size['top'] ) ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : '2px';
					$theme_outline_gb_btn_right_border  = ( isset( $global_custom_button_border_size['right'] ) && ( '' !== $global_custom_button_border_size['right'] && '0' !== $global_custom_button_border_size['right'] ) ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : '2px';
					$theme_outline_gb_btn_bottom_border = ( isset( $global_custom_button_border_size['bottom'] ) && ( '' !== $global_custom_button_border_size['bottom'] && '0' !== $global_custom_button_border_size['bottom'] ) ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : '2px';
					$theme_outline_gb_btn_left_border   = ( isset( $global_custom_button_border_size['left'] ) && ( '' !== $global_custom_button_border_size['left'] && '0' !== $global_custom_button_border_size['left'] ) ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : '2px';

					$global_button_page_builder_desktop['.wp-block-button .wp-block-button__link']                  = array(
						'border'                     => 'none',
						'background-color'           => esc_attr( $btn_bg_color ),
						'color'                      => esc_attr( $btn_text_color ),
						'font-family'                => astra_get_font_family( $theme_btn_font_family ),
						'font-weight'                => esc_attr( $theme_btn_font_weight ),
						'line-height'                => esc_attr( $theme_btn_line_height ),
						'text-transform'             => esc_attr( $theme_btn_text_transform ),
						'text-decoration'            => esc_attr( $theme_btn_text_decoration ),
						'letter-spacing'             => esc_attr( $theme_btn_letter_spacing ),
						'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'desktop' ),
						'padding'                    => '15px 30px',
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'desktop' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'desktop' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'desktop' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'desktop' ),
					);
					$global_button_page_builder_desktop['.wp-block-button.is-style-outline .wp-block-button__link'] = array(
						'border-style'        => 'solid',
						'border-top-width'    => esc_attr( $theme_outline_gb_btn_top_border ),
						'border-right-width'  => esc_attr( $theme_outline_gb_btn_right_border ),
						'border-left-width'   => esc_attr( $theme_outline_gb_btn_left_border ),
						'border-bottom-width' => esc_attr( $theme_outline_gb_btn_bottom_border ),
						'border-color'        => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'padding-top'         => 'calc(15px - ' . (int) $theme_outline_gb_btn_top_border . 'px)',
						'padding-right'       => 'calc(30px - ' . (int) $theme_outline_gb_btn_right_border . 'px)',
						'padding-bottom'      => 'calc(15px - ' . (int) $theme_outline_gb_btn_bottom_border . 'px)',
						'padding-left'        => 'calc(30px - ' . (int) $theme_outline_gb_btn_left_border . 'px)',
					);

					$global_button_page_builder_tablet = array(
						'.wp-block-button .wp-block-button__link' => array(
							'font-size' => astra_responsive_font( $theme_btn_font_size, 'tablet' ),
							'border'    => 'none',
							'padding'   => '15px 30px',
						),
						'.wp-block-button.is-style-outline .wp-block-button__link' => array(
							'padding-top'    => 'calc(15px - ' . (int) $theme_btn_top_border . 'px)',
							'padding-right'  => 'calc(30px - ' . (int) $theme_btn_right_border . 'px)',
							'padding-bottom' => 'calc(15px - ' . (int) $theme_btn_bottom_border . 'px)',
							'padding-left'   => 'calc(30px - ' . (int) $theme_btn_left_border . 'px)',
						),
					);

					$global_button_page_builder_mobile = array(
						'.wp-block-button .wp-block-button__link' => array(
							'font-size' => astra_responsive_font( $theme_btn_font_size, 'mobile' ),
							'border'    => 'none',
							'padding'   => '15px 30px',
						),
						'.wp-block-button.is-style-outline .wp-block-button__link' => array(
							'padding-top'    => 'calc(15px - ' . (int) $theme_btn_top_border . 'px)',
							'padding-right'  => 'calc(30px - ' . (int) $theme_btn_right_border . 'px)',
							'padding-bottom' => 'calc(15px - ' . (int) $theme_btn_bottom_border . 'px)',
							'padding-left'   => 'calc(30px - ' . (int) $theme_btn_left_border . 'px)',
						),
					);
				} else {

					$default_border_size = '0';
					if ( astra_button_default_padding_updated() || ! $block_editor_legacy_setup ) {
						$default_border_size = '';
					}

					$selector = '.wp-block-button .wp-block-button__link';
					if ( ! $block_editor_legacy_setup ) {
						$selector = $selector . ', .wp-block-search .wp-block-search__button, body .wp-block-file .wp-block-file__button';
					}

					$btn_top_border_size    = ( isset( $global_custom_button_border_size['top'] ) && '' !== $global_custom_button_border_size['top'] ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : $default_border_size;
					$btn_bottom_border_size = ( isset( $global_custom_button_border_size['bottom'] ) && '' !== $global_custom_button_border_size['bottom'] ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : $default_border_size;
					$btn_right_border_size  = ( isset( $global_custom_button_border_size['right'] ) && '' !== $global_custom_button_border_size['right'] ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : $default_border_size;
					$btn_left_border_size   = ( isset( $global_custom_button_border_size['left'] ) && '' !== $global_custom_button_border_size['left'] ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : $default_border_size;

					$global_button_page_builder_desktop[ $selector ] = array(
						'border-style'               => ( $btn_top_border_size || $btn_right_border_size || $btn_left_border_size || $btn_bottom_border_size ) ? 'solid' : '',
						'border-top-width'           => $btn_top_border_size,
						'border-right-width'         => $btn_right_border_size,
						'border-left-width'          => $btn_left_border_size,
						'border-bottom-width'        => $btn_bottom_border_size,
						'border-color'               => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'background-color'           => esc_attr( $btn_bg_color ),
						'color'                      => esc_attr( $btn_text_color ),
						'font-family'                => astra_get_font_family( $theme_btn_font_family ),
						'font-weight'                => esc_attr( $theme_btn_font_weight ),
						'line-height'                => esc_attr( $theme_btn_line_height ),
						'text-transform'             => esc_attr( $theme_btn_text_transform ),
						'text-decoration'            => esc_attr( $theme_btn_text_decoration ),
						'letter-spacing'             => esc_attr( $theme_btn_letter_spacing ),
						'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'desktop' ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'desktop' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'desktop' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'desktop' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'desktop' ),
						'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
						'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
						'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
						'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
					);

					$global_button_page_builder_tablet = array(
						$selector => array(
							'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'tablet' ),
							'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
							'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
							'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
							'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
							'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'tablet' ),
							'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'tablet' ),
							'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'tablet' ),
							'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'tablet' ),
						),
					);

					$global_button_page_builder_mobile = array(
						$selector => array(
							'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'mobile' ),
							'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
							'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
							'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
							'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
							'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'mobile' ),
							'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'mobile' ),
							'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'mobile' ),
							'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'mobile' ),
						),
					);
				}

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_desktop );

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_tablet, '', astra_get_tablet_breakpoint() );
				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $global_button_page_builder_mobile, '', astra_get_mobile_breakpoint() );

			} else {

				$search_button_selector       = $is_wp_5_8_support_enabled ? ', form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button' : '';
				$search_button_hover_selector = $is_wp_5_8_support_enabled ? ', form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:hover, form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button:focus' : '';

				/**
				 * Global button CSS - Desktop.
				 */
				$global_button_desktop = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' . $search_button_selector => array(
						'color'                      => esc_attr( $btn_text_color ),
						'border-color'               => empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color ),
						'background-color'           => esc_attr( $btn_bg_color ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'desktop' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'desktop' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'desktop' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'desktop' ),
						'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ),
						'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ),
						'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ),
						'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ),
						'font-family'                => astra_get_font_family( $theme_btn_font_family ),
						'font-weight'                => esc_attr( $theme_btn_font_weight ),
						'font-size'                  => astra_get_font_css_value( $theme_btn_font_size['desktop'], $theme_btn_font_size['desktop-unit'] ),
						'text-transform'             => esc_attr( $theme_btn_text_transform ),
						'text-decoration'            => esc_attr( $theme_btn_text_decoration ),
						'letter-spacing'             => esc_attr( $theme_btn_letter_spacing ),
					),
					'button:focus, .menu-toggle:hover, button:hover, .ast-button:hover, .ast-custom-button:hover .button:hover, .ast-custom-button:hover, input[type=reset]:hover, input[type=reset]:focus, input#submit:hover, input#submit:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="submit"]:hover, input[type="submit"]:focus' . $search_button_hover_selector => array(
						'color'            => esc_attr( $btn_text_hover_color ),
						'background-color' => esc_attr( $btn_bg_hover_color ),
						'border-color'     => empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color ),
					),
				);

				/**
				 * Global button CSS - Tablet.
				 */
				$global_button_tablet = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' . $search_button_selector => array(
						'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'tablet' ),
						'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'tablet' ),
						'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'tablet' ),
						'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'tablet' ),
						'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'tablet' ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'tablet' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'tablet' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'tablet' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'tablet' ),
					),
				);

				/**
				 * Global button CSS - Mobile.
				 */
				$global_button_mobile = array(
					'.menu-toggle, button, .ast-button, .ast-custom-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' . $search_button_selector => array(
						'padding-top'                => astra_responsive_spacing( $theme_btn_padding, 'top', 'mobile' ),
						'padding-right'              => astra_responsive_spacing( $theme_btn_padding, 'right', 'mobile' ),
						'padding-bottom'             => astra_responsive_spacing( $theme_btn_padding, 'bottom', 'mobile' ),
						'padding-left'               => astra_responsive_spacing( $theme_btn_padding, 'left', 'mobile' ),
						'font-size'                  => astra_responsive_font( $theme_btn_font_size, 'mobile' ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'mobile' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'mobile' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'mobile' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'mobile' ),
					),
				);
			}

			if ( true === $update_customizer_strctural_defaults ) {
				$global_button_desktop['form[CLASS*="wp-block-search__"].wp-block-search .wp-block-search__inside-wrapper .wp-block-search__button.has-icon'] = array(
					'padding-top'    => 'calc(' . astra_responsive_spacing( $theme_btn_padding, 'top', 'desktop' ) . ' - 3px)',
					'padding-right'  => 'calc(' . astra_responsive_spacing( $theme_btn_padding, 'right', 'desktop' ) . ' - 3px)',
					'padding-bottom' => 'calc(' . astra_responsive_spacing( $theme_btn_padding, 'bottom', 'desktop' ) . ' - 3px)',
					'padding-left'   => 'calc(' . astra_responsive_spacing( $theme_btn_padding, 'left', 'desktop' ) . ' - 3px)',
				);
			}

			/* Parse CSS from array() */
			$parse_css .= astra_parse_css( $global_button_desktop );

			$parse_css .= astra_parse_css( $global_button_tablet, '', astra_get_tablet_breakpoint() );

			$parse_css .= astra_parse_css( $global_button_mobile, '', astra_get_mobile_breakpoint() );

			/* Parse CSS from array() -> min-width: (tablet-breakpoint) px CSS  */
			if ( empty( $site_content_width ) ) {
				$container_min_tablet_css = array(
					'.ast-container' => array(
						'max-width' => '100%',
					),
				);
				$parse_css               .= astra_parse_css( $container_min_tablet_css, astra_get_tablet_breakpoint() );
			}

			$container_min_mobile_css = array(
				'.ast-container' => array(
					'max-width' => '100%',
				),
			);

			/**
			 * Global button CSS - -> max-width: (tablet-breakpoint) px.
			 */
			$global_button_tablet = array(
				'.menu-toggle, button, .ast-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'font-size' => astra_get_font_css_value( $theme_btn_font_size['tablet'], $theme_btn_font_size['tablet-unit'] ),
				),
				'.ast-mobile-header-stack .main-header-bar .ast-search-menu-icon' => array(
					'display' => 'inline-block',
				),
				'.ast-header-break-point.ast-header-custom-item-outside .ast-mobile-header-stack .main-header-bar .ast-search-icon' => array(
					'margin' => '0',
				),
				'.ast-comment-avatar-wrap img'             => array(
					'max-width' => '2.5em',
				),
				'.ast-separate-container .ast-comment-list li.depth-1' => array(
					'padding' => '1.5em 2.14em',
				),
				'.ast-separate-container .comment-respond' => array(
					'padding' => '2em 2.14em',
				),
				'.ast-comment-meta'                        => array(
					'padding' => '0 1.8888em 1.3333em',
				),
			);

			/* Parse CSS from array() -> max-width: (tablet-breakpoint) px CSS */
			$parse_css .= astra_parse_css( $global_button_tablet, '', astra_get_tablet_breakpoint() );

			/* Parse CSS from array() -> min-width: (mobile-breakpoint) px CSS  */
			$parse_css .= astra_parse_css( $container_min_mobile_css, astra_get_mobile_breakpoint() );

			$global_button_mobile = array(
				'.ast-separate-container .ast-article-post, .ast-separate-container .ast-article-single, .ast-separate-container .comments-title, .ast-separate-container .ast-archive-description' => array(
					'padding' => '1.5em 1em',
				),
				'.ast-separate-container #content .ast-container' => array(
					'padding-left'  => '0.54em',
					'padding-right' => '0.54em',
				),
				'.ast-separate-container .ast-comment-list li.depth-1' => array(
					'padding'       => '1.5em 1em',
					'margin-bottom' => '1.5em',
				),
				'.ast-separate-container .ast-comment-list .bypostauthor' => array(
					'padding' => '.5em',
				),
				'.ast-search-menu-icon.ast-dropdown-active .search-field' => array(
					'width' => '170px',
				),
				'.menu-toggle, button, .ast-button, .button, input#submit, input[type="button"], input[type="submit"], input[type="reset"]' => array(
					'font-size' => astra_get_font_css_value( $theme_btn_font_size['mobile'], $theme_btn_font_size['mobile-unit'] ),
				),
			);

			if ( 'no-sidebar' !== astra_page_layout() ) {
				$global_button_mobile['.ast-separate-container #secondary']                           = array(
					'padding-top' => 0,
				);
				$global_button_mobile['.ast-separate-container.ast-two-container #secondary .widget'] = array(
					'margin-bottom' => '1.5em',
					'padding-left'  => '1em',
					'padding-right' => '1em',
				);
			}

			// Add/Remove logo max-width: 100%; CSS for logo in old header layout.
			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active && false === self::remove_logo_max_width_mobile_static_css() ) {
				$global_button_mobile['.site-branding img, .site-header .site-logo-img .custom-logo-link img'] = array(
					'max-width' => '100%',
				);
			}

			/* Parse CSS from array() -> max-width: (mobile-breakpoint) px  */
			$parse_css .= astra_parse_css( $global_button_mobile, '', astra_get_mobile_breakpoint() );


			if ( Astra_Builder_Helper::is_component_loaded( 'search', 'header', 'mobile' ) ) {

				if ( $is_site_rtl ) {
					$global_button_tablet_lang_direction_css = array(
						'.ast-header-break-point .ast-search-menu-icon.slide-search .search-form' => array(
							'left' => '0',
						),
						'.ast-header-break-point .ast-mobile-header-stack .ast-search-menu-icon.slide-search .search-form' => array(
							'left' => '-1em',
						),
					);
				} else {
					$global_button_tablet_lang_direction_css = array(
						'.ast-header-break-point .ast-search-menu-icon.slide-search .search-form' => array(
							'right' => '0',
						),
						'.ast-header-break-point .ast-mobile-header-stack .ast-search-menu-icon.slide-search .search-form' => array(
							'right' => '-1em',
						),
					);
				}

				$parse_css .= astra_parse_css( $global_button_tablet_lang_direction_css, '', astra_get_tablet_breakpoint() );
			}

			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active && 'custom-button' === $header_custom_button_style ) {
				$css_output = array(

					// Header button typography stylings.
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button, .ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-family'    => astra_get_font_family( $header_custom_btn_font_family ),
						'font-weight'    => esc_attr( $header_custom_btn_font_weight ),
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'desktop' ),
						'line-height'    => esc_attr( $header_custom_btn_line_height ),
						'text-transform' => esc_attr( $header_custom_btn_text_transform ),
						'letter-spacing' => astra_get_css_value( $header_custom_btn_letter_spacing, 'px' ),
					),

					// Custom menu item button - Default.
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'color'                      => esc_attr( $header_custom_button_text_color ),
						'background-color'           => esc_attr( $header_custom_button_back_color ),
						'padding-top'                => astra_responsive_spacing( $header_custom_button_spacing, 'top', 'desktop' ),
						'padding-bottom'             => astra_responsive_spacing( $header_custom_button_spacing, 'bottom', 'desktop' ),
						'padding-left'               => astra_responsive_spacing( $header_custom_button_spacing, 'left', 'desktop' ),
						'padding-right'              => astra_responsive_spacing( $header_custom_button_spacing, 'right', 'desktop' ),
						'border-top-left-radius'     => astra_responsive_spacing( $btn_border_radius_fields, 'top', 'desktop' ),
						'border-top-right-radius'    => astra_responsive_spacing( $btn_border_radius_fields, 'right', 'desktop' ),
						'border-bottom-right-radius' => astra_responsive_spacing( $btn_border_radius_fields, 'bottom', 'desktop' ),
						'border-bottom-left-radius'  => astra_responsive_spacing( $btn_border_radius_fields, 'left', 'desktop' ),
						'border-style'               => 'solid',
						'border-color'               => esc_attr( $header_custom_button_border_color ),
						'border-top-width'           => ( isset( $header_custom_button_border_size['top'] ) && '' !== $header_custom_button_border_size['top'] ) ? astra_get_css_value( $header_custom_button_border_size['top'], 'px' ) : '0px',
						'border-right-width'         => ( isset( $header_custom_button_border_size['right'] ) && '' !== $header_custom_button_border_size['right'] ) ? astra_get_css_value( $header_custom_button_border_size['right'], 'px' ) : '0px',
						'border-left-width'          => ( isset( $header_custom_button_border_size['left'] ) && '' !== $header_custom_button_border_size['left'] ) ? astra_get_css_value( $header_custom_button_border_size['left'], 'px' ) : '0px',
						'border-bottom-width'        => ( isset( $header_custom_button_border_size['bottom'] ) && '' !== $header_custom_button_border_size['bottom'] ) ? astra_get_css_value( $header_custom_button_border_size['bottom'], 'px' ) : '0px',
					),
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button:hover' => array(
						'color'            => esc_attr( $header_custom_button_text_h_color ),
						'background-color' => esc_attr( $header_custom_button_back_h_color ),
						'border-color'     => esc_attr( $header_custom_button_border_h_color ),
					),

					// Custom menu item button - Transparent.
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'color'               => esc_attr( $header_custom_trans_button_text_color ),
						'background-color'    => esc_attr( $header_custom_trans_button_back_color ),
						'padding-top'         => astra_responsive_spacing( $header_custom_trans_button_spacing, 'top', 'desktop' ),
						'padding-bottom'      => astra_responsive_spacing( $header_custom_trans_button_spacing, 'bottom', 'desktop' ),
						'padding-left'        => astra_responsive_spacing( $header_custom_trans_button_spacing, 'left', 'desktop' ),
						'padding-right'       => astra_responsive_spacing( $header_custom_trans_button_spacing, 'right', 'desktop' ),
						'border-radius'       => astra_get_css_value( $header_custom_trans_button_radius, 'px' ),
						'border-style'        => 'solid',
						'border-color'        => esc_attr( $header_custom_trans_button_border_color ),
						'border-top-width'    => ( isset( $header_custom_trans_button_border_size['top'] ) && '' !== $header_custom_trans_button_border_size['top'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['top'], 'px' ) : '',
						'border-right-width'  => ( isset( $header_custom_trans_button_border_size['right'] ) && '' !== $header_custom_trans_button_border_size['right'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['right'], 'px' ) : '',
						'border-left-width'   => ( isset( $header_custom_trans_button_border_size['left'] ) && '' !== $header_custom_trans_button_border_size['left'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['left'], 'px' ) : '',
						'border-bottom-width' => ( isset( $header_custom_trans_button_border_size['bottom'] ) && '' !== $header_custom_trans_button_border_size['bottom'] ) ? astra_get_css_value( $header_custom_trans_button_border_size['bottom'], 'px' ) : '',
					),
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button:hover' => array(
						'color'            => esc_attr( $header_custom_trans_button_text_h_color ),
						'background-color' => esc_attr( $header_custom_trans_button_back_h_color ),
						'border-color'     => esc_attr( $header_custom_trans_button_border_h_color ),
					),
				);

				/* Parse CSS from array() */
				$parse_css .= astra_parse_css( $css_output );

				/* Parse CSS from array()*/

				/* Custom Menu Item Button */
				$custom_button_css = array(
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'tablet' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_button_spacing, 'top', 'tablet' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_button_spacing, 'bottom', 'tablet' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_button_spacing, 'left', 'tablet' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_button_spacing, 'right', 'tablet' ),
					),
				);

				$custom_trans_button_css = array(
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'tablet' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_trans_button_spacing, 'top', 'tablet' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_trans_button_spacing, 'bottom', 'tablet' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_trans_button_spacing, 'left', 'tablet' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_trans_button_spacing, 'right', 'tablet' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= astra_parse_css( array_merge( $custom_button_css, $custom_trans_button_css ), '', astra_get_tablet_breakpoint() );

				/* Custom Menu Item Button */
				$custom_button = array(
					'.main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'mobile' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_button_spacing, 'top', 'mobile' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_button_spacing, 'bottom', 'mobile' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_button_spacing, 'left', 'mobile' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_button_spacing, 'right', 'mobile' ),
					),
				);

				$custom_trans_button = array(
					'.ast-theme-transparent-header .main-header-bar .button-custom-menu-item .ast-custom-button-link .ast-custom-button' => array(
						'font-size'      => astra_responsive_font( $header_custom_btn_font_size, 'mobile' ),
						'padding-top'    => astra_responsive_spacing( $header_custom_trans_button_spacing, 'top', 'mobile' ),
						'padding-bottom' => astra_responsive_spacing( $header_custom_trans_button_spacing, 'bottom', 'mobile' ),
						'padding-left'   => astra_responsive_spacing( $header_custom_trans_button_spacing, 'left', 'mobile' ),
						'padding-right'  => astra_responsive_spacing( $header_custom_trans_button_spacing, 'right', 'mobile' ),
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= astra_parse_css( array_merge( $custom_button, $custom_trans_button ), '', astra_get_mobile_breakpoint() );
			}

			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
				// Foreground color.
				if ( ! empty( $footer_adv_link_color ) ) {
					$footer_adv_tagcloud = array(
						'.footer-adv .tagcloud a:hover, .footer-adv .tagcloud a.current-item' => array(
							'color' => astra_get_foreground_color( $footer_adv_link_color ),
						),
						'.footer-adv .calendar_wrap #today' => array(
							'color' => astra_get_foreground_color( $footer_adv_link_color ),
						),
					);
					$parse_css          .= astra_parse_css( $footer_adv_tagcloud );
				}
			}

			/* Width for Footer */
			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active && 'content' != $astra_footer_width ) {
				$genral_global_responsive = array(
					'.ast-small-footer .ast-container' => array(
						'max-width'     => '100%',
						'padding-left'  => '35px',
						'padding-right' => '35px',
					),
				);

				/* Parse CSS from array()*/
				$parse_css .= astra_parse_css( $genral_global_responsive, astra_get_tablet_breakpoint( '', 1 ) );
			}

			/* Width for Comments for Full Width / Stretched Template */
			if ( 'page-builder' == $container_layout ) {
				$page_builder_comment = array(
					'.ast-page-builder-template .comments-area, .single.ast-page-builder-template .entry-header, .single.ast-page-builder-template .post-navigation, .single.ast-page-builder-template .ast-single-related-posts-container' => array(
						'max-width'    => astra_get_css_value( $site_content_width + 40, 'px' ),
						'margin-left'  => 'auto',
						'margin-right' => 'auto',
					),
				);
				/* Parse CSS from array()*/
				$parse_css .= astra_parse_css( $page_builder_comment, astra_get_mobile_breakpoint( '', 1 ) );

			}

			$astra_spearate_container_selector = 'body, .ast-separate-container';
			if ( astra_has_gcp_typo_preset_compatibility() && true === astra_apply_content_background_fullwidth_layouts() ) {
				$astra_spearate_container_selector = '.ast-separate-container';
			}

			$separate_container_css = array(
				$astra_spearate_container_selector => astra_get_responsive_background_obj( $box_bg_obj, 'desktop' ),
			);
			$parse_css             .= astra_parse_css( $separate_container_css );

			if ( $block_editor_legacy_setup ) {
				/**
				 * Added new compatibility & layout designs for core block layouts.
				 * - Compatibility for alignwide, alignfull, default width.
				 *
				 * @since 3.7.4
				 */
				$entry_content_selector = '.entry-content';
				if ( true === $improve_gb_ui ) {
					$entry_content_selector           = '.entry-content >';
					$core_blocks_width_desktop_ui_css = array(
						'.entry-content > .wp-block-group, .entry-content > .wp-block-media-text, .entry-content > .wp-block-cover, .entry-content > .wp-block-columns' => array(
							'max-width'    => '58em',
							'width'        => 'calc(100% - 4em)',
							'margin-left'  => 'auto',
							'margin-right' => 'auto',
						),
						'.entry-content [class*="__inner-container"] > .alignfull' => array(
							'max-width'    => '100%',
							'margin-left'  => 0,
							'margin-right' => 0,
						),
						'.entry-content [class*="__inner-container"] > *:not(.alignwide):not(.alignfull):not(.alignleft):not(.alignright)' => array(
							'margin-left'  => 'auto',
							'margin-right' => 'auto',
						),
						'.entry-content [class*="__inner-container"] > *:not(.alignwide):not(p):not(.alignfull):not(.alignleft):not(.alignright):not(.is-style-wide):not(iframe)' => array(
							'max-width' => '50rem',
							'width'     => '100%',
						),
					);

					/* Parse CSS from array -> Desktop CSS. */
					$parse_css .= astra_parse_css( $core_blocks_width_desktop_ui_css );

					$core_blocks_min_width_tablet_ui_css = array(
						'.entry-content > .wp-block-group.alignwide.has-background, .entry-content > .wp-block-group.alignfull.has-background, .entry-content > .wp-block-cover.alignwide, .entry-content > .wp-block-cover.alignfull, .entry-content > .wp-block-columns.has-background.alignwide, .entry-content > .wp-block-columns.has-background.alignfull' => array(
							'margin-top'    => '0',
							'margin-bottom' => '0',
							'padding'       => '6em 4em',
						),
						'.entry-content > .wp-block-columns.has-background' => array(
							'margin-bottom' => '0',
						),
					);

					/* Parse CSS from array -> min-width(tablet-breakpoint) */
					$parse_css .= astra_parse_css( $core_blocks_min_width_tablet_ui_css, astra_get_tablet_breakpoint() );

					$core_blocks_min_width_1200_ui_css = array(
						'.entry-content .alignfull p' => array(
							'max-width' => astra_get_css_value( $site_content_width, 'px' ),
						),
						'.entry-content .alignfull'   => array(
							'max-width' => '100%',
							'width'     => '100%',
						),
						'.ast-page-builder-template .entry-content .alignwide, .entry-content [class*="__inner-container"] > .alignwide' => array(
							'max-width'    => astra_get_css_value( $site_content_width, 'px' ),
							'margin-left'  => '0',
							'margin-right' => '0',
						),
						'.entry-content .alignfull [class*="__inner-container"] > .alignwide' => array(
							'max-width' => '80rem',
						),
					);

					/* Parse CSS from array -> min-width( 1200px ) */
					$parse_css .= astra_parse_css( $core_blocks_min_width_1200_ui_css, '1200' );

					$core_blocks_min_width_mobile_ui_css = array(
						'.site-main .entry-content > .alignwide' => array(
							'margin' => '0 auto',
						),
						'.wp-block-group.has-background, .entry-content > .wp-block-cover, .entry-content > .wp-block-columns.has-background' => array(
							'padding'       => '4em',
							'margin-top'    => '0',
							'margin-bottom' => '0',
						),
						'.entry-content .wp-block-media-text.alignfull .wp-block-media-text__content, .entry-content .wp-block-media-text.has-background .wp-block-media-text__content' => array(
							'padding' => '0 8%',
						),
					);

					/* Parse CSS from array -> min-width(mobile-breakpoint + 1) */
					$parse_css .= astra_parse_css( $core_blocks_min_width_mobile_ui_css, astra_get_mobile_breakpoint( '', 1 ) );
				} else {
					$astra_no_sidebar_layout_css =
						'.ast-no-sidebar.ast-separate-container ' . $entry_content_selector . ' .alignfull {
							margin-left: -6.67em;
							margin-right: -6.67em;
							width: auto;
						}
						@media (max-width: 1200px) {
							.ast-no-sidebar.ast-separate-container ' . $entry_content_selector . ' .alignfull {
								margin-left: -2.4em;
								margin-right: -2.4em;
							}
						}
						@media (max-width: 768px) {
							.ast-no-sidebar.ast-separate-container ' . $entry_content_selector . ' .alignfull {
								margin-left: -2.14em;
								margin-right: -2.14em;
							}
						}
						@media (max-width: 544px) {
							.ast-no-sidebar.ast-separate-container ' . $entry_content_selector . ' .alignfull {
								margin-left: -1em;
								margin-right: -1em;
							}
						}
						.ast-no-sidebar.ast-separate-container ' . $entry_content_selector . ' .alignwide {
							margin-left: -20px;
							margin-right: -20px;
						}

						.ast-no-sidebar.ast-separate-container ' . $entry_content_selector . ' .wp-block-column .alignfull,
						.ast-no-sidebar.ast-separate-container ' . $entry_content_selector . ' .wp-block-column .alignwide {
							margin-left: auto;
							margin-right: auto;
							width: 100%;
						}
					';

					$parse_css .= Astra_Enqueue_Scripts::trim_css( $astra_no_sidebar_layout_css );
				}
			}

			$tablet_typo = array();

			if ( isset( $body_font_size['tablet'] ) && '' != $body_font_size['tablet'] ) {

					$tablet_typo = array(
						// Widget Title.
						'.widget-title' => array(
							'font-size' => astra_get_font_css_value( (int) $body_font_size['tablet'] * 1.428571429, 'px', 'tablet' ),
						),
					);
			}

			/* Tablet Typography */
			$tablet_typography = array(
				'body, button, input, select, textarea, .ast-button, .ast-custom-button' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'tablet' ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'tablet' ),
				),
				'.site-title'                    => array(
					'font-size' => astra_responsive_font( $site_title_font_size, 'tablet' ),
					'display'   => esc_attr( $tablet_title_visibility ),
				),
				'.site-header .site-description' => array(
					'font-size' => astra_responsive_font( $site_tagline_font_size, 'tablet' ),
					'display'   => esc_attr( $tablet_tagline_visibility ),
				),
				'.entry-title'                   => array(
					'font-size' => astra_responsive_font( $archive_post_title_font_size, 'tablet', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a',
					'h1, .entry-content h1'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h1_font_size, 'tablet', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h2, .entry-content h2, .entry-content h2 a',
					'h2, .entry-content h2'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h2_font_size, 'tablet', 25 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h3, .entry-content h3, .entry-content h3 a',
					'h3, .entry-content h3'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h3_font_size, 'tablet', 20 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h4, .entry-content h4, .entry-content h4 a',
					'h4, .entry-content h4'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h4_font_size, 'tablet' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h5, .entry-content h5, .entry-content h5 a',
					'h5, .entry-content h5'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h5_font_size, 'tablet' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h6, .entry-content h6, .entry-content h6 a',
					'h6, .entry-content h6'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h6_font_size, 'tablet' ),
				),
				'.astra-logo-svg'                => array(
					'width' => astra_get_css_value( $header_logo_width['tablet'], 'px' ),
				),
				'.astra-logo-svg:not(.sticky-custom-logo .astra-logo-svg, .transparent-custom-logo .astra-logo-svg, .advanced-header-logo .astra-logo-svg)' => array(
					'height' => astra_get_css_value( ( ! empty( $header_logo_width['tablet-svg-height'] ) && ! is_customize_preview() ) ? $header_logo_width['tablet-svg-height'] : '', 'px' ),
				),
				'header .custom-logo-link img, .ast-header-break-point .site-logo-img .custom-mobile-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['tablet'], 'px' ),
				),
				'body, .ast-separate-container'  => astra_get_responsive_background_obj( $box_bg_obj, 'tablet' ),
			);

			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( array_merge( $tablet_typo, $tablet_typography ), '', astra_get_tablet_breakpoint() );

			$mobile_typo = array();
			if ( isset( $body_font_size['mobile'] ) && '' != $body_font_size['mobile'] ) {
				$mobile_typo = array(
					// Widget Title.
					'.widget-title' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size['mobile'] * 1.428571429, 'px', 'mobile' ),
					),
				);
			}

			/* Mobile Typography */
			$mobile_typography = array(
				'body, button, input, select, textarea, .ast-button, .ast-custom-button' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'mobile' ),
				),
				'#secondary, #secondary button, #secondary input, #secondary select, #secondary textarea' => array(
					'font-size' => astra_responsive_font( $body_font_size, 'mobile' ),
				),
				'.site-title'                    => array(
					'font-size' => astra_responsive_font( $site_title_font_size, 'mobile' ),
					'display'   => esc_attr( $mobile_title_visibility ),
				),
				'.site-header .site-description' => array(
					'font-size' => astra_responsive_font( $site_tagline_font_size, 'mobile' ),
					'display'   => esc_attr( $mobile_tagline_visibility ),
				),
				'.entry-title'                   => array(
					'font-size' => astra_responsive_font( $archive_post_title_font_size, 'mobile', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h1, .entry-content h1, .entry-content h1 a',
					'h1, .entry-content h1'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h1_font_size, 'mobile', 30 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h2, .entry-content h2, .entry-content h2 a',
					'h2, .entry-content h2'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h2_font_size, 'mobile', 25 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h3, .entry-content h3, .entry-content h3 a',
					'h3, .entry-content h3'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h3_font_size, 'mobile', 20 ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h4, .entry-content h4, .entry-content h4 a',
					'h4, .entry-content h4'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h4_font_size, 'mobile' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h5, .entry-content h5, .entry-content h5 a',
					'h5, .entry-content h5'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h5_font_size, 'mobile' ),
				),

				// Conditionally select the css selectors with or without achors.
				self::conditional_headings_css_selectors(
					'h6, .entry-content h6, .entry-content h6 a',
					'h6, .entry-content h6'
				)                                => array(
					'font-size' => astra_responsive_font( $heading_h6_font_size, 'mobile' ),
				),
				'header .custom-logo-link img, .ast-header-break-point .site-branding img, .ast-header-break-point .custom-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
				'.astra-logo-svg'                => array(
					'width' => astra_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
				'.astra-logo-svg:not(.sticky-custom-logo .astra-logo-svg, .transparent-custom-logo .astra-logo-svg, .advanced-header-logo .astra-logo-svg)' => array(
					'height' => astra_get_css_value( ( ! empty( $header_logo_width['mobile-svg-height'] ) && ! is_customize_preview() ) ? $header_logo_width['mobile-svg-height'] : '', 'px' ),
				),
				'.ast-header-break-point .site-logo-img .custom-mobile-logo-link img' => array(
					'max-width' => astra_get_css_value( $header_logo_width['mobile'], 'px' ),
				),
				'body, .ast-separate-container'  => astra_get_responsive_background_obj( $box_bg_obj, 'mobile' ),
			);

			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( array_merge( $mobile_typo, $mobile_typography ), '', astra_get_mobile_breakpoint() );

			/*
			 *  Responsive Font Size for Tablet & Mobile to the root HTML element
			 */

			// Tablet Font Size for HTML tag.
			if ( '' == $body_font_size['tablet'] ) {
				$html_tablet_typography = array(
					'html' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
				$parse_css             .= astra_parse_css( $html_tablet_typography, '', astra_get_tablet_breakpoint() );
			}
			// Mobile Font Size for HTML tag.
			if ( '' == $body_font_size['mobile'] ) {
				$html_mobile_typography = array(
					'html' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 5.7, '%' ),
					),
				);
			} else {
				$html_mobile_typography = array(
					'html' => array(
						'font-size' => astra_get_font_css_value( (int) $body_font_size_desktop * 6.25, '%' ),
					),
				);
			}
			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( $html_mobile_typography, '', astra_get_mobile_breakpoint() );

			/* Site width Responsive */
			$site_width = array(
				'.ast-container' => array(
					'max-width' => astra_get_css_value( $site_content_width + 40, 'px' ),
				),
			);

			/* Parse CSS from array()*/
			$parse_css .= astra_parse_css( $site_width, astra_get_tablet_breakpoint( '', 1 ) );

			/* Narrow width container layout dynamic css */

			// Global.
			$parse_css .= astra_narrow_container_width( $container_layout, $narrow_container_max_width );

			$post_type = strval( get_post_type() );
			if ( is_singular() ) {
				// Single layouts.
				$single_container_layout = astra_get_option( 'single-' . $post_type . '-content-layout', '' );
				$parse_css              .= astra_narrow_container_width( $single_container_layout, $narrow_container_max_width );
			} else {
				// Archive layouts.
				$archive_container_layout = astra_get_option( 'archive-' . $post_type . '-content-layout', '' );
				$parse_css               .= astra_narrow_container_width( $archive_container_layout, $narrow_container_max_width );
			}

			// Page Meta.
			$parse_css .= astra_narrow_container_width( astra_get_option_meta( 'site-content-layout', '', true ), $narrow_container_max_width );

			if ( Astra_Builder_Helper::apply_flex_based_css() ) {
				$max_site_container_css = array(
					'.site-content .ast-container' => array(
						'display' => 'flex',
					),
				);
				$parse_css             .= astra_parse_css( $max_site_container_css, astra_get_tablet_breakpoint( '', 1 ) );

				$min_site_container_css = array(
					'.site-content .ast-container' => array(
						'flex-direction' => 'column',
					),
				);
				$parse_css             .= astra_parse_css( $min_site_container_css, '', astra_get_tablet_breakpoint() );
			}

			/**
			 * Astra Fonts
			 */
			if ( apply_filters( 'astra_enable_default_fonts', true ) ) {
				$astra_fonts          = '@font-face {';
					$astra_fonts     .= 'font-family: "Astra";';
					$astra_fonts     .= 'src: url(' . ASTRA_THEME_URI . 'assets/fonts/astra.woff) format("woff"),';
						$astra_fonts .= 'url(' . ASTRA_THEME_URI . 'assets/fonts/astra.ttf) format("truetype"),';
						$astra_fonts .= 'url(' . ASTRA_THEME_URI . 'assets/fonts/astra.svg#astra) format("svg");';
					$astra_fonts     .= 'font-weight: normal;';
					$astra_fonts     .= 'font-style: normal;';
					$astra_fonts     .= 'font-display: ' . astra_get_fonts_display_property() . ';';
				$astra_fonts         .= '}';
				$parse_css           .= $astra_fonts;
			}

			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
				/**
				 * Hide the default naviagtion markup for responsive devices.
				 * Once class .ast-header-break-point is added to the body below CSS will be override by the
				 * .ast-header-break-point class
				 */
				$astra_navigation  = '@media (max-width:' . $header_break_point . 'px) {';
				$astra_navigation .= '.main-header-bar .main-header-bar-navigation{';
				$astra_navigation .= 'display:none;';
				$astra_navigation .= '}';
				$astra_navigation .= '}';
				$parse_css        .= $astra_navigation;
			}

			/* Blog */
			if ( 'custom' === $blog_width ) :

				/* Site width Responsive */
				$blog_css   = array(
					'.blog .site-content > .ast-container, .archive .site-content > .ast-container, .search .site-content > .ast-container' => array(
						'max-width' => astra_get_css_value( $blog_max_width, 'px' ),
					),
				);
				$parse_css .= astra_parse_css( $blog_css, astra_get_tablet_breakpoint( '', 1 ) );
			endif;

			/* Single Blog */
			if ( 'custom' === $single_post_max ) :

				/* Site width Responsive */
				$single_blog_css = array(
					'.single-post .site-content > .ast-container' => array(
						'max-width' => astra_get_css_value( $single_post_max_width, 'px' ),
					),
				);
				$parse_css      .= astra_parse_css( $single_blog_css, astra_get_tablet_breakpoint( '', 1 ) );
			endif;

			// Primary Submenu Border Width & Color.
			$submenu_border_style = array(
				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu, .ast-desktop .main-header-menu.submenu-with-border .astra-full-megamenu-wrapper' => array(
					'border-color' => esc_attr( $primary_submenu_b_color ),
				),

				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu' => array(
					'border-top-width'    => astra_get_css_value( $submenu_border['top'], 'px' ),
					'border-right-width'  => astra_get_css_value( $submenu_border['right'], 'px' ),
					'border-left-width'   => astra_get_css_value( $submenu_border['left'], 'px' ),
					'border-bottom-width' => astra_get_css_value( $submenu_border['bottom'], 'px' ),
					'border-style'        => 'solid',
				),
				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu .sub-menu' => array(
					'top' => ( isset( $submenu_border['top'] ) && '' != $submenu_border['top'] ) ? astra_get_css_value( '-' . $submenu_border['top'], 'px' ) : '',
				),
				'.ast-desktop .main-header-menu.submenu-with-border .sub-menu .menu-link, .ast-desktop .main-header-menu.submenu-with-border .children .menu-link' => array(
					'border-bottom-width' => ( $primary_submenu_item_border ) ? '1px' : '0px',
					'border-style'        => 'solid',
					'border-color'        => esc_attr( $primary_submenu_item_b_color ),
				),
			);

			// Submenu items goes outside?
			$submenu_border_for_left_align_menu = array(
				'.main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu:hover > .sub-menu, .main-header-menu .sub-menu .menu-item.ast-left-align-sub-menu.focus > .sub-menu' => array(
					'margin-left' => ( ( isset( $submenu_border['left'] ) && '' != $submenu_border['left'] ) || isset( $submenu_border['right'] ) && '' != $submenu_border['right'] ) ? astra_get_css_value( '-' . ( (int) $submenu_border['left'] + (int) $submenu_border['right'] ), 'px' ) : '',
				),
			);

			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
				$parse_css .= astra_parse_css( $submenu_border_style );
			}

			// Submenu items goes outside?
			$parse_css .= astra_parse_css( $submenu_border_for_left_align_menu, astra_get_tablet_breakpoint( '', 1 ) );

			/* Small Footer CSS */
			if ( false === Astra_Builder_Helper::$is_header_footer_builder_active && 'disabled' != $small_footer_layout ) :
				$sml_footer_css = array(
					'.ast-small-footer' => array(
						'border-top-style' => 'solid',
						'border-top-width' => astra_get_css_value( $small_footer_divider, 'px' ),
						'border-top-color' => esc_attr( $small_footer_divider_color ),
					),
				);
				$parse_css     .= astra_parse_css( $sml_footer_css );

				if ( 'footer-sml-layout-2' != $small_footer_layout ) {
					$sml_footer_css = array(
						'.ast-small-footer-wrap' => array(
							'text-align' => 'center',
						),
					);
					$parse_css     .= astra_parse_css( $sml_footer_css );
				}
			endif;

			/* Transparent Header - Comonent header specific CSS compatibility */
			if ( true === Astra_Builder_Helper::$is_header_footer_builder_active && Astra_Ext_Transparent_Header_Markup::is_transparent_header() ) {

				$html_text_color   = astra_get_option( 'transparent-header-html-text-color' );
				$html_link_color   = astra_get_option( 'transparent-header-html-link-color' );
				$html_link_h_color = astra_get_option( 'transparent-header-html-link-h-color' );

				$search_icon_color = astra_get_option( 'transparent-header-search-icon-color' );
				$search_text_color = astra_get_option( 'transparent-header-search-box-placeholder-color' );

				$search_box_bg_color = astra_get_option( 'transparent-header-search-box-background-color' );

				$social_color          = astra_get_option( 'transparent-header-social-icons-color' );
				$social_hover_color    = astra_get_option( 'transparent-header-social-icons-h-color' );
				$social_bg_color       = astra_get_option( 'transparent-header-social-icons-bg-color' );
				$social_bg_hover_color = astra_get_option( 'transparent-header-social-icons-bg-h-color' );

				$button_color      = astra_get_option( 'transparent-header-button-text-color' );
				$button_h_color    = astra_get_option( 'transparent-header-button-text-h-color' );
				$button_bg_color   = astra_get_option( 'transparent-header-button-bg-color' );
				$button_bg_h_color = astra_get_option( 'transparent-header-button-bg-h-color' );

				$divider_color                = astra_get_option( 'transparent-header-divider-color' );
				$account_icon_color           = astra_get_option( 'transparent-account-icon-color' );
				$account_loggedout_text_color = astra_get_option( 'transparent-account-type-text-color' );

				// Menu colors.
				$account_menu_color           = astra_get_option( 'transparent-account-menu-color' );
				$account_menu_bg_color        = astra_get_option( 'transparent-account-menu-bg-obj' );
				$account_menu_color_hover     = astra_get_option( 'transparent-account-menu-h-color' );
				$account_menu_bg_color_hover  = astra_get_option( 'transparent-account-menu-h-bg-color' );
				$account_menu_color_active    = astra_get_option( 'transparent-account-menu-a-color' );
				$account_menu_bg_color_active = astra_get_option( 'transparent-account-menu-a-bg-color' );

				$transparent_header_builder_desktop_css = array(
					'.ast-theme-transparent-header [CLASS*="ast-header-html-"] .ast-builder-html-element' => array(
						'color' => esc_attr( $html_text_color ),
					),
					'.ast-theme-transparent-header [CLASS*="ast-header-html-"] .ast-builder-html-element a' => array(
						'color' => esc_attr( $html_link_color ),
					),
					'.ast-theme-transparent-header [CLASS*="ast-header-html-"] .ast-builder-html-element a:hover' => array(
						'color' => esc_attr( $html_link_h_color ),
					),
					'.ast-theme-transparent-header .ast-header-search .astra-search-icon, .ast-theme-transparent-header .ast-header-search .search-field::placeholder, .ast-theme-transparent-header .ast-header-search .ast-icon'         => array(
						'color' => esc_attr( $search_icon_color ),
					),
					'.ast-theme-transparent-header .ast-header-search .ast-search-menu-icon .search-field, .ast-theme-transparent-header .ast-header-search .ast-search-menu-icon .search-field::placeholder'         => array(
						'color' => esc_attr( $search_text_color ),
					),
					'.ast-theme-transparent-header .ast-header-search .ast-search-menu-icon .search-field, .ast-theme-transparent-header .ast-header-search .ast-search-menu-icon .search-form, .ast-theme-transparent-header .ast-header-search .ast-search-menu-icon .search-submit'         => array(
						'background-color' => esc_attr( $search_box_bg_color ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element' => array(
						'background' => esc_attr( $social_bg_color['desktop'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element svg' => array(
						'fill' => esc_attr( $social_color['desktop'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover' => array(
						'background' => esc_attr( $social_bg_hover_color['desktop'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover svg' => array(
						'fill' => esc_attr( $social_hover_color['desktop'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element .social-item-label' => array(
						'color' => esc_attr( $social_color['desktop'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover .social-item-label' => array(
						'color' => esc_attr( $social_hover_color['desktop'] ),
					),
					'.ast-theme-transparent-header [CLASS*="ast-header-button-"] .ast-custom-button' => array(
						'color'      => esc_attr( $button_color ),
						'background' => esc_attr( $button_bg_color ),
					),
					'.ast-theme-transparent-header [CLASS*="ast-header-button-"] .ast-custom-button:hover' => array(
						'color'      => esc_attr( $button_h_color ),
						'background' => esc_attr( $button_bg_h_color ),
					),
					'.ast-theme-transparent-header .ast-header-divider-element .ast-divider-wrapper'         => array(
						'border-color' => esc_attr( $divider_color ),
					),
					'.ast-theme-transparent-header .ast-header-account-wrap .ast-header-account-type-icon .ahfb-svg-iconset svg path:not(.ast-hf-account-unfill), .ast-theme-transparent-header .ast-header-account-wrap .ast-header-account-type-icon .ahfb-svg-iconset svg circle' => array(
						'fill' => esc_attr( $account_icon_color ),
					),
					'.ast-theme-transparent-header .ast-header-account-wrap .ast-account-nav-menu .menu-item .menu-link'         => array(
						'color' => esc_attr( $account_menu_color ),
					),
					'.ast-theme-transparent-header .ast-header-account-wrap .ast-account-nav-menu .menu-item:hover > .menu-link'    => array(
						'color'      => $account_menu_color_hover,
						'background' => $account_menu_bg_color_hover,
					),
					'.ast-theme-transparent-header .ast-header-account-wrap .ast-account-nav-menu .menu-item.current-menu-item > .menu-link' => array(
						'color'      => $account_menu_color_active,
						'background' => $account_menu_bg_color_active,
					),
					'.ast-theme-transparent-header .ast-header-account-wrap .account-main-navigation ul' => array(
						'background' => $account_menu_bg_color,
					),
					'.ast-theme-transparent-header .ast-header-account-wrap .ast-header-account-text' => array(
						'color' => $account_loggedout_text_color,
					),
				);

				if ( ! astra_remove_widget_design_options() ) {

					$widget_title_color      = astra_get_option( 'transparent-header-widget-title-color' );
					$widget_content_color    = astra_get_option( 'transparent-header-widget-content-color' );
					$widget_link_color       = astra_get_option( 'transparent-header-widget-link-color' );
					$widget_link_hover_color = astra_get_option( 'transparent-header-widget-link-h-color' );

					$transparent_header_builder_desktop_css['.ast-theme-transparent-header .widget-area.header-widget-area .widget-title']                     = array(
						'color' => esc_attr( $widget_title_color ),
					);
					$transparent_header_builder_desktop_css['.ast-theme-transparent-header .widget-area.header-widget-area .header-widget-area-inner']         = array(
						'color' => esc_attr( $widget_content_color ),
					);
					$transparent_header_builder_desktop_css['.ast-theme-transparent-header .widget-area.header-widget-area .header-widget-area-inner a']       = array(
						'color' => esc_attr( $widget_link_color ),
					);
					$transparent_header_builder_desktop_css['.ast-theme-transparent-header .widget-area.header-widget-area .header-widget-area-inner a:hover'] = array(
						'color' => esc_attr( $widget_link_hover_color ),
					);

					if ( Astra_Builder_Helper::apply_flex_based_css() ) {
						$transparent_header_widget_selector = '.ast-theme-transparent-header .widget-area.header-widget-area.header-widget-area-inner';
					} else {
						$transparent_header_widget_selector = '.ast-theme-transparent-header .widget-area.header-widget-area. header-widget-area-inner';
					}

					$transparent_header_builder_desktop_css[ $transparent_header_widget_selector ]              = array(
						'color' => esc_attr( $widget_content_color ),
					);
					$transparent_header_builder_desktop_css[ $transparent_header_widget_selector . ' a' ]       = array(
						'color' => esc_attr( $widget_link_color ),
					);
					$transparent_header_builder_desktop_css[ $transparent_header_widget_selector . ' a:hover' ] = array(
						'color' => esc_attr( $widget_link_hover_color ),
					);
				}

				if ( Astra_Builder_Helper::is_component_loaded( 'mobile-trigger', 'header', 'mobile' ) ) {

					$transparent_toggle_selector = '.ast-theme-transparent-header [data-section="section-header-mobile-trigger"]';

					$trigger_bg           = astra_get_option( 'transparent-header-toggle-btn-bg-color' );
					$trigger_border_color = astra_get_option( 'transparent-header-toggle-border-color', $trigger_bg );
					$style                = astra_get_option( 'mobile-header-toggle-btn-style' );
					$default              = '#ffffff';

					if ( 'fill' !== $style ) {
						$default = $theme_color;
					}

					$icon_color = astra_get_option( 'transparent-header-toggle-btn-color' );

					/**
					 * Off-Canvas CSS.
					 */
					$transparent_header_builder_desktop_css[ $transparent_toggle_selector . ' .ast-button-wrap .mobile-menu-toggle-icon .ast-mobile-svg' ] = array(
						'fill' => $icon_color,
					);

					$transparent_header_builder_desktop_css[ $transparent_toggle_selector . ' .ast-button-wrap .mobile-menu-wrap .mobile-menu' ] = array(
						// Color.
						'color' => $icon_color,
					);

					if ( 'fill' === $style ) {
						$transparent_header_builder_desktop_css[ $transparent_toggle_selector . ' .ast-button-wrap .ast-mobile-menu-trigger-fill' ] = array(
							'background' => esc_attr( $trigger_bg ),
						);
						$transparent_header_builder_desktop_css[ $transparent_toggle_selector . ' .ast-button-wrap .ast-mobile-menu-trigger-fill, ' . $transparent_toggle_selector . ' .ast-button-wrap .ast-mobile-menu-trigger-minimal' ] = array(
							// Color & Border.
							'color'  => esc_attr( $icon_color ),
							'border' => 'none',
						);
					} elseif ( 'outline' === $style ) {
						$transparent_header_builder_desktop_css[ $transparent_toggle_selector . ' .ast-button-wrap .ast-mobile-menu-trigger-outline' ] = array(
							// Background.
							'background'   => 'transparent',
							'color'        => esc_attr( $icon_color ),
							'border-color' => $trigger_border_color,
						);
					} else {
						$transparent_header_builder_desktop_css[ $transparent_toggle_selector . ' .ast-button-wrap .ast-mobile-menu-trigger-minimal' ] = array(
							'background' => 'transparent',
						);
					}
				}

				$parse_css .= astra_parse_css( $transparent_header_builder_desktop_css );

				/**
				 * Max-width: Tablet Breakpoint CSS.
				 */
				$transparent_header_builder_tablet_css = array(
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element' => array(
						'background' => esc_attr( $social_bg_color['tablet'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element svg' => array(
						'fill' => esc_attr( $social_color['tablet'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover' => array(
						'background' => esc_attr( $social_bg_hover_color['tablet'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover svg' => array(
						'fill' => esc_attr( $social_hover_color['tablet'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element .social-item-label' => array(
						'color' => esc_attr( $social_color['tablet'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover .social-item-label' => array(
						'color' => esc_attr( $social_hover_color['tablet'] ),
					),
				);

				$parse_css .= astra_parse_css( $transparent_header_builder_tablet_css, '', astra_get_tablet_breakpoint() );

				/**
				 * Max-width: Mobile Breakpoint CSS.
				 */
				$transparent_header_builder_mobile_css = array(
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element' => array(
						'background' => esc_attr( $social_bg_color['mobile'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element svg' => array(
						'fill' => esc_attr( $social_color['mobile'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover' => array(
						'background' => esc_attr( $social_bg_hover_color['mobile'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover svg' => array(
						'fill' => esc_attr( $social_hover_color['mobile'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element .social-item-label' => array(
						'color' => esc_attr( $social_color['mobile'] ),
					),
					'.ast-theme-transparent-header .ast-header-social-wrap .ast-social-color-type-custom .ast-builder-social-element:hover .social-item-label' => array(
						'color' => esc_attr( $social_hover_color['mobile'] ),
					),
				);

				$parse_css .= astra_parse_css( $transparent_header_builder_mobile_css, '', astra_get_mobile_breakpoint() );
			}

			if ( self::astra_list_block_vertical_spacing() ) {
				$list_spacing_css = array(
					'.entry-content li > p' => array(
						'margin-bottom' => 0,
					),
				);
				$parse_css       .= astra_parse_css( $list_spacing_css );
			}

			$parse_css .= $dynamic_css;
			$custom_css = astra_get_option( 'custom-css' );

			if ( '' != $custom_css ) {
				$parse_css .= $custom_css;
			}

			// trim white space for faster page loading.
			$parse_css = Astra_Enqueue_Scripts::trim_css( $parse_css );

			return apply_filters( 'astra_theme_dynamic_css', $parse_css );

		}

		/**
		 * Return post meta CSS
		 *
		 * @param  string $dynamic_css          Astra Dynamic CSS.
		 * @param  string $dynamic_css_filtered Astra Dynamic CSS Filters.
		 * @return mixed              Return the CSS.
		 */
		public static function return_meta_output( $dynamic_css, $dynamic_css_filtered = '' ) {

			/**
			 * - Page Layout
			 *
			 *   - Sidebar Positions CSS
			 */
			$secondary_width = absint( astra_get_option( 'site-sidebar-width' ) );
			$primary_width   = absint( 100 - $secondary_width );
			$meta_style      = '';

			// Header Separator.
			$header_separator       = astra_get_option( 'header-main-sep' );
			$header_separator_color = astra_get_option( 'header-main-sep-color' );

			$meta_style = array(
				'.ast-header-break-point .main-header-bar' => array(
					'border-bottom-width' => astra_get_css_value( $header_separator, 'px' ),
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css = astra_parse_css( $meta_style );

			$meta_style = array(
				'.main-header-bar' => array(
					'border-bottom-width' => astra_get_css_value( $header_separator, 'px' ),
					'border-bottom-color' => esc_attr( $header_separator_color ),
				),
			);

			$parse_css .= astra_parse_css( $meta_style, astra_get_tablet_breakpoint( '', 1 ) );

			if ( 'no-sidebar' !== astra_page_layout() ) :

				$meta_style = array(
					'#primary'   => array(
						'width' => astra_get_css_value( $primary_width, '%' ),
					),
					'#secondary' => array(
						'width' => astra_get_css_value( strval( $secondary_width ), '%' ),
					),
				);

				$parse_css .= astra_parse_css( $meta_style, astra_get_tablet_breakpoint( '', 1 ) );

			endif;

			if ( false === self::astra_submenu_below_header_fix() ) :
				// If submenu below header fix is not to be loaded then add removed flex properties from class `ast-flex`.
				// Also restore the padding to class `main-header-bar`.
				$submenu_below_header = array(
					'.ast-flex'          => array(
						'-webkit-align-content' => 'center',
						'-ms-flex-line-pack'    => 'center',
						'align-content'         => 'center',
						'-webkit-box-align'     => 'center',
						'-webkit-align-items'   => 'center',
						'-moz-box-align'        => 'center',
						'-ms-flex-align'        => 'center',
						'align-items'           => 'center',
					),
					'.main-header-bar'   => array(
						'padding' => '1em 0',
					),
					'.ast-site-identity' => array(
						'padding' => '0',
					),
					// CSS to open submenu just below menu.
					'.header-main-layout-1 .ast-flex.main-header-container, .header-main-layout-3 .ast-flex.main-header-container' => array(
						'-webkit-align-content' => 'center',
						'-ms-flex-line-pack'    => 'center',
						'align-content'         => 'center',
						'-webkit-box-align'     => 'center',
						'-webkit-align-items'   => 'center',
						'-moz-box-align'        => 'center',
						'-ms-flex-align'        => 'center',
						'align-items'           => 'center',
					),
				);

				$parse_css .= astra_parse_css( $submenu_below_header );

			else :
				// `.menu-item` required display:flex, although weight of this css increases because of which custom CSS added from child themes to be not working.
				// Hence this is added to dynamic CSS which will be applied only if this filter `astra_submenu_below_header_fix` is enabled.
				// @see https://github.com/brainstormforce/astra/pull/828
				$submenu_below_header = array(
					'.main-header-menu .menu-item, #astra-footer-menu .menu-item, .main-header-bar .ast-masthead-custom-menu-items' => array(
						'-js-display'             => 'flex',
						'display'                 => '-webkit-box',
						'display'                 => '-webkit-flex',
						'display'                 => '-moz-box',
						'display'                 => '-ms-flexbox',
						'display'                 => 'flex',
						'-webkit-box-pack'        => 'center',
						'-webkit-justify-content' => 'center',
						'-moz-box-pack'           => 'center',
						'-ms-flex-pack'           => 'center',
						'justify-content'         => 'center',
						'-webkit-box-orient'      => 'vertical',
						'-webkit-box-direction'   => 'normal',
						'-webkit-flex-direction'  => 'column',
						'-moz-box-orient'         => 'vertical',
						'-moz-box-direction'      => 'normal',
						'-ms-flex-direction'      => 'column',
						'flex-direction'          => 'column',
					),
					'.main-header-menu > .menu-item > .menu-link, #astra-footer-menu > .menu-item > .menu-link' => array(
						'height'              => '100%',
						'-webkit-box-align'   => 'center',
						'-webkit-align-items' => 'center',
						'-moz-box-align'      => 'center',
						'-ms-flex-align'      => 'center',
						'align-items'         => 'center',
						'-js-display'         => 'flex',
						'display'             => '-webkit-box',
						'display'             => '-webkit-flex',
						'display'             => '-moz-box',
						'display'             => '-ms-flexbox',
						'display'             => 'flex',
					),
				);

				if ( false === Astra_Builder_Helper::$is_header_footer_builder_active ) {
					$submenu_below_header['.ast-primary-menu-disabled .main-header-bar .ast-masthead-custom-menu-items'] = array(
						'flex' => 'unset',
					);
				}

				$parse_css .= astra_parse_css( $submenu_below_header );

			endif;

			if ( false === self::astra_submenu_open_below_header_fix() ) {
				// If submenu below header fix is not to be loaded then add removed flex properties from class `ast-flex`.
				// Also restore the padding to class `main-header-bar`.
				$submenu_below_header = array(
					// CSS to open submenu just below menu.
					'.header-main-layout-1 .ast-flex.main-header-container, .header-main-layout-3 .ast-flex.main-header-container' => array(
						'-webkit-align-content' => 'center',
						'-ms-flex-line-pack'    => 'center',
						'align-content'         => 'center',
						'-webkit-box-align'     => 'center',
						'-webkit-align-items'   => 'center',
						'-moz-box-align'        => 'center',
						'-ms-flex-align'        => 'center',
						'align-items'           => 'center',
					),
				);

				$parse_css .= astra_parse_css( $submenu_below_header );
			}

			$submenu_toggle = '';
			$is_site_rtl    = is_rtl();

			if ( false === Astra_Icons::is_svg_icons() ) {
				// Update styles depend on RTL sites.
				$transform_svg_style            = 'translate(0,-50%) rotate(270deg)';
				$transform_nested_svg_transform = 'translate(0, -2px) rotateZ(270deg)';
				$default_left_rtl_right         = 'left';
				$default_right_rtl_left         = 'right';
				if ( $is_site_rtl ) {
					$transform_svg_style            = 'translate(0,-50%) rotate(90deg)';
					$transform_nested_svg_transform = 'translate(0, -2px) rotateZ(90deg)';
					$default_left_rtl_right         = 'right';
					$default_right_rtl_left         = 'left';
				}
				$submenu_toggle = array(
					// HFB / Old Header Footer - CSS compatibility when SVGs are disabled.
					'.main-header-menu .sub-menu .menu-item.menu-item-has-children > .menu-link:after' => array(
						'position'              => 'absolute',
						$default_right_rtl_left => '1em',
						'top'                   => '50%',
						'transform'             => $transform_svg_style,
					),
					'.ast-header-break-point .main-header-bar .main-header-bar-navigation .page_item_has_children > .ast-menu-toggle::before, .ast-header-break-point .main-header-bar .main-header-bar-navigation .menu-item-has-children > .ast-menu-toggle::before, .ast-mobile-popup-drawer .main-header-bar-navigation .menu-item-has-children>.ast-menu-toggle::before, .ast-header-break-point .ast-mobile-header-wrap .main-header-bar-navigation .menu-item-has-children > .ast-menu-toggle::before' => array(
						'font-weight'     => 'bold',
						'content'         => '"\e900"',
						'font-family'     => 'Astra',
						'text-decoration' => 'inherit',
						'display'         => 'inline-block',
					),
					'.ast-header-break-point .main-navigation ul.sub-menu .menu-item .menu-link:before' => array(
						'content'         => '"\e900"',
						'font-family'     => 'Astra',
						'font-size'       => '.65em',
						'text-decoration' => 'inherit',
						'display'         => 'inline-block',
						'transform'       => $transform_nested_svg_transform,
						'margin-' . $default_right_rtl_left => '5px',
					),
					'.widget_search .search-form:after' => array(
						'font-family'           => 'Astra',
						'font-size'             => '1.2em',
						'font-weight'           => 'normal',
						'content'               => '"\e8b6"',
						'position'              => 'absolute',
						'top'                   => '50%',
						$default_right_rtl_left => '15px',
						'transform'             => 'translate(0, -50%)',
					),
					'.astra-search-icon::before'        => array(
						'content'                 => '"\e8b6"',
						'font-family'             => 'Astra',
						'font-style'              => 'normal',
						'font-weight'             => 'normal',
						'text-decoration'         => 'inherit',
						'text-align'              => 'center',
						'-webkit-font-smoothing'  => 'antialiased',
						'-moz-osx-font-smoothing' => 'grayscale',
						'z-index'                 => '3',
					),
					'.main-header-bar .main-header-bar-navigation .page_item_has_children > a:after, .main-header-bar .main-header-bar-navigation .menu-item-has-children > a:after, .menu-item-has-children .ast-header-navigation-arrow:after' => array(
						'content'                 => '"\e900"',
						'display'                 => 'inline-block',
						'font-family'             => 'Astra',
						'font-size'               => '9px',
						'font-size'               => '.6rem',
						'font-weight'             => 'bold',
						'text-rendering'          => 'auto',
						'-webkit-font-smoothing'  => 'antialiased',
						'-moz-osx-font-smoothing' => 'grayscale',
						'margin-' . $default_left_rtl_right => '10px',
						'line-height'             => 'normal',
					),

					'.menu-item-has-children .sub-menu .ast-header-navigation-arrow:after' => array(
						'margin-left' => '0',
					),

					'.ast-mobile-popup-drawer .main-header-bar-navigation .ast-submenu-expanded>.ast-menu-toggle::before' => array(
						'transform' => 'rotateX(180deg)',
					),
					'.ast-header-break-point .main-header-bar-navigation .menu-item-has-children > .menu-link:after' => array(
						'display' => 'none',
					),
				);
			} else {
				if ( ! Astra_Builder_Helper::$is_header_footer_builder_active ) {
					// Update styles depend on RTL sites.
					$transform_svg_style            = 'translate(0,-50%) rotate(270deg)';
					$transform_nested_svg_transform = 'translate(0, -2px) rotateZ(270deg)';
					$default_left_rtl_right         = 'left';
					$default_right_rtl_left         = 'right';
					if ( $is_site_rtl ) {
						$transform_svg_style            = 'translate(0,-50%) rotate(900deg)';
						$transform_nested_svg_transform = 'translate(0, -2px) rotateZ(90deg)';
						$default_left_rtl_right         = 'right';
						$default_right_rtl_left         = 'left';
					}
					$submenu_toggle = array(
						// Old Header Footer - SVG Support.
						'.ast-desktop .main-header-menu .sub-menu .menu-item.menu-item-has-children>.menu-link .icon-arrow svg' => array(
							'position'              => 'absolute',
							$default_right_rtl_left => '.6em',
							'top'                   => '50%',
							'transform'             => $transform_svg_style,
						),
						'.ast-header-break-point .main-navigation ul .menu-item .menu-link .icon-arrow:first-of-type svg' => array(
							$default_left_rtl_right => '.1em',
							'top'                   => '.1em',
							'transform'             => $transform_nested_svg_transform,
						),
					);
				} else {
					$transform_svg_style    = 'translate(0, -2px) rotateZ(270deg)';
					$default_left_rtl_right = 'left';
					if ( $is_site_rtl ) {
						$transform_svg_style    = 'translate(0, -2px) rotateZ(90deg)';
						$default_left_rtl_right = 'right';
					}
					$submenu_toggle = array(
						// New Header Footer - SVG Support.
						'.ast-header-break-point .main-navigation ul .menu-item .menu-link .icon-arrow:first-of-type svg' => array(
							'top'        => '.2em',
							'margin-top' => '0px',
							'margin-' . $default_left_rtl_right => '0px',
							'width'      => '.65em',
							'transform'  => $transform_svg_style,
						),
						'.ast-mobile-popup-content .ast-submenu-expanded > .ast-menu-toggle' => array(
							'transform'  => 'rotateX(180deg)',
							'overflow-y' => 'auto',
						),
					);
				}
			}

			$parse_css .= astra_parse_css( $submenu_toggle );

			$dynamic_css .= $parse_css;

			return $dynamic_css;
		}

		/**
		 * Conditionally iclude CSS Selectors with anchors in the typography settings.
		 *
		 * Historically Astra adds Colors/Typography CSS for headings and anchors for headings but this causes irregularities with the expected output.
		 * For eg Link color does not work for the links inside headings.
		 *
		 * If filter `astra_include_achors_in_headings_typography` is set to true or Astra Option `include-headings-in-typography` is set to true, This will return selectors with anchors. Else This will return selectors without anchors.
		 *
		 * @access Private.
		 *
		 * @since 1.4.9
		 * @param String $selectors_with_achors CSS Selectors with anchors.
		 * @param String $selectors_without_achors CSS Selectors withour annchors.
		 *
		 * @return String CSS Selectors based on the condition of filters.
		 */
		private static function conditional_headings_css_selectors( $selectors_with_achors, $selectors_without_achors ) {

			if ( true === self::anchors_in_css_selectors_heading() ) {
				return $selectors_with_achors;
			} else {
				return $selectors_without_achors;
			}

		}

		/**
		 * Check if CSS selectors in Headings should use anchors.
		 *
		 * @since 1.4.9
		 * @return boolean true if it should include anchors, False if not.
		 */
		public static function anchors_in_css_selectors_heading() {

			if ( true === astra_get_option( 'include-headings-in-typography' ) &&
				true === apply_filters(
					'astra_include_achors_in_headings_typography',
					true
				) ) {

					return true;
			}

			return false;
		}

		/**
		 * Check backwards compatibility CSS for loading submenu below the header needs to be added.
		 *
		 * @since 1.5.0
		 * @return boolean true if CSS should be included, False if not.
		 */
		public static function astra_submenu_below_header_fix() {

			if ( false === astra_get_option( 'submenu-below-header', true ) &&
				false === apply_filters(
					'astra_submenu_below_header_fix',
					false
				) ) {

					return false;
			}
			return true;
		}

		/**
		 * Check backwards compatibility CSS for loading submenu below the header needs to be added.
		 *
		 * @since 2.1.3
		 * @return boolean true if submenu below header fix is to be loaded, False if not.
		 */
		public static function astra_submenu_open_below_header_fix() {

			if ( false === astra_get_option( 'submenu-open-below-header', true ) &&
				false === apply_filters(
					'astra_submenu_open_below_header_fix',
					false
				) ) {

					return false;
			}
			return true;
		}

		/**
		 * Check backwards compatibility to not load default CSS for the button styling of Page Builders.
		 *
		 * @since 2.2.0
		 * @return boolean true if button style CSS should be loaded, False if not.
		 */
		public static function page_builder_button_style_css() {
			$astra_settings                                  = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['pb-button-color-compatibility'] = ( isset( $astra_settings['pb-button-color-compatibility'] ) && false === $astra_settings['pb-button-color-compatibility'] ) ? false : true;
			return apply_filters( 'astra_page_builder_button_style_css', $astra_settings['pb-button-color-compatibility'] );
		}

		/**
		 * Elementor Theme Style - Button Text Color compatibility. This should be looked in the future for proper solution.
		 *
		 * Reference: https://github.com/elementor/elementor/issues/10733
		 * Reference: https://github.com/elementor/elementor/issues/10739
		 *
		 * @since 2.3.3
		 *
		 * @return mixed
		 */
		public static function is_elementor_kit_button_color_set() {
			$ele_btn_global_text_color = false;
			$ele_kit_id                = get_option( 'elementor_active_kit', false );
			if ( false !== $ele_kit_id ) {
				$ele_global_btn_data = get_post_meta( $ele_kit_id, '_elementor_page_settings' );
				// Elementor Global theme style button text color fetch value from database.
				$ele_btn_global_text_color = isset( $ele_global_btn_data[0]['button_text_color'] ) ? $ele_global_btn_data[0]['button_text_color'] : $ele_btn_global_text_color;
			}
			return $ele_btn_global_text_color;
		}

		/**
		 * Check if Elementor - Disable Default Colors or Disable Default Fonts checked or unchecked.
		 *
		 * @since  2.3.3
		 *
		 * @return mixed String if any of the settings are enabled. False if no settings are enabled.
		 */
		public static function elementor_default_color_font_setting() {
			$ele_default_color_setting = get_option( 'elementor_disable_color_schemes' );
			$ele_default_typo_setting  = get_option( 'elementor_disable_typography_schemes' );

			if ( ( 'yes' === $ele_default_color_setting && 'yes' === $ele_default_typo_setting ) || ( false === self::is_elementor_default_color_font_comp() ) ) {
				return 'color-typo';
			}

			if ( 'yes' === $ele_default_color_setting ) {
				return 'color';
			}

			if ( 'yes' === $ele_default_typo_setting ) {
				return 'typo';
			}

			return false;

		}

		/**
		 * For existing users, do not reflect direct change.
		 *
		 * @since 3.6.5
		 * @return boolean true if WordPress-5.8 compatibility enabled, False if not.
		 */
		public static function is_block_editor_support_enabled() {
			$astra_settings                         = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['support-block-editor'] = ( isset( $astra_settings['support-block-editor'] ) && false === $astra_settings['support-block-editor'] ) ? false : true;
			return apply_filters( 'astra_has_block_editor_support', $astra_settings['support-block-editor'] );
		}

		/**
		 * For existing users, do not provide Elementor Default Color Typo settings compatibility by default.
		 *
		 * @since 2.3.3
		 * @return boolean true if elementor default color and typo setting should work with theme, False if not.
		 */
		public static function is_elementor_default_color_font_comp() {
			$astra_settings                                        = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['ele-default-color-typo-setting-comp'] = ( isset( $astra_settings['ele-default-color-typo-setting-comp'] ) && false === $astra_settings['ele-default-color-typo-setting-comp'] ) ? false : true;
			return apply_filters( 'astra_elementor_default_color_font_comp', $astra_settings['ele-default-color-typo-setting-comp'] );
		}

		/**
		 * For existing users, do not provide list vertical spacing.
		 *
		 * @since 4.1.6
		 * @return boolean true for new users, false for old users.
		 */
		public static function astra_list_block_vertical_spacing() {
			$astra_settings                                = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['list-block-vertical-spacing'] = isset( $astra_settings['list-block-vertical-spacing'] ) ? false : true;
			return apply_filters( 'astra_list_block_vertical_spacing', $astra_settings['list-block-vertical-spacing'] );
		}

		/**
		 * For existing users, do not load the wide/full width image CSS by default.
		 *
		 * @since 2.4.4
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function gtn_image_group_css_comp() {
			$astra_settings                                = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['gtn-full-wide-image-grp-css'] = isset( $astra_settings['gtn-full-wide-image-grp-css'] ) ? false : true;
			return apply_filters( 'astra_gutenberg_image_group_style_support', $astra_settings['gtn-full-wide-image-grp-css'] );
		}

		/**
		 * Do not apply new wide/full Group and Cover block CSS for existing users.
		 *
		 * @since 2.5.0
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function gtn_group_cover_css_comp() {
			$astra_settings                                = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['gtn-full-wide-grp-cover-css'] = isset( $astra_settings['gtn-full-wide-grp-cover-css'] ) ? false : true;
			return apply_filters( 'astra_gtn_group_cover_css_comp', $astra_settings['gtn-full-wide-grp-cover-css'] );
		}

		/**
		 * Do not apply new Group, Column and Media & Text block CSS for existing users.
		 *
		 * @since 2.6.0
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function gutenberg_core_blocks_css_comp() {
			$astra_settings                                    = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['guntenberg-core-blocks-comp-css'] = isset( $astra_settings['guntenberg-core-blocks-comp-css'] ) ? false : true;
			return apply_filters( 'astra_gutenberg_core_blocks_design_compatibility', $astra_settings['guntenberg-core-blocks-comp-css'] );
		}

		/**
		 * Do not apply new Group, Column and Media & Text block CSS for existing users.
		 *
		 * CSS for adding spacing|padding support to Gutenberg Media-&-Text Block
		 *
		 * @since 2.6.1
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function gutenberg_media_text_block_css_compat() {
			$astra_settings = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['guntenberg-media-text-block-padding-css'] = isset( $astra_settings['guntenberg-media-text-block-padding-css'] ) ? false : true;
			return apply_filters( 'astra_gutenberg_media_text_block_spacing_compatibility', $astra_settings['guntenberg-media-text-block-padding-css'] );
		}

		/**
		 * Gutenberg pattern compatibility changes.
		 *
		 * @since 3.3.0
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function gutenberg_core_patterns_compat() {
			$astra_settings = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['guntenberg-button-pattern-compat-css'] = isset( $astra_settings['guntenberg-button-pattern-compat-css'] ) ? false : true;
			return apply_filters( 'astra_gutenberg_patterns_compatibility', $astra_settings['guntenberg-button-pattern-compat-css'] );
		}

		/**
		 * Font CSS support for widget-title heading fonts & fonts which are not working in editor.
		 *
		 * 1. Adding Font-weight support to widget titles.
		 * 2. Customizer font CSS not supporting in editor.
		 *
		 * @since 3.6.0
		 * @return boolean false if it is an existing user, true if not.
		 */
		public static function support_font_css_to_widget_and_in_editor() {
			$astra_settings                                        = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['can-support-widget-and-editor-fonts'] = isset( $astra_settings['can-support-widget-and-editor-fonts'] ) ? false : true;
			return apply_filters( 'astra_heading_fonts_typo_support', $astra_settings['can-support-widget-and-editor-fonts'] );
		}

		/**
		 * Whether to remove or not following CSS which restricts logo size on responsive devices.
		 *
		 * @see https://github.com/brainstormforce/astra/commit/d09f63336b73d58c8f8951726edbc90671d7f419
		 *
		 * @since 3.6.0
		 * @return boolean false if it is an existing user, true if not.
		 */
		public static function remove_logo_max_width_mobile_static_css() {
			$astra_settings                                  = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['can-remove-logo-max-width-css'] = isset( $astra_settings['can-remove-logo-max-width-css'] ) ? false : true;
			return apply_filters( 'astra_remove_logo_max_width_css', $astra_settings['can-remove-logo-max-width-css'] );
		}

		/**
		 * Remove text-decoration: underline; CSS for builder specific elements to maintain their UI/UX better.
		 *
		 * 1. UAG : Marketing Button, Info Box CTA, MultiButtons, Tabs.
		 * 2. UABB : Button, Slide Box CTA, Flip box CTA, Info Banner, Posts, Info Circle, Call to Action, Subscribe Form.
		 *
		 * @since 3.6.9
		 */
		public static function unset_builder_elements_underline() {
			$astra_settings                   = get_option( ASTRA_THEME_SETTINGS );
			$unset_builder_elements_underline = isset( $astra_settings['unset-builder-elements-underline'] ) ? false : true;
			return apply_filters( 'astra_unset_builder_elements_underline', $unset_builder_elements_underline );
		}

		/**
		 * Block editor experience improvements css introduced with v4.0.0.
		 *
		 * @since 4.0.0
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function v4_block_editor_compat() {
			$astra_settings                           = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['v4-block-editor-compat'] = isset( $astra_settings['v4-block-editor-compat'] ) ? false : true;
			return apply_filters( 'astra_v4_block_editor_compat', $astra_settings['v4-block-editor-compat'] );
		}

		/**
		 * Load sidebar static CSS when it is enabled.
		 *
		 * @since 3.0.0
		 */
		public static function load_sidebar_static_css() {

			$update_customizer_strctural_defaults = astra_check_is_structural_setup();
			$secondary_li_bottom_spacing          = ( true === $update_customizer_strctural_defaults ) ? '0.75em' : '0.25em';
			$is_site_rtl                          = is_rtl() ? true : false;
			$ltr_left                             = $is_site_rtl ? esc_attr( 'right' ) : esc_attr( 'left' );
			$ltr_right                            = $is_site_rtl ? esc_attr( 'left' ) : esc_attr( 'right' );

			$sidebar_static_css = '
			#secondary {
				margin: 4em 0 2.5em;
				word-break: break-word;
				line-height: 2;
			}
			#secondary li {
				margin-bottom: ' . esc_attr( $secondary_li_bottom_spacing ) . ';
			}
			#secondary li:last-child {
				margin-bottom: 0;
			}
			@media (max-width: 768px) {
				.js_active .ast-plain-container.ast-single-post #secondary {
				  margin-top: 1.5em;
				}
			}
			.ast-separate-container.ast-two-container #secondary .widget {
				background-color: #fff;
				padding: 2em;
				margin-bottom: 2em;
			}
			';

			if ( defined( 'CFVSW_VER' ) ) {
				$sidebar_static_css .= '
					#secondary .cfvsw-filters li{
						margin-bottom: 0;
						margin-top: 0;
					}
				';
			}

			$sidebar_static_css .= '
				@media (min-width: 993px) {
					.ast-left-sidebar #secondary {
						padding-' . $ltr_right . ': 60px;
					}
					.ast-right-sidebar #secondary {
						padding-' . $ltr_left . ': 60px;
					}
				}
				@media (max-width: 993px) {
					.ast-right-sidebar #secondary {
						padding-' . $ltr_left . ': 30px;
					}
					.ast-left-sidebar #secondary {
						padding-' . $ltr_right . ': 30px;
					}
				}
			';

			if ( $update_customizer_strctural_defaults ) {
				$sidebar_static_css .= '
					@media (min-width: 993px) {
						.ast-page-builder-template.ast-left-sidebar #secondary {
							padding-' . $ltr_left . ': 60px;
						}
						.ast-page-builder-template.ast-right-sidebar #secondary {
							padding-' . $ltr_right . ': 60px;
						}
					}
					@media (max-width: 993px) {
						.ast-page-builder-template.ast-right-sidebar #secondary {
							padding-' . $ltr_right . ': 30px;
						}
						.ast-page-builder-template.ast-left-sidebar #secondary {
							padding-' . $ltr_left . ': 30px;
						}

					}
				';
			}

			return $sidebar_static_css;
		}

		/**
		 * Astra Spectra Gutenberg Compatibility CSS.
		 *
		 * @since 3.9.4
		 * @return boolean false if it is an existing user , true if not.
		 */
		public static function spectra_gutenberg_compat_css() {
			$astra_settings                                 = get_option( ASTRA_THEME_SETTINGS );
			$astra_settings['spectra-gutenberg-compat-css'] = isset( $astra_settings['spectra-gutenberg-compat-css'] ) ? false : true;
			return apply_filters( 'astra_spectra_gutenberg_compat_css', $astra_settings['spectra-gutenberg-compat-css'] );
		}

		/**
		 * Load static card(EDD/Woo) CSS.
		 *
		 * @since 3.0.0
		 * @return string static css for Woocommerce and EDD card.
		 */
		public static function load_cart_static_css() {

			$theme_color        = astra_get_option( 'theme-color' );
			$btn_border_color   = astra_get_option( 'theme-button-border-group-border-color' );
			$btn_bg_color       = astra_get_option( 'button-bg-color', $theme_color );
			$btn_border_h_color = astra_get_option( 'theme-button-border-group-border-h-color' );
			$link_h_color       = astra_get_option( 'link-h-color' );
			$btn_bg_h_color     = astra_get_option( 'button-bg-h-color', '', $link_h_color );

			$normal_border_color = $btn_border_color ? $btn_border_color : $btn_bg_color;
			$hover_border_color  = $btn_border_h_color ? $btn_border_h_color : $btn_bg_h_color;
			$is_site_rtl         = is_rtl();
			$ltr_left            = $is_site_rtl ? 'right' : 'left';
			$ltr_right           = $is_site_rtl ? 'left' : 'right';

			$cart_static_css = '
			.ast-site-header-cart .cart-container,
			.ast-edd-site-header-cart .ast-edd-cart-container {
				transition: all 0.2s linear;
			}

			.ast-site-header-cart .ast-woo-header-cart-info-wrap,
			.ast-edd-site-header-cart .ast-edd-header-cart-info-wrap {
				padding: 0 6px 0 2px;
				font-weight: 600;
				line-height: 2.7;
				display: inline-block;
			}

			.ast-site-header-cart i.astra-icon {
				font-size: 20px;
				font-size: 1.3em;
				font-style: normal;
				font-weight: normal;
				position: relative;
				padding: 0 2px;
			}

			.ast-site-header-cart i.astra-icon.no-cart-total:after,
			.ast-header-break-point.ast-header-custom-item-outside .ast-edd-header-cart-info-wrap,
			.ast-header-break-point.ast-header-custom-item-outside .ast-woo-header-cart-info-wrap {
				display: none;
			}

			.ast-site-header-cart.ast-menu-cart-fill i.astra-icon,
			.ast-edd-site-header-cart.ast-edd-menu-cart-fill span.astra-icon {
				font-size: 1.1em;
			}

			.astra-cart-drawer {
				position: fixed;
				display: block;
				visibility: hidden;
				overflow: auto;
				-webkit-overflow-scrolling: touch;
				z-index: 10000;
				background-color: var(--ast-global-color-5);
				transform: translate3d(0, 0, 0);
				opacity: 0;
				will-change: transform;
				transition: 0.25s ease;
			}

			.woocommerce-mini-cart {
				position: relative;
			}

			.woocommerce-mini-cart::before {
				content: "";
				transition: .3s;
			}

			.woocommerce-mini-cart.ajax-mini-cart-qty-loading::before {
				position: absolute;
				top: 0;
				left: 0;
				right: 0;
				width: 100%;
				height: 100%;
				z-index: 1;
				background-color: var(--ast-global-color-5);
				opacity: .5;
			}

			.astra-cart-drawer {
				width: 460px;
				height: 100%;
				' . $ltr_left . ': 100%;
				top: 0px;
				opacity: 1;
				transform: translate3d(0%, 0, 0);
			}

			.astra-cart-drawer .astra-cart-drawer-header {
				position: absolute;
				width: 100%;
				text-align: ' . $ltr_left . ';
				text-transform: inherit;
				font-weight: 500;
				border-bottom: 1px solid var(--ast-border-color);
				padding: 1.34em;
				line-height: 1;
				z-index: 1;
				max-height: 3.5em;
			}

			.astra-cart-drawer .astra-cart-drawer-header .astra-cart-drawer-title {
				color: var(--ast-global-color-2);
			}

			.astra-cart-drawer .astra-cart-drawer-close .ast-close-svg {
				width: 22px;
				height: 22px;
			}

			.astra-cart-drawer .astra-cart-drawer-content,
			.astra-cart-drawer .astra-cart-drawer-content .widget_shopping_cart,
			.astra-cart-drawer .astra-cart-drawer-content .widget_shopping_cart_content {
				height: 100%;
			}

			.astra-cart-drawer .astra-cart-drawer-content {
				padding-top: 3.5em;
			}

			.astra-cart-drawer .ast-mini-cart-price-wrap .multiply-symbol{
				padding: 0 0.5em;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart-item .ast-mini-cart-price-wrap {
				float: ' . $ltr_right . ';
				margin-top: 0.5em;
				max-width: 50%;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart-item .variation {
				margin-top: 0.5em;
				margin-bottom: 0.5em;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart-item .variation dt {
				font-weight: 500;
			}

			.astra-cart-drawer .astra-cart-drawer-content .widget_shopping_cart_content {
				display: flex;
				flex-direction: column;
				overflow: hidden;
			}

			.astra-cart-drawer .astra-cart-drawer-content .widget_shopping_cart_content ul li {
				min-height: 60px;
			}

			.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total {
				display: flex;
				justify-content: space-between;
				padding: 0.7em 1.34em;
				margin-bottom: 0;
			}

			.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total strong,
			.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total .amount {
				width: 50%;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart {
				padding: 1.3em;
				flex: 1;
				overflow: auto;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart a.remove {
				width: 20px;
				height: 20px;
				line-height: 16px;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total {
				padding: 1em 1.5em;
				margin: 0;
				text-align: center;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons {
				padding: 1.34em;
				text-align: center;
				margin-bottom: 0;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button.checkout {
				margin-' . $ltr_right . ': 0;
			}

			.astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a{
				width: 100%;
			}

			.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a:nth-last-child(1) {
				margin-bottom: 0;
			}

			.astra-cart-drawer .astra-cart-drawer-content .edd-cart-item {
				padding: .5em 2.6em .5em 1.5em;
			}

			.astra-cart-drawer .astra-cart-drawer-content .edd-cart-item .edd-remove-from-cart::after {
				width: 20px;
				height: 20px;
				line-height: 16px;
			}

			.astra-cart-drawer .astra-cart-drawer-content .edd-cart-number-of-items {
				padding: 1em 1.5em 1em 1.5em;
				margin-bottom: 0;
				text-align: center;
			}

			.astra-cart-drawer .astra-cart-drawer-content .edd_total {
				padding: .5em 1.5em;
				margin: 0;
				text-align: center;
			}

			.astra-cart-drawer .astra-cart-drawer-content .cart_item.edd_checkout {
				padding: 1em 1.5em 0;
				text-align: center;
				margin-top: 0;
			}
			.astra-cart-drawer .widget_shopping_cart_content > .woocommerce-mini-cart__empty-message {
				display: none;
			}
			.astra-cart-drawer .woocommerce-mini-cart__empty-message,
			.astra-cart-drawer .cart_item.empty {
				text-align: center;
				margin-top: 10px;
			}

			body.admin-bar .astra-cart-drawer {
				padding-top: 32px;
			}
			@media (max-width: 782px) {
				body.admin-bar .astra-cart-drawer {
					padding-top: 46px;
				}
			}

			.ast-mobile-cart-active body.ast-hfb-header {
				overflow: hidden;
			}

			.ast-mobile-cart-active .astra-mobile-cart-overlay {
				opacity: 1;
				cursor: pointer;
				visibility: visible;
				z-index: 999;
			}

			.ast-mini-cart-empty-wrap {
				display: flex;
				flex-wrap: wrap;
				height: 100%;
				align-items: flex-end;
			}

			.ast-mini-cart-empty-wrap > * {
				width: 100%;
			}

			.astra-cart-drawer-content .ast-mini-cart-empty {
				height: 100%;
				display: flex;
				flex-direction: column;
				justify-content: space-between;
				text-align: center;
			}

			.astra-cart-drawer-content .ast-mini-cart-empty .ast-mini-cart-message {
				display: flex;
				align-items: center;
				justify-content: center;
				height: 100%;
				padding: 1.34em;
			}

			@media (min-width: 546px) {
				.astra-cart-drawer .astra-cart-drawer-content.ast-large-view .woocommerce-mini-cart__buttons {
					display: flex;
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content.ast-large-view .woocommerce-mini-cart__buttons a,
				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content.ast-large-view .woocommerce-mini-cart__buttons a.checkout {
					margin-top: 0;
					margin-bottom: 0;
				}
			}

			.ast-site-header-cart .cart-container:focus-visible {
				display: inline-block;
			}
			';
			if ( is_rtl() ) {
				$cart_static_css .= '
				.ast-site-header-cart i.astra-icon:after {
					content: attr(data-cart-total);
					position: absolute;
					font-family: ' . astra_get_font_family( astra_body_font_family() ) . ';
					font-style: normal;
					top: -10px;
					left: -12px;
					font-weight: bold;
					box-shadow: 1px 1px 3px 0px rgba(0, 0, 0, 0.3);
					font-size: 11px;
					padding-right: 0px;
					padding-left: 2px;
					line-height: 17px;
					letter-spacing: -.5px;
					height: 18px;
					min-width: 18px;
					border-radius: 99px;
					text-align: center;
					z-index: 3;
				}
				li.woocommerce-custom-menu-item .ast-site-header-cart i.astra-icon:after,
				li.edd-custom-menu-item .ast-edd-site-header-cart span.astra-icon:after {
					padding-right: 2px;
				}
				.astra-cart-drawer .astra-cart-drawer-close {
					position: absolute;
					top: 0.5em;
					left: 0;
					border: none;
					margin: 0;
					padding: .6em 1em .4em;
					color: var(--ast-global-color-2);
					background-color: transparent;
				}
				.astra-mobile-cart-overlay {
					background-color: rgba(0, 0, 0, 0.4);
					position: fixed;
					top: 0;
					left: 0;
					bottom: 0;
					right: 0;
					visibility: hidden;
					opacity: 0;
					transition: opacity 0.2s ease-in-out;
				}
				.astra-cart-drawer .astra-cart-drawer-content .edd-cart-item .edd-remove-from-cart {
					left: 1.2em;
				}
				.ast-header-break-point.ast-woocommerce-cart-menu.ast-hfb-header .ast-cart-menu-wrap, .ast-header-break-point.ast-hfb-header .ast-cart-menu-wrap,
				.ast-header-break-point .ast-edd-site-header-cart-wrap .ast-edd-cart-menu-wrap {
					width: auto;
					height: 2em;
					font-size: 1.4em;
					line-height: 2;
					vertical-align: middle;
					text-align: left;
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping) {
					margin-left: 10px;
					background-color: transparent;
					border: 2px solid var( --ast-global-color-0 );
					color: var( --ast-global-color-0 );
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping):hover {
					border-color: var( --ast-global-color-1 );
					color: var( --ast-global-color-1 );
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout {
					margin-right: 0;
					margin-top: 10px;
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total strong{
					padding-left: .5em;
					text-align: right;
					font-weight: 500;
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total .amount{
					text-align: left;
				}

				.astra-cart-drawer.active {
					transform: translate3d(100%, 0, 0);
					visibility: visible;
				}

				';


			} else {
				$cart_static_css .= '
				.ast-site-header-cart i.astra-icon:after {
					content: attr(data-cart-total);
					position: absolute;
					font-family: ' . astra_get_font_family( astra_body_font_family() ) . ';
					font-style: normal;
					top: -10px;
					right: -12px;
					font-weight: bold;
					box-shadow: 1px 1px 3px 0px rgba(0, 0, 0, 0.3);
					font-size: 11px;
					padding-left: 0px;
					padding-right: 2px;
					line-height: 17px;
					letter-spacing: -.5px;
					height: 18px;
					min-width: 18px;
					border-radius: 99px;
					text-align: center;
					z-index: 3;
				}
				li.woocommerce-custom-menu-item .ast-site-header-cart i.astra-icon:after,
				li.edd-custom-menu-item .ast-edd-site-header-cart span.astra-icon:after {
					padding-left: 2px;
				}
				.astra-cart-drawer .astra-cart-drawer-close {
					position: absolute;
					top: 0.5em;
					right: 0;
					border: none;
					margin: 0;
					padding: .6em 1em .4em;
					color: var(--ast-global-color-2);
					background-color: transparent;
				}
				.astra-mobile-cart-overlay {
					background-color: rgba(0, 0, 0, 0.4);
					position: fixed;
					top: 0;
					right: 0;
					bottom: 0;
					left: 0;
					visibility: hidden;
					opacity: 0;
					transition: opacity 0.2s ease-in-out;
				}
				.astra-cart-drawer .astra-cart-drawer-content .edd-cart-item .edd-remove-from-cart {
					right: 1.2em;
				}
				.ast-header-break-point.ast-woocommerce-cart-menu.ast-hfb-header .ast-cart-menu-wrap, .ast-header-break-point.ast-hfb-header .ast-cart-menu-wrap,
				.ast-header-break-point .ast-edd-site-header-cart-wrap .ast-edd-cart-menu-wrap {
					width: auto;
					height: 2em;
					font-size: 1.4em;
					line-height: 2;
					vertical-align: middle;
					text-align: right;
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping) {
					margin-right: 10px;
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping),
				.ast-site-header-cart .widget_shopping_cart .buttons .button:not(.checkout),
				.ast-site-header-cart .ast-site-header-cart-data .ast-mini-cart-empty .woocommerce-mini-cart__buttons a.button {
					background-color: transparent;
					border-style: solid;
					border-width: 1px;
					border-color: ' . $normal_border_color . ';
					color: ' . esc_attr( $normal_border_color ) . ';
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons .button:not(.checkout):not(.ast-continue-shopping):hover,
				.ast-site-header-cart .widget_shopping_cart .buttons .button:not(.checkout):hover {
					border-color: ' . $hover_border_color . ';
					color: ' . esc_attr( $hover_border_color ) . ';
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout {
					margin-left: 0;
					margin-top: 10px;
					border-style: solid;
					border-width: 2px;
					border-color: ' . $normal_border_color . ';
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__buttons a.checkout:hover {
					border-color: ' . $hover_border_color . ';
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total strong{
					padding-right: .5em;
					text-align: left;
					font-weight: 500;
				}

				.woocommerce-js .astra-cart-drawer .astra-cart-drawer-content .woocommerce-mini-cart__total .amount{
					text-align: right;
				}

				.astra-cart-drawer.active {
					transform: translate3d(-100%, 0, 0);
					visibility: visible;
				}

				';
			}

			$cart_static_css .= '
				.ast-site-header-cart.ast-menu-cart-outline .ast-cart-menu-wrap, .ast-site-header-cart.ast-menu-cart-fill .ast-cart-menu-wrap,
				.ast-edd-site-header-cart.ast-edd-menu-cart-outline .ast-edd-cart-menu-wrap, .ast-edd-site-header-cart.ast-edd-menu-cart-fill .ast-edd-cart-menu-wrap {
					line-height: 1.8;
				}';
			// This CSS requires in case of :before Astra icons. But in case of SVGs this loads twice that's why removed this from static & loading conditionally.
			if ( false === Astra_Icons::is_svg_icons() ) {
				$cart_static_css .= '
				.ast-site-header-cart .cart-container *,
				.ast-edd-site-header-cart .ast-edd-cart-container * {
					transition: all 0s linear;
				}
				';
			}
			return $cart_static_css;
		}

		/**
		 * Check is new structural things are updated.
		 *
		 * @return bool true|false.
		 * @since 4.0.0
		 */
		public static function astra_check_default_color_typo() {
			$astra_settings = get_option( ASTRA_THEME_SETTINGS );
			return apply_filters( 'astra_get_option_update_default_color_typo', isset( $astra_settings['update-default-color-typo'] ) ? false : true );
		}

		/**
		 * Check is new structural things are updated.
		 *
		 * @return bool true|false.
		 * @since 4.1.0
		 */
		public static function astra_woo_support_global_settings() {
			$astra_settings = get_option( ASTRA_THEME_SETTINGS );
			return apply_filters( 'astra_get_option_woo_support_global_settings', isset( $astra_settings['woo_support_global_settings'] ) ? false : true );
		}
	}
}
