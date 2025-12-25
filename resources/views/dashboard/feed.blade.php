@extends('character-cards.main')

@section('characterCards')

<div class="row justify-content-center comments-section">
    <div class="comments-list">
        @foreach ($comments as $comment)
            @php
            $isFriend = Auth::user()->isFriend($comment->user_id);
            @endphp
            <div class="comment">
                <h4>Карточка: {{ $comment->getCardName() }}</h4>
                <span class="comment-user {{ $isFriend ? 'friend-comment' : '' }}" >{{ $isFriend ? '✋' : '' }} {{ $comment->getUser() }}</span>
                <span class="created-at">{{ $comment->created_at }}</span>
                <p class="comment-text">{{ $comment->comment }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection