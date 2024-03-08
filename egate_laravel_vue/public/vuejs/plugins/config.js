import api from '../../../api.json'
window._ = require('lodash');

try {
    require('bootstrap');
} catch (e) { }

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
// require('axios').defaults.baseURL = "http://localhost:10007";
// require('axios').defaults.baseURL = "https://sys-api.e-gate.vn";
// require('axios').defaults.baseURL = "https://api-dev.e-gate.vn";
require('axios').defaults.baseURL = api.api.baseURL;
require('axios').interceptors.request.use(function (config) {
    config.headers.common = {
        Authorization: `Bearer ${localStorage.getItem('auth')}`,
        "Content-Type": "application/json",
        Accept: "application/json"
    };
    return config;
});

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
const lang = localStorage.getItem('lang') || 'vi';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });