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
Route::get('/post/create', function() {
    if (Auth::user() == null) { return redirect()->route('login'); }
    return view('content.post.new_post');
})->name('new_post');

Route::post('/post/create', function(Request $request) {
    Post::create([
        'title' => $request->input('title'),
        'body' => $request->input('body'),
        'user_id' => Auth::user()->id
    ]);
});

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
Route::get('/post/{post}/edit', function(Post $post) {
    $currentUser = Auth::user();
    if ($currentUser == null) {
        return redirect()->route('login');
    } else if ($currentUser->is_administrator || $currentUser == $post->poster) {
        return view('content.post.edit_post', ['post' => $post]);
    } else {
        return abort(403, 'User unable to edit selected post.');
    }
})->name('edit_post');

Route::post('/post/{post}/edit', function(Post $post) {
    $post->update(request($post));
    return redirect()->route('all_posts');
});

/*
 * Post Deletion
 */
Route::get('/post/{post}/delete', function(Post $post) {
    $currentUser = Auth::user();
    if ($currentUser == null) {
        return redirect()->route('login');
    } else if ($currentUser->is_administrator || $currentUser == $post->poster) {
        $post->delete();
        return redirect()->route('all_posts');
    } else {
        return abort(403, 'User unable to delete selected post.');
    }
})->name('delete_post');

