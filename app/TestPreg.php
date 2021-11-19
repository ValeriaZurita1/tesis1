<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPreg extends Model
{
    //
     protected $table='pregunta_test';

    protected $primaryKey='id';

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'pregunta_id',

        'test_id'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];


    public function test()
    {
        return $this->belongsTo('App\Test');
    }

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }

}
