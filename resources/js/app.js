import '../css/app.css'
import {createApp, h} from 'vue'
import {createInertiaApp, Head, Link} from '@inertiajs/inertia-vue3'
import {resolvePageComponent} from 'laravel-vite-plugin/inertia-helpers'
import VueApexCharts from "vue3-apexcharts";

createInertiaApp({
    resolve:  (name) => {
        const page = resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob('./Pages/**/*.vue'),
        )

        return page
    },
    setup({el, app, props, plugin}) {
        createApp({render: () => h(app, props)})
            .use(plugin)
            .use(VueApexCharts)
            .component('InertiaHead', Head)
            .component('InertiaLink', Link)
            .mount(el)
    },
    title: title => `${title} - Mortgage calculator`,
})
