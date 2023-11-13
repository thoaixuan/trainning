import _ from 'lodash';
import { createRouter, createWebHashHistory } from 'vue-router';
import { routes } from '@/routes';

export const routerPlugin = createRouter({
  history: createWebHashHistory(),
  routes,
});
