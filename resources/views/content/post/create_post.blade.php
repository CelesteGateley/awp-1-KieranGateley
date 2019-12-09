@extends('bases.content')

@section('title', 'Create New Post')

@section('content')
    @include('parts.post.form', [ 'title' => "", 'body' => "", 'action' => route('create_post')])
@endsection
