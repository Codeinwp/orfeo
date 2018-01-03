<?php
/**
 * Tiny Hestia functions and definitions.
 *
 * @package tiny-hestia
 * @since 1.0.0
 */

define( 'ORFEO_VERSION', '1.0.0' );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'hestia_child_parent_css' ) ):
	function hestia_child_parent_css() {
		wp_enqueue_style( 'orfeo_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap' ) );
		if ( is_rtl() ) {
			wp_enqueue_style( 'orfeo_parent_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css', array( 'bootstrap' ) );
		}

	}
endif;
add_action( 'wp_enqueue_scripts', 'hestia_child_parent_css', 10 );

function orfeo_include_google_fonts() {
	wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,600', false );
}

add_action( 'wp_enqueue_scripts', 'orfeo_include_google_fonts' );

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

/**
 * Change features defaults.
 *
 * @since 1.0.0
 */
function orfeo_features_defaults() {
	return json_encode(
		array(
			array(
				'icon_value' => 'fa-th-large',
				'title'      => esc_html__( 'Feature 1', 'christmas-hestia' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum molestie sagittis.', 'christmas-hestia' ),
				'link'       => '',
				'color'      => '#e91e63',
			),
			array(
				'icon_value' => 'fa-archive',
				'title'      => esc_html__( 'Feature 2', 'christmas-hestia' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum molestie sagittis.', 'christmas-hestia' ),
				'link'       => '',
				'color'      => '#00bcd4',
			),
			array(
				'icon_value' => 'fa-th',
				'title'      => esc_html__( 'Feature 3', 'christmas-hestia' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum molestie sagittis.', 'christmas-hestia' ),
				'link'       => '',
				'color'      => '#4caf50',
			),
		)
	);
}

add_filter( 'hestia_features_default_content', 'orfeo_features_defaults' );

/**
 * Remove parent theme actions
 */
function orfeo_remove_hestia_actions() {

	remove_filter( 'excerpt_more', 'hestia_excerpt_more', 10 );
}

add_action( 'after_setup_theme', 'orfeo_remove_hestia_actions' );

/**
 * Replace excerpt "Read More" text with a link.
 *
 */
function orfeo_excerpt_more( $more ) {
	global $post;
	if ( ( ( 'page' === get_option( 'show_on_front' ) ) ) || is_single() || is_archive() || is_home() ) {
		return '<a class="moretag" href="' . esc_url( get_permalink( $post->ID ) ) . '"> ' . esc_html__( 'Read more', 'hestia-pro' ) . '</a>';
	}

	return $more;
}
add_filter( 'excerpt_more', 'orfeo_excerpt_more' );

/**
 * Remove boxed layout control
 */
function orfeo_remove_boxed_layout( $wp_customize ) {

	$wp_customize->remove_control( 'hestia_general_layout' );
}
add_action( 'customize_register', 'orfeo_remove_boxed_layout', 100 );
