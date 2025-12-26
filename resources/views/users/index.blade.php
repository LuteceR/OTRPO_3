@extends('character-cards.main')

@section('createTable')

<div class="container table">

    <span>Список пользователей</span>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Email</th>
                <th>Админ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if ($user->is_admin)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>🔑{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
                </tr>
            @else
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Да' : 'Нет' }}</td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>

    <br style="margin-bottom:1rem;">

    {{-- Навигация --}}
    {{ $users->links() }}

</div>

@endsection