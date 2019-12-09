@extends('bases.content')

@section('title', 'Create New Post')

@section('content')
    @csrf
    <form action="{{ route('new_post') }}" method="post">
        @include('parts.blog.form', [ $title = "", $body = ""])
    </form>
@endsection
