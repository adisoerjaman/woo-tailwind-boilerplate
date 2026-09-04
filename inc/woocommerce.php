<?php
/**
 * WooCommerce Integration, Helpers & AJAX Fragments
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
 * Get WooCommerce Checkout URL safely.
 *
 * @return string
 */
function boilerplate_get_checkout_url() {
    if ( boilerplate_is_woocommerce_active() && function_exists( 'wc_get_checkout_url' ) ) {
        return wc_get_checkout_url();
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
 * Render the HTML content of the cart drawer (items, free shipping bar, subtotal, actions)
 */
function boilerplate_render_cart_drawer_content() {
    $cart_count = boilerplate_get_cart_count();
    $is_empty   = ( $cart_count === 0 || ! boilerplate_is_woocommerce_active() );
    
    // Free shipping threshold settings (default €50)
    $free_shipping_threshold = 50.00;
    $cart_total_raw          = ( boilerplate_is_woocommerce_active() && WC()->cart ) ? (float) WC()->cart->get_displayed_subtotal() : 0.0;
    $shipping_remaining      = max( 0, $free_shipping_threshold - $cart_total_raw );
    $shipping_progress       = min( 100, ( $cart_total_raw / $free_shipping_threshold ) * 100 );
    ?>
    <div class="cart-drawer-content flex flex-col flex-1 overflow-hidden">
        <?php if ( ! $is_empty && WC()->cart ) : ?>
            <!-- Free Shipping Progress Bar -->
            <div class="px-5 py-3.5 bg-bg-alt border-b border-border/60">
                <div class="flex items-center justify-between text-xs font-semibold text-text-main mb-1.5">
                    <?php if ( $shipping_remaining > 0 ) : ?>
                        <span>
                            <?php 
                            printf(
                                /* translators: %s: remaining amount */
                                esc_html__( 'Nog %s voor gratis verzending!', 'woo-tailwind' ),
                                wc_price( $shipping_remaining )
                            ); 
                            ?>
                        </span>
                    <?php else : ?>
                        <span class="text-success flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <?php esc_html_e( 'Gefeliciteerd! Je hebt gratis verzending', 'woo-tailwind' ); ?>
                        </span>
                    <?php endif; ?>
                    <span class="text-[11px] text-text-muted"><?php echo esc_html( round( $shipping_progress ) ); ?>%</span>
                </div>
                <div class="w-full h-1.5 bg-secondary rounded-full overflow-hidden">
                    <div class="h-full bg-accent transition-all duration-500 rounded-full" style="width: <?php echo esc_attr( $shipping_progress ); ?>%;"></div>
                </div>
            </div>

            <!-- Cart Items Scrollable List -->
            <div class="flex-1 overflow-y-auto px-5 py-4 space-y-4">
                <?php
                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                        $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( 'woocommerce_thumbnail', [ 'class' => 'w-full h-full object-cover rounded-btn' ] ), $cart_item, $cart_item_key );
                        $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                        $remove_url        = wc_get_cart_remove_url( $cart_item_key );
                        ?>
                        <div class="cart-drawer-item flex items-start gap-3.5 pb-4 border-b border-border/50 last:border-0 last:pb-0" data-cart-key="<?php echo esc_attr( $cart_item_key ); ?>">
                            <!-- Thumbnail -->
                            <div class="w-16 h-18 shrink-0 bg-bg-alt rounded-btn overflow-hidden border border-border/50 flex items-center justify-center">
                                <?php if ( $product_permalink ) : ?>
                                    <a href="<?php echo esc_url( $product_permalink ); ?>" class="w-full h-full block">
                                        <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </a>
                                <?php else : ?>
                                    <?php echo $thumbnail; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                <?php endif; ?>
                            </div>

                            <!-- Product Info -->
                            <div class="flex-1 min-w-0 space-y-1">
                                <div class="flex items-start justify-between gap-2">
                                    <h4 class="text-xs sm:text-sm font-bold text-text-main line-clamp-2 leading-snug font-heading">
                                        <?php if ( $product_permalink ) : ?>
                                            <a href="<?php echo esc_url( $product_permalink ); ?>" class="hover:text-accent transition-colors">
                                                <?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ); ?>
                                            </a>
                                        <?php else : ?>
                                            <?php echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) ); ?>
                                        <?php endif; ?>
                                    </h4>

                                    <!-- Remove Item Button -->
                                    <a 
                                        href="<?php echo esc_url( $remove_url ); ?>" 
                                        class="cart-item-remove-btn text-text-subtle hover:text-danger p-1 rounded-sm hover:bg-secondary transition-colors cursor-pointer" 
                                        aria-label="<?php esc_attr_e( 'Verwijder dit artikel', 'woo-tailwind' ); ?>"
                                        data-product_id="<?php echo esc_attr( $product_id ); ?>"
                                        data-cart_item_key="<?php echo esc_attr( $cart_item_key ); ?>"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </a>
                                </div>

                                <!-- Variation Attributes Meta -->
                                <?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>

                                <!-- Quantity & Total Price -->
                                <div class="flex items-center justify-between pt-1">
                                    <span class="text-xs font-medium text-text-muted">
                                        <?php echo esc_html( sprintf( __( 'Aantal: %s', 'woo-tailwind' ), $cart_item['quantity'] ) ); ?>
                                    </span>
                                    <span class="text-xs sm:text-sm font-extrabold text-text-main">
                                        <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>

            <!-- Drawer Footer: Subtotal & Action Buttons -->
            <div class="px-5 py-4 border-t border-border bg-surface space-y-3 shadow-lg">
                <div class="flex items-center justify-between text-sm">
                    <span class="font-medium text-text-muted"><?php esc_html_e( 'Subtotaal', 'woo-tailwind' ); ?></span>
                    <span class="text-base font-extrabold text-text-main">
                        <?php echo WC()->cart->get_cart_subtotal(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                    </span>
                </div>
                <p class="text-[11px] text-text-muted">
                    <?php esc_html_e( 'Inclusief BTW. Verzendkosten worden berekend bij het afrekenen.', 'woo-tailwind' ); ?>
                </p>

                <!-- Actions -->
                <div class="space-y-2 pt-1">
                    <a href="<?php echo esc_url( boilerplate_get_checkout_url() ); ?>" class="btn btn-primary w-full py-3 text-sm font-bold shadow-md">
                        <span><?php esc_html_e( 'Direct Afrekenen', 'woo-tailwind' ); ?></span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="<?php echo esc_url( boilerplate_get_cart_url() ); ?>" class="btn btn-secondary w-full py-2.5 text-xs font-semibold">
                        <?php esc_html_e( 'Winkelmand Bekijken', 'woo-tailwind' ); ?>
                    </a>
                </div>

                <!-- Trust Badge -->
                <div class="flex items-center justify-center gap-1.5 pt-1 text-[11px] text-text-muted">
                    <svg class="w-3.5 h-3.5 text-success" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                    <span><?php esc_html_e( 'Veilige & versleutelde betaling', 'woo-tailwind' ); ?></span>
                </div>
            </div>

        <?php else : ?>

            <!-- Empty Cart State -->
            <div class="flex-1 flex flex-col items-center justify-center p-8 text-center space-y-4">
                <div class="w-16 h-16 rounded-full bg-secondary text-text-muted flex items-center justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25c-.67 0-1.19-.578-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                    </svg>
                </div>
                <div class="space-y-1">
                    <h3 class="text-base font-bold text-text-main font-heading">
                        <?php esc_html_e( 'Je winkelmand is leeg', 'woo-tailwind' ); ?>
                    </h3>
                    <p class="text-xs text-text-muted max-w-xs leading-relaxed">
                        <?php esc_html_e( 'Je hebt nog geen artikelen toegevoegd. Ontdek onze collectie en voeg je favorieten toe!', 'woo-tailwind' ); ?>
                    </p>
                </div>
                <div class="pt-2">
                    <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" class="btn btn-primary btn-sm">
                        <?php esc_html_e( 'Begin met winkelen', 'woo-tailwind' ); ?>
                    </a>
                </div>
            </div>

        <?php endif; ?>
    </div>
    <?php
}

