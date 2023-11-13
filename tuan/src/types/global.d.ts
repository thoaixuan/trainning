export {};

declare global {
  interface IfRecord<T = any> {
    [k: string]: T;
  }
}
