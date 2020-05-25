<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependencias extends Model
{
    protected $table = 'dependencia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'ubicacion', 'extension'];

    public function user() {

        return $this->hasMany('App\Dependencias');

    }
}
