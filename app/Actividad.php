<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    //
    protected $table='actividades';
    protected $primaryKey = 'idactividades';

    public $timestamps=false;

    protected $fillable =[
    	'actividad',
    	'cantidad',
    	'descripcion',
    	'fechaInicio',
    	'fechaFin'
    ];

    protected $guarded= [

    ];


    public function tipoactividad()
    {
    	return $this->belongsTo(Tipoactividad::class,'idsecuencia');
    }

 	public function propuesta()
    {
    	return $this->belongsTo(Propuesta::class,'idpropuestas');
    }

       
}
