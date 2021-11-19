<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    //
    protected $table='respuestas';

    protected $primaryKey='id';

    public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'descripR',

        'notaR',

        'idPreg'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta', 'idPreg');
    }
}
