/**
 * Theme Main JavaScript
 * Handles:
 * 1. Mobile navigation menu toggle
 * 2. Slide-over Cart Drawer (mini-cart) opening/closing & accessibility
 * 3. WooCommerce AJAX events (wc_fragments, added_to_cart, live badge animations)
 */

document.addEventListener('DOMContentLoaded', () => {
    // =========================================================================
    // 1. Mobile Navigation Menu
    // =========================================================================
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('icon-menu-open');
    const iconClose = document.getElementById('icon-menu-close');

    if (menuToggle && mobileMenu) {
        const toggleMenu = (isOpen) => {
            const willOpen = typeof isOpen === 'boolean' ? isOpen : mobileMenu.classList.contains('hidden');
            
            if (willOpen) {
                mobileMenu.classList.remove('hidden');
                menuToggle.setAttribute('aria-expanded', 'true');
                if (iconOpen) iconOpen.classList.add('hidden');
                if (iconClose) iconClose.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
                menuToggle.setAttribute('aria-expanded', 'false');
                if (iconOpen) iconOpen.classList.remove('hidden');
                if (iconClose) iconClose.classList.add('hidden');
            }
        };

        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu();
        });

        // Close on Escape key
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                toggleMenu(false);
                menuToggle.focus();
            }
        });

        // Close on click outside
        document.addEventListener('click', (e) => {
            if (!mobileMenu.classList.contains('hidden') && !mobileMenu.contains(e.target) && !menuToggle.contains(e.target)) {
                toggleMenu(false);
            }
        });
    }

    // =========================================================================
    // 2. Slide-Over Cart Drawer (Mini-Cart)
    // =========================================================================
    const cartDrawer = document.getElementById('cart-drawer');
    const cartBackdrop = document.getElementById('cart-drawer-backdrop');
    const cartPanel = document.getElementById('cart-drawer-panel');
    const cartCloseBtn = document.getElementById('cart-drawer-close');

    /**
     * Open Cart Drawer
     */
    const openCartDrawer = () => {
        if (!cartDrawer || !cartPanel || !cartBackdrop) return;

        // Make visible and allow pointer interactions
        cartDrawer.classList.remove('invisible', 'pointer-events-none');
        cartDrawer.setAttribute('aria-hidden', 'false');

        // Prevent background scrolling
        document.body.classList.add('overflow-hidden');

        // Trigger CSS transition
        requestAnimationFrame(() => {
            cartBackdrop.classList.remove('opacity-0');
            cartBackdrop.classList.add('opacity-100');
            cartPanel.classList.remove('translate-x-full');
        });

        // Focus close button for accessibility
        if (cartCloseBtn) {
            setTimeout(() => cartCloseBtn.focus(), 150);
        }
    };

    /**
     * Close Cart Drawer
     */
    const closeCartDrawer = () => {
        if (!cartDrawer || !cartPanel || !cartBackdrop) return;

        // Trigger slide-out and fade-out
        cartBackdrop.classList.remove('opacity-100');
        cartBackdrop.classList.add('opacity-0');
        cartPanel.classList.add('translate-x-full');
        cartDrawer.setAttribute('aria-hidden', 'true');

        // Restore body scroll
        document.body.classList.remove('overflow-hidden');

        // Hide completely after transition completes (300ms)
        setTimeout(() => {
            if (cartDrawer.getAttribute('aria-hidden') === 'true') {
                cartDrawer.classList.add('invisible', 'pointer-events-none');
            }
        }, 300);
    };

    // Attach click triggers (Header Cart button & other triggers)
    document.addEventListener('click', (e) => {
        const trigger = e.target.closest('[data-cart-drawer-trigger="true"], #header-cart-btn');
        if (trigger) {
            // Allow cmd/ctrl click to open cart page normally if user wishes
            if (e.metaKey || e.ctrlKey) return;
            e.preventDefault();
            openCartDrawer();
        }
    });

    // Close button click
    if (cartCloseBtn) {
        cartCloseBtn.addEventListener('click', (e) => {
            e.preventDefault();
            closeCartDrawer();
        });
    }

    // Backdrop click
    if (cartBackdrop) {
        cartBackdrop.addEventListener('click', () => {
            closeCartDrawer();
        });
    }

    // Escape key listener for Cart Drawer
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && cartDrawer && cartDrawer.getAttribute('aria-hidden') === 'false') {
            closeCartDrawer();
            const headerCart = document.getElementById('header-cart-btn');
            if (headerCart) headerCart.focus();
        }
    });

    // AJAX item removal handling inside cart drawer
    document.addEventListener('click', (e) => {
        const removeBtn = e.target.closest('.cart-item-remove-btn');
        if (removeBtn && cartDrawer && cartDrawer.contains(removeBtn)) {
            const itemRow = removeBtn.closest('.cart-drawer-item');
            if (itemRow) {
                itemRow.style.opacity = '0.4';
                itemRow.style.pointerEvents = 'none';
            }
        }
    });

    // =========================================================================
    // 3. WooCommerce AJAX Events & Automatic Cart Drawer Opening
    // =========================================================================
    if (window.jQuery) {
        // When an item is added to cart via AJAX:
        window.jQuery(document.body).on('added_to_cart', () => {
            // Animate badge
            const badge = document.querySelector('.cart-count-badge');
            if (badge) {
                badge.classList.remove('opacity-0', 'scale-75', 'pointer-events-none');
                badge.classList.add('animate-bounce');
                setTimeout(() => {
                    badge.classList.remove('animate-bounce');
                }, 1000);
            }

            // Auto-open slide-over drawer so user gets immediate visual feedback
            openCartDrawer();
        });

        // When fragments are refreshed
        window.jQuery(document.body).on('wc_fragments_refreshed removed_from_cart', () => {
            const badge = document.querySelector('.cart-count-badge');
            if (badge) {
                badge.classList.remove('opacity-0', 'scale-75', 'pointer-events-none');
            }
        });
    }

    // =========================================================================
    // 4. Mobile Sticky Floating Add-to-Cart Bar (IntersectionObserver)
    // =========================================================================
    const mainBuyBox = document.getElementById('main-buy-box');
    const stickyCartBar = document.getElementById('mobile-sticky-cart-bar');

    if (mainBuyBox && stickyCartBar) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                // When main buy box scrolls above the viewport, show sticky floating bar
                const isScrolledPast = !entry.isIntersecting && entry.boundingClientRect.top < 0;

                if (isScrolledPast) {
                    stickyCartBar.classList.remove('translate-y-full');
                    stickyCartBar.classList.add('translate-y-0');
                    stickyCartBar.setAttribute('aria-hidden', 'false');
                } else {
                    stickyCartBar.classList.remove('translate-y-0');
                    stickyCartBar.classList.add('translate-y-full');
                    stickyCartBar.setAttribute('aria-hidden', 'true');
                }
            });
        }, {
            threshold: 0,
            rootMargin: '0px 0px 0px 0px',
        });

        observer.observe(mainBuyBox);

        // Smooth scroll back to buy box when clicking anywhere on the sticky bar
        stickyCartBar.addEventListener('click', () => {
            mainBuyBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
            
            // Focus quantity or submit button after scroll
            const actionTarget = mainBuyBox.querySelector('button.single_add_to_cart_button, select, input.qty');
            if (actionTarget) {
                setTimeout(() => actionTarget.focus(), 400);
            }
        });
    }
});

