<?php
/**
 * The Template for displaying all single products
 *
 * @package WooTailwindBoilerplate
 * @version 1.6.4
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked boilerplate_woocommerce_before_main_content (in inc/woocommerce.php)
 * @hooked WC_Structured_Data::generate_product_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

while ( have_posts() ) :
    the_post();

    wc_get_template_part( 'content', 'single-product' );

endwhile;

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
