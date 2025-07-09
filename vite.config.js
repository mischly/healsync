import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/page-css/index.css',
                'resources/css/page-css/layanan.css',
                'resources/css/page-css/about.css',
                'resources/css/page-css/artikel.css',
                'resources/css/page-css/testimoni.css',
            ],
            refresh: true,
        }),
    ],
});
