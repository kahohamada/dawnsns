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
    <img src="/images/{{ $list->user->images }}" alt="icon" class="usersicon">
  </td>
  <td>{{ $list->user->username }}</td>
  <td>{{ $list->posts }}</td>
  <td>{{ $list->created_at }}</td>

  <td>
    <a class="js-modal-open" href="" data-target="modal{{$list->id}}"><img src="/images/edit.png" alt="edit"></a>

  </td>

  <td>
    <a href="/posts/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="/images/trash.png" alt="trash"></a>
  </td>
</tr>

<div class="modal js-modal" id="modal{{$list->id}}">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">

        <form action="/uptweet" method="post">
            @csrf
            <textarea name="uptweet" rows="1" cols="200">{{ $list->posts }}</textarea>
            <input type="hidden" name="upid" value="{{ $list->id }}">
        <div class="modal-footer">
            <input type="image" src="/images/edit.png" alt="edit">
        </div>
        </form>

            <a class="js-modal-close" href="">閉じる</a>
        </div><!--modal__inner-->
    </div><!--modal-->

@endforeach
</table>





@endsection
