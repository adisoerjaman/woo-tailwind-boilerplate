<?php
/**
 * Main Index Template
 * Showcase of Design Tokens, Buttons, and Cards in Woo Tailwind Boilerplate
 *
 * @package WooTailwindBoilerplate
 */

get_header(); ?>

<main id="primary" class="site-main flex-1">
    <!-- Hero Banner Section -->
    <section class="relative overflow-hidden bg-gradient-to-b from-surface to-bg-alt py-16 lg:py-24 border-b border-border">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl space-y-6">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-badge bg-primary/10 border border-primary/20 text-xs font-bold text-primary">
                    <span class="w-2 h-2 rounded-full bg-accent"></span>
                    <span>Tailwind CSS v4 + Vite + WooCommerce</span>
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-text-main font-heading leading-tight">
                    Modulaire WooCommerce <br class="hidden sm:inline">Boilerplate met <span class="text-accent">Design Tokens</span>
                </h1>
                
                <p class="text-lg text-text-muted leading-relaxed">
                    Een ultrasnelle ontwikkelomgeving voor WordPress &amp; WooCommerce. Alle styling is gebaseerd op configureerbare CSS Custom Properties en herbruikbare button &amp; card utility classes.
                </p>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <a href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : '#shop' ); ?>" class="btn btn-primary btn-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        <span>Bekijk de Shop</span>
                    </a>
                    <a href="#tokens" class="btn btn-secondary btn-lg">
                        <span>Ontdek Design Tokens</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Component & Utility Showcase -->
    <section id="tokens" class="py-16 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">
            
            <!-- 1. Buttons Utility Showcase -->
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-text-main font-heading">
                        1. Herbruikbare Button Utilities
                    </h2>
                    <p class="text-sm text-text-muted mt-1">
                        Knoppen maken gebruik van <code class="px-1.5 py-0.5 rounded-sm bg-secondary text-primary font-mono text-xs">--color-primary</code>, <code class="px-1.5 py-0.5 rounded-sm bg-secondary text-primary font-mono text-xs">--radius-btn</code> en bijbehorende hover-staten.
                    </p>
                </div>

                <div class="p-6 sm:p-8 rounded-card border border-border bg-surface space-y-6">
                    <!-- Button Variations Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Primary Button -->
                        <div class="space-y-2">
                            <span class="text-xs font-medium text-text-muted">.btn-primary</span>
                            <div>
                                <button type="button" class="btn btn-primary w-full">
                                    <span>Primary Button</span>
                                </button>
                            </div>
                        </div>

                        <!-- Secondary Button -->
                        <div class="space-y-2">
                            <span class="text-xs font-medium text-text-muted">.btn-secondary</span>
                            <div>
                                <button type="button" class="btn btn-secondary w-full">
                                    <span>Secondary Button</span>
                                </button>
                            </div>
                        </div>

                        <!-- Accent Button -->
                        <div class="space-y-2">
                            <span class="text-xs font-medium text-text-muted">.btn-accent</span>
                            <div>
                                <button type="button" class="btn btn-accent w-full">
                                    <span>Accent Button</span>
                                </button>
                            </div>
                        </div>

                        <!-- Outline Button -->
                        <div class="space-y-2">
                            <span class="text-xs font-medium text-text-muted">.btn-outline</span>
                            <div>
                                <button type="button" class="btn btn-outline w-full">
                                    <span>Outline Button</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Button Sizes -->
                    <div class="pt-4 border-t border-border flex flex-wrap items-center gap-4">
                        <span class="text-xs font-medium text-text-muted w-full sm:w-auto">Maten:</span>
                        <button type="button" class="btn btn-primary btn-sm">Small (.btn-sm)</button>
                        <button type="button" class="btn btn-primary">Default (.btn)</button>
                        <button type="button" class="btn btn-primary btn-lg">Large (.btn-lg)</button>
                        <button type="button" class="btn btn-secondary btn-icon" title="Icon Only" aria-label="Icon Button">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- 2. Design Tokens Color & Radius Palette -->
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-text-main font-heading">
                        2. Modulaire Design Tokens
                    </h2>
                    <p class="text-sm text-text-muted mt-1">
                        Centraal configureerbaar in <code class="px-1.5 py-0.5 rounded-sm bg-secondary text-primary font-mono text-xs">assets/css/main.css</code> via CSS custom properties en direct bruikbaar in Tailwind utility classes.
                    </p>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
                    <!-- Token 1 -->
                    <div class="card p-4 space-y-2">
                        <div class="h-12 w-full rounded-btn bg-primary shadow-xs"></div>
                        <div class="text-xs">
                            <p class="font-bold text-text-main">--color-primary</p>
                            <p class="text-text-muted font-mono text-[11px]">#0f172a</p>
                        </div>
                    </div>

                    <!-- Token 2 -->
                    <div class="card p-4 space-y-2">
                        <div class="h-12 w-full rounded-btn bg-primary-hover shadow-xs"></div>
                        <div class="text-xs">
                            <p class="font-bold text-text-main">--color-primary-hover</p>
                            <p class="text-text-muted font-mono text-[11px]">#1e293b</p>
                        </div>
                    </div>

                    <!-- Token 3 -->
                    <div class="card p-4 space-y-2">
                        <div class="h-12 w-full rounded-btn bg-secondary border border-border"></div>
                        <div class="text-xs">
                            <p class="font-bold text-text-main">--color-secondary</p>
                            <p class="text-text-muted font-mono text-[11px]">#f1f5f9</p>
                        </div>
                    </div>

                    <!-- Token 4 -->
                    <div class="card p-4 space-y-2">
                        <div class="h-12 w-full rounded-btn bg-accent shadow-xs"></div>
                        <div class="text-xs">
                            <p class="font-bold text-text-main">--color-accent</p>
                            <p class="text-text-muted font-mono text-[11px]">#2563eb</p>
                        </div>
                    </div>

                    <!-- Token 5 -->
                    <div class="card p-4 space-y-2">
                        <div class="h-12 w-full rounded-btn bg-bg-alt border border-border"></div>
                        <div class="text-xs">
                            <p class="font-bold text-text-main">--color-bg-alt</p>
                            <p class="text-text-muted font-mono text-[11px]">#f8fafc</p>
                        </div>
                    </div>

                    <!-- Token 6 -->
                    <div class="card p-4 space-y-2">
                        <div class="h-12 w-full rounded-btn bg-card border border-border"></div>
                        <div class="text-xs">
                            <p class="font-bold text-text-main">--radius-card</p>
                            <p class="text-text-muted font-mono text-[11px]">1rem (16px)</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. WooCommerce Product Card Example -->
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight text-text-main font-heading">
                        3. Voorbeeld Kaartcomponent (.card &amp; .card-hover)
                    </h2>
                    <p class="text-sm text-text-muted mt-1">
                        Demonstratie van hoe kaarten en product grids de design tokens en knoppen gebruiken.
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    <div class="card card-hover overflow-hidden flex flex-col group">
                        <div class="aspect-4/3 bg-gradient-to-tr from-slate-100 to-slate-200 flex items-center justify-center p-6 relative">
                            <span class="absolute top-3 left-3 bg-primary text-primary-text text-[11px] font-bold px-2 py-0.5 rounded-badge">
                                Nieuw
                            </span>
                            <svg class="w-16 h-16 text-slate-400 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.25">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <div class="p-5 flex flex-col flex-1 justify-between space-y-4">
                            <div class="space-y-1">
                                <p class="text-xs font-semibold text-accent uppercase tracking-wider">Kleding &amp; Mode</p>
                                <h3 class="text-base font-bold text-text-main font-heading">Tailwind v4 Premium Hoodie</h3>
                                <p class="text-sm text-text-muted line-clamp-2">Gemaakt van 100% biologisch katoen met een comfortabele pasvorm.</p>
                            </div>
                            <div class="flex items-center justify-between pt-2 border-t border-border">
                                <span class="text-lg font-extrabold text-text-main">€59,95</span>
                                <button type="button" class="btn btn-primary btn-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    <span>Toevoegen</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="card card-hover overflow-hidden flex flex-col group">
                        <div class="aspect-4/3 bg-gradient-to-tr from-blue-50 to-indigo-100 flex items-center justify-center p-6 relative">
                            <span class="absolute top-3 left-3 bg-accent text-white text-[11px] font-bold px-2 py-0.5 rounded-badge">
                                Populair
                            </span>
                            <svg class="w-16 h-16 text-accent/60 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.25">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="p-5 flex flex-col flex-1 justify-between space-y-4">
                            <div class="space-y-1">
                                <p class="text-xs font-semibold text-accent uppercase tracking-wider">Accessoires</p>
                                <h3 class="text-base font-bold text-text-main font-heading">Draadloze Studio Headset</h3>
                                <p class="text-sm text-text-muted line-clamp-2">Noise-cancelling koptelefoon met 40 uur batterijduur en spatial audio.</p>
                            </div>
                            <div class="flex items-center justify-between pt-2 border-t border-border">
                                <span class="text-lg font-extrabold text-text-main">€129,00</span>
                                <button type="button" class="btn btn-primary btn-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    <span>Toevoegen</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="card card-hover overflow-hidden flex flex-col group">
                        <div class="aspect-4/3 bg-gradient-to-tr from-emerald-50 to-teal-100 flex items-center justify-center p-6 relative">
                            <span class="absolute top-3 left-3 bg-success text-white text-[11px] font-bold px-2 py-0.5 rounded-badge">
                                -20% Sale
                            </span>
                            <svg class="w-16 h-16 text-emerald-600/60 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.25">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div class="p-5 flex flex-col flex-1 justify-between space-y-4">
                            <div class="space-y-1">
                                <p class="text-xs font-semibold text-accent uppercase tracking-wider">Gadgets</p>
                                <h3 class="text-base font-bold text-text-main font-heading">Smartwatch Series 9 Pro</h3>
                                <p class="text-sm text-text-muted line-clamp-2">Inclusief hartslagmeter, OLED display en waterdichtheid tot 50m.</p>
                            </div>
                            <div class="flex items-center justify-between pt-2 border-t border-border">
                                <div>
                                    <span class="text-lg font-extrabold text-text-main">€199,00</span>
                                    <span class="text-xs text-text-muted line-through ml-1.5">€249,00</span>
                                </div>
                                <button type="button" class="btn btn-primary btn-sm">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                                    <span>Toevoegen</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</main>

<?php get_footer(); ?>