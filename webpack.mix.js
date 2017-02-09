const { mix } = require('laravel-mix');
$ = JQuery = require('jquery');
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
        'resources/assets/css/ionicons-2.0.1/css/ionicons.min.css',
    ], 'public/css/all.min.css');

mix.copy('resources/assets/css/font-awesome-4.7.0/fonts/', 'public/fonts');
mix.copy('resources/assets/js/jquery/3.1.1/jquery-3.1.1.min.js', 'public/js');
mix.copy('resources/assets/js/icheck/icheck.min.js', 'public/js');
mix.copy('resources/assets/js/icheck/skins/flat', 'public/css/icheck/skins/flat');
mix.copy('resources/assets/js/icheck/skins/futurico', 'public/css/icheck/skins/futurico');
mix.copy('resources/assets/js/icheck/skins/line', 'public/css/icheck/skins/line');
mix.copy('resources/assets/js/icheck/skins/minimal', 'public/css/icheck/skins/minimal');
mix.copy('resources/assets/js/icheck/skins/polaris', 'public/css/icheck/skins/polaris');
mix.copy('resources/assets/js/icheck/skins/square', 'public/css/icheck/skins/square');
mix.copy('resources/assets/js/icheck/skins/all.css', 'public/css/icheck/skins/all.css');


mix.js([
        'resources/assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js',
        'resources/assets/js/admin-lte/2.3.6/app.min.js',
    ], 'public/js/all.min.js');

mix.copy('node_modules/@angular', 'public/@angular');
mix.copy('node_modules/angular-in-memory-web-api', 'public/angular-in-memory-web-api');
mix.copy('node_modules/systemjs', 'public/systemjs');
mix.copy('node_modules/core-js', 'public/core-js');
mix.copy('node_modules/reflect-metadata', 'public/reflect-metadata');
mix.copy('node_modules/rxjs', 'public/rxjs');
mix.copy('node_modules/zone.js', 'public/zone.js');






