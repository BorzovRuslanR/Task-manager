<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\StatusesSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateTaskTest extends TestCase
{

    use RefreshDatabase;
    protected string $seeder = StatusesSeeder::class;

    public function test_show_create_form(): void
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/tasks/create');
        $response->assertStatus(200);
        $response->assertViewIs('tasks.create');
        $response->assertSeeText('Создать задачу');
    }

    public function test_simple_store_task(): void
    {



        $user = User::factory()->make();

        $response = $this->actingAs($user)->post('/tasks', [
           'name' =>  'Тест',
            'preview' => 'Краткий текст',
            'text' => 'Полный текст',
            'priority' => '1',
            'file' => UploadedFile::fake()->image('test.jpg')
        ]);

        $response->assertRedirect('/tasks');
        $this->assertDatabaseCount('tasks', 1);
        $this->assertDatabaseHas('tasks', [
           'name' => 'Тест'
        ]);
    }

    public function test_error_name_store_task(): void
    {


        $user = User::factory()->make();

        $response = $this->actingAs($user)->post('/tasks', [
            'name' =>  '',
            'preview' => 'Краткий текст',
            'text' => 'Полный текст',
            'priority' => '1',
            'file' => UploadedFile::fake()->image('test.jpg')
        ]);

        $response->assertSessionHasErrors('name');
        $response->assertSessionDoesntHaveErrors('preview');

    }
}
