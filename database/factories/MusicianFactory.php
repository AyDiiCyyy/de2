<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musician>
 */
class MusicianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>fake()->text(25),
            'profile_picture'=>'',
            'birth_date'=>fake()->date(),
            'instrument'=>fake()->text(50),
            'biography'=>fake()->text(100)
        ];
    }
}
