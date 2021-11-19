<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesTestUser extends Model
{

    protected $table='destest_user';

    protected $primaryKey='id';

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor
        'user_id',
        'destest_id',
    ];


    protected  $guarded =[
 //atributos tipo warded


];

protected $hidden = [

    ];

    public function desTest(){
        return $this->belongsTo('App\Destest', 'destest_id');
    }

    //
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function destUsuer()
    // {
    //     return $this->hasOne('App\DesactivUser', 'desactiv_id');
    // }
}
