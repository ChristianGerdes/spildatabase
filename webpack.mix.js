const mix = require('laravel-mix')
const tailwindcss = require('tailwindcss')

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css', {}, [
        tailwindcss('./tailwind.config.js')
    ])
    .options({
        processCssUrls: false,
    })