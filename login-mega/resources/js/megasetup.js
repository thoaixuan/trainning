import { Storage } from 'megajs'

const storage = new Storage({
  email: 'user@example.com',
  password: 'correct horse battery example',
  userAgent: 'ExampleApplication/1.0',
  secondFactorCode: '123456'
})

storage.once('ready', () => {
    console.log('Logged in successfully!');
})

storage.once('error', error => {
    console.error('Login failed:', error);
})
