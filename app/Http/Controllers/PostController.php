<?php


namespace App\Http\Controllers;



use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class PostController extends Controller {

    public function getCreatePost() {
        if (Auth::user() == null) { return redirect()->route('login'); }
        return view('content.post.create_post');
    }

    public function createPost(Request $request) {
        $request->validate(self::RULES);
        Post::create([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'user_id' => Auth::user()->id
        ]);
    }

    public function getUpdatePost(Post $post) {
        $currentUser = Auth::user();
        if ($currentUser == null) {
            return redirect()->route('login');
        } else if ($currentUser->is_administrator || $currentUser == $post->poster) {
            return view('content.post.edit_post', ['post' => $post]);
        } else {
            return abort(403, 'User unable to edit selected post.');
        }
    }

    public function updatePost(Request $request, Post $post) {
        $request->validate(self::RULES);
        $post->update($request->post);
        return redirect()->route('all_posts');
    }

    public function deletePost(Post $post) {
        $currentUser = Auth::user();
        if ($currentUser == null) {
            return redirect()->route('login');
        } else if ($currentUser->is_administrator || $currentUser == $post->poster) {
            $post->delete();
            return redirect()->route('all_posts');
        } else {
            return abort(403, 'User unable to delete selected post.');
        }
    }

}
