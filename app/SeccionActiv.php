<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeccionActiv extends Model
{
    //
    protected $table='seccion_activs';

    protected $primaryKey='id';

    public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'descripcion',

        'idActiv'

];


    protected  $guarded =[
 //atributos tipo warded


];

    public function test(){
        return $this->hasMany('App\Test', 'selecTest');
    }

protected $hidden = [

    ];
}
