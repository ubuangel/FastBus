<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $viajes = DB::table('viajes')->pluck('id_viaje')->toArray();
        $numBuses = range(1, 9);

        $estados = [0, 1]; // Estados posibles: 0 = Pendiente, 1 = Activo, 2 = Finalizado

        foreach ($viajes as $viajeId) {
            $numBus = array_shift($numBuses);
            $estado = $estados[array_rand($estados)];
            $capacidad = rand(20, 50);
            DB::table('buses')->insert([
                'num_bus' => $numBus,
                'capacidad' => $capacidad,
                'estado' => $estado,
                'id_viaje' => $viajeId,
            ]);
        }
    }
}

