@extends('layouts.main')

@section('content')
    <h1 class="mb-4">
        Список задач
        <a class="btn btn-primary" href="{{ route('tasks.create') }}">Добавить задачу</a>
    </h1>

    <div class="row">
        @for($i = 0; $i < 10; ++$i)
        <div class="col-3">
            <div class="card mb-4">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ route('tasks.show', ['task' => $i]) }}" class="btn btn-primary">Открыть задачу</a>
                </div>
            </div>
        </div>
        @endfor
    </div>

@endsection
