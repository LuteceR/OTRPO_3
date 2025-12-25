@extends('character-cards.main')

@section('characterCards')
<div class="row justify-content-center comments-section">
  <a class="feed-btn" href="/dashboard/feed">Свежие записи друзей </a>

  <h3 class="subheader">Друзья</h3>
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Имя</th>
        <th>Почта</th>
      </tr>
    </thead>
    <tbody>
      @foreach (Auth::user()->friends as $friend)
      <tr>
          <td>{{ $friend->name }}</td>
          <td>{{ $friend->email }}</td>
          <td>
            <form action="{{ route('friend.destroy', $friend->id) }}" method="POST" style="width: 12rem">
                @csrf <button type="submit">Удалить из друзей</button>
            </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <h3 class="subheader">Другие пользователи</h3>
  <table style="width:100%;">
    <thead>
      <tr>
        <th>Имя</th>
        <th>Почта</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($not_friends as $friend)
      <tr>
          <td>{{ $friend->name }}</td>
          <td>{{ $friend->email }}</td>
          <td>
            <form action="{{ route('friend.store', $friend->id) }}" method="POST" style="width: 12rem">
                @csrf <button type="submit">Добавить друга</button>
            </form>
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@stop