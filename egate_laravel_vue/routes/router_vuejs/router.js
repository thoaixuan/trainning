import Vue from "vue";
import Router from "vue-router";
Vue.use(Router);
import Home from '../../resources/views/vuejs/pages/Home/Home';
import News from '../../resources/views/vuejs/pages/New/New';
import DeltailNew from '../../resources/views/vuejs/pages/New/DeltailNew';
import Contact from '../../resources/views/vuejs/pages/Contact/Contact';
import AboutUs from '../../resources/views/vuejs/pages/About/About';
import Policy from '../../resources/views/vuejs/pages/Policy/Policy';
import TermsOfUse from '../../resources/views/vuejs/pages/Terms-of-use/Terms-of-use';
import Product from '../../resources/views/vuejs/pages/Product/Product';
import DeltailProduct from '../../resources/views/vuejs/pages/Product/DeltailProduct';
import Login from '../../resources/views/vuejs/pages/Login/Login';
import Signup from '../../resources/views/vuejs/pages/Signup/Signup';
import Cart from '../../resources/views/vuejs/pages/Cart/Cart';
import Payment from '../../resources/views/vuejs/pages/Payment/Payment';
import Test from '../../resources/views/vuejs/layouts/test';
import ListProduct from '../../resources/views/vuejs/pages/Product/listProduct';
import PaymentSuccess from '../../resources/views/vuejs/pages/Payment/Success';
import fastSignup from '../../resources/views/vuejs/pages/Signup/fastSignup';
import Maintenance from '../../resources/views/vuejs/pages/maintenance/maintenance';
import Failed from '../../resources/views/vuejs/pages/Payment/Error.vue';
import EgateGuide from '../../resources/views/vuejs/pages/Guide/egateGuide.vue';
import PaymentGuide from '../../resources/views/vuejs/pages/Guide/paymentGuide.vue';
import PrivacyPolicy from '../../resources/views/vuejs/pages/Policy/PrivacyPolicy.vue';
import PaymentOnline from '../../resources/views/vuejs/pages/PaymentOnline/PaymentOnline.vue';
import PreOrder from '../../resources/views/vuejs/pages/PreOrders/PreOrders.vue';
// Middelware
import check_maintenance from '../../public/vuejs/middleware/maintenance.js';
import auth from '../../public/vuejs/middleware/auth.js';
import cart from '../../public/vuejs/middleware/cart.js';

const routes = [
    { path: '*', redirect: to => {
        // the function receives the target route as the argument
        // a relative location doesn't start with `/`
        // or { path: 'profile'}
        return '/'
      }
    },
    {
        path: '/',
        component: Home,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/news',
        component: News,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/news/:id',
        component: DeltailNew,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/contact',
        component: Contact,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/about-us',
        component: AboutUs,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/policy',
        component: Policy,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/terms-of-use',
        component: TermsOfUse,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        name: "login",
        path: '/login',
        component: Login,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/signup',
        component: Signup,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/product',
        component: Product,
        scrollBehavior(to, from, savedPosition) {
            return { x: 0, y: 0 }
        },
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/product/:id',
        component: DeltailProduct,
        meta: {
            middleware: [check_maintenance]
        }
    },

    {
        name: "cart",
        path: "/cart",
        component: Cart,
        meta: {
            middleware: [cart, check_maintenance]
        }
    },
    {
        name: "payment",
        path: "/payment",
        component: Payment,
        meta: {
            middleware: [auth, check_maintenance]
        }
    },
    {
        name: "test",
        path: "/test",
        component: Test,
        meta: {
            middleware: [check_maintenance]
        }

    },
    {
        path: "/category/:id",
        component: ListProduct,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: "/payment/success",
        component: PaymentSuccess,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: "/maintenance",
        component: Maintenance,
        meta: {
            middleware: [check_maintenance]
        }
    }, {
        name: 'fastSignup',
        path: '/fast_signup',
        component: fastSignup,
    },
    {
        name: 'chinhSach',
        path: '/chinh-sach',
        component: Policy,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        name: 'failed',
        path: '/payment/failed',
        component: Failed,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: '/payment-online',
        component: PaymentOnline,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        name: "bao-mat-du-lieu",
        path: "/bao-mat-du-lieu/",
        component: Policy,
        meta: {
            middleware: [check_maintenance]
        }

    },
    {
        path: "/egate-guide",
        component: EgateGuide,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: "/payment-guide",
        component: PaymentGuide,
        meta: {
            middleware: [check_maintenance]
        }
    },
    {
        path: "/pre-orders",
        name: "preOrders",
        component: PreOrder,
        meta: {
            middleware: [check_maintenance]
        }
    }

]

export default new Router({
    mode: 'history',
    routes
})



