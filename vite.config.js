import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // CSS
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/css/page-css/index.css',
                'resources/css/page-css/layanan.css',
                'resources/css/page-css/about.css',
                'resources/css/page-css/artikel.css',
                'resources/css/pelayanan/index.css',
                'resources/css/pelayanan/complete.css',
                'resources/css/pelayanan/form.css',
                'resources/css/pelayanan/konfirmasi.css',
                'resources/css/page-css/testimoni.css',
                'resources/css/admin/dashboard.css',
                'resources/css/admin/users/index.css',
                'resources/css/mentors/index.css',
                'resources/css/mentors/create.css',
                'resources/css/mentors/show.css',
                'resources/css/mentors/dashboard.css',
                'resources/css/admin/jadwal/index.css',
                'resources/css/admin/bookings/booking.css',
                'resources/css/profile/index.css',
                'resources/css/profile/show.css',
                'resources/css/review/create.css',
                
                // JS
                'resources/js/mentors/index.js',
                'resources/js/mentors/create.js',
                'resources/js/mentors/show.js',
                'resources/js/jadwal/index.js',
                'resources/js/jadwal/create.js',
                'resources/js/profile/edit.js',
            ],
            refresh: true,
        }),
    ],
});
