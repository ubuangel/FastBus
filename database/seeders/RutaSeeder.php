<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $peruOrigins = ['Lima', 'Arequipa', 'Cusco', 'Trujillo', 'Chiclayo', 'Piura', 'Iquitos', 'Tacna', 'Puno', 'Huancayo'];
        $peruDestinations = ['Lima', 'Arequipa', 'Cusco', 'Trujillo', 'Chiclayo', 'Piura', 'Iquitos', 'Tacna', 'Puno', 'Huancayo'];
        $encargado = 1;

        for ($i = 0; $i < 20; $i++) {
            $origin = $peruOrigins[array_rand($peruOrigins)];
            $destination = $peruDestinations[array_rand($peruDestinations)];

            DB::table('ruta')->insert([
                'origen' => $origin,
                'destino' => $destination,
                'encargado' => $encargado,
            ]);
        }
    }
}
