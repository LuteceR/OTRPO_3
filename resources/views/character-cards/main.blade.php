<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Death Stranding</title>
    <meta name="description" content="Практическая работа 1 Даниловой А.П.">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- <link rel="stylesheet" href="{{ asset('style.css') }}"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/ico" href="icons/favicon.ico">
    @Vite(['resources/sass/style.scss', 'resources/js/index.js'])
</head>
<body>
    
    <div class=".body-copy"></div>
    <div class=".body-copy"></div>
    <div class=".body-copy"></div>

    <!-- modals для карт .card -->
    @yield('modalCards')

    <!-- Toast -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="Toast" class="toast fade hide" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div id="img-earth">
                    <div class="img-truck"></div>
                </div>
                <!-- <img id="truck" src="icons/truck.svg" class="rounded me-2"> -->
                <strong class="me-auto" style="margin-left: 1rem;">Death Stranding</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Извините, на текущий момент данная функция не доступна
            </div>
        </div>
    </div>

    <div class="nav navbar navbar-expand-lg">
        <a class='home-link' href='/character-cards'>
            <div class="navbar-brand logo">
                <img src="/icons/favicon.ico" alt="logo">
            </div>
            <div class="web-name">
                Death Stranding
            </div>
        </a>
        @php
            $user = Auth::user();
        @endphp
        @if ($user) 
            <a class="user" href="dashboard">
                @php
                    $username = Auth::user()->name;
                    $isAdmin = Auth::user()->is_admin;
                @endphp

                @if ($isAdmin) 
                    <span class="userName">🔑 {{ $username }}</span>
                @else 
                    <span class="userName">{{ $username }}</span>
                @endif
            </a>
        @endif
        <a href="{{ route('character-cards.deleted') }}" class='deleted-cards'>Удалённые карточки</a>
        <button id="liveToastBtn" type="button" class="btn btn-primary">Cкачать</button>
    </div>

    <div class="container-fluid d-flex">

        @yield('characterCards')

    </div>

        <!-- <div id="contextmenu" class="contextmenu"><div id="button-edit">Редактировать карточку</div><div id="button-del">Удалить карточку</div></div> -->
        <!-- <div class="table">
            <span></span>
            <div><span class="attrName">Имя</span><input></input></div>
            <div><span class="attrName">Название фотографии</span><input></input></div>
            <div><span class="attrName">Короткое описание</span><input></input></div>
            <div><span class="attrName">Полное описание</span><input></input></div>
            <div class='btns'><div class="button-ok">ОК</div><div class="button-cancel">Отмена</div></div>
        </div> -->

        @yield('createTable')

        <!-- @yield('menu'); -->
    
    </div>

    <footer>
            <img src="/icons/github-logo.jpg" alt="github logo" class="github-logo">
            <span>Данилова Анна Петровна</span>
            <div class="github-href"><a href="https://github.com/LuteceR"><img src="/icons/github.svg" alt="github"></a></div>
            <div class="yandex-href"><a href="https://mail.360.yandex.ru"><img src="/icons/yandex.svg" alt="yandex"></a></div>
    </footer>
    
    <!-- jQuery -->
    <script src="{{ asset('~jquery') }}"></script>
    <!-- BS JavaScript -->
    <script src="{{ asset('~bootstrap') }}"></script>


    
</body>
</htmlh>