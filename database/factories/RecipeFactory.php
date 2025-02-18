<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
			'title' => 'Title of the recipe',
	        'description' => 'The description of the recipe',
	        'instructions' => 'The instructions for the recipe',
	        'user_id' => User::factory(),
        ];
    }
}
