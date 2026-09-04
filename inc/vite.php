<?php
// inc/vite.php

// Herken zowel 'development' als 'local' (van LocalWP)
define('IS_VITE_DEVELOPMENT', (
    defined('WP_ENVIRONMENT_TYPE') && 
    in_array(WP_ENVIRONMENT_TYPE, ['development', 'local'], true)
));

function boilerplate_enqueue_vite_assets() {
    if (IS_VITE_DEVELOPMENT) {
        // 1. Laad de Vite client voor HMR (Hot Module Replacement)
        add_action('wp_head', function() {
            echo '<script type="module" src="http://localhost:5173/@vite/client"></script>';
        });

        // 2. Laad de JS en CSS direct vanuit de lokale Vite server
        wp_enqueue_script_module('vite-main', 'http://localhost:5173/assets/js/main.js', [], null);
        wp_enqueue_style('vite-style', 'http://localhost:5173/assets/css/main.css', [], null);
    } else {
        // Productie modus: lees het gegenereerde manifest.json bestand
        $manifest_path = get_theme_file_path('/dist/.vite/manifest.json');
        if (!file_exists($manifest_path)) {
            $manifest_path = get_theme_file_path('/dist/manifest.json');
        }

        if (file_exists($manifest_path)) {
            $manifest = json_decode(file_get_contents($manifest_path), true);

            // Laad gecompileerde JS
            if (isset($manifest['assets/js/main.js']['file'])) {
                wp_enqueue_script(
                    'theme-main', 
                    get_theme_file_uri('/dist/' . $manifest['assets/js/main.js']['file']), 
                    [], 
                    null, 
                    true
                );
            }

            // Laad gecompileerde CSS
            if (isset($manifest['assets/css/main.css']['file'])) {
                wp_enqueue_style(
                    'theme-style', 
                    get_theme_file_uri('/dist/' . $manifest['assets/css/main.css']['file']), 
                    [], 
                    null
                );
            }
        }
    }
}
add_action('wp_enqueue_scripts', 'boilerplate_enqueue_vite_assets');