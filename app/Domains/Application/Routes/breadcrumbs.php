<?php


/**
 * Notícias Categorias
 */
Breadcrumbs::register('admin.categoria_noticias', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Categoria de Notícias', route('admin.noticias'));
});
Breadcrumbs::register('admin.categoria_noticias.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.categoria_noticias');
    $breadcrumbs->push('Novo', route('admin.noticias.add'));
});
Breadcrumbs::register('admin.categoria_noticias.show', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.categoria_noticias');
    $breadcrumbs->push('Exibir', '');
});
Breadcrumbs::register('admin.categoria_noticias.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.categoria_noticias');
    $breadcrumbs->push('Editar', '');
});


/**
 * Notícias
 */
Breadcrumbs::register('admin.noticias', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Notícias', route('admin.noticias'));
});
Breadcrumbs::register('admin.noticias.add', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.noticias');
    $breadcrumbs->push('Novo', route('admin.noticias.add'));
});
Breadcrumbs::register('admin.noticias.show', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.noticias');
    $breadcrumbs->push('Exibir', '');
});
Breadcrumbs::register('admin.noticias.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.noticias');
    $breadcrumbs->push('Editar', '');
});




/**
 * Parceiros
 */
Breadcrumbs::register('admin.parceiros', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Parceiros', route('admin.parceiros'));
});
Breadcrumbs::register('admin.parceiros.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.parceiros');
    $breadcrumbs->push('Novo', route('admin.parceiros.create'));
});
Breadcrumbs::register('admin.parceiros.show', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.parceiros');
    $breadcrumbs->push('Exibir', '');
});
Breadcrumbs::register('admin.parceiros.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.parceiros');
    $breadcrumbs->push('Editar', '');
});




/**
 * Banners
 */
Breadcrumbs::register('admin.banners', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.home');
    $breadcrumbs->push('Banners', route('admin.banners'));
});
Breadcrumbs::register('admin.banners.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.banners');
    $breadcrumbs->push('Novo', route('admin.banners.create'));
});
Breadcrumbs::register('admin.banners.show', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.banners');
    $breadcrumbs->push('Exibir', '');
});
Breadcrumbs::register('admin.banners.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.banners');
    $breadcrumbs->push('Editar', '');
});