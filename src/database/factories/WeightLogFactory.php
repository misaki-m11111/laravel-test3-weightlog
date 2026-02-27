<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{

public function definition()
{
    return [
        'user_id' => \App\Models\User::factory(),
        'date' => $this->faker->date(),
        'weight' => $this->faker->randomFloat(1, 40, 100),
        'calories' => $this->faker->numberBetween(1000, 3000),
        'exercise_time' => $this->faker->time(),
        'exercise_content' => $this->faker->sentence(),
    ];
}
}
