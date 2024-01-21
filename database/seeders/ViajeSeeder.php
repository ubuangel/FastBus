<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ViajeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rutas = DB::table('ruta')->pluck('id_ruta')->toArray();
        $estados = [0, 1]; // Estados posibles: 0 = Pendiente, 1 = Activo, 2 = Finalizado

        foreach ($rutas as $rutaId) {
            $fechaInicio = now()->addDays(rand(1, 30));
            $fechaRetorno = $fechaInicio->addDays(rand(1, 7));
            $estado = $estados[array_rand($estados)];

            DB::table('viajes')->insert([
                'fecha_inicio' => $fechaInicio,
                'fecha_retorno' => $fechaRetorno,
                'estado' => $estado,
                'id_ruta' => $rutaId,
            ]);
        }
    }
}
