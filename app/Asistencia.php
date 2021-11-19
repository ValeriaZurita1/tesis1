<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $table='asistencias';
    protected $with = ['paraleloUsuario'];

    protected $primaryKey='id';

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'DescripAsis',

        'estado',

        'fechaAsis',

        'user_paralelo_id'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function paraleloUsuario()
    {
        return $this->belongsTo('App\ParaleloUs', 'user_paralelo_id');
    }
}
