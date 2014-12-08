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
    mix.sass('app.scss')
       .publish(
            '../../assets/js/angular',
            'public/js/angular'
        )
       .publish(
            'jquery/dist/jquery.js',
            'public/js/vendor/jquery.js'
        )
       .publish(
            'bootstrap-sass-official/assets/javascripts/bootstrap.js',
            'public/js/vendor/bootstrap.js'
        )
       .publish(
            'font-awesome/css/font-awesome.min.css',
            'public/css/vendor/font-awesome.css'
        )
       .publish(
            'font-awesome/fonts',
            'public/css/fonts'
        )
        .publish(
            'angular/angular.js',
            'public/js/vendor/angular.js'
        )
        .publish(
            'angular-resource/angular-resource.js',
            'public/js/vendor/angular-resource.js'
        )
        .scripts([
            "public/js/vendor/jquery.js",
            "public/js/vendor/bootstrap.js",
            "public/js/vendor/angular.js",
            "public/js/vendor/angular-resource.js",
            "public/js/angular/app.js",
            "public/js/angular/resources/Todo.js",
            "public/js/angular/controllers/TodosController.js"
        ])
        .styles([
            "public/css/app.css",
            "public/css/vendor/font-awesome"
        ])
        .version("public/css/all.css");
});
