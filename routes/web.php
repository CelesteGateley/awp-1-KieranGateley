<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('content.home', ['posts' => App\Post::all()]);
});

Route::get('/posts', function () {
    return view('content.posts', ['posts' => App\Post::all()]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
