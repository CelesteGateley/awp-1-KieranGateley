<?php


namespace App\Http\Controllers;



use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {

    public function getCreatePost() {
        if (Auth::user() == null) { return redirect()->route('login'); }
        return view('content.post.create_post');
    }

    public function createPost(Request $request) {
        $request->validate(Post::RULES);
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
        $request->validate(Post::RULES);
        $post->update(['title' => $request->title, 'body' => $request->body ]);
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

    public function searchPosts(Request $request) {
        $queryString = $request->get('query');
        $posts = Post::where('title', 'LIKE', '%' . $queryString . '%')->orWhere('body', 'LIKE', '%' . $queryString . '%')->get();
        if (count($posts) < 1) {
            return view('content.post.no_results');
        } elseif (count($posts) == 1) {
            return view('content.post.single_post', ['post' => $posts[0]]);
        } else {
            return view('content.post.search_results', ['posts' => $posts]);
        }
    }

}
