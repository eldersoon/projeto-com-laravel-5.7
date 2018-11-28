<?php

use App\Models\Post;

Route::resource('posts', 'PostController');


Route::get('/', function () {
    $lista = Post::listaNoticiasSite();
    return view('admin', compact('lista'));
});


Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');