<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Database\Seeders\StatusesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class TaskUsageTest extends TestCase
{
    use RefreshDatabase;
    protected string $seeder = StatusesSeeder::class;

    public function test_open_task()
    {

        $user = User::factory()->create();
        $task = Task::factory()->create();
        $task->users()->attach($user->id);

        // Проверка открытия задачи
        $response = $this->actingAs($user)->get('/tasks/' . $task->id);
        $response->assertOk();
        $response->assertSeeText($task->name);
        $response->assertSeeText($task->preview);
    }

    public function test_delete_task()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();

        // Удаление задачи
        $response = $this->actingAs($user)->delete('/tasks/' . $task->id);
        $response->assertRedirect('/tasks'); // Проверяем, что после удаления задачи пользователь будет перенаправлен на страницу со списком задач

        $this->assertDatabaseMissing('tasks', ['id' => $task->id]); // Проверяем, что задача была успешно удалена из базы данных
    }


}
