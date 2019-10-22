@extends('bases.base')

@section('body')
    <p></p>
    <div id="container" style="padding-left: 5%; padding-right: 5%">
        <div id="content" class="bg-light text-dark" style="padding: 1% 100px; border: 5px solid black; border-radius: 25px;">
            @yield('content')
        </div>
    </div>
@endsection
