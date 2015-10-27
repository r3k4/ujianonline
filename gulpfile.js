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

var path_style = 'resources/assets/css/';



elixir(function(mix) {

    mix.sass('app.scss', 'resources/assets/css/plugins/bootstrap.css');


	mix.scripts([
		'jquery-2.1.4.min.js',
		'bootstrap.min.js',
	    'pace.min.js',
        'custom.js'
		], 'public/js/main.js');


    mix.styles([
         "plugins/bootstrap.css",
         "plugins/font-awesome/css/font-awesome.css",
         "plugins/animate/animate.css",
         "plugins/pace/pace.css",

    ], 'public/css/main.css');



    mix.version(["css/main.css", "js/main.js"]);

    mix.copy(path_style+'plugins/font-awesome/fonts', 'public/build/fonts');



});
