@extends('layouts.main')

@section('title', 'Форма создания задачи')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
            <div class="createTaskCard">
                <h1 class="styleTextOnMain">Создай задачу</h1>
                <br>
                <form method="post" action="{{ route('tasks.store') }}" enctype="multipart/form-data">
                    @csrf
                    <input name="name" class="form-control" type="text" placeholder="Название задачи" aria-label="default input example">
                    @error('name')
                    <p class="errorCreateForm">{{ $message }}</p>
                    @enderror
                    <br>
                    <input name="preview" class="form-control" type="text" placeholder="Краткое описание задачи" aria-label="default input example">
                    @error('preview')
                    <p class="errorCreateForm">{{ $message }}</p>
                    @enderror
                    <br>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label"><p class="styleTextOnMain">Полное описание задачи</p></label>
                        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        @error('text')
                        <p class="errorCreateForm">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input  name="priority" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
                        @error('priority')
                        <p class="errorCreateForm">{{ $message }}</p>
                        @enderror
                        <label class="form-check-label" for="flexCheckDefault">
                            <p class="styleTextOnMain">Высокий приоритет</p>
                        </label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label"><p class="styleTextOnMain">Фото задачи</p></label>
                        <input  name="file" class="form-control" type="file" id="formFile">
                        @error('file')
                        <p class="errorCreateForm">{{ $message }}</p>
                        @enderror
                    </div>
                    <button href="#" class="btn btn-primary">Создать задачу</button>
                </form>
            </div>
    </div>
</div>
@endsection
