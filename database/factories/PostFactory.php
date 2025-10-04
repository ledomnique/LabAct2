<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            // call on faker to generate a title and body
            'title' => $this->faker->sentence(6),
            'body' => $this->faker->paragraph(4),
            'user_id' => 1, // will be overridden by seeder state
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
