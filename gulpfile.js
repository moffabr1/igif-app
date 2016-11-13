var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // mix.sass('app.scss');
    mix.less('app.less');
    mix.copy('bower_components/bootstrap/dist/fonts', 'public/assets/fonts');
    mix.copy('bower_components/fontawesome/fonts', 'public/assets/fonts');
    mix.copy('bower_components/jquery-ui', 'public/assets/jquery-ui');
    mix.copy('bower_components/bootstrap-social/bootstrap-social.css', 'public/css/bootstrap-social.css');
    mix.copy('bower_components/Chart.js/Chart.min.js', 'public/assets/scripts/Chart.min.js');
    mix.copy('bower_components/jquery/dist/jquery.min.js', 'public/assets/scripts/jquery.min.js');
    mix.copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/assets/scripts/bootstrap.min.js');
    mix.copy('bower_components/moment/min/moment.min.js', 'public/assets/scripts/moment.min.js');
    mix.copy('bower_components/metisMenu/dist/metisMenu.js', 'public/assets/scripts/metisMenu.min.js');
    mix.copy('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', 'public/assets/scripts/bootstrap-datetimepicker.min.js');
    mix.copy('resources/js/sb-admin-2.js', 'public/assets/scripts/sb-admin-2.js');
    mix.copy('resources/js/frontend.js', 'public/assets/scripts/frontend.js');
    mix.copy('resources/app_images', 'public/app_images');
    mix.styles([
        'bower_components/bootstrap/dist/css/bootstrap.css',
        // 'bower_components/bootstrap-social/bootstrap-social.scss',
        'bower_components/fontawesome/css/font-awesome.css',
        'bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css',
        'resources/css/sb-admin-2.css',
        'resources/css/timeline.css',
        'resources/assets/sass/app.scss'
    ], 'public/assets/stylesheets/styles.css', './');
    // mix.scripts([
    //     // 'bower_components/jquery/dist/jquery.js',
    //     // 'bower_components/bootstrap/dist/js/bootstrap.js',
    //     // 'bower_components/moment/min/moment.min.js',
    //     // 'bower_components/Chart.js/Chart.js',
    //     // 'bower_components/metisMenu/dist/metisMenu.js',
    //     // 'bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
    //     // 'resources/js/sb-admin-2.js',
    //     // 'resources/js/frontend.js'
    // ], 'public/assets/scripts/compiledjs.js', './');
});
