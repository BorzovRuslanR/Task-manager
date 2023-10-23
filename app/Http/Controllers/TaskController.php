<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Вывод списка задач.
     */
    public function index()
    {
        /*$tasks = \App\Models\Task::select(['id', 'name', 'preview', 'image', 'status_id'])
            ->with('status')
            ->get();
        return view('tasks.list', ['tasks' => $tasks]);*/

        $tasks = Auth::user()->tasks()
            ->select(['tasks.id', 'name', 'preview', 'image', 'status_id'])
            ->with('status')
            ->get();
        return view('tasks.list', ['tasks' => $tasks]);
    }

    /**
     * Покажет форму создания задачи.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage. Сохраняет новый созданный ресурс в БД.
     */
    public function store(Request $request)
    {
        // 1. Считать данные с формы
        $data = $request->all();
        // 2. Записать данные в таблицу БД
        $task = new \App\Models\Task();
        $task->name = $data['name'];
        $task->preview = $data['preview'];
        $task->text = $data['text'];
        $task->priority = isset($data['priority']);
        if ($request->hasFile('file')) {
            $task->image = $data['file']->store('img');
        } else {
            $task->image = 'default.jpg';
        }
        $task->status_id = 1;
        $task->save();

        // Привязать авторизированного пользователя к задаче
        $task->users()->attach(Auth::id());

        // 3. Перенаправить на страницу со списком задач
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource. Подробное описание задачи.
     */
    public function show(string $id)
    {
        $task = \App\Models\Task::with('status')->find($id);
        $coments = \App\Models\Coment::select(['coment'])
            ->where('task_id','=', $id)
            ->get();
        if(Auth::user()->can('show', $task)) {
            return view('tasks.show', ['task' => $task, 'coments' => $coments]);
        } else {
            abort(403, 'Нет прав для просмотра этой задачи');
        }

    }

    /**
     * Show the form for editing the specified resource. Показывает форму редактирования подробного описания.
     */
    public function edit(string $id)
    {
        $task = Auth::user()->tasks()->find($id);

        if (!$task || $task->user_id !== Auth::user()->id) {
            abort(403, 'У вас нет прав для редактирования данной задачи');
        }
        /*$task = \App\Models\Task::find($id);*/
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage. Обновление данных. Взаимодействие с БД(модель).
     */
    public function update(Request $request, string $id)
    {
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

        return redirect()->route('tasks.index', ['id' => $task->id]);
    }

    /**
     * Remove the specified resource from storage. Удаление.
     */
    public function destroy(string $id)
    {
        // 1. Найти задачу по id в БД
        $task = Task::findOrFail($id);
        $task->coments()->delete();
        // 2. Удалить эту задачу из БД
        $task->delete();
        // 3. Редикерт на список задач

        // Удаление задачи $task
        return redirect()->route('tasks.index');
    }
}
