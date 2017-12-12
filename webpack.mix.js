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
   .sass('resources/assets/sass/app.scss', 'public/css')
   .scripts(
        ['resources/assets/js/sikko.js'],
        'public/js/sikko.js')
        .scripts(
            ['resources/assets/js/op/basemap.js'],
            'public/js/op/basemap.js')
            .scripts(
                ['resources/assets/js/op/measure.js'],
                'public/js/op/measure.js');
mix.js('resources/assets/js/sikko.js', 'public/js/min');