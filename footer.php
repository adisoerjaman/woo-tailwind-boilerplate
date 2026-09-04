<?php
/**
 * Theme Footer Template
 *
 * @package WooTailwindBoilerplate
 */
?>

<!-- USP Section -->
<section class="border-t border-border bg-surface py-8 lg:py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- USP 1 -->
            <div class="flex items-center gap-4 p-4 rounded-card bg-bg-alt border border-border/60">
                <div class="w-11 h-11 rounded-btn bg-accent/10 text-accent flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.125 1.125 0 00-.987 1.106v7.635m12-6.681A6.777 6.777 0 0014.25 4.5m0 0v2.25" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-text-main"><?php esc_html_e( 'Snelle Verzending', 'woo-tailwind' ); ?></h4>
                    <p class="text-xs text-text-muted mt-0.5"><?php esc_html_e( 'Voor 23:59 besteld, morgen in huis', 'woo-tailwind' ); ?></p>
                </div>
            </div>

            <!-- USP 2 -->
            <div class="flex items-center gap-4 p-4 rounded-card bg-bg-alt border border-border/60">
                <div class="w-11 h-11 rounded-btn bg-accent/10 text-accent flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-text-main"><?php esc_html_e( '30 Dagen Bedenktijd', 'woo-tailwind' ); ?></h4>
                    <p class="text-xs text-text-muted mt-0.5"><?php esc_html_e( 'Gratis retourneren & omruilen', 'woo-tailwind' ); ?></p>
                </div>
            </div>

            <!-- USP 3 -->
            <div class="flex items-center gap-4 p-4 rounded-card bg-bg-alt border border-border/60">
                <div class="w-11 h-11 rounded-btn bg-accent/10 text-accent flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75m-3-7.036A11.959 11.959 0 013.598 6 11.99 11.99 0 003 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-text-main"><?php esc_html_e( 'Veilig Betalen', 'woo-tailwind' ); ?></h4>
                    <p class="text-xs text-text-muted mt-0.5"><?php esc_html_e( 'SSL-beveiligd met iDeal & Klarna', 'woo-tailwind' ); ?></p>
                </div>
            </div>

            <!-- USP 4 -->
            <div class="flex items-center gap-4 p-4 rounded-card bg-bg-alt border border-border/60">
                <div class="w-11 h-11 rounded-btn bg-accent/10 text-accent flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.75">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                    </svg>
                </div>
                <div>
                    <h4 class="text-sm font-semibold text-text-main"><?php esc_html_e( 'Persoonlijke Service', 'woo-tailwind' ); ?></h4>
                    <p class="text-xs text-text-muted mt-0.5"><?php esc_html_e( '6 dagen per week bereikbaar', 'woo-tailwind' ); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Multi-Column Footer -->
