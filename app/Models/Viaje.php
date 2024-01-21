<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Viaje
 *
 * @property $id_viaje
 * @property $fecha_inicio
 * @property $fecha_retorno
 * @property $estado
 * @property $id_ruta
 *
 * @property Bu[] $buses
 * @property Reserva[] $reservas
 * @property Rutum $rutum
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Viaje extends Model
{
    protected $primaryKey = 'id_viaje';
    static $rules = [
		'fecha_inicio' => 'required',
		'fecha_retorno' => 'required',
		'estado' => 'required',
		'id_ruta' => 'required',
    ];

    protected $perPage = 20;
    public $timestamps = false;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_viaje','fecha_inicio','fecha_retorno','estado','id_ruta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buses()
    {
        return $this->hasMany('App\Models\Bu', 'id_viaje', 'id_viaje');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservas()
    {
        return $this->hasMany('App\Models\Reserva', 'id_viaje', 'id_viaje');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rutum()
    {
        return $this->hasOne('App\Models\Rutum', 'id_ruta', 'id_ruta');
    }
    

}
