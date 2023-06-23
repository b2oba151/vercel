<?php

namespace Database\Factories;

use App\Models\Variation;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class VariationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Variation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avant' => $this->faker->randomNumber(1),
            'apres' => $this->faker->randomNumber(1),
            'variation' => $this->faker->randomNumber(1),
        ];
    }
}
