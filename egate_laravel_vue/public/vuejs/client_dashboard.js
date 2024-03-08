require('./plugins/config');
window.Vue = require('vue').default;
import Vue from 'vue';
import VueMeta from 'vue-meta'
import MainClientDashboard from '../../resources/views/vuejs/layouts/clients-dashboard.vue';
import router from '../../routes/router_vuejs/router_client_dashboard';
import store from './store/store.js';
import i18n from './plugins/i18n';
import veevalidate from './plugins/veevalidate';
import VueToast from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css'
import locale from 'element-ui/lib/locale/lang/en'
// element
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import SocketIO from 'socket.io-client'
import VueSocketIO from 'vue-socket.io'

import api from '../../api.json'

// Client dashboard
Vue.component('main-client-dahboard-component', MainClientDashboard);
Vue.use(VueToast);
Vue.use(VueMeta);
Vue.use(new VueSocketIO({
    connection: SocketIO(api.api.socketURL, {
        autoConnect: false,
    })
}));
Vue.use(ElementUI, { locale })
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
const app_client_dahboard = new Vue({
    el: '#app-client-dahboard',
    router,
    store,
    i18n,
    veevalidate
});