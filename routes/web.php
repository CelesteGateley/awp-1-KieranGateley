<?php

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('content.home', ['posts' => App\Post::latest()->paginate(10), ]);
})->name('home');

Route::get('/posts', function () {
    return view('content.posts', ['posts' => App\Post::all()]);
})->name('all_posts');

Route::get('/post/{post}', function(Post $post) {
    return view('content.post', ['post' => $post,]);
})->name('post');

Route::get('/post/create', function() {
    if (Auth::user() == null) { return redirect()->route('login'); }
    return view('content.new_post');
})->name('new_post');

Route::post('/post/create', function(Request $request) {
    Post::create([
        'title' => $request->input('title'),
        'body' => $request->input('body'),
        'user_id' => Auth::user()->id
    ]);
});



Route::get('/post/{post}/delete', function(Post $post) {
    $currentUser = Auth::user();
    if ($currentUser == null) {
        return redirect()->route('login');
    } else if ($currentUser->is_administrator || $currentUser == $post->poster) {
        $post->delete();
        return redirect()->route('all_posts');
    } else {
        abort(403, 'User unable to delete selected post.');
    }

})->name('delete_post');

Auth::routes();
