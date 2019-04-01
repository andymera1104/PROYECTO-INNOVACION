<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //
    protected $table='periodos';
    protected $primaryKey = 'idperiodos';

    public $timestamps=false;

    protected $fillable =[
    	'periodo'
    ];

    protected $guarded= [

    ];


    public function propuestas()
    {
    	return $this->hasMany(Propuesta::class,'idpropuestas');
    }
    
}
