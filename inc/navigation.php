<?php
/**
 * Navigation Helpers & Menu Fallbacks
 *
 * @package WooTailwindBoilerplate
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Fallback navigation when no primary menu is set in WordPress admin.
 */
function boilerplate_primary_menu_fallback() {
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' );
    ?>
    <ul class="flex items-center gap-1 lg:gap-2">
        <li>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="px-3.5 py-2 text-sm font-medium text-text-main transition-colors rounded-btn hover:text-accent hover:bg-surface-hover">
                <?php esc_html_e( 'Home', 'woo-tailwind' ); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( $shop_url ); ?>" class="px-3.5 py-2 text-sm font-medium text-text-main transition-colors rounded-btn hover:text-accent hover:bg-surface-hover">
                <?php esc_html_e( 'Shop', 'woo-tailwind' ); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/over-ons' ) ); ?>" class="px-3.5 py-2 text-sm font-medium text-text-muted transition-colors rounded-btn hover:text-text-main hover:bg-surface-hover">
                <?php esc_html_e( 'Over ons', 'woo-tailwind' ); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="px-3.5 py-2 text-sm font-medium text-text-muted transition-colors rounded-btn hover:text-text-main hover:bg-surface-hover">
                <?php esc_html_e( 'Contact', 'woo-tailwind' ); ?>
            </a>
        </li>
    </ul>
    <?php
}

/**
 * Fallback navigation for the mobile drawer.
 */
function boilerplate_mobile_menu_fallback() {
    $shop_url = function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' );
    ?>
    <ul class="flex flex-col space-y-1">
        <li>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center justify-between px-4 py-3 text-base font-semibold text-text-main rounded-btn hover:bg-surface-hover transition-colors">
                <span><?php esc_html_e( 'Home', 'woo-tailwind' ); ?></span>
                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( $shop_url ); ?>" class="flex items-center justify-between px-4 py-3 text-base font-semibold text-text-main rounded-btn hover:bg-surface-hover transition-colors">
                <span><?php esc_html_e( 'Shop / Producten', 'woo-tailwind' ); ?></span>
                <span class="text-xs bg-accent/10 text-accent font-medium px-2 py-0.5 rounded-badge"><?php esc_html_e( 'Nieuw', 'woo-tailwind' ); ?></span>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/over-ons' ) ); ?>" class="flex items-center justify-between px-4 py-3 text-base font-medium text-text-muted rounded-btn hover:bg-surface-hover hover:text-text-main transition-colors">
                <span><?php esc_html_e( 'Over ons', 'woo-tailwind' ); ?></span>
                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </li>
        <li>
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="flex items-center justify-between px-4 py-3 text-base font-medium text-text-muted rounded-btn hover:bg-surface-hover hover:text-text-main transition-colors">
                <span><?php esc_html_e( 'Klantenservice & Contact', 'woo-tailwind' ); ?></span>
                <svg class="w-4 h-4 text-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </li>
    </ul>
    <?php
}

/**
 * Filter wp_nav_menu items to inject modern Tailwind classes into menu links.
 */
function boilerplate_nav_menu_link_attributes( $atts, $item, $args ) {
    if ( isset( $args->theme_location ) && 'primary' === $args->theme_location ) {
        $classes = 'px-3.5 py-2 text-sm font-medium text-text-main transition-colors rounded-btn hover:text-accent hover:bg-surface-hover inline-block';
        $atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' ' . $classes : $classes;
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'boilerplate_nav_menu_link_attributes', 10, 3 );
