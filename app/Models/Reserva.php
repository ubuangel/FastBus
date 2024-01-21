<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';
    protected $fillable = ['id_cliente','num_asiento','id_bus','id_viaje'];
    public $timestamps = false;
}
