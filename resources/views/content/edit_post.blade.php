@extends('bases.content')

@section('title', 'Edit Post')

@section('content')
    @csrf
    <form action="{{ route('edit_post', ['post' => $post]) }}" method="post">
        @include('parts.blog.form', [ $title = $post->title, $body = $post->body])
    </form>
@endsection
