<?php
// inc/vite.php

/**
 * Check if the Vite dev server is actively running on localhost:5173.
 *
 * @return bool
 */
function boilerplate_is_vite_dev_server_running() {
    static $is_running = null;
    if ( null !== $is_running ) {
        return $is_running;
    }

    if ( ! ( defined( 'WP_ENVIRONMENT_TYPE' ) && in_array( WP_ENVIRONMENT_TYPE, [ 'development', 'local' ], true ) ) ) {
        $is_running = false;
        return false;
    }

    // Snelle check met fsockopen (timeout 0.1s)
    $connection = @fsockopen( 'localhost', 5173, $errno, $errstr, 0.1 );
    if ( is_resource( $connection ) ) {
        fclose( $connection );
        $is_running = true;
    } else {
        $is_running = false;
    }

    return $is_running;
}

function boilerplate_enqueue_vite_assets() {
    if ( boilerplate_is_vite_dev_server_running() ) {
        // 1. Laad de Vite client voor HMR (Hot Module Replacement)
        add_action( 'wp_head', function() {
            echo '<script type="module" src="http://localhost:5173/@vite/client"></script>';
        } );

        // 2. Laad de JS en CSS direct vanuit de lokale Vite server
        wp_enqueue_script_module( 'vite-main', 'http://localhost:5173/assets/js/main.js', [], null );
        wp_enqueue_style( 'vite-style', 'http://localhost:5173/assets/css/main.css', [], null );
    } else {
        // Productie / Fallback modus: lees het gegenereerde manifest.json bestand
        $manifest_path = get_theme_file_path( '/dist/.vite/manifest.json' );
        if ( ! file_exists( $manifest_path ) ) {
            $manifest_path = get_theme_file_path( '/dist/manifest.json' );
        }

        if ( file_exists( $manifest_path ) ) {
            $manifest = json_decode( file_get_contents( $manifest_path ), true );

            // Laad gecompileerde CSS
            if ( isset( $manifest['assets/css/main.css']['file'] ) ) {
                wp_enqueue_style(
                    'theme-style', 
                    get_theme_file_uri( '/dist/' . $manifest['assets/css/main.css']['file'] ), 
                    [], 
                    null
                );
            }

            // Laad gecompileerde JS
            if ( isset( $manifest['assets/js/main.js']['file'] ) ) {
                wp_enqueue_script(
                    'theme-main', 
                    get_theme_file_uri( '/dist/' . $manifest['assets/js/main.js']['file'] ), 
                    [], 
                    null, 
                    true
                );
            }
        }
    }
}
add_action( 'wp_enqueue_scripts', 'boilerplate_enqueue_vite_assets' );