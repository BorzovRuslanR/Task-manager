@extends('layouts.main')

@section('title', 'Форма редактирования задачи')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="createTaskCard">
                <h1 class="styleTextOnMain">Редактирование задачи</h1>
                <br>
                <form method="post" action="{{ route('tasks.update', ['task' => $task->id]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <input name="name" class="form-control" type="text" placeholder="Название задачи" value="{{ $task->name }}" aria-label="default input example">
                    <br>
                    <input name="preview" class="form-control" type="text" placeholder="Краткое описание задачи" value="{{ $task->preview }}" aria-label="default input example">
                    <br>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"><p class="styleTextOnMain">Полное описание задачи</p></label>
                        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $task->text }}</textarea>
                    </div>
                    <div class="form-check">
                        <input  name="priority" class="form-check-input" type="checkbox" id="flexCheckDefault" {{ $task->priority ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexCheckDefault">
                            <p class="styleTextOnMain">Высокий приоритет</p>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><p class="styleTextOnMain">Фото задачи</p></label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="file" class="custom-file-input" type="file" id="formFile" aria-describedby="inputGroupFileAddon">
                                <label class="custom-file-label" for="formFile">Выберите файл</label>
                            </div>
                        </div>
                        @if ($task->image)
                            <div class="mt-3">
                                <img src="{{ asset($task->image) }}" alt="Изображение задачи" class="img-fluid">
                            </div>
                        @endif
                    </div>
                    <button href="#" class="btn btn-primary">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>

@endsection
