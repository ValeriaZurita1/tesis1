<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    //
     protected $table='test_user'; 

    protected $primaryKey='id';
  
    public $timestamps=false;//indica columnas con modificaciones de propiedades

    
    protected $fillable =[  //creacion campos recibn valor
    	
        'user_id',

        'test_id'
    
];

    
    protected  $guarded =[
 //atributos tipo warded

    
];

protected $hidden = [
        
    ];
}
