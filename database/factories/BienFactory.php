<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bien>
 */
class BienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titre = fake()->words(3, true);
        $nb_pieces = fake()->numberBetween(1,12);
        return [
            'vendu' => false,
            'slug' => str::slug( $titre, '-' ),
            'titre' => $titre,
            'surface' => fake()->numberBetween(20,350),
            'nb_pieces' => $nb_pieces,
            'prix' => fake()->numberBetween(1000, 10000),
            'nb_chambres' => fake()->numberBetween(1, $nb_pieces),
            'nb_étages' => fake()->numberBetween(0, 4),
            'chauffage' => fake()->boolean(),
            'description' => fake()->sentences(10, true),
            'adresse' => fake()->address(),
            'ville' => fake()->city(),
            'code_postal' => fake()->postcode(),
        ];
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'vendu' => true,
        ]);
    }
}
