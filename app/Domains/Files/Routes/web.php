<?php

$this->group(['prefix' => 'dashboard'],function (){
    $this->group(['prefix' => 'files'], function (){
        $this->get('/','FileController@showCKeditor4')->name('files.elfinder');
    });
});