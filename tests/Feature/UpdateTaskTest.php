<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Database\Seeders\StatusesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UpdateTaskTest extends TestCase
{
    use RefreshDatabase;
    protected string $seeder = StatusesSeeder::class;

    // тест в котором проверяется, что обычный пользователь видит редактирование своей задачи
    public function test_show_edit_task(): void
    {

        $task = Task::factory()->create();
        $user = User::factory()->create();
        $task->users()->attach($user->id);

        $response = $this->actingAs($user)->get("/tasks/$task->id/edit");

        $response->assertOk();
        $response->assertViewIs('tasks.edit');
        $response->assertSeeText('Редактирование задачи');


    }
    // тест в котором пользователь не видит задачу
    public function test_show_error_task(): void
    {

        $task = Task::factory()->create();
        $user = User::factory()->create();
        // $task->users()->attach($user->id); задача не будет привязана

        $response = $this->actingAs($user)->get("/tasks/$task->id/edit");

        $response->assertForbidden(); // аналог assertStatus(403);
        $response->assertDontSeeText('Редактирование задачи');


    }


}
