import { createApp } from 'vue';
import './style.scss';
import App from './App.vue';
import { registerPlugins } from './plugins';

const myApp = createApp(App);

registerPlugins(myApp);

myApp.mount('#app');
