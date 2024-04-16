<?php

namespace Database\Factories;

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
            'titre' => $this->faker->catchPhrase(),
            'picture'=> $this->faker->imageUrl(200, 200, null, true),
            'texte' => $this->faker->text(),
            'user_id' => User::inRandomOrder()->first()->id 
        ];
    }
}
