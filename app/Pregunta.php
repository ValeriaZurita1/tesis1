<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    //
    public function tests(){
        return $this->belongsToMany('App\Test');
    }


    protected $table='preguntas';

    protected $primaryKey='id';

    protected $with = ['respuestas'];

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'desPreg'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function respuestas(){
        return $this->hasMany('App\Respuesta', 'idPreg');
    }

}
