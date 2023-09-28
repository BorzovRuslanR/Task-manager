@extends('layouts.main')

@section('title', 'Форма редактирования задачи')

@section('content')
    <h1>Создай задачу</h1>
    <form method="get" action="" class="w-50">
        <input class="form-control" type="text" placeholder="Название задачи" aria-label="default input example">
        <input class="form-control" type="text" placeholder="Краткое описание задачи" aria-label="default input example">
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Полное описание задачи</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Высокий приоритет
            </label>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Фото задачи</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <a href="#" class="btn btn-primary">Редактировать задачу</a>
    </form>

@endsection