<footer id="site-footer" class="mt-auto border-t border-border bg-bg-alt text-text-muted">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12">
            
            <!-- Column 1: Brand Bio & Socials (Col span 2) -->
            <div class="lg:col-span-2 space-y-4">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-flex items-center gap-2">
                    <div class="w-8 h-8 rounded-btn bg-primary text-primary-text flex items-center justify-center font-bold text-sm shadow-xs">
                        <span>W</span>
                    </div>
                    <span class="font-extrabold text-xl tracking-tight text-text-main font-heading">
                        <?php bloginfo( 'name' ); ?>
                    </span>
                </a>
                
                <p class="text-sm text-text-muted leading-relaxed max-w-sm">
                    <?php 
                    $description = get_bloginfo( 'description' );
                    echo ! empty( $description ) ? esc_html( $description ) : esc_html__( 'Een moderne, performante en modulaire WooCommerce webshop gebouwd met Tailwind CSS v4 en Vite.', 'woo-tailwind' );
                    ?>
                </p>

                <!-- Social Links -->
                <div class="flex items-center gap-3 pt-2">
                    <a href="#" class="w-9 h-9 rounded-btn bg-surface border border-border flex items-center justify-center text-text-muted hover:text-primary hover:border-primary hover:bg-surface-hover transition-all" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.13-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-btn bg-surface border border-border flex items-center justify-center text-text-muted hover:text-primary hover:border-primary hover:bg-surface-hover transition-all" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-btn bg-surface border border-border flex items-center justify-center text-text-muted hover:text-primary hover:border-primary hover:bg-surface-hover transition-all" aria-label="LinkedIn">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Winkel / Shop Links -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-text-main font-heading">
                    <?php esc_html_e( 'Winkel', 'woo-tailwind' ); ?>
                </h3>
                <ul class="space-y-2.5 text-sm">
                    <li>
                        <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop' ) ); ?>" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Alle Producten', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Nieuwe Collectie', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Bestsellers', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Aanbiedingen', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 3: Klantenservice -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-text-main font-heading">
                    <?php esc_html_e( 'Klantenservice', 'woo-tailwind' ); ?>
                </h3>
                <ul class="space-y-2.5 text-sm">
                    <li>
                        <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Contact & Helpdesk', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Verzending & Levering', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Retourneren & Garantie', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url( boilerplate_get_account_url() ); ?>" class="hover:text-primary transition-colors">
                            <?php esc_html_e( 'Mijn Bestellingen', 'woo-tailwind' ); ?>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Column 4: Nieuwsbrief & Updates -->
            <div class="space-y-4">
                <h3 class="text-sm font-bold uppercase tracking-wider text-text-main font-heading">
                    <?php esc_html_e( 'Blijf op de hoogte', 'woo-tailwind' ); ?>
                </h3>
                <p class="text-xs text-text-muted leading-relaxed">
                    <?php esc_html_e( 'Ontvang 10% korting op je eerste bestelling en exclusieve updates.', 'woo-tailwind' ); ?>
                </p>
                
                <form class="space-y-2" onsubmit="event.preventDefault(); alert('Bedankt voor het inschrijven!');">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <input 
                            type="email" 
                            required 
                            placeholder="<?php esc_attr_e( 'Je e-mailadres...', 'woo-tailwind' ); ?>" 
                            class="w-full px-3.5 py-2 text-sm bg-surface border border-border rounded-input text-text-main placeholder:text-text-muted focus:outline-hidden focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                        />
                        <button type="submit" class="btn btn-primary btn-sm shrink-0">
                            <?php esc_html_e( 'Aanmelden', 'woo-tailwind' ); ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bottom Footer Bar: Copyright & Payment Badges -->
        <div class="mt-12 pt-8 border-t border-border flex flex-col md:flex-row items-center justify-between gap-4 text-xs">
            <p class="text-text-muted text-center md:text-left">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Alle rechten voorbehouden. Gebouwd met Tailwind v4 & Vite.', 'woo-tailwind' ); ?>
            </p>

            <!-- Payment Badges (Clean SVG Icons) -->
            <div class="flex items-center gap-2 text-text-muted">
                <!-- iDeal Badge -->
                <span class="inline-flex items-center justify-center px-2 py-1 rounded-sm bg-surface border border-border text-[10px] font-bold text-text-main shadow-2xs">
                    iDEAL
                </span>
                <!-- Bancontact Badge -->
                <span class="inline-flex items-center justify-center px-2 py-1 rounded-sm bg-surface border border-border text-[10px] font-bold text-text-main shadow-2xs">
                    Bancontact
                </span>
                <!-- Visa Badge -->
                <span class="inline-flex items-center justify-center px-2 py-1 rounded-sm bg-surface border border-border text-[10px] font-bold text-text-main shadow-2xs">
                    VISA
                </span>
                <!-- Mastercard Badge -->
                <span class="inline-flex items-center justify-center px-2 py-1 rounded-sm bg-surface border border-border text-[10px] font-bold text-text-main shadow-2xs">
                    Mastercard
                </span>
                <!-- Apple Pay Badge -->
                <span class="inline-flex items-center justify-center px-2 py-1 rounded-sm bg-surface border border-border text-[10px] font-bold text-text-main shadow-2xs">
                    Apple Pay
                </span>
            </div>
        </div>
    </div>
</footer>

<?php 
// Slide-Over Cart Drawer
get_template_part( 'template-parts/cart-drawer' ); 

wp_footer(); 
?>
</body>
</html>