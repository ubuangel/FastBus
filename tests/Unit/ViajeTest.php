<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Viaje;

class ViajeTest extends TestCase
{
    use RefreshDatabase; // Utilizamos esta trait para asegurarnos de que la base de datos se reinicie después de cada test.

    /**
     * Test para crear un viaje.
     *
     * @return void
     */
    public function testCrearViaje()
    {
        // Creamos un viaje utilizando el método POST en la ruta viaje.store
        $response = $this->post(route('viaje.store'), [
            'fecha_inicio' => '2023-09-01',
            'fecha_retorno' => '2023-09-10',
            'estado' => 1,
            'id_ruta' => 1,
        ]);

        // Verificamos que se haya creado correctamente (código de respuesta HTTP 201).
        $response->assertStatus(201);

        // Verificamos que el viaje se haya almacenado en la base de datos.
        $this->assertCount(1, Viaje::all());

        // Verificamos que los datos del viaje coincidan con los que enviamos.
        $viaje = Viaje::first();
        $this->assertEquals('2023-09-01', $viaje->fecha_inicio);
        $this->assertEquals('2023-09-10', $viaje->fecha_retorno);
        $this->assertEquals(1, $viaje->estado);
        $this->assertEquals(1, $viaje->id_ruta);
    }
}
