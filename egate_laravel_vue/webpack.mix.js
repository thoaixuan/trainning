const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
//  mix.js('public/vuejs/app.js', 'public/assets/js')
//  .js('public/vuejs/client_dashboard.js', 'public/assets/js')
//  .vue()
//  .sass('resources/assets/sass/app.scss', 'public/assets/css');
mix
.js([
    "public/vuejs/app.js",
    "public/vuejs/client_dashboard.js",
    /////////// script mix ///////////
    "public/themes/assets/js/main.js",
],'public/build/build.js')
.vue()
.sass('resources/assets/sass/app.scss', 'public/assets/css')
.minify('public/build/build.js');
