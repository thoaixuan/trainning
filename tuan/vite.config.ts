import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import vuetify from 'vite-plugin-vuetify';
import fileDetails from './plugins/file_details';
import path from 'path';

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [vue(), vuetify(), fileDetails()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src/'),
    },
  },
});
