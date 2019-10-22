@extends('bases.base')

@section('body')
    <p></p>
    <div id="container" style="padding-left: 150px; padding-right: 150px">
        <div id="content" class="bg-light text-dark" style="padding: 25px 100px; border: 5px solid black; border-radius: 25px;">
            @yield('content')
        </div>
    </div>
@endsection