/**
 * Ensure WooCommerce AJAX cart fragments update the header badge, subtotal and cart drawer live.
 *
 * @param array $fragments Cart fragments.
 * @return array
 */
function boilerplate_cart_count_fragments( $fragments ) {
    if ( ! boilerplate_is_woocommerce_active() ) {
        return $fragments;
    }

    $count = boilerplate_get_cart_count();

    // Fragment 1: Cart Count Badge in Header
    ob_start();
    ?>
    <span class="cart-count-badge <?php echo $count === 0 ? 'opacity-0 scale-75 pointer-events-none' : 'opacity-100 scale-100'; ?> absolute -top-2.5 -right-2.5 flex h-5 min-w-5 items-center justify-center rounded-full bg-accent px-1 text-[11px] font-bold text-white shadow-xs transition-all duration-200">
        <?php echo esc_html( $count ); ?>
    </span>
    <?php
    $fragments['span.cart-count-badge'] = ob_get_clean();

    // Fragment 2: Cart Subtotal in Header
    ob_start();
    ?>
    <span class="cart-subtotal text-xs font-semibold text-text-muted hidden sm:inline">
        <?php echo $count > 0 ? boilerplate_get_cart_subtotal() : esc_html__( 'Winkelmand', 'woo-tailwind' ); ?>
    </span>
    <?php
    $fragments['span.cart-subtotal'] = ob_get_clean();

    // Fragment 3: Cart Drawer Header Count
    ob_start();
    ?>
    <span class="cart-drawer-header-count text-xs font-semibold text-text-muted">
        (<?php echo esc_html( $count ); ?>)
    </span>
    <?php
    $fragments['span.cart-drawer-header-count'] = ob_get_clean();

    // Fragment 4: Cart Drawer Content (Items, subtotal, buttons)
    ob_start();
    boilerplate_render_cart_drawer_content();
    $fragments['div.cart-drawer-content'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'boilerplate_cart_count_fragments' );

/**
 * Custom WooCommerce Content Wrapper (Tailwind Container)
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', function() {
    ?>
    <main id="primary" class="site-main flex-1 w-full bg-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
    <?php
}, 10 );

add_action( 'woocommerce_after_main_content', function() {
    ?>
        </div>
    </main>
    <?php
}, 10 );

/**
 * Filter WooCommerce Loop Start and End for responsive 2-column mobile / 4-column desktop grid.
 */
function boilerplate_woocommerce_product_loop_start() {
    return '<ul class="products grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 list-none p-0 m-0">';
}
add_filter( 'woocommerce_product_loop_start', 'boilerplate_woocommerce_product_loop_start' );

function boilerplate_woocommerce_product_loop_end() {
    return '</ul>';
}
add_filter( 'woocommerce_product_loop_end', 'boilerplate_woocommerce_product_loop_end' );

/**
 * Customize WooCommerce Breadcrumbs with modern Tailwind styles.
 */
function boilerplate_woocommerce_breadcrumbs() {
    return [
        'delimiter'   => '<span class="mx-2 text-text-subtle text-xs">/</span>',
        'wrap_before' => '<nav class="woocommerce-breadcrumb flex items-center text-xs font-medium text-text-muted mb-4 sm:mb-6" aria-label="' . esc_attr__( 'Kruimelpad', 'woo-tailwind' ) . '">',
        'wrap_after'  => '</nav>',
        'before'      => '<span class="text-text-main font-semibold">',
        'after'       => '</span>',
        'home'        => _x( 'Home', 'breadcrumb', 'woo-tailwind' ),
    ];
}
add_filter( 'woocommerce_breadcrumb_defaults', 'boilerplate_woocommerce_breadcrumbs' );

/**
 * Customize Add to Cart button classes in product loop.
 */
function boilerplate_loop_add_to_cart_args( $args, $product ) {
    $args['class'] = isset( $args['class'] ) ? $args['class'] . ' btn btn-primary btn-sm w-full shadow-md backdrop-blur-xs text-xs font-semibold py-2.5 justify-center gap-1.5 cursor-pointer transition-all duration-200' : 'btn btn-primary btn-sm w-full shadow-md backdrop-blur-xs text-xs font-semibold py-2.5 justify-center gap-1.5 cursor-pointer transition-all duration-200';
    return $args;
}
add_filter( 'woocommerce_loop_add_to_cart_args', 'boilerplate_loop_add_to_cart_args', 10, 2 );
