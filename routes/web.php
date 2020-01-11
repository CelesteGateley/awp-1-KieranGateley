<?php

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Homepage Route
Route::get('/', function () {
    return view('content.home', ['posts' => App\Post::latest()->paginate(10), ]);
})->name('home');

Auth::routes();

/*
 * Post Creation
 */
Route::get('/post/create', 'PostController@getCreatePost')->name('create_post');

Route::post('/post/create', 'PostController@createPost');

/*
 * Post Reading
 */
Route::get('/posts', function () {
    return view('content.post.all_posts', ['posts' => App\Post::all()]);
})->name('all_posts');

Route::get('/post/{post}', function(Post $post) {
    return view('content.post.single_post', ['post' => $post,]);
})->name('post');

/*
 * Post Updating
 */
Route::get('/post/{post}/edit', 'PostController@getUpdatePost')->name('edit_post');

Route::post('/post/{post}/edit', 'PostController@updatePost');

Route::post('/search', 'PostController@searchPosts')->name('search_posts');

/*
 * Post Deletion
 */
Route::get('/post/{post}/delete', 'PostController@deletePost')->name('delete_post');

/*
 * All Users
 */
Route::get('/users', function() {
    if (Auth::user() == null) { return redirect()->route('login'); }
    return view('content.users', ['users' => App\User::all()]);
})->name('all_users');
