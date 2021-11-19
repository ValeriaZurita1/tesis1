<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nivel extends Model
{
    //
    protected $table='nivels';

    protected $primaryKey='id';

    //public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'nombreN',

        'idColegio'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function paralelos(){
        return $this->hasMany(paralelo::class, 'idNivel');
    }

    public function colegio()
    {
        return $this->belongsTo('App\Colegio', 'idColegio');
    }
}
