@extends('bases.content')

@section('title', 'All Posts')

@section('scripts')
    $(document).ready(function(){ $('#posts').DataTable(); });
@endsection

@section('content')
    <table id="posts" style="width: 100%;" class="table">
        <caption>A table listing all Blog Posts</caption>
        <thead class="thead-dark">
        <tr>
            <th scope="col">Post ID</th>
            <th scope="col">Author</th>
            <th scope="col">Title</th>
            <th scope="col">Created On</th>
            <th scope="col">Last Updated</th>
            @if(Auth::check())
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            @endif
        </tr>
        </thead>
    @foreach ($posts as $post)
        @include('parts.post.row', ['id' => $post->id, 'title' => $post->title, 'body' => $post->body, 'author' => $post->poster->name, 'created_on' => $post->created_at, 'updated_on' => $post->updated_at, ])
    @endforeach
    </table>
@endsection
