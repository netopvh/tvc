let mix = require('laravel-mix');

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

/**
 * BACKEND
 */

mix.copy('resources/assets/backend/js/plugins/forms/selects/select2/dist/js/select2.min.js','public/backend/js/plugins/select2.min.js');
mix.copy('resources/assets/backend/js/plugins/forms/selects/select2/dist/js/i18n/pt-BR.js','public/backend/js/plugins/select2.pt-BR.js');
mix.copy('resources/assets/backend/js/plugins/forms/validation/validate.min.js','public/backend/js/plugins/jquery.validate.min.js');
mix.copy('resources/assets/backend/js/plugins/forms/validation/additional_methods.min.js','public/backend/js/plugins/additional-methods.min.js');
mix.copy('resources/assets/backend/js/plugins/forms/validation/localization/messages_pt_BR.min.js','public/backend/js/plugins/messages_pt_BR.min.js');
mix.copy('resources/assets/backend/js/plugins/ui/nicescroll.min.js','public/backend/js/plugins/nicescroll.min.js');
mix.copy('resources/assets/backend/js/plugins/tables/datatables/datatables.min.js','public/backend/js/plugins/datatables.min.js');
mix.copy('resources/assets/backend/js/plugins/tables/datatables/extensions/buttons.min.js','public/backend/js/plugins/buttons.min.js');

mix.js([
    'resources/assets/backend/js/core/app.js',
    'resources/assets/backend/js/pages/layout_fixed_custom.js',
    'resources/assets/backend/js/plugins/ui/ripple.min.js'
], 'backend/js/bundle.js')
    .version();

mix.js([
    'resources/assets/backend/js/plugins/forms/styling/switchery.min.js',
    'resources/assets/backend/js/plugins/pickers/datepicker.js',
    'resources/assets/backend/js/plugins/pickers/datepicker_pt-BR.js',
    'resources/assets/backend/js/plugins/forms/inputs/duallistbox.min.js',
    'resources/assets/backend/js/plugins/notifications/sweet_alert.min.js',
    'resources/assets/backend/js/plugins/notifications/bootbox.min.js',
    'resources/assets/backend/js/plugins/forms/styling/uniform.min.js',
    'resources/assets/backend/js/plugins/media/fancybox.min.js',
    'resources/assets/backend/js/plugins/ui/moment/moment.js',
    'resources/assets/backend/js/plugins/forms/mask/inputmask/dist/jquery.inputmask.bundle.js'
], 'backend/js/theme.js')
    .version();

/**
 *
 * FRONTEND
 *
 */

mix.copyDirectory('resources/assets/frontend/fonts', 'public/frontend/fonts');
mix.copyDirectory('resources/assets/frontend/images', 'public/frontend/images');
mix.copyDirectory('resources/assets/frontend/js','public/frontend/js');

mix.styles([
    'resources/assets/frontend/css/bootstrap.css',
    'resources/assets/frontend/css/settings.css',
    'resources/assets/frontend/css/jquery.fancybox-1.3.4.css',
    'resources/assets/frontend/css/font-awesome.css',
    'resources/assets/frontend/css/lightslider.min.css',
    'resources/assets/frontend/css/style.css',
    'resources/assets/frontend/css/responsive.css'
],'public/frontend/css/all.css')
    .version();

mix.js([
    'resources/assets/frontend/js/script.js'
], 'frontend/js/app.js')
    .version();