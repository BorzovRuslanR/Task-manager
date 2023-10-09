@extends('layouts.main')

@section('content')
    <h1 class="mb-4">
        <p class="styleTextOnMain">Список задач</p>
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">Добавить задачу</a>
    </h1>

    <div class="row equal-cols">
        @foreach($tasks as $task)
        <div class="col-sm-3">
            <div class="card mb-4" style="width: 100%; position: relative;">
                <img src="{{ asset($task->image) }}" class="card-img-top" alt="...">
                <div class="status-label bg-danger text-white position-absolute top-0 end-0 p-2">{{ $task->status->name }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $task->name }}</h5>
                    <p class="card-text">{{ $task->preview }}</p>
                    <a href="{{ route('tasks.show', ['id' => $task->id]) }}" class="btn btn-primary">Открыть задачу</a>
                </div>

            </div>
        </div>
            @endforeach
    </div>

@endsection
