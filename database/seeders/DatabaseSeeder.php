<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('public/cursos');
        Storage::makeDirectory('public/cursos');
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class); //lamar al seeder del usuario
        $this->call(LevelSeeder::class); //lamar al seeder del nivel
        $this->call(CategorySeeder::class); //lamar al seeder de categoria
        $this->call(PriceSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
    }
}
