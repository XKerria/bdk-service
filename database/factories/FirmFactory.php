<?php

namespace Database\Factories;

use App\Models\Firm;
use Illuminate\Database\Eloquent\Factories\Factory;

class FirmFactory extends Factory
{
    protected $model = Firm::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company,
//            'logo_url' => 'https://picsum.photos/400/400?random=' . $this->faker->unique()->numberBetween(0, 9999),
//            'image_url' => 'https://picsum.photos/400/400?random=' . $this->faker->unique()->numberBetween(0, 9999),
            'logo_url' => null,
            'image_url' => null,
            'brands' => [],
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
        ];
    }
}
