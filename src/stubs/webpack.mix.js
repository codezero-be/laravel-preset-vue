const mix = require('laravel-mix');

require('laravel-mix-tailwind');
require('laravel-mix-purgecss');

mix.js('resources/js/app.js', 'public/js')
    .extract(['vue', 'axios'])
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind()
    .purgeCss()
    .version();
