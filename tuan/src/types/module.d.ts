declare module 'virtual:__filename' {
  const hash: string;
  const id: string;

  const useLocalId: (v: string | number = '') => string;

  export { hash, id, useLocalId };
}
