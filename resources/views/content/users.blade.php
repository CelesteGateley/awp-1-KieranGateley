@extends('bases.content')

@section('title', 'All Users')

@section('content')
    <table style="width: 100%;" class="table">
        <caption>A table listing all Blog Posts</caption>
        <thead class="thead-dark">
        <tr>
            <th scope="col">User ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Verified On</th>
            <th scope="col">Registered</th>
            <th scope="col">Last Updated</th>
        </tr>
        </thead>
        @foreach ($users as $user)
            @include('parts.user.row', ['id' => $user->id, 'email' => $user->email, 'name' => $user->name, 'verified_on' => $user->email_verified_at, 'created_on' => $user->created_at, 'updated_on' => $user->updated_at, ])
        @endforeach
    </table>
@endsection

