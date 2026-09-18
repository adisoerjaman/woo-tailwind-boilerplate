<?php
/**
 * 404 Page Template
 *
 * @package WooTailwindBoilerplate
 */

get_header(); ?>

<main id="primary" class="site-main flex-1 w-full bg-bg flex items-center justify-center py-16 sm:py-24">
    <div class="max-w-md mx-auto px-4 text-center space-y-6">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-accent/10 text-accent font-bold text-2xl">
            404
        </div>
        <h1 class="text-3xl sm:text-4xl font-extrabold text-text-main font-heading">
            <?php esc_html_e( 'Pagina niet gevonden', 'woo-tailwind' ); ?>
        </h1>
        <p class="text-text-muted text-sm leading-relaxed">
            <?php esc_html_e( 'De pagina die je zoekt bestaat niet meer of is verplaatst. Ga terug naar de homepage of bekijk de shop.', 'woo-tailwind' ); ?>
        </p>
        <div class="flex items-center justify-center gap-3 pt-2">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
                <?php esc_html_e( 'Naar de Home', 'woo-tailwind' ); ?>
            </a>
            <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" class="btn btn-secondary">
                <?php esc_html_e( 'Bekijk de Shop', 'woo-tailwind' ); ?>
            </a>
        </div>
    </div>
</main>

<?php
get_footer();
