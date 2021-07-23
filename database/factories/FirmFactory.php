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
            'name' => $this->faker->unique()->words($this->faker->numberBetween(2, 4), true),
            'logo' => 'https://picsum.photos/400/400?random=' . $this->faker->unique()->numberBetween(0, 9999),
            'image' => 'https://picsum.photos/400/400?random=' . $this->faker->unique()->numberBetween(0, 9999),
            'brands' => $this->faker->words($this->faker->numberBetween(3, 8)),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
