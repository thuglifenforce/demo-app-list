const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css')
//    .setPublicPath('dist');

mix.js('resources/js/main.js','public/js/common.js')
    .sass('resources/scss/style.scss', 'public/css/style.css')
    .sass('resources/scss/style2.scss', 'public/css/style2.css')
    .postCss('resources/css/style.css','public/css/common.css')
    .sourceMaps();


mix.webpackConfig({ stats: { children: true, }, });



// 'resources/js/jquery-3.3.1.min.js',
//     'resources/js/bootstrap.min.js',
//     'resources/js/owl.carousel.min.js',
//     'resources/js/popper.min.js',

// 'resources/css/bootstrap.min.css',
//         'resources/css/bootstrap.min.css.map',
//         'resources/css/owl.carousel.min.css',


// const mix = require('laravel-mix');

// mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
//     require('postcss-import'),
//     require('tailwindcss'),
//     require('autoprefixer'),
// ]);

// mix.sass('resources/sass/app.scss', 'public/css', {
//     implementation: require('node-sass')
// });


