/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./plugins/config');
window.Vue = require('vue').default;
// Init component layout
import Vue from 'vue';
import VueToast from 'vue-toast-notification';
//import 'vue-toast-notification/dist/theme-default.css';
import AOS from 'aos'
import 'aos/dist/aos.css';
import 'vue-toast-notification/dist/theme-sugar.css'
import 'vue-good-table/dist/vue-good-table.css';
import VueGoodTablePlugin from 'vue-good-table';
import router from '../../routes/router_vuejs/router';

// Import component layuot
import Main from '../../resources/views/vuejs/layouts/main.vue';
// Import component includes
import Header from '../../resources/views/vuejs/includes/header.vue';
import Footer from '../../resources/views/vuejs/includes/footer.vue';
// element
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import locale from 'element-ui/lib/locale/lang/en'
// Vue meta
import VueMeta from 'vue-meta'
// Import store
import store from './store/store.js';
// Import plugin
import i18n from './plugins/i18n';
// Import vue-slick
import veevalidate from './plugins/veevalidate';
// Import auth

import GAuth from 'vue-google-oauth2'
Vue.component('main-component', Main);
// Init component includes
Vue.component('header-component', Header);
Vue.component('footer-component', Footer);
//Init Vue
Vue.use(VueGoodTablePlugin);
Vue.use(VueToast);
Vue.use(ElementUI, { locale })
Vue.use(VueMeta, {
    keyName: 'metaInfo',
    attribute: 'data-vue-meta',
    ssrAttribute: 'data-vue-meta-server-rendered',
    tagIDKeyName: 'vmid',
    refreshOnceOnNavigation: true
});

function nextFactory(context, middeware, index) {
    const subsequentMiddleware = middeware[index];
    if (!subsequentMiddleware) {
        return context.next;
    }
    return (...parameters) => {
        context.next(...parameters);
        const nextMiddleware = nextFactory(context, middeware, index + 1);
        subsequentMiddleware({ ...context, nextMiddleware });
    }
}
router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware) ? to.meta.middleware : [to.meta.middleware];
        const context = { from, next, router, to };
        const nextMiddleware = nextFactory(context, middleware, 1);
        return middleware[0]({ ...context, nextMiddleware });
    }
    return next();
});
Vue.config.productionTip = false
AOS.init();
const app = new Vue({
    el: '#app',
    router,
    store,
    i18n,
    veevalidate
});
