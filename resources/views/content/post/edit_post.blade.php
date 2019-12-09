@extends('bases.content')

@section('title', 'Edit Post')

@section('content')
    @include('parts.post.form', [ 'title' => $post->title, 'body' => $post->body, 'action' => route('edit_post', ['post' => $post])])
@endsection
