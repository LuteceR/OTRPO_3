@extends('character-cards.main')

@section('characterCards')

<div class="row justify-content-center comments-section">
    <h1 class="comments-title">{{ $card->name }}</h1>

    <a href="{{ route('card-comments.create', $card->id) }}">
        <button type="button" class="btn btn-primary add-comment-btn">
            Добавить комментарий
        </button>
    </a>

    <div class="comments-list">
        @foreach ($comments as $comment)
            @php
                $isFriend = Auth::user()->isFriend($comment->user_id);
            @endphp
            <div class="comment">
                <span class="comment-user">{{ $comment->getUserOfComment() }}</span>
                <span class="created-at">{{ $comment->created_at }}</span>
                <p class="comment-text {{ $isFriend ? 'friend-comment' : '' }}">{{ $comment->comment }}</p>
            </div>
            <hr>
        @endforeach
    </div>
</div>
@endsection