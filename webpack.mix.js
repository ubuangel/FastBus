const mix = require('laravel-mix');
const { createVuePlugin } = require('vite-plugin-vue2');

mix.webpackConfig({
    devServer: {
        proxy: 'http://localhost:8000', // Cambia esta URL si tu servidor Laravel se está ejecutando en un puerto diferente
    },
    resolve: {
        alias: {
            '@': path.resolve('resources/js'), // Ajusta esta ruta según la estructura de tu proyecto
            '@': path.resolve('resources/css')
        },
    },
});

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .vite({
        plugins: [createVuePlugin()],
        optimizeDeps: {
            include: ['vue', 'vue-router'], // Agrega cualquier otra dependencia que desees optimizar
        },
    })
    .version();
