import type { App } from 'vue';

import { vuetifyPlugin } from './vuetify_plugin';
import { piniaPlugin } from './pinia_plugin';
import { routerPlugin } from './router_plugin';

export function registerPlugins(app: App) {
  app.use(vuetifyPlugin).use(routerPlugin).use(piniaPlugin);
}
