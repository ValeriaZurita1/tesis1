<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DesactivUser extends Model
{
    //


    protected $table='desactiv_user';

    protected $primaryKey='id';

    protected $with = ['desactiv'];

    // public $timestamps=false;//indica columnas con modificaciones de propiedades


    protected $fillable =[  //creacion campos recibn valor
        'user_id',
        'desactiv_id'
    ];


    protected  $guarded =[
        //atributos tipo warded
    ];

    protected $hidden = [

    ];

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function desactiv()
    {
        // return $this->belongsTo(Desactiv::class);
        return $this->belongsTo('App\Destest', 'desactiv_id');
    }
}
