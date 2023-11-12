<?php

use App\Http\Controllers\LkController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 1. Главная страница
Route::get('/', function () {
    return view('index');
});


Route::middleware('auth')->group(function (){


    // 6. Страница с личным кабинетом авторизованного пользователя
    Route::get('/lk', [LKController::class, 'showLK'])->name('lk');

    // 12. Обработчик смены статуса задачи
    Route::patch('/tasks/{task}/status', function ($task) {
        // Обработчик смены статуса
    });

    // 15. Обработчик назначения пользователей к задаче
    Route::put('/tasks/{task}/users', function ($task) {
        // Обработчик данных назначения пользователей на задачу $task
    });

    // 16. Обработчик формы с добавлением комментариев

    Route::patch('/tasks/{id}/show', [\App\Http\Controllers\ComentController::class, 'store'])->name('tasks.coment');

    // Здесь сосредоточены все 7 CRUD маршрутов для задачи

    Route::resource('tasks', \App\Http\Controllers\TaskController::class);

    Route::resource('tags', TagController::class);

//    Route::post('/tasks/{task}/tags/{tag}', [TaskController::class, 'attachTag']);

    Route::post('/tasks/{task}/attach-tag', [TaskController::class, 'attachTag'])->name('tasks.attachTag');
});

Auth::routes();


