import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: ['resources/views/**/*.blade.php'],
        }),
    ],
    optimizeDeps: {
        include: ['esbuild'],
    },
    server: {
        host: '0.0.0.0',
        port: 5173,      
        hmr: {
            host: '', 
        }
    }
});