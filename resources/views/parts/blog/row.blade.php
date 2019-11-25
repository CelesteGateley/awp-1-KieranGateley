<tr>
    <th scope="row">{{ $id }}</th>
    <td>{{ $author }}</td>
    <td>{{ $title }}</td>
    <td>{{ $created_on }}</td>
    <td>{{ $updated_on }}</td>
    @if(Auth::check())
        <td><a href="{{route('delete_post', ['post' => $post,])}}"><ion-icon name="trash"></ion-icon></a></td>
    @endif
</tr>
