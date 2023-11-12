@extends('layouts.main')

@section('title', 'Форма редактирования тега')

@section('content')
    <br>
    <a href="{{ route('tags.index') }}" class="btn btn-dark">Вернуться назад</a>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="createTaskCard">
                <h1 class="styleTextOnMain">Редактировать тег</h1>
                <br>
                <form method="post" action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(isset($tag))
                        @method('PUT')
                    @endif
                    <input name="name" class="form-control" type="text" placeholder="Название тега" value="{{ isset($tag) ? $tag->name : '' }}">
                    @error('name')
                    <p class="errorCreateForm">{{ $message }}</p>
                    @enderror
                    <br>
                    <div class="mb-3">
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Подробное описание тега">{{ isset($tag) ? $tag->description : '' }}</textarea>
                        @error('description')
                        <p class="errorCreateForm">{{ $message }}</p>
                        @enderror
                    </div>
                    <br>
                    <select class="form-select" name="color">
                        <option selected>Выбери цвет</option>
                        <option value="#ff0000" {{ isset($tag) && $tag->color == '#ff0000' ? 'selected' : '' }}>Красный</option>
                        <option value="#000000" {{ isset($tag) && $tag->color == '#000000' ? 'selected' : '' }}>Черный</option>
                        <option value="#00ff00" {{ isset($tag) && $tag->color == '#00ff00' ? 'selected' : '' }}>Зеленый</option>
                        <option value="#0000ff" {{ isset($tag) && $tag->color == '#0000ff' ? 'selected' : '' }}>Синий</option>
                        <option value="#00ffff" {{ isset($tag) && $tag->color == '#00ffff' ? 'selected' : '' }}>Аква</option>
                        <option value="#ffff00" {{ isset($tag) && $tag->color == '#ffff00' ? 'selected' : '' }}>Желтый</option>
                    </select>
                    <br>
                    <button href="#" class="btn btn-primary">{{ isset($tag) ? 'Обновить тег' : 'Создать тег' }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
