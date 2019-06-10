let mix = require('laravel-mix')

mix.setPublicPath('dist')
    .js('resources/js/tool.js', 'js')
    .sass('resources/sass/tool.scss', 'css')

    .js('resources/js/template-field/field.js', 'js/template-field.js')
    .sass('resources/sass/template-field/field.scss', 'css/template-field.css')