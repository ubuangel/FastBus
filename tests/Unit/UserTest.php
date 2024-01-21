<?php

namespace Tests\Unit;

use App\Http\Controllers\Auth\RegisterController;
use App\Models\Business;
use App\Models\User;
use App\Models\Cliente;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_crear_usuario_tipo_cliente(): void
    {
        $info = [
            "name" => "Roman Juan Sanchez Quispe",
            "email" => "romanelloco10@gmail.com",
            "password" => "romancito10",
            "tipo_de_usuario" => "cliente",
        ];
        $servicio = new RegisterController();
        $nuevo_cliente = $servicio->probar_create($info);
        $info_usuario = User::where('email',$nuevo_cliente['email'])->first();
        $info_cliente = Cliente::where('id_usuario',$nuevo_cliente['id'])->first();
        $resultado = True;
        $mensaje = "Cliente creado con exito";
        if($info_usuario == null){
            $resultado = False;
            $mensaje = "El cliente no ha sido creada en las tablas de Users o Clientes.";
        }
        else if($info_usuario['name'] != "Roman Juan Sanchez Quispe" || $info_usuario['email'] != "romanelloco10@gmail.com"){
            $resultado = False;
            $mensaje = "Los datos de entrada no coinciden con los datos de salida";
        }
        else if ($info_cliente['id_usuario'] != $info_usuario['id']){
            $resultado = False;
            $mensaje = "Los ID no coinciden en la tabla Clientes con la de Users";
        }
        Cliente::where('id_usuario',$info_cliente['id_usuario'])->delete();
        User::where('id',$info_usuario['id'])->delete();
        $this->assertTrue($resultado,$mensaje);
    }
    public function test_crear_usuario_tipo_empresa(): void
    {
        $info = [
            "name" => "Roman Juan Sanchez Quispe",
            "email" => "romanelloco10@gmail.com",
            "password" => "romancito10",
            "tipo_de_usuario" => "empresa",
            'direccion' => "Calle Kirito 201",
            'ruc' => "1474816",
        ];
        $servicio = new RegisterController();
        $nueva_empresa = $servicio->probar_create($info);
        $info_usuario = User::where('email',$nueva_empresa['email'])->first();
        $info_empresa = Business::where('id_usuario',$nueva_empresa['id'])->first();
        $resultado = True;
        $mensaje = "Empresa creada con exito";
        if($info_usuario == null || $info_empresa == null){
            $resultado = False;
            $mensaje = "La empresa no ha sido creada en las tablas de Users o Businesses.";
        }
        else if($info_usuario['name'] != "Roman Juan Sanchez Quispe" || $info_usuario['email'] != "romanelloco10@gmail.com"){
            $resultado = False;
            $mensaje = "Los datos de entrada no coinciden con los datos de salida";
        }
        else if ($info_empresa['id_usuario'] != $info_usuario['id']){
            $resultado = False;
            $mensaje = "Los ID no coinciden en la tabla Businesses con la de Users";
        }
        Business::where('id_usuario',$info_empresa['id_usuario'])->delete();
        User::where('id',$info_usuario['id'])->delete();
        $this->assertTrue($resultado,$mensaje);
    }
}
