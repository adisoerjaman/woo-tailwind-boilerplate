<?php
/**
 * The template for displaying all single pages
 *
 * @package WooTailwindBoilerplate
 */

get_header(); ?>

<main id="primary" class="site-main flex-1 w-full bg-bg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'space-y-6 max-w-4xl mx-auto' ); ?>>
                <?php if ( ! is_front_page() ) : ?>
                    <header class="entry-header border-b border-border pb-6">
                        <h1 class="entry-title text-3xl sm:text-4xl font-extrabold tracking-tight text-text-main font-heading">
                            <?php the_title(); ?>
                        </h1>
                    </header>
                <?php endif; ?>

                <div class="entry-content prose prose-slate max-w-none text-text-main leading-relaxed">
                    <?php
                    the_content();

                    wp_link_pages( [
                        'before' => '<div class="page-links mt-4 pt-4 border-t border-border flex items-center gap-2">' . esc_html__( 'Pagina\'s:', 'woo-tailwind' ),
                        'after'  => '</div>',
                    ] );
                    ?>
                </div>
            </article>
            <?php
        endwhile;
        ?>
    </div>
</main>

<?php
get_footer();
