<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desactiv extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $table='desactivs';

    protected $primaryKey='id';

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'estado',

        'tiempo',
        'tiempoV',

        'Alumno',

        'idSecact'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function desUser()
    {
        return $this->hasOne(DesactivUser::class);
    }
}
