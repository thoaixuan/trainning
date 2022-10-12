import Vue from 'vue';
import {Pagination} from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import App from './App.vue';

Vue.use(Pagination);
Vue.component(Pagination.name, Pagination);

new Vue({
  el: '#app',
  render: h => h(App)
});