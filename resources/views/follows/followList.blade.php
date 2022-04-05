@extends('layouts.login')

@section('content')

<!-- フォローしている人一覧 -->
@foreach($followlists as $followlist)
<a href="/others/{{ $followlist->id }}"><img src="/images/{{ $followlist->images }}" alt="icon" class="usersicon"></a>
@endforeach

<table>
@foreach($followposts as $followpost)
    <tr>
      <td>
        <img src="/images/{{ $followpost->images }}" alt="icon" class="usersicon">
      </td>
      <td>{{ $followpost->username }}</td>
      <td>{{ $followpost->posts }}</td>
      <td>{{ $followpost->created_at }}</td>
    </tr>
@endforeach
</table>


@endsection
