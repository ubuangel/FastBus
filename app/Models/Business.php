<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Business
 *
 * @property $id_usuario
 * @property $direccion
 * @property $ruc
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Business extends Model
{

    static $rules = [
		'id_usuario' => 'required',
		'direccion' => 'required',
		'RUC' => 'required',
    ];
    public $timestamps = false;
    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_usuario','direccion','RUC'];
}