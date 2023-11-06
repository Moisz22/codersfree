<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuario creado manualmente
        User::create([
            'name' => 'Moises',
            'email' => 'moises.suarez@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        //fin usuario creado manualmente

        User::factory(99)->create(); //llamando a la fabrica de usuarios
    }
}
