@extends('bases.content')

@section('title', 'Posts')

@section('content')
    @foreach ($posts as $post)
        @include('parts.blog.min', ['title' => $post->title, 'body' => $post->post, 'author' => $post->author() ])
        <p></p>
    @endforeach
@endsection
