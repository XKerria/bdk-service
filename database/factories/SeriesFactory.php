<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Series;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Series::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'price' => '暂无',
            'image' => 'https://picsum.photos/600/400?random=' . $this->faker->unique()->numberBetween(0, 9999),
            'brand_id' => Series::inRandomOrder()->first()
        ];
    }
}
