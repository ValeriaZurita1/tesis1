<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsistUser extends Model
{
    //
    protected $table='asistencia_user'; 

    protected $primaryKey='id';
  
    public $timestamps=false;//indica columnas con modificaciones de propiedades

    
    protected $fillable =[  //creacion campos recibn valor
    	
        'user_id',

        'asistencia_id'
    
];

    
    protected  $guarded =[
 //atributos tipo warded

    
];

protected $hidden = [
        
    ];
}
