const mix = require('laravel-mix');

mix.js('resources/js/custom.js', 'public/js') // Add your custom JS file here
    .js('resources/js/app.js', 'public/js')
   .js('resources/js/custom.js', 'public/js') // Add your custom JS file here
   .sass('resources/sass/app.scss', 'public/css');
