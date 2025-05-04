import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

const isProd = process.env.APP_ENV === 'production';

export default defineConfig({
    base: isProd ? 'https://pixel.tomemming.nl/build/' : '/build/',
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
