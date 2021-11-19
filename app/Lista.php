<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    //
    public function users(){
        return $this->belongsToMany('App\User');
    }

    protected $table='listas';  

    protected $primaryKey='id'; 
  
    public $timestamps=false;//indica columnas con modificaciones de propiedades

    
    protected $fillable =[  //creacion campos recibn valor
    	
        'DescripLis', 

        'fechaRegis' 
    
];

    
    protected  $guarded =[
 //atributos tipo warded

    
];

protected $hidden = [
        
    ];
}
