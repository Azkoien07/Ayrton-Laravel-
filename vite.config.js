import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    base: 'https://ayrton-laravel-production.up.railway.app/build/',
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: ['resources/views/**/*.blade.php'],
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        hmr: {
            host: 'ayrton-laravel-production.up.railway.app',
            protocol: 'wss',
        },
    },
});
