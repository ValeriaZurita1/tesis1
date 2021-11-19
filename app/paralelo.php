<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paralelo extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $table='paralelos';

    protected $with = ['nivel'];

    protected $primaryKey='id';

    //public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'nombreP',

        'idNivel'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function paraleloUsuario(){
        return $this->hasMany('App\ParaleloUs', 'paralelo_id');
    }

    public function nivel()
    {
        return $this->belongsTo(Nivel::class, 'idNivel');
    }

}
