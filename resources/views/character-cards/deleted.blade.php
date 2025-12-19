@extends('character-cards.main')

@section('modalCards')
<div class='table'>
<span>Удалённые карточки</span>

@foreach($cards as $card)
    <div>
        <span>{{ $card->name }}</span>

        <form action="{{ route('character-cards.restore', $card->id) }}"
              method="POST"
              style="display:inline">
            @csrf
            @method('PATCH')
            <button type="submit">Восстановить</button>
        </form>
    </div>
@endforeach

<a class='bttn' href="{{ route('character-cards.index') }}">Назад</a>
</div>
@endsection