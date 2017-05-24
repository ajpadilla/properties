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
mix.copy('resources/assets/css/bootstrap-3.3.7-dist/fonts/', 'public/fonts');
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
        'resources/assets/js/jquery/3.1.1/jquery-3.1.1.min.js',
        'resources/assets/css/bootstrap-3.3.7-dist/js/bootstrap.min.js',
        'resources/assets/js/admin-lte/2.3.6/app.min.js',
    ], 'public/js/all.min.js');

mix.copy('resources/assets/css/vue-styles.css', 'public/css/vue-styles.css');
mix.copy('resources/assets/js/models/typeProperty/config.js', 'public/js/models/typeProperty/config.js');
mix.copy('resources/assets/js/models/typeAnimal/config.js', 'public/js/models/typeAnimal/config.js');
mix.copy('resources/assets/js/models/disability/config.js', 'public/js/models/disability/config.js');
mix.copy('resources/assets/js/models/typeIdentification/config.js', 'public/js/models/typeIdentification/config.js');
mix.copy('resources/assets/js/models/typeCommunity/config.js', 'public/js/models/typeCommunity/config.js');
mix.copy('resources/assets/js/models/educationalLevel/config.js', 'public/js/models/educationalLevel/config.js');
mix.copy('resources/assets/js/models/currency/config.js', 'public/js/models/currency/config.js');
mix.copy('resources/assets/js/models/typePqr/config.js', 'public/js/models/typePqr/config.js');
mix.copy('resources/assets/js/models/typeRepresentative/config.js', 'public/js/models/typeRepresentative/config.js');
mix.copy('resources/assets/js/models/typeInfraction/config.js', 'public/js/models/typeInfraction/config.js');
mix.copy('resources/assets/js/models/country/config.js', 'public/js/models/country/config.js');
mix.copy('resources/assets/js/models/state/config.js', 'public/js/models/state/config.js');
mix.copy('resources/assets/js/models/municipality/config.js', 'public/js/models/municipality/config.js');
mix.copy('resources/assets/js/models/community/config.js', 'public/js/models/community/config.js');
mix.copy('resources/assets/js/models/person/config.js', 'public/js/models/person/config.js');
mix.copy('resources/assets/js/models/property/config.js', 'public/js/models/property/config.js');
mix.copy('resources/assets/js/models/briefcase/config.js', 'public/js/models/briefcase/config.js');
mix.copy('resources/assets/js/models/interest/config.js', 'public/js/models/interest/config.js');
mix.copy('resources/assets/js/models/sanction/config.js', 'public/js/models/sanction/config.js');
mix.copy('resources/assets/js/models/due/config.js', 'public/js/models/due/config.js');
mix.copy('resources/assets/js/models/briefcase/interest/config.js', 'public/js/models/briefcase/interest/config.js');


mix.js('resources/assets/js/crud.js', 'public/js/crud.js');







