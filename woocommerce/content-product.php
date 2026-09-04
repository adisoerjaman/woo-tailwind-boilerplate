<?php
/**
 * The template for displaying product content within loops
 *
 * Override for WooCommerce content-product.php with modern Instagram-inspired layout.
 *
 * @package WooTailwindBoilerplate
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
    return;
}
?>
<li <?php wc_product_class( 'group relative flex flex-col rounded-card bg-surface overflow-hidden border border-border/70 hover:border-border transition-all duration-300 hover:shadow-xl', $product ); ?>>
    <?php
    /**
     * Hook: woocommerce_before_shop_loop_item.
     *
     * @hooked woocommerce_template_loop_product_link_open - 10 (we handle link with full control below)
     */
    do_action( 'woocommerce_before_shop_loop_item' );
    ?>

    <!-- Product Media Wrapper with Floating Actions -->
    <div class="relative aspect-square sm:aspect-4/5 w-full overflow-hidden bg-bg-alt rounded-t-card flex items-center justify-center">
        
        <!-- Clickable Main Image Link -->
        <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-0 block w-full h-full" aria-label="<?php the_title_attribute(); ?>">
            <?php
            /**
             * Hook: woocommerce_before_shop_loop_item_title.
             *
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             */
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'woocommerce_thumbnail', [
                    'class' => 'w-full h-full object-cover object-center group-hover:scale-105 transition-transform duration-500 ease-out',
                    'alt'   => get_the_title(),
                ] );
            } else {
                echo '<div class="w-full h-full flex items-center justify-center text-text-subtle"><svg class="w-12 h-12 stroke-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>';
            }
            ?>
        </a>

        <!-- Badges (Top Left) -->
        <div class="absolute top-2.5 left-2.5 z-10 flex flex-col gap-1 pointer-events-none">
            <?php if ( $product->is_on_sale() ) : ?>
                <?php 
                $discount_text = __( 'Sale', 'woo-tailwind' );
                if ( $product->is_type( 'simple' ) && $product->get_regular_price() > 0 ) {
                    $saving_pct = round( ( ( $product->get_regular_price() - $product->get_sale_price() ) / $product->get_regular_price() ) * 100 );
                    if ( $saving_pct > 0 ) {
                        $discount_text = '-' . $saving_pct . '%';
                    }
                }
                ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-badge text-[10px] sm:text-xs font-bold tracking-wider uppercase bg-primary text-primary-text shadow-xs">
                    <?php echo esc_html( $discount_text ); ?>
                </span>
            <?php endif; ?>

            <?php if ( ! $product->is_in_stock() ) : ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-badge text-[10px] sm:text-xs font-medium tracking-wider uppercase bg-slate-900/80 text-white backdrop-blur-xs">
                    <?php esc_html_e( 'Uitverkocht', 'woo-tailwind' ); ?>
                </span>
            <?php endif; ?>
        </div>

        <!-- Floating 'Add to Cart' Button (Slide & Fade on Hover) -->
        <div class="absolute inset-x-2.5 bottom-2.5 z-20 transition-all duration-300 ease-out sm:translate-y-3 sm:opacity-0 group-hover:translate-y-0 group-hover:opacity-100">
            <?php
            /**
             * Hook: woocommerce_after_shop_loop_item.
             *
             * @hooked woocommerce_template_loop_product_link_close - 5
             * @hooked woocommerce_template_loop_add_to_cart - 10
             */
            woocommerce_template_loop_add_to_cart();
            ?>
        </div>
    </div>

    <!-- Product Details Content -->
    <div class="p-3.5 sm:p-4.5 flex flex-col flex-1 justify-between gap-2.5">
        <div class="space-y-1">
            <!-- Category Label -->
            <?php
            $category_list = wc_get_product_category_list( $product->get_id(), ', ' );
            if ( $category_list ) : ?>
                <p class="text-[10px] sm:text-[11px] font-semibold text-text-muted uppercase tracking-wider truncate">
                    <?php echo wp_strip_all_tags( $category_list ); ?>
                </p>
            <?php endif; ?>

            <!-- Product Title -->
            <h2 class="woocommerce-loop-product__title text-xs sm:text-sm font-bold text-text-main font-heading line-clamp-2 leading-snug group-hover:text-accent transition-colors">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        </div>

        <!-- Price & Rating Row -->
        <div class="pt-2 flex items-baseline justify-between gap-2 border-t border-border/40">
            <div class="price text-sm sm:text-base font-extrabold text-text-main tracking-tight flex items-baseline gap-1.5">
                <?php
                /**
                 * Hook: woocommerce_after_shop_loop_item_title.
                 *
                 * @hooked woocommerce_template_loop_rating - 5
                 * @hooked woocommerce_template_loop_price - 10
                 */
                echo $product->get_price_html();
                ?>
            </div>

            <?php if ( wc_review_ratings_enabled() && $product->get_average_rating() > 0 ) : ?>
                <div class="flex items-center text-amber-400 text-xs gap-0.5" title="<?php echo esc_attr( sprintf( __( 'Beoordeling: %s van 5', 'woo-tailwind' ), $product->get_average_rating() ) ); ?>">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <span class="font-bold text-text-main text-[11px]"><?php echo esc_html( number_format( (float) $product->get_average_rating(), 1 ) ); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</li>
