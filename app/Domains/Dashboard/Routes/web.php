<?php

$this->get('/dashboard', 'HomeController@index')->name('admin.home');
$this->get('/admin', function (){
    return redirect()->route('admin.home');
});