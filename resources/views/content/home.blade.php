@extends('bases.content')

@section('title', 'Homepage')

@section('content')
    @foreach ($posts as $post)
        @include('parts.post.min', ['id' => $post->id, 'title' => $post->title, 'body' => $post->body, 'author' => $post->poster->name, 'date' => $post->created_at->format('l jS F Y \\a\\t h:iA'), ])
        <p></p>
    @endforeach
    {{ $posts->links() }}
@endsection
