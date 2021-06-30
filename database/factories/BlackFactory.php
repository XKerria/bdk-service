<?php

namespace Database\Factories;

use App\Models\Black;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Black::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'description' => $this->faker->paragraph
        ];
    }
}
