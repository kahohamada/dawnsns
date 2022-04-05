@extends('layouts.login')

@section('content')

<!-- フォローされている人一覧 -->
@foreach($followerlists as $followerlist)
<a href="/others/{{ $followerlist->id }}"><img src="/images/{{ $followerlist->images }}" alt="icon" class="usersicon"></a>
@endforeach

<table>
@foreach($followerposts as $followerpost)
    <tr>
      <td>
        <img src="/images/{{ $followerpost->images }}" alt="icon" class="usersicon">
      </td>
      <td>{{ $followerpost->username }}</td>
      <td>{{ $followerpost->posts }}</td>
      <td>{{ $followerpost->created_at }}</td>
    </tr>
@endforeach
</table>

@endsection
