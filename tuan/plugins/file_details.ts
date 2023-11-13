import path from 'node:path';
import * as Crypto from 'node:crypto';

import { PluginOption } from 'vite';
import _ from 'lodash';

export default function fileDetails() {
  const name = 'file-details-plugin';
  const virtualModuleId = 'virtual:__filename';

  return {
    name,
    resolveId(source: string, importer: string) {
      if (source !== virtualModuleId) return;

      const importerPath = path.resolve(importer);

      const md5 = Crypto.createHash('md5');
      md5.update(importerPath);
      const hash = md5.digest().toString('base64url').replace(/[=]+/g, '');

      return name + ':' + hash;
    },
    load: (id) => {
      if (!id.startsWith(name)) return;
      const hash = id.slice(id.indexOf(':') + 1);
      const idValue = hash + '_';

      return /* javascript */ `
        export const hash = "${hash}";
        export const id = "${idValue}";
        export const useLocalId = (v="") => {
          return id + v.toString().replace(/[\\s\\-]/g, "_");
        }

      `;
    },
  } as PluginOption;
}
