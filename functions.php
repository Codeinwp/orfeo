<?php
/**
 * Tiny Hestia functions and definitions.
 *
 * @package tiny-hestia
 * @since 1.0.0
 */

define( 'ORFEO_VERSION', '1.0.0');

if ( !defined( 'ABSPATH' ) ) exit;

if ( !function_exists( 'hestia_child_parent_css' ) ):
    function hestia_child_parent_css() {
        wp_enqueue_style( 'orfeo_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap' ) );
        if( is_rtl() ) {
            wp_enqueue_style( 'orfeo_parent_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css', array( 'bootstrap' ) );
        }

    }
endif;
add_action( 'wp_enqueue_scripts', 'hestia_child_parent_css', 10 );


/**
 * Change default fonts.
 *
 * @since 1.0.0
 */
function christmas_hestia_customize_register( $wp_customize ) {
    $hestia_headings_font = $wp_customize->get_setting( 'hestia_headings_font' );
    if ( ! empty( $hestia_headings_font ) ) {
        $hestia_headings_font->default = 'Montserrat';
    }
    $hestia_body_font = $wp_customize->get_setting( 'hestia_body_font' );
    if ( ! empty( $hestia_body_font ) ) {
        $hestia_body_font->default = 'Montserrat';
    }
}
add_action( 'customize_register', 'christmas_hestia_customize_register', 99 );