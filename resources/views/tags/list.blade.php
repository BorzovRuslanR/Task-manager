@extends('layouts.main')

@section('content')
    <br>
    <a href="{{ route('tasks.index') }}" class="btn btn-dark">Вернуться назад</a>
    <h1 class="mb-4">
        <p class="styleTextOnMain">Список доступных тегов</p>
        <a class="btn btn-primary" href="{{ route('tags.create') }}">Создать тэг</a>
    </h1>

    <div class="backGr">
        <div class="zoneTags">
            <div class="row">
                @foreach ($tags as $tag)
                    <div class="col-md-6 mb-3">
                        <div class="tag-container">
                            <div class="tag" style="background-color: {{ $tag->color }};">
                                {{ $tag->name }}
                            </div>
                            <div class="tag-description">
                                {{ $tag->description }}
                            </div>
                            <div>
                                <a class="btn btn-warning btn-sm" href="{{ route('tags.edit', $tag->id) }}">Редактировать</a>
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Удалить тег</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
