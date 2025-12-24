@extends('character-cards.main')

@section('createTable')

<form class="table" method='POST' action="{{ route('tryRegistr') }}">
    @csrf
    <span>Регистрация</span>
    <div><span class="attrName">Имя</span><input type='text' name='name' required></input></div>
    <div><span class="attrName">Почта</span><input type='text' name='email' required></input></div>
    <div><span class="attrName">Пароль</span><input type='text' name='password' required></input></div>
    <div><span class="attrName">Запомнить вход</span><input class="checkBox" type='checkbox' name='remember'></input></div>
    <div class='btns'><button type='submit' class="button-ok">ОК</button><div class="button-back-login">Назад</div></div>
</form>

@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
                alert("{{ $error }}");
        @endforeach
    </script>
@endif

@endsection