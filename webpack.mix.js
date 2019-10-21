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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.styles([
   'public/css/app.css',
   'resources/plugins/editor/richtext.min.css',
   ],'public/css/app.css');
   
   mix.scripts([
   'public/js/app.js',
   'resources/plugins/editor/richtext.js'
   ],'public/js/app.js');
    
