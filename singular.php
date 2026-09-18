<?php
/**
 * The template for displaying all single posts and generic singular content
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
                <header class="entry-header border-b border-border pb-6 space-y-3">
                    <h1 class="entry-title text-3xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight text-text-main font-heading">
                        <?php the_title(); ?>
                    </h1>
                    <div class="flex items-center gap-4 text-xs text-text-muted">
                        <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                            <?php echo esc_html( get_the_date() ); ?>
                        </time>
                        <span>•</span>
                        <span><?php the_author(); ?></span>
                    </div>
                </header>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="rounded-card overflow-hidden border border-border my-6">
                        <?php the_post_thumbnail( 'large', [ 'class' => 'w-full h-auto object-cover' ] ); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content prose prose-slate max-w-none text-text-main leading-relaxed space-y-4">
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
