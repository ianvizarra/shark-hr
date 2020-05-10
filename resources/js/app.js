import "./bootstrap"
import Vue from "vue"
import VueMeta from 'vue-meta'
import PortalVue from 'portal-vue'
import { InertiaApp } from "@inertiajs/inertia-vue"

Vue.config.productionTip = false
Vue.prototype.$route = route

Vue.use(VueMeta)
Vue.use(PortalVue)
Vue.use(InertiaApp)
Vue.mixin({ methods: { route: window.route } })

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const app = document.getElementById('app')

new Vue({
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - Sharx HR` : 'Sharx HR'
    },
    render: h => h(InertiaApp, {
        props: {
            initialPage: JSON.parse(app.dataset.page),
            resolveComponent: name => require(`./pages/${name}`).default,
        },
    }),
}).$mount(app)
