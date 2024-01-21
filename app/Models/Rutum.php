<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Rutum
 *
 * @property $id_ruta
 * @property $origen
 * @property $destino
 * @property $encargado
 *
 * @property Business $business
 * @property Viaje[] $viajes
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Rutum extends Model
{
    protected $primaryKey = 'id_ruta';
    static $rules = [
		'origen' => 'required|alpha:ascii',
		'destino' => 'required|alpha:ascii',
    ];

    protected $perPage = 20;
    public $timestamps = false;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_ruta','origen','destino','encargado'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function business()
    {
        return $this->hasOne('App\Models\Business', 'id_usuario', 'encargado');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function viajes()
    {
        return $this->hasMany('App\Models\Viaje', 'id_ruta', 'id_ruta');
    }
    

}
