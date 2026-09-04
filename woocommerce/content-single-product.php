<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Modern conversion-focused split-screen Single Product layout.
 *
 * @package WooTailwindBoilerplate
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'single-product-container relative space-y-12 lg:space-y-16', $product ); ?>>

    <!-- Breadcrumb Navigation -->
    <div class="pt-2">
        <?php
        if ( function_exists( 'woocommerce_breadcrumb' ) ) {
            woocommerce_breadcrumb();
        }
        ?>
    </div>

    <!-- Split-Screen Grid Layout -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-14 items-start">
        
        <!-- Left Column: Product Gallery (Sticky on Desktop) -->
        <div class="lg:col-span-7 space-y-4 lg:sticky lg:top-28">
            <div class="product-gallery-wrapper rounded-card overflow-hidden bg-bg-alt border border-border/60 shadow-xs relative">
                <?php
                /**
                 * Hook: woocommerce_before_single_product_summary.
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
                ?>
            </div>
        </div>

        <!-- Right Column: Conversion & Buy Box Flow -->
        <div class="lg:col-span-5 space-y-6">
            <div id="main-buy-box" class="space-y-6">
                
                <!-- Category & Title -->
                <div class="space-y-2">
                    <?php
                    $categories = wc_get_product_category_list( $product->get_id(), ', ' );
                    if ( $categories ) : ?>
                        <p class="text-xs font-bold text-accent uppercase tracking-wider">
                            <?php echo wp_strip_all_tags( $categories ); ?>
                        </p>
                    <?php endif; ?>

                    <h1 class="product_title entry-title text-2xl sm:text-3xl lg:text-4xl font-extrabold tracking-tight text-text-main font-heading leading-tight">
                        <?php the_title(); ?>
                    </h1>

                    <!-- Rating & Reviews -->
                    <?php if ( wc_review_ratings_enabled() && $product->get_average_rating() > 0 ) : ?>
                        <div class="flex items-center gap-2 pt-1">
                            <div class="flex items-center text-amber-400">
                                <?php 
                                $rating = (float) $product->get_average_rating();
                                for ( $i = 1; $i <= 5; $i++ ) : ?>
                                    <svg class="w-4 h-4 <?php echo $i <= round( $rating ) ? 'fill-current' : 'text-slate-200 fill-current'; ?>" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                            <a href="#reviews" class="text-xs font-semibold text-text-muted hover:text-text-main transition-colors">
                                <?php echo sprintf( _n( '%s beoordeling', '%s beoordelingen', $product->get_review_count(), 'woo-tailwind' ), $product->get_review_count() ); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Price & Stock Status -->
                <div class="space-y-3 pb-6 border-b border-border/60">
                    <div class="price text-2xl sm:text-3xl font-extrabold text-text-main tracking-tight flex items-baseline gap-2">
                        <?php echo $product->get_price_html(); ?>
                    </div>

                    <!-- Stock Status Badge -->
                    <?php if ( $product->is_in_stock() ) : ?>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-badge bg-emerald-50 border border-emerald-200/80 text-xs font-semibold text-emerald-800">
                            <span class="w-2 h-2 rounded-full bg-success animate-pulse"></span>
                            <span><?php esc_html_e( 'Op voorraad - voor 23:59 besteld, morgen in huis', 'woo-tailwind' ); ?></span>
                        </div>
                    <?php else : ?>
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-badge bg-slate-100 border border-slate-200 text-xs font-semibold text-slate-700">
                            <span class="w-2 h-2 rounded-full bg-slate-400"></span>
                            <span><?php esc_html_e( 'Tijdelijk niet op voorraad', 'woo-tailwind' ); ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Short Description -->
                <?php if ( $product->get_short_description() ) : ?>
                    <div class="woocommerce-product-details__short-description text-sm text-text-muted leading-relaxed">
                        <?php echo apply_filters( 'woocommerce_short_description', $product->get_short_description() ); ?>
                    </div>
                <?php endif; ?>

                <!-- Add to Cart Form Section -->
                <div class="product-form-container pt-2">
                    <?php
                    /**
                     * Add to cart form (Quantity + Add to Cart Button + Variations)
                     */
                    woocommerce_template_single_add_to_cart();
                    ?>
                </div>

                <!-- Conversion USP Block -->
                <div class="p-4 rounded-card bg-bg-alt border border-border/70 space-y-3 shadow-2xs">
                    <div class="flex items-center gap-3 text-xs font-medium text-text-main">
                        <div class="w-6 h-6 rounded-full bg-accent/10 text-accent flex items-center justify-center shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.125 1.125 0 00-.987 1.106v7.635m12-6.681A6.777 6.777 0 0014.25 4.5m0 0v2.25" /></svg>
                        </div>
                        <span><strong><?php esc_html_e( 'Gratis verzending', 'woo-tailwind' ); ?></strong> <?php esc_html_e( 'vanaf €50 in NL & BE', 'woo-tailwind' ); ?></span>
                    </div>
                    <div class="flex items-center gap-3 text-xs font-medium text-text-main">
                        <div class="w-6 h-6 rounded-full bg-accent/10 text-accent flex items-center justify-center shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" /></svg>
                        </div>
                        <span><strong><?php esc_html_e( '30 dagen bedenktijd', 'woo-tailwind' ); ?></strong> <?php esc_html_e( '& gratis retourneren', 'woo-tailwind' ); ?></span>
                    </div>
                    <div class="flex items-center gap-3 text-xs font-medium text-text-main">
                        <div class="w-6 h-6 rounded-full bg-accent/10 text-accent flex items-center justify-center shrink-0">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" /></svg>
                        </div>
                        <span><strong><?php esc_html_e( 'Veilige betaling', 'woo-tailwind' ); ?></strong> <?php esc_html_e( 'met iDeal, Bancontact & Klarna', 'woo-tailwind' ); ?></span>
                    </div>
                </div>

                <!-- Product Meta (SKU, Categories, Tags) -->
                <div class="pt-4 border-t border-border/60 text-xs text-text-muted space-y-1">
                    <?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>
                        <p class="sku_wrapper">
                            <span class="font-semibold text-text-main"><?php esc_html_e( 'Artikelnummer (SKU):', 'woo-tailwind' ); ?></span>
                            <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? esc_html( $sku ) : esc_html__( 'N.v.t.', 'woo-tailwind' ); ?></span>
                        </p>
                    <?php endif; ?>

                    <?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<p class="tagged_as"><span class="font-semibold text-text-main">' . _n( 'Tag:', 'Tags:', count( $product->get_tag_ids() ), 'woo-tailwind' ) . ' </span>', '</p>' ); ?>
                </div>

            </div>
        </div>
    </div>

    <!-- Product Description, Specifications & Reviews Tabs -->
    <div class="product-tabs-section pt-12 border-t border-border">
        <?php
        /**
         * Hook: woocommerce_after_single_product_summary.
         *
         * @hooked woocommerce_output_product_data_tabs - 10
         * @hooked woocommerce_upsell_display - 15
         * @hooked woocommerce_output_related_products - 20
         */
        do_action( 'woocommerce_after_single_product_summary' );
        ?>
    </div>

    <!-- Mobile-Only Sticky Floating Add-to-Cart Bar -->
    <div 
        id="mobile-sticky-cart-bar" 
        class="fixed bottom-0 inset-x-0 z-40 bg-surface/95 backdrop-blur-md border-t border-border px-4 py-3 sm:hidden shadow-2xl transition-transform duration-300 translate-y-full flex items-center justify-between gap-3 cursor-pointer"
        aria-hidden="true"
    >
        <div class="flex items-center gap-3 min-w-0">
            <div class="w-11 h-11 shrink-0 rounded-btn overflow-hidden bg-bg-alt border border-border/60 flex items-center justify-center">
                <?php echo $product->get_image( 'woocommerce_thumbnail', [ 'class' => 'w-full h-full object-cover' ] ); ?>
            </div>
            <div class="min-w-0">
                <h4 class="text-xs font-bold text-text-main truncate font-heading"><?php the_title(); ?></h4>
                <div class="price text-xs font-extrabold text-accent">
                    <?php echo $product->get_price_html(); ?>
                </div>
            </div>
        </div>
        <button 
            id="sticky-cart-btn"
            type="button" 
            class="btn btn-primary btn-sm shrink-0 px-4 py-2 font-bold shadow-md cursor-pointer"
        >
            <?php echo esc_html( $product->is_type( 'variable' ) ? __( 'Kies optie', 'woo-tailwind' ) : __( 'Bestellen', 'woo-tailwind' ) ); ?>
        </button>
    </div>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
