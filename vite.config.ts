import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { watch } from 'vite-plugin-watch';
import vue from '@vitejs/plugin-vue';
import autoimport from "unplugin-auto-import/vite"
import components from "unplugin-vue-components/vite"

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
        autoimport({
            vueTemplate: true,
            dts: "resources/scripts/types/auto-imports.d.ts",
            imports: ["vue"],
        }),
        components({
            dirs: ["resources/views/Components"],
            dts: "resources/scripts/types/components.d.ts",
        }),
    ],
});
