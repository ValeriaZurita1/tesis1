<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function preguntas(){
        return $this->belongsToMany('App\Pregunta');
    }

    protected $table='tests';

    protected $primaryKey='id';

    protected $with = ['testPreg'];

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'desTest',
        'tipoTest',
        'selecTest'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function seccionActiv(){
        return $this->belongsTo('App\SeccionActiv', 'selecTest');
    }

    public function desTestEntitity(){
        return $this->hasMany('App\Destest', 'descTest');
    }

    public function testPreg(){
        return $this->hasMany('App\TestPreg');
    }

}
