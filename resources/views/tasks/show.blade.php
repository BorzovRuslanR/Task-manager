@extends('layouts.main')

@section('content')

    <br>
    <br>
    <h1 >Задача номер (прописать номер) (указать приоритет)</h1>
    <br>
    <br>
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
        </div>
        <h4 class="col-4">Кратное описание задачи</h4>
        <div class="col-8">
            <h4>Изображения к задаче</h4>
            <img src="#" class="img-fluid" alt="Извините к этой задаче нет изображения">
        </div>
        <h4 class="col-12">Подробное описание задачи</h4>
        <a href="#" class="btn btn-primary">Редактировать задачу</a>
{{--         {{ route('tasks.edit', ['task' => $i]) }}--}}
    </div>






@endsection
