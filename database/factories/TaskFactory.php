<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'preview' => fake()->paragraph(),
            'text' => fake()->text(),
            'priority' => fake()->boolean(),
            'image' => UploadedFile::fake()->image('test.jpg'),
            'status_id' => 1,
        ];
    }
}
