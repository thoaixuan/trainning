import 'vuetify/styles';

import { createVuetify } from 'vuetify';
import { mdi } from 'vuetify/iconsets/mdi';

const vuetifyPlugin = createVuetify({
  icons: {
    defaultSet: 'mdi',
    sets: {
      mdi,
    },
  },
});

export { vuetifyPlugin };
