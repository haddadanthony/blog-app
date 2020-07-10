<?php

use Illuminate\Support\Facades\Route;


Route::get('/posts', 'PostControllerAPI@index');
Route::get('/posts/{id}', 'PostControllerAPI@show');
Route::post('/posts', 'PostController@store');
Route::get('/images', 'PostControllerAPI@getImages');
