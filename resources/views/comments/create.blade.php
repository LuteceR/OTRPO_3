@extends('character-cards.main')

@section('userName')

<div class="user">
    @if ($isAdmin) 
        <span class="userName">🔑 {{ $login }}</span>
    @else 
        <span class="userName">{{ $login }}</span>
    @endif

<script>
    const user = @json(Auth::user());
    // $card = CharacterCard::find(1);

    // $username = $card->user->name;
</script>

</div>

@endsection

@section('characterCards')

<div class="row justify-content-center comments-section">
    <h1 class="comments-title">{{ $card->name }}</h1>
    <h2 class="comments-title">Добавление комментария</h2>

    <form method='POST' action="{{ route('card-comments.store', $card->id) }}">
        @csrf
        <div>
            <p class="attrName">Комментарий</p>
            <input type="hidden" name="username" value="{{ $login }}"> 
            <input type="hidden" name="character_card_id" value="{{ $card->id }}">
            <textarea type='text' name='comment' spellcheck=true maxlength=1000 required></textarea>
        </div>
        <div class='btns'><button type='submit' class="button-ok">ОК</button>
        <div class="button-cancel">Отмена</div></div>
    </form>

</div>
@endsection