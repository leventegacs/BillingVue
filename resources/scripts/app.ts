import { createApp, DefineComponent, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { trail } from 'momentum-trail';
import routes from './routes/routes.json'
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers'

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'BillingWithVue';

createInertiaApp({
    title: (title: string) => (title ? `${appName} — ${title}` : `${appName}`),
    resolve: (name: string) => {
        return resolvePageComponent(
            `../views/${name}.vue`,
            import.meta.glob<DefineComponent>("../views/**/*.vue")
        )
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(trail, { routes })
            .mount(el)
    },
})
