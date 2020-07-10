<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return view('welcome');
})->name('all.posts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/create', 'PostController@create')->name('post.create');
Route::get('/posts/{id}', 'PostController@show')->name('post.show');
Route::post('/posts', 'PostController@store');
Route::delete('/posts/{id}', 'PostController@destroy')->name('post.delete');
Route::get('/posts/edit/{id}', 'PostController@edit')->name('post.edit');
Route::put('/posts/{id}', 'PostController@update')->name('post.update');


Route::get('/image', 'ImageController@show');
Route::get('/image/add', 'ImageController@create');
Route::post('/image', 'ImageController@store');