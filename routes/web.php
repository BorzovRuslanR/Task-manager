
<?php

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
    return view('welcome');
});

// 2. Страница с формой регистрации
Route::get('/register', function () {
    // Вывод страницы с формой регистрации
});

// 3. Обработчик формы регистрации
Route::post('/register', function () {
    // Обработчик данных
});

// 4. Страница с формой авторизации
Route::get('/login', function () {
    // Вывод страницы с формой входа в ЛК
});

// 5. Обработчик формы авторизации
Route::post('/login', function () {
    // Обработчик данных
});

// 6. Страница с личным кабинетом авторизованного пользователя
Route::get('/lk', function () {
   // Вывод персональных данных пользователя
});

// 7. Страница со списком задач
Route::get('/tasks', function () {
    // Вывод списка задач
});

// 8. Страница с формой создания задачи
Route::get('/tasks/create', function () {
    // Вывод формы создания
});

// 9. Обработчик формы создания задачи
Route::post('/tasks/create', function () {
    // Обработчик данных
});

// 10. Страница с детальным описанием задачи
Route::get('/tasks/{task}', function ($task) {
    // Вывод данных задачи $task
});

// 11. Обработчик удаления задачи
Route::delete('/tasks/{task}/delete', function ($task) {
    // Удаление задачи $task
});

// 12. Обработчик смены статуса задачи
Route::patch('/tasks/{task}/status', function ($task) {
    // Обработчик смены статуса задачи $task
});

// 13. Страница с формой редактирования задачи
Route::get('/tasks/{task}/edit', function ($task) {
    // Вывод формы редактирования задачи $task
});

// 14. Обработчик формы редактирования задачи
Route::patch('/tasks/{task}/edit', function ($task) {
    // Обработчик данных
});

// 15. Обработчик назначения пользователей к задаче
Route::put('/tasks/{task}/users', function ($task) {
    // Обработчик данных назначения пользователей на задачу $task
});


