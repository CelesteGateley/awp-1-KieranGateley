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
