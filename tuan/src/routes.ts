import type { RouteRecordRaw } from 'vue-router';
import { useLocalId } from 'virtual:__filename';

export const routeNames = Object.freeze({
  root: useLocalId('-root'),
  notFound: useLocalId('-not-found'),
  home: useLocalId('home'),
} satisfies IfRecord);

export const homeRouteName = routeNames.home;

export const routes: RouteRecordRaw[] = [
  {
    name: routeNames.root,
    path: '/',
    component: () => import('@/layouts/default_layout/DefaultLayout.vue'),
    children: [
      {
        name: routeNames.home,
        path: '/',
        component: () => import('@/pages/home_page/HomePage.vue'),
      },
    ],
  },
];
