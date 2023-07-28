import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { trail } from 'momentum-trail';

import routes from './routes/routes.json'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('../views/**/*.vue', { eager: true })
        return pages[`../views/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(trail, { routes })
            .mount(el)
    },
})
