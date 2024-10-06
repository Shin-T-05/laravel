const mix = require('laravel-mix');

mix
    .sass('resources/sass/app.scss', 'public/css')
    .styles('resources/sass/custom.css', 'public/css/custom.css') // custom.css をここで指定
   


