@extends('layouts.main')

@section('title', 'Форма создания тега')

@section('content')
    <br>
    <a href="{{ route('tasks.index') }}" class="btn btn-dark">Вернуться назад</a>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="createTaskCard">
                <h1 class="styleTextOnMain">Создай тег</h1>
                <br>
                <form method="post" action="{{ route('tags.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="name" class="form-control" type="text" placeholder="Название тега" >
                    @error('name')
                    <p class="errorCreateForm">{{ $message }}</p>
                    @enderror
                    <br>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Подробное описание тега"></textarea>
                        @error('description')
                        <p class="errorCreateForm">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>
                    <select class="form-select" name="color" >
                        <option selected>Выбери цвет</option>
                        <option value="#ff0000">Красный</option>
                        <option value="#000000">Черный</option>
                        <option value="#00ff00">Зеленый</option>
                        <option value="#0000ff">Синий</option>
                        <option value="#00ffff">Аква</option>
                        <option value="#ffff00">Желтый</option>
                    </select>
                    <br>
                    <button href="#" class="btn btn-primary">Создать тег</button>
                </form>
            </div>
        </div>
    </div>
@endsection
