<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->unique()->phoneNumber,
        ];
    }
}
