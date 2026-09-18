<?php
/**
 * Front Page Template (Homepage)
 *
 * @package WooTailwindBoilerplate
 */

get_header();

$hero_image       = boilerplate_get_hero_image();
$hero_button_text = boilerplate_get_hero_button_text();
$hero_button_url  = boilerplate_get_hero_button_url();
?>

<main id="primary" class="site-main flex-1 w-full">

    <!-- 1. Hero Banner (75vh Responsive Height for Mobile & Desktop) -->
    <section class="relative min-h-[75vh] h-[75vh] max-h-[850px] w-full flex items-end justify-center overflow-hidden bg-primary text-white">
        <?php if ( ! empty( $hero_image ) ) : ?>
            <!-- Customizer Uploaded Banner Image (Natural Lighting Preserved) -->
            <a href="<?php echo esc_url( $hero_button_url ); ?>" class="absolute inset-0 z-0 block w-full h-full group cursor-pointer" aria-label="<?php echo esc_attr( $hero_button_text ); ?>">
                <img 
                    src="<?php echo esc_url( $hero_image ); ?>" 
                    alt="<?php echo esc_attr( $hero_button_text ); ?>" 
                    class="w-full h-full object-cover object-center transform scale-100 group-hover:scale-105 transition-transform duration-700 ease-out"
                />
            </a>
            <!-- Smooth Bottom Gradient: 0% top/middle, 40% near bottom, 85-90% at base -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent from-55% via-black/40 via-80% to-black/90 pointer-events-none z-10"></div>
        <?php else : ?>
            <!-- Fallback High-Quality Gradient Mesh -->
            <div class="absolute inset-0 bg-gradient-to-br from-slate-950 via-slate-900 to-primary">
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_30%_30%,rgba(37,99,235,0.25),transparent_60%)]"></div>
                <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_70%,rgba(16,185,129,0.15),transparent_50%)]"></div>
            </div>
        <?php endif; ?>

        <!-- Centered Bottom CTA Button -->
        <?php if ( ! empty( $hero_button_text ) && ! empty( $hero_button_url ) ) : ?>
            <div class="relative z-20 w-full flex items-center justify-center pb-8 sm:pb-12 px-4">
                <a 
                    href="<?php echo esc_url( $hero_button_url ); ?>" 
                    class="btn btn-lg bg-white text-slate-950 hover:bg-slate-100 hover:text-black border-0 font-bold px-8 sm:px-10 py-3.5 sm:py-4 shadow-2xl hover:shadow-3xl hover:scale-105 transition-all text-sm sm:text-base rounded-full inline-flex items-center gap-2.5 group"
                >
                    <span><?php echo esc_html( $hero_button_text ); ?></span>
                    <svg class="w-4 h-4 text-slate-900 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.25">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        <?php endif; ?>
    </section>

    <!-- 2. Latest Products Section -->
    <section class="py-16 sm:py-24 bg-bg border-b border-border/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Section Header -->
            <div class="text-center max-w-2xl mx-auto mb-10 sm:mb-14 space-y-2">
                <p class="text-xs sm:text-sm font-bold uppercase tracking-wider text-accent">
                    <?php esc_html_e( 'Nieuw Binnen', 'woo-tailwind' ); ?>
                </p>
                <h2 class="text-2xl sm:text-4xl font-extrabold tracking-tight text-text-main font-heading">
                    <?php esc_html_e( 'Laatste Producten', 'woo-tailwind' ); ?>
                </h2>
                <p class="text-sm text-text-muted">
                    <?php esc_html_e( 'Ontdek onze nieuwste artikelen en populaire collectie.', 'woo-tailwind' ); ?>
                </p>
            </div>

            <?php
            if ( boilerplate_is_woocommerce_active() ) :
                $products_args = [
                    'post_type'      => 'product',
                    'post_status'    => 'publish',
                    'posts_per_page' => 3,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ];
                $latest_products_query = new WP_Query( $products_args );
                $product_count         = (int) $latest_products_query->post_count;
                $total_products        = (int) $latest_products_query->found_posts;

                // Dynamic column classes based on product count:
                // 1 product: max-w-md mx-auto
                // 2 products: 2 cols max-w-4xl mx-auto
                // 3 products: 3 cols
                if ( $product_count === 1 ) {
                    $grid_class = 'grid grid-cols-1 max-w-md mx-auto';
                } elseif ( $product_count === 2 ) {
                    $grid_class = 'grid grid-cols-1 sm:grid-cols-2 gap-6 lg:gap-8 max-w-4xl mx-auto';
                } else {
                    $grid_class = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8';
                }

                if ( $latest_products_query->have_posts() ) :
                    ?>
                    <ul class="<?php echo esc_attr( $grid_class ); ?> list-none p-0 m-0">
                        <?php
                        while ( $latest_products_query->have_posts() ) :
                            $latest_products_query->the_post();
                            wc_get_template_part( 'content', 'product' );
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>

                    <?php if ( $total_products > 3 ) : ?>
                        <div class="mt-12 sm:mt-16 text-center">
                            <a 
                                href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" 
                                class="btn btn-primary btn-lg shadow-md px-8 py-3.5 text-sm sm:text-base font-bold inline-flex items-center gap-2 group"
                            >
                                <span><?php esc_html_e( 'Naar alle producten', 'woo-tailwind' ); ?></span>
                                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php
                else :
                    ?>
                    <div class="text-center py-12 card max-w-md mx-auto p-8 space-y-3">
                        <div class="w-12 h-12 rounded-full bg-secondary text-text-muted flex items-center justify-center mx-auto">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25c-.67 0-1.19-.578-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                            </svg>
                        </div>
                        <h3 class="text-base font-bold text-text-main font-heading">
                            <?php esc_html_e( 'Nog geen producten', 'woo-tailwind' ); ?>
                        </h3>
                        <p class="text-xs text-text-muted">
                            <?php esc_html_e( 'Voeg producten toe via het WordPress dashboard om ze hier automatisch te tonen.', 'woo-tailwind' ); ?>
                        </p>
                    </div>
                    <?php
                endif;
            endif;
            ?>

        </div>
    </section>

</main>

<?php
get_footer();
