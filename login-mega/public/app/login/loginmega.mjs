import { Storage } from 'megajs';

const email = 'user@example.com';
const password = 'correct horse battery staple';

const storage = new Storage({
  email,
  password,
  userAgent: 'ExampleClient/1.0',
});

storage.login((err) => {
  if (err) {
    console.error('Login failed:', err);
  } else {
    console.log('Logged in successfully!');
  }
});
