import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel([
            'resources/sass/style.scss',
            '~bootstrap/dist/js/bootstrap.bundle.min.js',
            '~jquery/dist/jquery.js',
            'resources/js/index.js',
        ]),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~jquery': path.resolve(__dirname, 'node_modules/jquery'),
        }
    },
    refresh: true,
});