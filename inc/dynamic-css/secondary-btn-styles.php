<?php
/**
 * Astra Secondary Button Styles - Dynamic CSS.
 *
 * @package astra
 * @since x.x.x
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter( 'astra_dynamic_theme_css', 'astra_secondary_btn_styles' );

/**
 * Astra Secondary Button Styles - Dynamic CSS.
 *
 * @param string $dynamic_css Dynamic CSS.
 * @since x.x.x
 */
function astra_secondary_btn_styles( $dynamic_css ) {

    // Get theme button settings.

    /** Primary */
    $btn_border_color                 = astra_get_option( 'theme-button-border-group-border-color' );
    $btn_bg_color                     = astra_get_option( 'button-bg-color', $theme_color );
    $btn_border_color                 = astra_get_option( 'theme-button-border-group-border-color' );
    $btn_border_h_color               = astra_get_option( 'theme-button-border-group-border-h-color' );
    $link_hover_color                 = astra_get_option( 'link-h-color' );
    $btn_bg_hover_color               = astra_get_option( 'button-bg-h-color', $link_hover_color );
    $theme_btn_top_border    = ( isset( $global_custom_button_border_size['top'] ) && ( '' !== $global_custom_button_border_size['top'] && '0' !== $global_custom_button_border_size['top'] ) ) ? astra_get_css_value( $global_custom_button_border_size['top'], 'px' ) : $default_border_size;
    $theme_btn_right_border  = ( isset( $global_custom_button_border_size['right'] ) && ( '' !== $global_custom_button_border_size['right'] && '0' !== $global_custom_button_border_size['right'] ) ) ? astra_get_css_value( $global_custom_button_border_size['right'], 'px' ) : $default_border_size;
    $theme_btn_left_border   = ( isset( $global_custom_button_border_size['left'] ) && ( '' !== $global_custom_button_border_size['left'] && '0' !== $global_custom_button_border_size['left'] ) ) ? astra_get_css_value( $global_custom_button_border_size['left'], 'px' ) : $default_border_size;
    $theme_btn_bottom_border = ( isset( $global_custom_button_border_size['bottom'] ) && ( '' !== $global_custom_button_border_size['bottom'] && '0' !== $global_custom_button_border_size['bottom'] ) ) ? astra_get_css_value( $global_custom_button_border_size['bottom'], 'px' ) : $default_border_size;
    
    /** Secondary */
    $scndry_btn_text_color            = astra_get_option( 'secondary-button-color' );
    $scndry_btn_border_color          = astra_get_option( 'secondary-theme-button-border-group-border-color' );
    $scndry_btn_border_h_color        = astra_get_option( 'secondary-theme-button-border-group-border-h-color' );
    $scndry_theme_btn_top_border      = ( isset( $global_scndry_custom_button_border_size['top'] ) && ( '' !== $global_scndry_custom_button_border_size['top'] && '0' !== $global_scndry_custom_button_border_size['top'] ) ) ? astra_get_css_value( $global_scndry_custom_button_border_size['top'], 'px' ) : $default_border_size;
    $scndry_theme_btn_right_border    = ( isset( $global_scndry_custom_button_border_size['right'] ) && ( '' !== $global_scndry_custom_button_border_size['right'] && '0' !== $global_scndry_custom_button_border_size['right'] ) ) ? astra_get_css_value( $global_scndry_custom_button_border_size['right'], 'px' ) : $default_border_size;
    $scndry_theme_btn_left_border     = ( isset( $global_scndry_custom_button_border_size['left'] ) && ( '' !== $global_scndry_custom_button_border_size['left'] && '0' !== $global_scndry_custom_button_border_size['left'] ) ) ? astra_get_css_value( $global_scndry_custom_button_border_size['left'], 'px' ) : $default_border_size;
    $scndry_theme_btn_bottom_border   = ( isset( $global_scndry_custom_button_border_size['bottom'] ) && ( '' !== $global_scndry_custom_button_border_size['bottom'] && '0' !== $global_scndry_custom_button_border_size['bottom'] ) ) ? astra_get_css_value( $global_scndry_custom_button_border_size['bottom'], 'px' ) : $default_border_size;
    $scndry_theme_btn_font_family     = astra_get_option( 'secondary-font-family-button' );
    $scndry_theme_btn_font_size       = astra_get_option( 'secondary-font-size-button' );
    $scndry_theme_btn_font_weight     = astra_get_option( 'secondary-font-weight-button' );
    $scndry_theme_btn_text_transform  = astra_get_font_extras( astra_get_option( 'secondary-font-extras-button' ), 'text-transform' );
    $scndry_theme_btn_line_height     = astra_get_font_extras( astra_get_option( 'secondary-font-extras-button' ), 'line-height', 'line-height-unit' );
    $scndry_theme_btn_letter_spacing  = astra_get_font_extras( astra_get_option( 'secondary-font-extras-button' ), 'letter-spacing', 'letter-spacing-unit' );
    $scndry_theme_btn_text_decoration = astra_get_font_extras( astra_get_option( 'secondary-font-extras-button' ), 'text-decoration' );
    $scndry_theme_btn_padding         = astra_get_option( 'secondary-theme-button-padding' );
    $scndry_btn_border_radius_fields  = astra_get_option( 'secondary-button-radius-fields' );

    // Secondary color.
    if ( empty( $scndry_btn_text_color ) ) {
        $btn_color_val = empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color );
    }
    else {
        $btn_color_val = esc_attr( $scndry_btn_text_color );
    }

    // Secondary border color.
    if ( empty( $scndry_btn_border_color ) ) {
        $btn_border_color_val = empty( $btn_border_color ) ? esc_attr( $btn_bg_color ) : esc_attr( $btn_border_color );
    }
    else {
        $btn_border_color_val = esc_attr( $scndry_btn_border_color );
    }

    // Secondary border hover color.
    if ( empty( $scndry_btn_border_h_color ) ) {
        $btn_border_h_color_val = empty( $btn_border_h_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $btn_border_h_color );
    }
    else {
        $btn_border_h_color_val = esc_attr( $scndry_btn_border_h_color );
    }

    // Secondary button border size.
    if ( $scndry_theme_btn_top_border || $scndry_theme_btn_right_border || $scndry_theme_btn_left_border || $scndry_theme_btn_bottom_border ) {
        $border_top_val = $scndry_theme_btn_top_border;
        $border_right_val = $scndry_theme_btn_right_border;
        $border_bottom_val = $scndry_theme_btn_bottom_border;
        $border_left_val = $scndry_theme_btn_left_border; 
    }
    else {
        $border_top_val = $theme_btn_top_border;
        $border_right_val = $theme_btn_right_border;
        $border_bottom_val = $theme_btn_bottom_border;
        $border_left_val = $theme_btn_left_border;
    }

    $outline_button_css_desktop = array(
        'div.wp-block-button .wp-block-button__link.is-style-outline, div.wp-block-button.is-style-outline>.wp-block-button__link, .ast-outline-button' => array(
            'border-color'        => esc_attr( $btn_border_color_val ),
            'border-top-width'    => esc_attr( $border_top_val ),
            'border-right-width'  => esc_attr( $border_right_val ),
            'border-bottom-width' => esc_attr( $border_bottom_val ),
            'border-left-width'   => esc_attr( $border_left_val ),
            'font-family'         => astra_get_font_family( $scndry_theme_btn_font_family ),
            'font-weight'         => esc_attr( $scndry_theme_btn_font_weight ),
            'font-size'           => astra_get_font_css_value( $scndry_theme_btn_font_size['desktop'], $scndry_theme_btn_font_size['desktop-unit'] ),
            'line-height'         => esc_attr( $scndry_theme_btn_line_height ),
            'text-transform'      => esc_attr( $scndry_theme_btn_text_transform ),
            'text-decoration'     => esc_attr( $scndry_theme_btn_text_decoration ),
            'letter-spacing'      => esc_attr( $scndry_theme_btn_letter_spacing ),
            'padding-top'         => astra_responsive_spacing( $scndry_theme_btn_padding, 'top', 'desktop' ),
            'padding-right'       => astra_responsive_spacing( $scndry_theme_btn_padding, 'right', 'desktop' ),
            'padding-bottom'      => astra_responsive_spacing( $scndry_theme_btn_padding, 'bottom', 'desktop' ),
            'padding-left'        => astra_responsive_spacing( $scndry_theme_btn_padding, 'left', 'desktop' ),
            'border-top-left-radius'     => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'top', 'desktop' ),
            'border-top-right-radius'    => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'right', 'desktop' ),
            'border-bottom-right-radius' => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'bottom', 'desktop' ),
            'border-bottom-left-radius'  => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'left', 'desktop' ),
        ),
        'div.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color), div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color), .ast-outline-button' => array(
            'color' => esc_attr( $btn_color_val ),
        ),
        'div.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-background-color), div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-background-color)' => array(
            'background-color' => esc_attr( $scndry_btn_bg_color ),
        ),
        '.wp-block-button.is-style-outline .wp-block-button__link:hover, div.wp-block-button.is-style-outline .wp-block-button__link:focus, div.wp-block-button.is-style-outline > .wp-block-button__link:not(.has-text-color):hover, div.wp-block-button.wp-block-button__link.is-style-outline:not(.has-text-color):hover, .ast-outline-button:hover, .ast-outline-button:focus' => array(
            'color'            => empty( $scndry_btn_text_hover_color ) ? esc_attr( $btn_text_hover_color ) : esc_attr( $scndry_btn_text_hover_color ),
            'background-color' => empty( $scndry_btn_bg_hover_color ) ? esc_attr( $btn_bg_hover_color ) : esc_attr( $scndry_btn_bg_hover_color ),
            'border-color'     => esc_attr( $btn_border_h_color_val ),
        ),
        // Adding CSS to highlight current paginated number.
        '.post-page-numbers.current .page-link, .ast-pagination .page-numbers.current'                    => array(
            'color'            => astra_get_foreground_color( $theme_color ),
            'border-color'     => esc_attr( $theme_color ),
            'background-color' => esc_attr( $theme_color ),
            'border-radius'    => '2px',
        ),
    );

    $outline_button_css_tablet = array(
        'div.wp-block-button .wp-block-button__link.is-style-outline, div.wp-block-button.is-style-outline>.wp-block-button__link, .ast-outline-button' => array(
            'font-size'        => astra_responsive_font( $scndry_theme_btn_font_size, 'tablet' ),
            'padding-top'         => astra_responsive_spacing( $scndry_theme_btn_padding, 'top', 'tablet' ),
            'padding-right'       => astra_responsive_spacing( $scndry_theme_btn_padding, 'right', 'tablet' ),
            'padding-bottom'      => astra_responsive_spacing( $scndry_theme_btn_padding, 'bottom', 'tablet' ),
            'padding-left'        => astra_responsive_spacing( $scndry_theme_btn_padding, 'left', 'tablet' ),
            'border-top-left-radius'     => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'top', 'tablet' ),
            'border-top-right-radius'    => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'right', 'tablet' ),
            'border-bottom-right-radius' => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'bottom', 'tablet' ),
            'border-bottom-left-radius'  => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'left', 'tablet' ),
        ),
    );

    $outline_button_css_mobile = array(
        'div.wp-block-button .wp-block-button__link.is-style-outline, div.wp-block-button.is-style-outline>.wp-block-button__link, .ast-outline-button' => array(
            'font-size'        => astra_responsive_font( $scndry_theme_btn_font_size, 'mobile' ),
            'padding-top'         => astra_responsive_spacing( $scndry_theme_btn_padding, 'top', 'mobile' ),
            'padding-right'       => astra_responsive_spacing( $scndry_theme_btn_padding, 'right', 'mobile' ),
            'padding-bottom'      => astra_responsive_spacing( $scndry_theme_btn_padding, 'bottom', 'mobile' ),
            'padding-left'        => astra_responsive_spacing( $scndry_theme_btn_padding, 'left', 'mobile' ),
            'border-top-left-radius'     => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'top', 'mobile' ),
            'border-top-right-radius'    => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'right', 'mobile' ),
            'border-bottom-right-radius' => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'bottom', 'mobile' ),
            'border-bottom-left-radius'  => astra_responsive_spacing( $scndry_btn_border_radius_fields, 'left', 'mobile' ),
        ),
    );

    /* Parse CSS from array() -> Desktop */
    $parse_css .= astra_parse_css( $outline_button_css_desktop );

    /* Parse CSS from array() -> Tablet */
    $parse_css .= astra_parse_css( $outline_button_css_tablet, '', astra_get_tablet_breakpoint() );

    /* Parse CSS from array() -> Mobile */
    $parse_css .= astra_parse_css( $outline_button_css_mobile, '', astra_get_mobile_breakpoint() );
  
	return $dynamic_css;
}
