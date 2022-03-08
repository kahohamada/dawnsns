@extends('layouts.login')

@section('content')
<form action="/tweet" method="post">
    @csrf
    <input type="text" name="tweet" placeholder="なにをつぶやこうか？">
    <input type="image" src="/images/post.png" alt="送信する">
</form>

<table>
@foreach($lists as $list)
<tr>
  <td>
    <img src="/images/{{ $list->user->images }}" alt="icon">
  </td>
  <td>{{ $list->user->username }}</td>
  <td>{{ $list->posts }}</td>
  <td>{{ $list->created_at }}</td>
  <td>
    <img src="/images/edit.png" alt="edit">
  </td>
  <td>
    <a href="/posts/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" alt="trash"></a>
  </td>
</tr>

<form action="/uptweet" method="post">
  @csrf
  <input type="text" name="uptweet" value="{{ $list->posts }}">
  <input type="hidden" name="upid" value="{{ $list->id }}">
  <input type="image" src="/images/edit.png" alt="edit">
</form>
@endforeach
</table>





@endsection
