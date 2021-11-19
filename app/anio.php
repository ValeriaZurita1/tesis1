<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class anio extends Model
{
    //
     protected $table='anios'; 

    protected $primaryKey='id';
  
    public $timestamps=false;//indica columnas con modificaciones de propiedades

    
    protected $fillable =[  //creacion campos recibn valor
    	
        'nombreA',

        'fechaA',

        'idNivel'
    
];

    
    protected  $guarded =[
 //atributos tipo warded

    
];

protected $hidden = [
        
    ];
}
