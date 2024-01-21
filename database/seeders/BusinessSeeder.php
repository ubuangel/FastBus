<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $userId = 1; // Asignar el ID del usuario número 1

        DB::table('businesses')->insert([
            'id_usuario' => $userId,
            'direccion' => $faker->address,
            'RUC' => $faker->randomNumber(9),
        ]);
    }
}
