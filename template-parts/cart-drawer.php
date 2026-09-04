<?php
/**
 * Slide-Over Cart Drawer (Mini-Cart) Component
 *
 * @package WooTailwindBoilerplate
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<!-- Slide-Over Cart Drawer Root -->
<div 
    id="cart-drawer" 
    class="fixed inset-0 z-50 pointer-events-none invisible transition-all duration-300" 
    aria-labelledby="cart-drawer-title" 
    role="dialog" 
    aria-modal="true"
    aria-hidden="true"
>
    <!-- Backdrop Overlay -->
    <div 
        id="cart-drawer-backdrop" 
        class="fixed inset-0 bg-slate-950/60 backdrop-blur-xs opacity-0 transition-opacity duration-300 ease-out cursor-pointer"
        aria-hidden="true"
    ></div>

    <!-- Slide-Over Panel Container -->
    <div class="fixed inset-y-0 right-0 max-w-full flex pl-10 pointer-events-none">
        <div 
            id="cart-drawer-panel" 
            class="pointer-events-auto w-screen max-w-md bg-surface flex flex-col shadow-2xl transition-transform duration-300 ease-out translate-x-full border-l border-border"
        >
            <!-- Drawer Header -->
            <div class="flex items-center justify-between px-5 py-4 border-b border-border bg-surface shrink-0">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-btn bg-primary text-primary-text flex items-center justify-center">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25c-.67 0-1.19-.578-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                        </svg>
                    </div>
                    <div>
                        <h2 id="cart-drawer-title" class="text-sm sm:text-base font-bold text-text-main font-heading leading-none">
                            <?php esc_html_e( 'Winkelmand', 'woo-tailwind' ); ?>
                            <span class="cart-drawer-header-count text-xs font-semibold text-text-muted ml-0.5">
                                (<?php echo esc_html( boilerplate_get_cart_count() ); ?>)
                            </span>
                        </h2>
                        <span class="text-[10px] text-text-muted"><?php esc_html_e( 'Je geselecteerde artikelen', 'woo-tailwind' ); ?></span>
                    </div>
                </div>

                <!-- Close Button -->
                <button 
                    id="cart-drawer-close" 
                    type="button" 
                    class="p-2 rounded-btn text-text-muted hover:text-text-main hover:bg-surface-hover transition-colors cursor-pointer"
                    aria-label="<?php esc_attr_e( 'Winkelmand sluiten', 'woo-tailwind' ); ?>"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Dynamic Cart Drawer Content (Updated via AJAX wc_fragments) -->
            <?php boilerplate_render_cart_drawer_content(); ?>

        </div>
    </div>
</div>
