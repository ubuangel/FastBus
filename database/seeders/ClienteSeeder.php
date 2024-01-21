<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $users = DB::table('users')->pluck('id');

        foreach ($users as $userId) {
            DB::table('clientes')->insert([
                'id_usuario' => $userId,
            ]);
        }
    }
}
