<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles(){
        return $this->belongsToMany('App\Role');
    }

    //
    public function paralelos(){
        return $this->hasMany('App\ParaleloUs');
    }
    //
    // public function asistencias(){
    //     return $this->hasMany('App\Asistencia');
    // }
     //
    public function listas(){
        return $this->belongsToMany('App\Lista');
    }
     //
    public function desactivs(){
        return $this->belongsToMany('App\Desactiv');
    }
    //  //
    // public function tests(){
    //     return $this->belongsToMany('App\Test');
    // }
     //
    public function destests(){
        return $this->hasMany('App\DesTestUser');
    }
     //

    public function authorizeRoles($roles){
        if($this->hasAnyRole($roles)){
            return true;
        }
        abort(401,'Esta accion no esta autorizada');
    }

    public function hasAnyRole($roles){
        if(is_array($roles)){
            foreach ($roles as $role) {
                # code...
                if($this->hasRole($roles))
                {
                    return true;
                }
            }

        }
        else{
            if($this->hasRole($roles))
            {
                return true;
            }
        }
        return false;

    }

    public function hasRole($role){
        if($this->roles()->where('name',$role)->first()){//
            return true;
        }
        return false;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','apellido','direccion','telefono','celular','foto', 'email','estado' , 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function desactivUser(){
        return $this->hasMany( 'App\DesactivUser');
    }
}
