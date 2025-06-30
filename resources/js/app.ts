import { createApp, h } from "vue";
import {createInertiaApp, Link} from "@inertiajs/vue3";
import PrimeVue from "primevue/config";
import Aura from "@primeuix/themes/aura";
import ToastService from "primevue/toastservice";
import 'primeicons/primeicons.css'

createInertiaApp({
    // @ts-expect-error
    resolve: (name) => {
        const pages = import.meta.glob("./pages/**/*.vue", { eager: true });
        return pages[`./pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue, {
                theme: {
                    preset: Aura,
                },
            })
            .component('RouterLink', Link)
            .use(ToastService)
            .mount(el);
    },
}).then((r) => r);
