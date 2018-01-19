<?php
/**
 * Orfeo functions and definitions.
 *
 * @package orfeo
 * @since 1.0.0
 */

define( 'ORFEO_VERSION', '1.0.2' );

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$vendor_file = trailingslashit( get_stylesheet_directory() ) . 'vendor/autoload.php';
if ( is_readable( $vendor_file ) ) {
	require_once $vendor_file;
}

if ( ! function_exists( 'orfeo_parent_css' ) ) :
	/**
	 * Enqueue parent style
	 *
	 * @since 1.0.0
	 */
	function orfeo_parent_css() {
		wp_enqueue_style( 'orfeo_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap' ) );
		if ( is_rtl() ) {
			wp_enqueue_style( 'orfeo_parent_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css', array( 'bootstrap' ) );
		}

	}
endif;
add_action( 'wp_enqueue_scripts', 'orfeo_parent_css', 10 );

/**
 * Change default fonts.
 *
 * @since 1.0.0
 */
function orfeo_change_defaults( $wp_customize ) {

	/* Change default fonts */
	$orfeo_headings_font = $wp_customize->get_setting( 'hestia_headings_font' );
	if ( ! empty( $orfeo_headings_font ) ) {
		$orfeo_headings_font->default = orfeo_font_default_frontend();
	}
	$orfeo_body_font = $wp_customize->get_setting( 'hestia_body_font' );
	if ( ! empty( $orfeo_body_font ) ) {
		$orfeo_body_font->default = orfeo_font_default_frontend();
	}
}
add_action( 'customize_register', 'orfeo_change_defaults', 99 );


/**
 * Change default font family for front end display.
 *
 * @return string
 *
 * @since 1.0.0
 */
function orfeo_font_default_frontend() {
	return 'Montserrat';
}
add_filter( 'hestia_headings_default', 'orfeo_font_default_frontend' );
add_filter( 'hestia_body_font_default', 'orfeo_font_default_frontend' );

/**
 * Change default value of accent color
 *
 * @return string - default accent color
 * @since 1.0.0
 */
function orfeo_accent_color() {
	return '#f5593d';
}
add_filter( 'hestia_accent_color_default', 'orfeo_accent_color' );

/**
 * Change default value of gradient color
 *
 * @return string - default gradient color
 * @since 1.0.0
 */
function orfeo_gradient_color() {
	return '#51bcda';
}
add_filter( 'hestia_header_gradient_default', 'orfeo_gradient_color' );

/**
 * Add color_accent on some elements
 *
 * @since 1.0.0
 */
