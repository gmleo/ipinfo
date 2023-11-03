<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\History>
 */
class HistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ip' => fake()->ipv4(),
            'status' => fake()->randomElement(['Success', 'Fail']),
            'user_id' => random_int(1, 100),
            'continentName' => fake()->randomElement(['Asia', 'Africa', 'North America', 'South America', 'Antarctica', 'Europe', 'Oceania']),
            'city' => fake()->city(),
            'postalCode' => fake()->postcode(),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'capital' => fake()->city(),
            'countryFlagEmoj' => '',
            'countryFlagEmojUnicode' => 'U+1F1FA U+1F1F8',
        ];
    }
}
