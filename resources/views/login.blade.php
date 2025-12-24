@extends('character-cards.main')

@section('createTable')

<form class="table" method='POST' action="{{ route('tryAuth') }}">
    @csrf
    <span>Авторизация</span>
    <div><span class="attrName">Имя/почта</span><input type='text' name='login' required></input></div>
    <div><span class="attrName">пароль</span><input type='text' name='password' required></input></div>
    <div><span class="attrName">запомнить вход</span><input class="checkBox" type='checkbox' name='remember'></input></div>
    <div class='btns'><button type='submit' class="button-ok">ОК</button><div class="button-registr">регистрация</div></div>
</form>

@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
                alert("{{ $error }}");
        @endforeach
    </script>
@endif

@endsection