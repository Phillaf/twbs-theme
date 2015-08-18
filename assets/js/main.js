requirejs.config({
    paths: {
        bootstrap_theme: '/bootstrap/app/',
        bootstrap: '../vendor/bootstrap/dist/js/bootstrap',
        jquery: '../vendor/jquery/dist/jquery',
        fontawesome: '../vendor/fontawesome/fonts/*'
    },
    shim: {
        bootstrap: [
            'jquery'
        ]
    },
    packages: [

    ]
});
