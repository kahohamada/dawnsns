@extends('layouts.login')

@section('content')

<form action="/usersearch" method="post">
  @csrf
  <input type="text" name="search" placeholder="誰をさがす？">
  <input type="submit" value="検索">
</form>


<table>
  @foreach($users as $user)
  <tr>
    <td><img src="/images/{{ $user->images }}" alt="icon"></td>
    <td>{{ $user->username }}</td>
    <td><a href="">フォローをする</a></td>
    <td><a href="">フォローを外す</a></td>
  </tr>
  @endforeach
</table>

@endsection
