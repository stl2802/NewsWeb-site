<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'datePublic'=>$this->faker->date(),
            'title' => $this->faker->title(),
            'shortDesc' => $this->faker->sentence(6),
            'desc' => $this->faker->text(200),
            'user_id' => User::factory(),
        ];
    }
}
