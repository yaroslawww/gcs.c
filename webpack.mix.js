const mix = require('laravel-mix');
require('laravel-mix-tailwind');

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

mix.config.webpackConfig.output = {
    chunkFilename: 'js/[name].bundle.js',
    publicPath: '/',
};

mix.options({
    processCssUrls: false,
})
    .sourceMaps()
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/auth.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind();

mix.copy('resources/images', 'public/images/default', false);

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'inline-source-map'
    })
    mix.browserSync({
        proxy: 'lapibo.home',
        files: [
            'public/css/*.css',
            'public/js/*.js',
            'resources/views/**/*.php',
        ]
    });
}