<?php

namespace Database\Factories;

use App\Models\Firm;
use App\Models\Series;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $amount = $this->faker->numberBetween(1, 1000);
        $firm = Firm::inRandomOrder()->first();
        $series = Series::inRandomOrder()->first();
        return [
            'series_id' => $series->id,
            'firm_id' => $firm->id,
            'amount' => $amount,
            'remain' => $this->faker->numberBetween(1, $amount),
        ];
    }
}
