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
<div class="row justify-content-center">
    @foreach ($cards as $card)
        <div class="col col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 col-xlsm">
            <div class='card'>
                <div id='{{ $card->id }}' class='card-btn-zone'>
                    <img class = 'card-img-top img-fluid' src='/images/{{ $card->img_url  }}' />
                    <div class='card-body'>
                        <span class='name'>{{ $card->name }}</span>
                        <span class='card-text'>{{ $card->tiny_desc }}</span>
                    </div>
                </div>

                <div class="button-group">
                    <!-- Кнопка комментариев -->
                    <a href="{{ route('card-comments.index', $card->id) }}" class="btn-comments">
                        <img class='img-fluid' src='/icons/comments.png'/>
                    </a>
                </div>
            </div>
        </div>
                    </div>
                <div>
                    <span>Создал: </span><span class="creator">{{ $card->user->name ?? 'Неизвестно' }}</span>
                </div>
            </div>
        </div>
    @else

    <div class="col col-sm-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 col-xlsm">
    <div id='{{ $card->id }}' class='card'>
                <img class = 'card-img-top img-fluid' src='images/{{ $card->img_url  }}' />
                <div class='card-body'>
                    <span class='name'>{{ $card->name }}</span>
                    <span class='card-text'>{{ $card->tiny_desc }}</span>
                </div>
            <div>
                <span>Создал: </span><span class="creator">{{ $card->user->name ?? 'Неизвестно' }}</span>
            </div>
        </div>
    </div>
        
        @endif
    @endforeach
</div>
@endsection