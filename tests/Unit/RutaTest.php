<?php

namespace Tests\Unit;

use App\Http\Controllers\RutumController;
use App\Models\Rutum;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RutaTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    public function test_crear_ruta(): void
    {
        // Datos para crear la ruta
        $datos_ruta = [
            'origen' => 'Ciudad A',
            'destino' => 'Ciudad B',
            'encargado' => '1',
        ];

        // Hacer una solicitud POST a la ruta /rutas para crear una nueva ruta
        $response = $this->post(route('ruta.store'), $datos_ruta);

        // Verificar que la ruta se haya creado correctamente
        $response->assertStatus(302); // 302 es el código de redirección

        // Verificar que se haya insertado al menos una ruta en la tabla ruta con los campos de origen y destino correctos
        $this->assertDatabaseHas('ruta', [
            'origen' => 'Puno',
            'destino' => 'Tacna',
            'encargado' => '1',
        ]);
    }

    public function test_modificar_ruta(): void
    {
        // Crear una ruta para luego modificarla
        $ruta = Rutum::create([
            'origen' => 'Puno2',
            'destino' => 'Tacna2',
            'encargado' => '1',
        ]);

        // Datos para modificar la ruta
        $datos_modificados = [
            'origen' => 'Puno2',
            'destino' => 'Tacna2',
            'encargado' => '1',
        ];

        // Hacer una solicitud PUT a la ruta de edición /rutas/{id} para modificar la ruta creada anteriormente
        $response = $this->put(route('ruta.update', $ruta->id_ruta), $datos_modificados);

        // Verificar que la ruta se haya modificado correctamente
        $response->assertStatus(302); // 302 es el código de redirección

        // Verificar que la ruta modificada se encuentra en la tabla ruta con los campos de origen y destino correctos
        $this->assertDatabaseHas('ruta', $datos_modificados);
    }

    public function test_eliminar_ruta(): void
    {
        // Crear una ruta para luego eliminarla
        $ruta = Rutum::create([
            'origen' => 'Puno',
            'destino' => 'Tacna',
            'encargado' => '1',
        ]);

        // Hacer una solicitud DELETE a la ruta de eliminación /rutas/{id} para eliminar la ruta creada anteriormente
        $response = $this->delete(route('ruta.destroy', $ruta->id_ruta));

        // Verificar que la ruta se haya eliminado correctamente
        $response->assertStatus(302); // 302 es el código de redirección

        // Verificar que la ruta eliminada no se encuentra en la tabla ruta
        $this->assertDatabaseMissing('ruta', [
            'id_ruta' => $ruta->id_ruta,
        ]);
    }
}