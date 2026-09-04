/**
 * Theme Main JavaScript
 * Handles mobile menu toggle, accessibility and cart badge animations.
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Mobile Menu Toggle
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

    // 2. WooCommerce Cart Counter Animation on Add-to-Cart
    if (window.jQuery) {
        window.jQuery(document.body).on('added_to_cart removed_from_cart wc_fragments_refreshed', () => {
            const badge = document.querySelector('.cart-count-badge');
            if (badge) {
                badge.classList.remove('opacity-0', 'scale-75', 'pointer-events-none');
                badge.classList.add('animate-bounce');
                setTimeout(() => {
                    badge.classList.remove('animate-bounce');
                }, 1000);
            }
        });
    }
});
