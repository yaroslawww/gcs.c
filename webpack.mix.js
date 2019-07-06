const mix = require('laravel-mix')
require('laravel-mix-tailwind')

// support pug
mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.pug$/,
                oneOf: [
                    {
                        resourceQuery: /^\?vue/,
                        use: ['pug-plain-loader',],
                    },
                    {
                        use: ['raw-loader', 'pug-plain-loader',],
                    },
                ],
            },
        ],
    },
})

// Not supports on webpack4
/*mix.config.webpackConfig.output = {
    chunkFilename: 'js/[name].bundle.js',
    publicPath: '/',
};*/

mix.options({
    processCssUrls: false,
})
    .sourceMaps()
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/auth.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind()

mix.copy('resources/images', 'public/images/default', false)

if (!mix.inProduction()) {
    mix.webpackConfig({
        devtool: 'inline-source-map',
    })
    mix.browserSync({
        proxy: 'lapibo.home',
        files: [
            'public/css/*.css',
            'public/js/*.js',
            'resources/views/**/*.php',
        ],
    })
}