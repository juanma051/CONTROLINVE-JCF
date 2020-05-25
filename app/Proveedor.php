<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    //
    protected $table = 'proveedor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'nit', 'direccion','ciudad','telempresa','email','telcontacto'];

    public function user() {

        return $this->hasMany('App\Proveedor');
    }
}