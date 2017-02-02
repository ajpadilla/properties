const { mix } = require('laravel-mix');

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

/*mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');*/


 mix.combine([
        'resources/assets/css/bootstrap-3.3.7-dist/css/bootstrap.min.css',
        'resources/assets/css/font-awesome-4.7.0/css/font-awesome.min.css',
        'resources/assets/css/admin-lte/2.3.6/AdminLTE.min.css',
        'resources/assets/css/admin-lte/2.3.6/skins/_all-skins.min.css',
        'resources/assets/css/ionicons-2.0.1/css/ionicons.min.css'        
    ], 'public/css/all.min.css');


mix.js([
        'resources/assets/js/jquery/3.0.0/jquery.min.js',
        'resources/assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js',
        'resources/assets/js/admin-lte/2.3.6/app.min.js',
    ], 'public/js/all.min.js');

mix.copy('resources/assets/css/font-awesome-4.7.0/fonts/', 'public/fonts');