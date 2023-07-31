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
            dirs: ["resources/scripts/composables", "resources/scripts/utils"],
            imports: [
                "vue",
                {
                    "momentum-trail": ["route", "current"],
                },
                {
                    "@inertiajs/vue3": ["router", "useForm", "usePage", "useRemember"],
                },
            ],
        }),
        components({
            dirs: ["resources/views/Components"],
            dts: "resources/scripts/types/components.d.ts",
            resolvers: [
                // inertia components
                (name: string) => {
                    const components = ["Link", "Head"]

                    if (components.includes(name)) {
                        return {
                            name: name,
                            from: "@inertiajs/vue3",
                        }
                    }
                },

                // layouts
                (name: string) => {
                    if (name.endsWith("Layout")) {

                        return {
                            name: "default",
                            from: `@/views/Layouts/${name}.vue`,
                        }
                    }
                },

                // headless components
                (name: string) => {
                    const components = ["Menu", "MenuButton", "MenuItems", "MenuItem"]

                    if (components.includes(name)) {
                        return {
                            name: name,
                            from: "@headlessui/vue",
                        }
                    }
                },
            ],
        }),
    ],
});
