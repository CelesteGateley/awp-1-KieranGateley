@extends('bases.content')

@section('title', 'All Posts')

@section('content')
    @include('parts.post.max', ['title' => $post->title, 'body' => $post->body, 'author' => $post->poster->name, 'date' => $post->created_at])
@endsection
