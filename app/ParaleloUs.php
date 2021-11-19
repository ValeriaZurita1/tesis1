<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParaleloUs extends Model
{
    //
     protected $table='paralelo_user';

    protected $primaryKey='id';

    protected $with = ['user', 'paralelo'];

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'user_id',

        'paralelo_id'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function paralelo(){
        return $this->belongsTo('App\paralelo', 'paralelo_id');
    }


    public function asistencia(){
        return $this->hasMany('App\Asistencia', 'user_paralelo_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
