<tr>
    <th scope="row">{{ $id }}</th>
    <td>{{ $author }}</td>
    <td>{{ $title }}</td>
    <td>{{ $created_on }}</td>
    <td>{{ $updated_on }}</td>
    @if(Auth::check() && (Auth::user()->is_administrator || Auth::user()->is($post->poster)))
        <td><a href="{{route('delete_post', ['post' => $post,])}}"><ion-icon name="trash"></ion-icon></a></td>
    @elseif(Auth::check())
        <td><ion-icon name="trash"></ion-icon></td>
    @endif
</tr>
