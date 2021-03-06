let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/js/config.js', 'public/js')
    .js('resources/assets/js/vue2googlemaps.js', 'public/js')
    .js('resources/assets/js/eventRegister.js', 'public/js')
    .js('resources/assets/js/event.js', 'public/js')
    .js('resources/assets/js/userProfile.js', 'public/js')
    .copy('node_modules/croppie/croppie.css', 'public/css')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .sass('resources/assets/sass/event.scss', 'public/css')
    .version();
