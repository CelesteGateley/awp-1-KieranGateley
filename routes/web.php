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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.home', ['posts' => App\Post::all()]);
})->name('home');

Route::get('/posts', function () {
    return view('content.posts', ['posts' => App\Post::all()]);
});

Route::get('/post/{id}', function($id) {
    return view('content.post', ['post' => App\Post::find($id),]);
});

Auth::routes();

Route::get('/home', function() {
    /**
     * TODO: Implement proper change to fix auth redirecting to /home
     */
    abort(404);
});
