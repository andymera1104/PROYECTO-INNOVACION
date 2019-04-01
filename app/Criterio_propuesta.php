<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio_propuesta extends Model
{
    //
    protected $table='criterios_propuesta';
    //protected $primaryKey = ' ';

    public $timestamps=false;

    
    /*protected $fillable =[
    	'actividad',
    	'cantidad',
    	'descripcion',
    	'fechaInicio',
    	'fechaFin'
    ];
	*/
    protected $guarded= [

    ];


    public function criterio()
    {
    	return $this->belongsTo(Criterio::class,'idcriterios');
    }

 	public function propuesta()
    {
    	return $this->belongsTo(Propuesta::class,'idpropuestas');
    }
}

