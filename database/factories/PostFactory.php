<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(4,true),
            'purpose' => fake()->randomElement(['Intercambio','Donación']),
            'descripion' => fake()->text(),
            'location' => fake()->city(),
            'user_id' => User::all()->random()->id,
            'user_id' => Category::all()->random()->id,
        ];
    }
}
