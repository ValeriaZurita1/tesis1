<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    //
    protected $table='colegios';

    protected $primaryKey='id'; 
  
    //public $timestamps=false;//indica columnas con modificaciones de propiedades

    
    protected $fillable =[  //creacion campos recibn valor
    	
        'nombre',

        'direccion',

        'telefono' 
    
];

    
    protected  $guarded =[
 //atributos tipo warded

    
];

    protected $hidden = [
        
    ];

    public function nivels()
    {
        return $this->hasMany('App\Nivel', 'idColegio');
    }
}
