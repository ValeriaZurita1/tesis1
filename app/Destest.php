<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destest extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $table='destests';

    protected $primaryKey='id';

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor

        'nombUsDes',

        'notaDes',

        'fechaDes',

        'descTest'

];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function test(){
        return $this->belongsTo('App\Test', 'descTest');
    }

    public function destUsuer()
    {
        return $this->hasOne('App\DesactivUser', 'desactiv_id');
    }

    public function destestUser()
    {
        return $this->hasOne('App\DesTestUser', 'destest_id');
    }

}
