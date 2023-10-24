@extends('layouts.main')

@section('title', 'Личный кабинет')

@section('content')
    <div class="lk-place">
        <h1>Личный кабинет пользователя {{$user->name}}</h1>
        <ul class="user-info">
            <li><strong>E-mail пользователя:</strong> {{$user->email}}</li>
            <li><strong>Дата рождения пользователя:</strong> {{$user->birthdate}}</li>
            <li><strong>Дата регистрации пользователя:</strong> {{$user->created_at}}</li>
            <li><strong>Количество задач:</strong> {{ $taskCount }}</li>
        </ul>
    </div>
@endsection
