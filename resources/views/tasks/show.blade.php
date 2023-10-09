@extends('layouts.main')

@section('content')
    <br>
    <a href="{{ url()->previous() }}" class="btn btn-dark">Вернуться назад</a>
    <br>
    <br>
    <h1 class="styleTextOnMain">Задача номер {{$task->id}} Приоритет {{$task->priority}}<p>Статус: {{ $task->status->name }}</p></h1>
    <br>
    <br>
    <div class="task-block">
        <div class="row">
            <div class="col-4">
                <h4>Статус выполнения задачи</h4>
                <select class="form-select" aria-label="Статус выполнения задачи">
                    <option selected>Выбрать статус</option>
                    <option value="1">Новая</option>
                    <option value="2">В работе</option>
                    <option value="3">Завершена</option>
                </select>
            </div>
            <div class="col-6">
                <h4>Список человек работающих над задачей</h4>
                <ul>
                    <li>Иванов А.М.</li>
                    <li>Козлов Б.Р.</li>
                    <li>Боброва И.А.</li>
                </ul>
            </div>
            <div class="col-4">
                <h4>Кратное описание задачи</h4>
                <p>{{ $task->name }}</p>
            </div>
            <div class="col-8">
                <h4>Изображения к задаче</h4>
                <div class="image-wrapper">
                    <img src="{{ asset($task->image) }}" class="img-fluid" alt="Извините к этой задаче нет изображения">
                </div>
            </div>
            <div class="col-12">
                <h4>Подробное описание задачи</h4>
                <p>{{ $task->preview }}</p>
            </div>
            <div class="buttonOnShow">
            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="btn btn-primary">Редактировать задачу</a>
            </div>

        </div>
    </div>





@endsection
