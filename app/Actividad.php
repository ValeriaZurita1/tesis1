<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table='actividads';  

    protected $primaryKey='id'; 
  
    public $timestamps=false;//indica columnas con modificaciones de propiedades

    
    protected $fillable =[  //creacion campos recibn valor
    	
        'descripcion'
    
];

    
    protected  $guarded =[
 //atributos tipo warded

    
];

protected $hidden = [
        
    ];
}
