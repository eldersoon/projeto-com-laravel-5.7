<?php

use App\Models\Post;

Route::resource('posts', 'PostController');


Route::get('/', function () {
    $lista = Post::listaNoticiasSite();
    return view('site', compact('lista'));
});


Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');