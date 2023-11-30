import Vue from "vue";
import Router from "vue-router";
Vue.use(Router);

import Home from '../../resources/views/vuejs/pages/ClientsDashboard/home.vue';
import chatGPT from '../../resources/views/vuejs/pages/ClientsDashboard/chatgpt/index.vue';
import Wallet from '../../resources/views/vuejs/pages/ClientsDashboard/e-wallet/ewallet.vue';
import Profile from '../../resources/views/vuejs/pages/ClientsDashboard/profile/profile.vue';
import order from '../../resources/views/vuejs/pages/ClientsDashboard/order/order.vue';
import Ticket from '../../resources/views/vuejs/pages/ClientsDashboard/ticket/ticket.vue';
import Chat from '../../resources/views/vuejs/pages/ClientsDashboard/ticket/components/chat.vue';
import auth_client_dashboard from '../../public/vuejs/middleware/auth_client_dashboard.js';
import egate from '../../resources/views/vuejs/pages/ClientsDashboard/e-gate/egate.vue';
import deltailEgate from '../../resources/views/vuejs/pages/ClientsDashboard/e-gate/detail.vue'

const routes = [
    {
        path: '/clients-dashboard',
        component: Home,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
    {
        path: '/clients-dashboard/e-gate-gpt-chat',
        component: chatGPT,
    },
    {
        path: '/clients-dashboard/wallet',
        component: Wallet,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
    {
        path: '/clients-dashboard/profile',
        component: Profile,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
    {
        path: '/clients-dashboard/order',
        component: order,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
    {
        path: '/clients-dashboard/ticket',
        component: Ticket,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
    {
        path:'/clients-dashboard/ticket/chat',
        component:Chat,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
    {
        name:"egate",
        path:'/clients-dashboard/egate',
        component:egate,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
    {
        name:"deltail_egate",
        path:'/clients-dashboard/egate/:id',
        component:deltailEgate,
        meta: {
            middleware: [auth_client_dashboard]
        }
    },
 


]
export default new Router({
    mode: 'history',
    routes
})


