<?php
/**
 * WooCommerce Integration & Helpers
 *
 * @package WooTailwindBoilerplate
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Check if WooCommerce is active.
 *
 * @return bool
 */
function boilerplate_is_woocommerce_active() {
    return class_exists( 'WooCommerce' );
}

/**
 * Get WooCommerce Cart URL safely.
 *
 * @return string
 */
function boilerplate_get_cart_url() {
    if ( boilerplate_is_woocommerce_active() && function_exists( 'wc_get_cart_url' ) ) {
        return wc_get_cart_url();
    }
    return '#';
}

/**
 * Get WooCommerce Cart Item Count safely.
 *
 * @return int
 */
function boilerplate_get_cart_count() {
    if ( boilerplate_is_woocommerce_active() && WC()->cart ) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

/**
 * Get WooCommerce Cart Subtotal safely.
 *
 * @return string
 */
function boilerplate_get_cart_subtotal() {
    if ( boilerplate_is_woocommerce_active() && WC()->cart ) {
        return WC()->cart->get_cart_subtotal();
    }
    return '';
}

/**
 * Get WooCommerce My Account URL safely.
 *
 * @return string
 */
function boilerplate_get_account_url() {
    if ( boilerplate_is_woocommerce_active() && function_exists( 'wc_get_page_permalink' ) ) {
        return wc_get_page_permalink( 'myaccount' );
    }
    return wp_login_url();
}

/**
 * Ensure WooCommerce AJAX cart fragments update the header badge live.
 *
 * @param array $fragments Cart fragments.
 * @return array
 */
function boilerplate_cart_count_fragments( $fragments ) {
    if ( ! boilerplate_is_woocommerce_active() ) {
        return $fragments;
    }

    $count = boilerplate_get_cart_count();

    // Fragment 1: Cart Count Badge
    ob_start();
    ?>
    <span class="cart-count-badge <?php echo $count === 0 ? 'opacity-0 scale-75 pointer-events-none' : 'opacity-100 scale-100'; ?> absolute -top-1 -right-1 flex h-5 min-w-5 items-center justify-center rounded-full bg-accent px-1 text-[11px] font-bold text-white shadow-xs transition-all duration-200">
        <?php echo esc_html( $count ); ?>
    </span>
    <?php
    $fragments['span.cart-count-badge'] = ob_get_clean();

    // Fragment 2: Cart Subtotal
    ob_start();
    ?>
    <span class="cart-subtotal text-xs font-semibold text-text-muted hidden md:inline">
        <?php echo boilerplate_get_cart_subtotal(); ?>
    </span>
    <?php
    $fragments['span.cart-subtotal'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'boilerplate_cart_count_fragments' );
