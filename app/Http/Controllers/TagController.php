<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = \App\Models\Tag::all();
        return view('tags.list', ['tags' => $tags]);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(TagCreateRequest $request)
    {
        // Валидированные данные доступны через $request->validated()
        $data = $request->validated();

        // Явное указание данных через data
        $name = $data['name'];
        $color = $data['color'];
        $description = $data['description'];

        // Логика создания тега
        $tag = new Tag();
        $tag->name = $name;
        $tag->color = $color;
        $tag->description = $description;
        // сохранение
        $tag->save();

        // Возвращаем ответ или редирект
        return redirect()->route('tags.index')->with('success', 'Тег успешно создан');
    }

    public function show($id)
    {
        // Логика для просмотра конкретного тега
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id); // Находим тег по идентификатору

        return view('tags.edit', compact('tag')); // Передаем тег
    }

    public function update(TagCreateRequest $request, $id)
    {
        $data = $request->all(); // Получаем все данные из запроса

        $tag = Tag::findOrFail($id); // Находим тег

        $tag->name = $data['name']; // Обновляем
        $tag->description = $data['description'];
        $tag->color = $data['color'];

        $tag->save(); // Сохраняем

        return redirect()->route('tags.index')->with('success', 'Тег успешно обновлен');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id); // Находим тег по идентификатору, если не найден, будет выброшено исключение

        $tasks = $tag->tasks; // Получаем все связанные задачи
        foreach ($tasks as $task) {
            $task->tags()->detach($tag->id); // Отсоединяем тег от каждой задачи
        }

        $tag->delete(); // Удаляем тег из базы данных

        return redirect()->back(); // Редирект назад после удаления
    }
}
