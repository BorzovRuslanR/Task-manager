<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\StatusesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowListTasksTest extends TestCase
{

    use RefreshDatabase;
    protected string $seeder = StatusesSeeder::class;

    public function test_show_task_list(): void
    {
        $user = User::factory()->create(); // Создание пользователя

        $response = $this->actingAs($user)->get('/tasks'); // Аутентификация пользователя

        $response->assertOk();
        $response->assertViewIs('tasks.list');
        $response->assertSeeText('Список задач');
        $response->assertSeeText('Добавить задачу');

        // Проверьте, что список задач отображается и содержит ожидаемые задачи
    }





}
