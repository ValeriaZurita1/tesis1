<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUserR extends Model
{
    //
      protected $table='role_user'; 

    protected $primaryKey='id';
  
    public $timestamps=false;//indica columnas con modificaciones de propiedades

    
    protected $fillable =[  //creacion campos recibn valor
    	
        'user_id',

        'role_id'
    
];

    
    protected  $guarded =[
 //atributos tipo warded

    
];

protected $hidden = [
        
    ];
}
