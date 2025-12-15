import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],



     // Ajoutez ceci pour la production
    build: {
        rollupOptions: {
            output: {
                assetFileNames: 'assets/[name]-[hash].[ext]',
            }
        }
    }
});

