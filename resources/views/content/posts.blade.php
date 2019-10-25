@extends('bases.content')

@section('title', 'All Posts')

@section('content')
    <table>
        <thead>
        <tr>
            <th scope="col">Post ID</th>
            <th scope="col">Author</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created On</th>
            <th scope="col">Last Updated</th>
        </tr>
        </thead>
    @foreach ($posts as $post)
        @include('parts.blog.row', ['title' => $post->title, 'body' => $post->post, 'author' => $post->author(), 'created_on' => $post->created_at, 'updated_on' => $post->updated_at, ])
    @endforeach
    </table>
@endsection
