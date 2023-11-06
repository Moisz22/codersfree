<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Course;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\Price;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::REVISION, Course::BORRADOR, Course::PUBLICADO]),
            'slug' => Str::slug($title),
            'user_id' => User::all()->random()->id, //retornar un
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id
        ];
    }
}
