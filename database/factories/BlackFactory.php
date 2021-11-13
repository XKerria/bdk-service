<?php

namespace Database\Factories;

use App\Models\Black;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlackFactory extends Factory
{
    protected $model = Black::class;

    public function definition()
    {
        $images = [];
        for ($i = 0; $i < rand(1, 9); $i++) {
            $height = rand(400, 1200);
            $width = rand(400, 1200);
            $url = 'https://picsum.photos/'.$width.'/'.$height.'?random='.rand();

            $images []= [
                'src' => $url,
                'height' => $height,
                'width' => $width,
                'type' => 'jpg'
            ];
        }
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'description' => $this->faker->paragraph,
            'images' => $images,
        ];
    }
}
