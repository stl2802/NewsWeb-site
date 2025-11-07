<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->realText(),
            'likes' => $this->faker->randomDigit(),
            'dislikes' => $this->faker->randomDigit(),
            'article_id' => Article::factory(),
            'user_id'=> User::factory(),
        ];
    }
}
