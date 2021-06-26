const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

    mix.styles([
        'resources/assert/css/font-awesome.min.css',
        'resources/assert/css/simple-line-icons.min.css',
        'resources/assert/css/style.css',
    ], 'public/assert/css/style.css')
    .scripts([
        'resources/assert/js/jquery.min.js',
        'resources/assert/js/popper.min.js',
        'resources/assert/js/bootstrap.min.js',
        'resources/assert/js/pace.min.js',
        'resources/assert/js/Chart.min.js',
        'resources/assert/js/template.js',
    ], 'public/assert/js/scripts.js')
    .js('resources/js/app.js', 'public/js').vue()
    .webpackConfig(require('./webpack.config'));

if (mix.inProduction()) {
    mix.version();
}
