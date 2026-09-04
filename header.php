<!DOCTYPE html>
<html <?php language_attributes(); ?> class="h-full scroll-smooth">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class( 'min-h-screen flex flex-col bg-bg text-text-main antialiased selection:bg-accent selection:text-white' ); ?>>
<?php wp_body_open(); ?>

<!-- Top Announcement Bar -->
<div class="bg-primary text-primary-text text-xs py-2 px-4">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <p class="font-medium tracking-wide flex items-center gap-1.5 mx-auto sm:mx-0">
            <span class="inline-block w-1.5 h-1.5 rounded-full bg-success animate-pulse"></span>
            <span><?php esc_html_e( 'Gratis verzending vanaf €50 | 30 dagen bedenktijd', 'woo-tailwind' ); ?></span>
        </p>
        <div class="hidden sm:flex items-center gap-4 text-slate-300">
            <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Klantenservice', 'woo-tailwind' ); ?></a>
            <span class="text-slate-600">|</span>
            <a href="<?php echo esc_url( boilerplate_get_account_url() ); ?>" class="hover:text-white transition-colors"><?php esc_html_e( 'Mijn Account', 'woo-tailwind' ); ?></a>
        </div>
    </div>
</div>

<!-- Main Sticky Header -->
<header id="site-header" class="sticky top-0 z-40 w-full border-b border-border bg-surface/95 backdrop-blur-md transition-all duration-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20 gap-4">
            
            <!-- Left: Mobile Menu Toggle & Brand Logo -->
            <div class="flex items-center gap-3">
                <!-- Mobile Menu Button -->
                <button 
                    id="mobile-menu-toggle" 
                    type="button" 
                    class="md:hidden inline-flex items-center justify-center p-2 rounded-btn text-text-muted hover:text-text-main hover:bg-surface-hover focus:outline-hidden focus:ring-2 focus:ring-primary transition-colors cursor-pointer" 
                    aria-controls="mobile-menu" 
                    aria-expanded="false"
                    aria-label="<?php esc_attr_e( 'Menu openen', 'woo-tailwind' ); ?>"
                >
                    <svg id="icon-menu-open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg id="icon-menu-close" class="hidden w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <!-- Brand Logo / Title -->
                <div class="flex items-center">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-2.5 group">
                            <div class="w-9 h-9 rounded-btn bg-primary text-primary-text flex items-center justify-center font-bold text-base shadow-xs group-hover:scale-105 transition-transform">
                                <span>W</span>
                            </div>
                            <div class="flex flex-col">
                                <span class="font-extrabold text-lg lg:text-xl tracking-tight text-text-main font-heading leading-none">
                                    <?php bloginfo( 'name' ); ?>
                                </span>
                                <span class="text-[10px] uppercase font-bold tracking-widest text-accent mt-0.5">
                                    <?php esc_html_e( 'WooCommerce', 'woo-tailwind' ); ?>
                                </span>
                            </div>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Center: Desktop Navigation -->
            <nav class="hidden md:flex items-center justify-center flex-1 px-4" aria-label="<?php esc_attr_e( 'Hoofdnavigatie', 'woo-tailwind' ); ?>">
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( [
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'flex items-center gap-1 lg:gap-2',
                        'fallback_cb'    => 'boilerplate_primary_menu_fallback',
                    ] );
                } else {
                    boilerplate_primary_menu_fallback();
                }
                ?>
            </nav>

            <!-- Right: Actions (Search, Account, Dynamic Cart) -->
            <div class="flex items-center gap-1.5 sm:gap-2">
                <!-- Search Button / Quick Search -->
                <a 
                    href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" 
                    class="flex items-center justify-center w-10 h-10 rounded-btn text-text-muted hover:text-text-main hover:bg-surface-hover transition-colors"
                    title="<?php esc_attr_e( 'Zoeken', 'woo-tailwind' ); ?>"
                    aria-label="<?php esc_attr_e( 'Producten zoeken', 'woo-tailwind' ); ?>"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </a>

                <!-- My Account Link -->
                <a 
                    href="<?php echo esc_url( boilerplate_get_account_url() ); ?>" 
                    class="hidden sm:flex items-center justify-center w-10 h-10 rounded-btn text-text-muted hover:text-text-main hover:bg-surface-hover transition-colors"
                    title="<?php esc_attr_e( 'Mijn Account', 'woo-tailwind' ); ?>"
                    aria-label="<?php esc_attr_e( 'Mijn Account bekijken', 'woo-tailwind' ); ?>"
                >
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>
                </a>

                <!-- Dynamic WooCommerce Cart Button (Opens Slide-Over Drawer) -->
                <a 
                    id="header-cart-btn"
                    href="<?php echo esc_url( boilerplate_get_cart_url() ); ?>" 
                    class="relative inline-flex items-center gap-2 px-3 py-2 rounded-btn bg-surface-hover/70 hover:bg-secondary border border-border text-text-main transition-all duration-150 group cursor-pointer" 
                    title="<?php esc_attr_e( 'Winkelmand bekijken', 'woo-tailwind' ); ?>"
                    aria-label="<?php esc_attr_e( 'Winkelmand met artikelen', 'woo-tailwind' ); ?>"
                    data-cart-drawer-trigger="true"
                >
                    <div class="relative flex items-center justify-center">
                        <svg class="w-5 h-5 text-text-main group-hover:text-accent transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25c-.67 0-1.19-.578-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007z" />
                        </svg>
                        <?php $cart_count = boilerplate_get_cart_count(); ?>
                        <span class="cart-count-badge <?php echo $cart_count === 0 ? 'opacity-0 scale-75 pointer-events-none' : 'opacity-100 scale-100'; ?> absolute -top-2.5 -right-2.5 flex h-5 min-w-5 items-center justify-center rounded-full bg-accent px-1 text-[11px] font-bold text-white shadow-xs transition-all duration-200">
                            <?php echo esc_html( $cart_count ); ?>
                        </span>
                    </div>
                    <?php if ( boilerplate_is_woocommerce_active() && $cart_count > 0 ) : ?>
                        <span class="cart-subtotal text-xs font-semibold text-text-muted hidden sm:inline">
                            <?php echo boilerplate_get_cart_subtotal(); ?>
                        </span>
                    <?php else : ?>
                        <span class="cart-subtotal text-xs font-semibold text-text-muted hidden sm:inline">
                            <?php esc_html_e( 'Winkelmand', 'woo-tailwind' ); ?>
                        </span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Drawer -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-border bg-surface px-4 pt-3 pb-6 space-y-4 shadow-lg animate-in slide-in-from-top-2 duration-200">
        <!-- Search input in mobile menu -->
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="relative">
            <input 
                type="search" 
                name="s" 
                placeholder="<?php esc_attr_e( 'Zoek in producten...', 'woo-tailwind' ); ?>" 
                class="w-full pl-10 pr-4 py-2 text-sm bg-bg-alt border border-border rounded-input text-text-main placeholder:text-text-muted focus:outline-hidden focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
            />
            <svg class="w-4 h-4 text-text-muted absolute left-3.5 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
            </svg>
        </form>

        <!-- Navigation Links -->
        <nav aria-label="<?php esc_attr_e( 'Mobiele navigatie', 'woo-tailwind' ); ?>">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( [
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'flex flex-col space-y-1',
                    'fallback_cb'    => 'boilerplate_mobile_menu_fallback',
                ] );
            } else {
                boilerplate_mobile_menu_fallback();
            }
            ?>
        </nav>

        <!-- Mobile Account & Cart Quick Bar -->
        <div class="pt-4 border-t border-border flex items-center justify-between gap-3">
            <a href="<?php echo esc_url( boilerplate_get_account_url() ); ?>" class="btn btn-secondary btn-sm flex-1 text-center">
                <?php esc_html_e( 'Mijn Account', 'woo-tailwind' ); ?>
            </a>
            <a href="<?php echo esc_url( boilerplate_get_cart_url() ); ?>" class="btn btn-primary btn-sm flex-1 text-center cursor-pointer" data-cart-drawer-trigger="true">
                <?php esc_html_e( 'Winkelmand Openen', 'woo-tailwind' ); ?>
            </a>
        </div>
    </div>
</header>