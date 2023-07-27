import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from "../views/Layouts/AppLayout.vue"
import {trail} from "momentum-trail";
import routes from './routes/routes.json'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('../views/**/*.vue', { eager: true })
        let page = pages[`../views/${name}.vue`];
        page.default.layout = page.default.layout || Layout
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(trail, { routes })
            .mount(el)
    },
})
