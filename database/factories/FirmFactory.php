<?php

namespace Database\Factories;

use App\Models\Firm;
use Illuminate\Database\Eloquent\Factories\Factory;

class FirmFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Firm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->words($this->faker->numberBetween(2, 4), true),
            'image' => 'https://picsum.photos/400/400?random=' . $this->faker->unique()->numberBetween(0, 9999),
            'brands' => $this->faker->words($this->faker->numberBetween(3, 8)),
            'phone' => $this->faker->phoneNumber,
            'remain' => $this->faker->numberBetween(0, 300)
        ];
    }
}
