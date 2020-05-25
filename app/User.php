<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'email', 'password', 'dependencia_id'];


      
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function dependencia() {

        return $this->belongsTo('App\Dependencias');
  
    }

    public function equipo() {

         return $this->hasMany('App\Equipo');
    }

    public function scopeNombre($query, $nombre)
    {
         if(trim($nombre) != '')
         {
         $query->where('nombre', "LIKE", "%$nombre%");
         }
    }
}
