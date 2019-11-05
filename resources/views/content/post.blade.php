@extends('bases.content')

@section('title', 'All Posts')

@section('content')
    @include('parts.blog.max', ['title' => $post->title, 'body' => $post->post, 'author' => $post->author(), 'date' => $post->created_at])
@endsection
