<?php


// Registration Routes...
$this->get('register', 'RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'RegisterController@register');

//Home Route
$this->get('/','HomeController@index')->name('home');

/**
 * Noticias
 */
$this->get('/noticias','NoticiaController@index')->name('noticias.index');
