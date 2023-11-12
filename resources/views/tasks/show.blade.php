@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <h1 class="mb-4">Задача номер {{ $task->id }}</h1>
                    <h4>Приоритет: {{ $task->priority }}</h4>
                    <h4>Статус: {{ $task->status->name }}</h4>
                    <h4>Название задачи: {{ $task->name }}</h4>
                    <hr>

                    <h4>Статус выполнения задачи</h4>
                    <div class="mb-3">
                        <select class="form-select" aria-label="Статус выполнения задачи">
                            <option selected>Выбрать статус</option>
                            <option value="1">Новая</option>
                            <option value="2">В работе</option>
                            <option value="3">Завершена</option>
                        </select>
                    </div>

                    <h4>Теги:</h4>
                    <div class="mb-3">
                        @foreach ($task->tags as $tag)
                            <span class="badge" style="background-color: {{ $tag->color }}; margin-right: 5px;">{{ substr($tag->name, 0, 10) }}</span>
                        @endforeach
                    </div>

                    <h4>Список человек работающих над задачей</h4>
                    <ul class="mb-3">
                        <li>Иванов А.М.</li>
                        <li>Козлов Б.Р.</li>
                        <li>Боброва И.А.</li>
                    </ul>

                    <h4>Краткое описание задачи</h4>
                    <p>{{ $task->preview }}</p>

                    <h4>Изображение к задаче</h4>
                    <div class="image-wrapper mb-3">
                        <img src="{{ asset($task->image) }}" class="img-fluid" alt="Изображение не доступно">
                    </div>

                    <h4>Подробное описание задачи</h4>
                    <p>{{ $task->text }}</p>

                    <div class="buttonOnShow mt-4">
                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary">Редактировать задачу</a>
                        <form method="POST" action="{{ route('tasks.destroy', ['task' => $task->id]) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить задачу</button>
                        </form>
                    </div>

                    <form method="post" action="{{ route('tasks.attachTag', ['task' => $task->id]) }}">
                        @csrf
                        <div class="form-row align-items-center mt-4">
                            <div class="col-md-8">
                                <label for="tag">Выберите тег:</label>
                                <select name="tag" id="tag" class="form-control">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-block">Добавить тег</button>
                            </div>
                        </div>
                    </form>

                    @if ($task->status_id !== 3)
                        <form method="post" action="{{ route('tasks.coment', ['id' => $task->id]) }}" class="mt-4">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Оставьте комментарий</label>
                                <textarea name="coment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('coment')
                                <p class="errorCreateForm">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Добавить комментарий</button>
                        </form



                <hr>

                <h4>Комментарии:</h4>

                @foreach($coments as $coment)
                    <ul class="list-group">
                        <li class="list-group-item">{{$coment->coment}}</li>
                    </ul>
                    <br>
                @endforeach
            @endif
        </div>

    </div>





@endsection
