import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'

import '../css/app.css'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'

createInertiaApp({
    title: (title) => `${title} - Laravel + Vue + Inertia.js`,

    resolve: (name) => {
        // Nama komponen dari Laravel dipetakan ke file Vue di folder Pages.
        const pages = import.meta.glob('./Pages/**/*.vue', {
            eager: true,
        })

        return pages[`./Pages/${name}.vue`]
    },

    setup({ el, App, props, plugin }) {
        createApp({
            render: () => h(App, props),
        })
            .use(plugin)
            .mount(el)
    },
})