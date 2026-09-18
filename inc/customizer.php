<?php
/**
 * Theme Customizer Settings (Hero Banner, etc.)
 *
 * @package WooTailwindBoilerplate
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Theme Customizer Sections, Settings, and Controls.
 *
 * @param WP_Customize_Manager $wp_customize Customizer Manager instance.
 */
function boilerplate_customize_register( $wp_customize ) {
    // 1. Homepage Hero Banner Section
    $wp_customize->add_section( 'boilerplate_hero_section', [
        'title'       => __( 'Homepage Hero Banner', 'woo-tailwind' ),
        'description' => __( 'Upload hier de grote banner afbeelding (75vh) voor de homepage en stel de CTA knop en link in.', 'woo-tailwind' ),
        'priority'    => 25,
    ] );

    // Banner Image
    $wp_customize->add_setting( 'boilerplate_hero_image', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'boilerplate_hero_image', [
        'label'       => __( 'Banner Afbeelding', 'woo-tailwind' ),
        'description' => __( 'Upload een afbeelding (bijv. 1920x1080 of 2560x1440) voor een product, actie of mededeling.', 'woo-tailwind' ),
        'section'     => 'boilerplate_hero_section',
        'settings'    => 'boilerplate_hero_image',
    ] ) );

    // Button Text
    $wp_customize->add_setting( 'boilerplate_hero_button_text', [
        'default'           => __( 'Bekijk Product', 'woo-tailwind' ),
        'sanitize_callback' => 'sanitize_text_field',
    ] );
    $wp_customize->add_control( 'boilerplate_hero_button_text', [
        'label'       => __( 'CTA Knop Tekst', 'woo-tailwind' ),
        'section'     => 'boilerplate_hero_section',
        'type'        => 'text',
    ] );

    // Button URL
    $wp_customize->add_setting( 'boilerplate_hero_button_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ] );
    $wp_customize->add_control( 'boilerplate_hero_button_url', [
        'label'       => __( 'CTA Knop Link (URL)', 'woo-tailwind' ),
        'description' => __( 'Link naar een productpagina, categorie of infopagina. Laat leeg om automatisch naar de shop te linken.', 'woo-tailwind' ),
        'section'     => 'boilerplate_hero_section',
        'type'        => 'url',
    ] );
}
add_action( 'customize_register', 'boilerplate_customize_register' );

/**
 * Helper Getters for Hero Settings with fallbacks.
 */
function boilerplate_get_hero_image() {
    return get_theme_mod( 'boilerplate_hero_image', '' );
}

function boilerplate_get_hero_button_text() {
    return get_theme_mod( 'boilerplate_hero_button_text', __( 'Bekijk Product', 'woo-tailwind' ) );
}

function boilerplate_get_hero_button_url() {
    $url = get_theme_mod( 'boilerplate_hero_button_url', '' );
    if ( empty( $url ) ) {
        return function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' );
    }
    return $url;
}
