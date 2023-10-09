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
    return view('index');
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
    $tasks = \App\Models\Task::select(['id', 'name', 'preview', 'image', 'status_id'])
        ->with('status')
        ->get();
    return view('tasks.list', ['tasks' => $tasks]);
})->name('tasks.list');

// 8. Страница с формой создания задачи
Route::get('/tasks/create', function () {

    return view('tasks.create');
})->name('tasks.create');

// 9. Обработчик формы создания задачи
Route::post('/tasks/create', function (\Illuminate\Http\Request $request) {
    // 1. Считать данные с формы
    $data = $request->all();
    // 2. Записать данные в таблицу БД
    $task = new \App\Models\Task();
    $task->name = $data['name'];
    $task->preview = $data['preview'];
    $task->text = $data['text'];
    $task->priority = isset($data['priority']);
    $task->image = $data['file']->store('img');
    $task->status_id = 1;
    $task->save();
    // 3. Перенаправить на страницу со списком задач
    return redirect()->route('tasks.list');
})->name('tasks.store');

// 10. Страница с детальным описанием задачи

Route::get('/tasks/{id}', function ($id) {
    $task = \App\Models\Task::find($id);
    $task = \App\Models\Task::with('status')->find($id);
    return view('tasks.show', ['task' => $task]);
})->name('tasks.show');


// 11. Обработчик удаления задачи
Route::delete('/tasks/{task}/delete', function ($task) {
    // Удаление задачи $task
});

// 12. Обработчик смены статуса задачи
Route::patch('/tasks/{task}/status', function ($task) {
    // Обработчик смены статуса задачи $task
});

// 13. Страница с формой редактирования задачи
Route::get('/tasks/{id}/edit', function ($id) {
    $task = \App\Models\Task::find($id);
    return view('tasks.edit', ['task' => $task]);
})->name('tasks.edit');

// 14. Обработчик формы редактирования задачи
Route::patch('/tasks/{id}/edit', function ($id, \Illuminate\Http\Request $request) {
    // 1. Считать данные с формы
    $data = $request->all();
    // 2. Найти задачу по id
    $task = \App\Models\Task::find($id);
    // 3. Обновить данные задачи
    $task->name = $data['name'];
    $task->preview = $data['preview'];
    $task->text = $data['text'];
    $task->priority = $request->has('priority') ? true : false;

    if ($request->hasFile('file')) {
        $file = $request->file('file');

        // Удаление старого изображения
        if ($task->image) {
            Storage::delete($task->image);
        }

        $filename = $file->store('img');
        $task->image = $filename;
    }

    $task->save();

    return redirect()->route('tasks.list', ['id' => $task->id]);

})->name('tasks.update');

// 15. Обработчик назначения пользователей к задаче
Route::put('/tasks/{task}/users', function ($task) {
    // Обработчик данных назначения пользователей на задачу $task
});

/*
 *
 */