function orfeo_inline_style() {

	$color_accent = get_theme_mod( 'accent_color', apply_filters( 'hestia_accent_color_default', '#f5593d' ) );

	$custom_css = '';

	if ( ! empty( $color_accent ) ) {

		/* Pagination on Blog */
		$custom_css .= '.pagination .nav-links .page-numbers { color: ' . esc_html( $color_accent ) . '; border-color: ' . esc_html( $color_accent ) . '; }';
		$custom_css .= '.pagination .nav-links .page-numbers.current { border-color: ' . esc_html( $color_accent ) . '; }';
		$custom_css .= '.pagination .nav-links .page-numbers:hover { background-color: ' . esc_html( $color_accent ) . '; }';
		$custom_css .= '.pagination .nav-links .page-numbers:hover { border-color: ' . esc_html( $color_accent ) . '; }';

		/* Pagination ons Shop */
		$custom_css .= '.woocommerce-pagination ul.page-numbers .page-numbers { color: ' . esc_html( $color_accent ) . '; border-color: ' . esc_html( $color_accent ) . '; } ';
		$custom_css .= '.woocommerce-pagination ul.page-numbers li > span.current { border-color: ' . esc_html( $color_accent ) . ' !important; }';
		$custom_css .= '.woocommerce-pagination ul.page-numbers .page-numbers:hover { background-color: ' . esc_html( $color_accent ) . '; }';
		$custom_css .= '.woocommerce-pagination ul.page-numbers .page-numbers:hover { border-color: ' . esc_html( $color_accent ) . '; }';

		/* Categories */
		$custom_css .= '.entry-categories .label { background-color: ' . esc_html( $color_accent ) . ';}';

		/* Shop Sidebar Rating*/
		$custom_css .= '.woocommerce .star-rating { color: ' . esc_html( $color_accent ) . '; }';

		/* Single Product Page Rating */
		$custom_css .= '.woocommerce div.product p.stars span a:before { color: ' . esc_html( $color_accent ) . '; }';

		/* Cart action buttons */
		$custom_css .= '.woocommerce-cart table.shop_table tr td.actions input[type=submit] { background-color: ' . esc_html( $color_accent ) . '; }';
		$custom_css .= '.woocommerce-cart table.shop_table tr td.actions input[type=submit]:hover { background-color: ' . esc_html( $color_accent ) . '; }';

		/* WooCommerce message */
		$custom_css .= '.woocommerce-page .woocommerce-message { background-color: ' . esc_html( $color_accent ) . '; }';

		/* WooCommerce My Order Tracking Page */
		$custom_css .= '.track_order input[type=submit] { background-color: ' . esc_html( $color_accent ) . '; }';
		$custom_css .= '.track_order input[type=submit]:hover { background-color: ' . esc_html( $color_accent ) . '; }';

		/* WooCommerce tag widget */
		$custom_css .= 'div[id^=woocommerce_product_tag_cloud].widget a { background-color: ' . esc_html( $color_accent ) . '; }';

		/* WooCommerce Cart widget */
		$custom_css .= '.woocommerce.widget_shopping_cart .buttons > a.button { background-color: ' . esc_html( $color_accent ) . '; }';
		$custom_css .= '.woocommerce.widget_shopping_cart .buttons > a.button:hover { background-color: ' . esc_html( $color_accent ) . '; }';
	}

	wp_add_inline_style( 'orfeo_parent', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'orfeo_inline_style', 10 );

/**
 * Change features defaults.
 *
 * @since 1.0.0
 */
function orfeo_features_defaults() {
	return json_encode(
		array(
			array(
				'icon_value' => 'fa-star-o',
				'title'      => esc_html__( 'Feature 1', 'orfeo' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum molestie sagittis.', 'orfeo' ),
				'link'       => '',
				'color'      => '#e91e63',
			),
			array(
				'icon_value' => 'fa-diamond',
				'title'      => esc_html__( 'Feature 2', 'orfeo' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum molestie sagittis.', 'orfeo' ),
				'link'       => '',
				'color'      => '#00bcd4',
			),
			array(
				'icon_value' => 'fa-envelope-o',
				'title'      => esc_html__( 'Feature 3', 'orfeo' ),
				'text'       => esc_html__( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque rutrum molestie sagittis.', 'orfeo' ),
				'link'       => '',
				'color'      => '#4caf50',
			),
		)
	);
}
add_filter( 'hestia_features_default_content', 'orfeo_features_defaults' );

/**
 * Remove parent theme actions
 *
 * @since 1.0.0
 */
function orfeo_remove_hestia_actions() {

	/* Remove three points from blog read more button */
	remove_filter( 'excerpt_more', 'hestia_excerpt_more', 10 );

}
add_action( 'after_setup_theme', 'orfeo_remove_hestia_actions' );

/**
 * Remove product description except from Single Product Page
 *
 * @since 1.0.0
 */
function orfeo_remove_product_description() {

	if ( class_exists( 'WooCommerce' ) ) {
		if ( ! is_product() ) {
			add_filter( 'woocommerce_short_description', '__return_empty_string' );
		}
	}
}
add_action( 'template_redirect', 'orfeo_remove_product_description' );

/**
 * Replace excerpt "Read More" text with a link.
 *
 * @since 1.0.0
 */
function orfeo_excerpt_more( $more ) {
	global $post;
	if ( ( ( 'page' === get_option( 'show_on_front' ) ) ) || is_single() || is_archive() || is_home() ) {
		return '<a class="moretag" href="' . esc_url( get_permalink( $post->ID ) ) . '"> ' . esc_html__( 'Read more', 'orfeo' ) . '</a>';
	}

	return $more;
}
add_filter( 'excerpt_more', 'orfeo_excerpt_more' );

/**
 * Remove boxed layout control
 *
 * @since 1.0.0
 */
function orfeo_remove_boxed_layout( $wp_customize ) {

	$wp_customize->remove_control( 'hestia_general_layout' );
}
add_action( 'customize_register', 'orfeo_remove_boxed_layout', 100 );

/**
 * Import options from Hestia
 *
 * @since 1.0.0
 */
function orfeo_get_lite_options() {
	$hestia_mods = get_option( 'theme_mods_hestia' );
	if ( ! empty( $hestia_mods ) ) {
		foreach ( $hestia_mods as $hestia_mod_k => $hestia_mod_v ) {
			set_theme_mod( $hestia_mod_k, $hestia_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'orfeo_get_lite_options' );

/**
 * Change default header image in Big Title Section
 *
 * @since 1.0.0
 * @return string - path to image
 */
function orfeo_header_background_default() {
	return get_stylesheet_directory_uri() . '/assets/img/sunset.jpg';
}
add_filter( 'hestia_big_title_background_default', 'orfeo_header_background_default' );

/**
 * Change default welcome notice
 */
add_filter( 'hestia_welcome_notice_filter', 'orfeo_welcome_notice_filter' );

function orfeo_welcome_notice_filter() {
	
	$theme = wp_get_theme();
	
	$theme_name = $theme->get( 'Name' );
	$theme      = $theme->parent();
	
	$theme_slug    = $theme->get_template();
	
	$var = '<p>' . sprintf( 'Welcome! Thank you for choosing %1$s! To fully take advantage of the best our theme can offer please make sure you visit our %2$swelcome page%3$s.', $theme_name, '<a href="' . esc_url( admin_url( 'themes.php?page=' . $theme_slug . '-welcome' ) ) . '">', '</a>' ) . '</p><p><a href="' . esc_url( admin_url( 'themes.php?page=' . $theme_slug . '-welcome' ) ) . '" class="button" style="text-decoration: none;">' . sprintf( 'Get started with %s', $theme_name ) . '</a></p>';
	
	return $var;
}
