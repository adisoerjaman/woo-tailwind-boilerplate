<?php
/**
 * WooCommerce Tailwind Boilerplate Theme Functions
 *
 * @package WooTailwindBoilerplate
 */

// 1. Inladen van helpers & Vite asset loader
require_once get_template_directory() . '/inc/vite.php';
require_once get_template_directory() . '/inc/woocommerce.php';
require_once get_template_directory() . '/inc/navigation.php';

/**
 * 2. Basis thema features, menu's & WooCommerce support aanzetten
 */
function boilerplate_theme_setup() {
    // Schakel standaard WooCommerce functionaliteiten in
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Algemene WordPress features
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'custom-logo', [
        'height'      => 80,
        'width'       => 240,
        'flex-width'  => true,
        'flex-height' => true,
    ] );
    add_theme_support( 'html5', [ 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ] );

    // Registreer menu locaties
    register_nav_menus( [
        'primary' => __( 'Hoofdmenu (Primary Navigation)', 'woo-tailwind' ),
        'footer'  => __( 'Footermenu (Footer Navigation)', 'woo-tailwind' ),
    ] );
}
add_action( 'after_setup_theme', 'boilerplate_theme_setup' );

/**
 * 3. Enqueue fonts en additionele scripts
 */
function boilerplate_enqueue_fonts() {
    // Plus Jakarta Sans Google Font voor strakke en moderne typografie
    wp_enqueue_style(
        'google-font-jakarta',
        'https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap',
        [],
        null
    );
}
add_action( 'wp_enqueue_scripts', 'boilerplate_enqueue_fonts' );

// 4. Verouderde standaard WooCommerce styling uitschakelen zodat Tailwind v4 volledige controle heeft
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );