<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComentController extends Controller
{
    public function store($id, Request $request)
    {
        // Алгоритм сохранения комментария к задаче
        $data = $request->all();
        // 2. Создать новый комментарий в БД
        $coment = new \App\Models\Coment();
        $coment->coment=$data['coment'];
        $coment->task_id=$id;
        $coment->save();



        // 3. Перенаправить на деатльную страницу задачи

        return redirect()->route('tasks.show', ['task' => $id]);
    }
}
