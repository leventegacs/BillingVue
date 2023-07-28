import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { watch } from 'vite-plugin-watch';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    resolve: {
        alias: {
            "@": "/resources",
            "~": "/node_modules",
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/scripts/app.ts'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            }
        }),
        watch({
            pattern: "routes/*.php",
            command: "php artisan trail:generate",
        }),
    ],
});
