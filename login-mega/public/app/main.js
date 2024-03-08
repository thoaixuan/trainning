import { Storage, File as MEGAFile } from "https://cdn.skypack.dev/megajs";

export function getStorage() {
    return new Promise((resolve, reject) => {
      const storage = new Storage({
        email: sessionStorage.getItem('email'),
        password: atob(sessionStorage.getItem('password')),
        userAgent: "ExampleApplication/1.0",
      });

      storage.login((err) => {
        if (err) {
          reject(err);
        } else {
          resolve({storage, MEGAFile});
        }
      });
    });
}



