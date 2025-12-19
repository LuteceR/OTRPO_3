@extends('character-cards.main')

@section('createTable')

<form class="table" method='POST' action="{{ route('character-cards.store') }}">
    @csrf
    <div><span class="attrName">Имя</span><input type='text' name='name'></input></div>
    <div><span class="attrName">Название фотографии</span><input type='text' name='img_url'></input></div>
    <div><span class="attrName">Короткое описание</span><input type='text' name='tiny_desc'></input></div>
    <div><span class="attrName">Полное описание</span><input type='text' name='long_desc'></input></div>
    <div class='btns'><button type='submit' class="button-ok">ОК</button><div class="button-cancel">Отмена</div></div>
</form>

@endsection