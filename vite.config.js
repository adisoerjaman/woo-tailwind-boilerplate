import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite';
import liveReload from 'vite-plugin-live-reload';
import path from 'path';

export default defineConfig({
    plugins: [
        tailwindcss(),
        liveReload([path.resolve(import.meta.dirname, '**/*.php')]),
    ],
    server: {
        cors: true,
        strictPort: true,
        port: 5173,
        origin: 'http://localhost:5173',
        hmr: {
            host: 'localhost',
        },
    },
    build: {
        outDir: 'dist',
        manifest: true,
        rollupOptions: {
            input: {
                main: path.resolve(import.meta.dirname, 'assets/js/main.js'),
                style: path.resolve(import.meta.dirname, 'assets/css/main.css'),
            },
        },
    },
});