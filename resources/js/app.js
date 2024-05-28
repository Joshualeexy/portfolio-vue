import "./bootstrap";
import "../css/app.css";

import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { fas } from "@fortawesome/free-solid-svg-icons";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import { fab } from "@fortawesome/free-brands-svg-icons";

library.add(fas, fab);
//import function to register Swiper custom elements
import { createApp, h } from "vue";
import { createInertiaApp, Link } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";

import { ZiggyVue } from "../../vendor/tightenco/ziggy/dist/vue.m";

// import vue motion package
import { MotionPlugin } from "@vueuse/motion";

const appName = import.meta.env.VITE_APP_NAME || "Portfolio";

createInertiaApp({
    title: (title) => `${title}  ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue")
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .use(MotionPlugin)
            .use(Toast)
            .component("Link", Link)
            .component("font-awesome-icon", FontAwesomeIcon)
            .mount(el);
    },
    progress: {
        color: "blue",
    },
});
