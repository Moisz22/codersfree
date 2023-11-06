<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => 'cursos/' . $this->faker->image('public/storage/cursos', 640, 480, null, false), //faker no tiene la capacidad de crear carpetas(dará error si no existe)
        ];
    }
}
