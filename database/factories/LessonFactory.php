<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://youtu.be/J5Lapviks9I?si=ftCkyo71_bXQ93ia',
            'iframe' => '<iframe width="560" height="315" src="https://www.youtube.com/embed/J5Lapviks9I?si=_7KFRX8g1eAZr5pO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>',
            'platform_id' => 1
        ];
    }
}
