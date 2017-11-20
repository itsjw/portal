let mix = require('laravel-mix');
let webpack = require('webpack');
let tailwindcss = require('tailwindcss');

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

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css')
    .options({
        processCssUrls: false,
        postCss: [ tailwindcss('./tailwind-config.js') ],
    })
    .sourceMaps()
    .version();

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.(gif|png|jpe?g|svg)$/i,
                exclude: /node_modules(?!\/foundation-sites)|bower_components/,
                loaders: [
                    'file-loader', {
                        loader: 'image-webpack-loader',
                        options: {
                            gifsicle: {
                                interlaced: false,
                            },
                            optipng: {
                                optimizationLevel: 7,
                            },
                            pngquant: {
                                quality: '65-90',
                                speed: 4
                            },
                            mozjpeg: {
                                progressive: true,
                                quality: 65
                            },
                            webp: {
                                quality: 75
                            }
                        }
                    }
                ]
            }
        ]
    }
});
