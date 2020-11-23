<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'publication_date' => $this->faker->dateTimeBetween('-15 days', '+15 days'),
            'author_id' => User::factory(),
        ];
    }

    public function authorless()
    {
        return $this->state(function (array $attributes) {
            return [
                'author_id' => null,
            ];
        });
    }
}
