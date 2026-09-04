<?php
/**
 * The Template for displaying product archives, including the main shop page
 *
 * Override for WooCommerce archive-product.php with modern minimalist layout.
 *
 * @package WooTailwindBoilerplate
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked boilerplate_woocommerce_before_main_content (in inc/woocommerce.php)
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

<!-- Shop / Taxonomy Header Banner -->
<header class="woocommerce-products-header mb-8 sm:mb-12 border-b border-border/60 pb-6 sm:pb-8">
    <?php
    /**
     * Breadcrumbs
     */
    if ( function_exists( 'woocommerce_breadcrumb' ) ) {
        woocommerce_breadcrumb();
    }
    ?>

    <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
        <h1 class="woocommerce-products-header__title page-title text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-text-main font-heading">
            <?php woocommerce_page_title(); ?>
        </h1>
    <?php endif; ?>

    <?php
    /**
     * Hook: woocommerce_archive_description.
     *
     * @hooked woocommerce_taxonomy_archive_description - 10
     * @hooked woocommerce_product_archive_description - 10
     */
    do_action( 'woocommerce_archive_description' );
    ?>
</header>

<?php
if ( woocommerce_product_loop() ) {

    /**
     * Top Controls Toolbar: Result Count & Catalog Ordering
     */
    ?>
    <div class="shop-toolbar flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 sm:mb-8 pb-4 border-b border-border/40">
        <div class="text-xs sm:text-sm text-text-muted font-medium">
            <?php woocommerce_result_count(); ?>
        </div>
        <div class="flex items-center gap-3">
            <?php woocommerce_catalog_ordering(); ?>
        </div>
    </div>
    <?php

    woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
        while ( have_posts() ) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action( 'woocommerce_shop_loop' );

            wc_get_template_part( 'content', 'product' );
        }
    }

    woocommerce_product_loop_end();

    /**
     * Pagination & After Shop Loop
     */
    ?>
    <div class="shop-pagination-wrapper mt-12 sm:mt-16 pt-8 border-t border-border flex justify-center">
        <?php
        /**
         * Hook: woocommerce_after_shop_loop.
         *
         * @hooked woocommerce_pagination - 10
         */
        do_action( 'woocommerce_after_shop_loop' );
        ?>
    </div>
    <?php

} else {
    /**
     * Empty State when no products found
     */
    ?>
    <div class="card p-8 sm:p-12 text-center max-w-lg mx-auto my-12 space-y-4">
        <div class="w-14 h-14 rounded-full bg-secondary text-text-muted flex items-center justify-center mx-auto">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25c-.67 0-1.19-.578-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
            </svg>
        </div>
        <h2 class="text-xl font-bold text-text-main font-heading">
            <?php esc_html_e( 'Geen producten gevonden', 'woo-tailwind' ); ?>
        </h2>
        <p class="text-sm text-text-muted">
            <?php esc_html_e( 'Er zijn momenteel geen artikelen beschikbaar in deze categorie.', 'woo-tailwind' ); ?>
        </p>
        <div class="pt-2">
            <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/' ) ); ?>" class="btn btn-primary btn-sm">
                <?php esc_html_e( 'Terug naar alle producten', 'woo-tailwind' ); ?>
            </a>
        </div>
    </div>
    <?php
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked boilerplate_woocommerce_after_main_content (in inc/woocommerce.php)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 */
do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
