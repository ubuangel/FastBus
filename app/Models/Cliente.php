<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Cliente
 *
 * @property $id_usuario
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id_usuario',
    ];
    public $timestamps = false;
}
