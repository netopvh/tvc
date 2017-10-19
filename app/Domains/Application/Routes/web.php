<?php

$this->group(['prefix' => 'dashboard','middleware' => ['permission:ver-administracao']],function (){
    $this->group(['prefix' => 'noticias'], function (){
        $this->get('/','NoticiaController@index')->name('admin.noticias');
        $this->get('/create','NoticiaController@create')->name('admin.noticias.add');
    });

    $this->group(['prefix' => 'banners'], function (){
        $this->get('/','BannerController@index')->name('admin.banners');
        $this->get('/data','BannerController@data');
        $this->get('/create','BannerController@create')->name('admin.banners.create');
        $this->post('/create','BannerController@store')->name('admin.banners.store');
        $this->get('/{id]/show','BannerController@show')->name('admin.banners.show');
        $this->get('/{id]/edit','BannerController@edit')->name('admin.banners.edit');
        $this->patch('/{id]/edit','BannerController@update')->name('admin.banners.update');
        $this->delete('/{id]','BannerController@destroy')->name('admin.banners.destroy');
    });

    $this->group(['prefix' => 'parceiros'], function (){
        $this->get('/','ParceiroController@index')->name('admin.parceiros');
        $this->get('/data','ParceiroController@data');
        $this->get('/create','ParceiroController@create')->name('admin.parceiros.create');
        $this->post('/create','ParceiroController@store')->name('admin.parceiros.store');
        $this->get('/{id}/show','ParceiroController@show')->name('admin.parceiros.show');
        $this->get('/{id}/edit','ParceiroController@edit')->name('admin.parceiros.edit');
        $this->patch('/{id}/edit','ParceiroController@update')->name('admin.parceiros.update');
        $this->delete('/{id}','ParceiroController@destroy')->name('admin.parceiros.destroy');
    });
});