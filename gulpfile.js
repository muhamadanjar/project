const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
        .sass('map.scss')
       .webpack('app.js')
       .scripts(
        ['maps/editor-polyline.js','ajax.js'],
        'public/js/map/editor-polyline.js')
        .scripts(
            ['maps/wms.js'],
            'public/js/map/wms.js')
        .scripts(
                ['maps/searchplaces.js'],
                'public/js/map/searchplaces.js')
        .scripts(
            ['maps/geolocation.js','maps/traffic.js'],
            'public/js/map/map.js')            
        .scripts(
            ['sismiop.js'],
            'public/js/sismiop.js');
});
