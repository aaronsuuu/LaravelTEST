const { mix } = require('laravel-mix/src/File');
const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};

// mix.webpackConfig({
//     resolve:{
//         modules:[
//             path.resolve(__dirname, '')
//         ]
//     }
// });
