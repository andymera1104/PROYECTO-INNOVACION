<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
    //
    protected $primaryKey = 'idpropuestas';

    public $timestamps=false;

    protected $fillable =[
    	'temapropuesta',
    	'presupuesto',
    	'observaciones',
    	'archivotema',
    	'archivocronograma'
    ];

    protected $guarded= [

    ];

    public function periodo()
    {
    	return $this->belongsTo(Periodo::class,'idperiodos');
    }
 	
 	public function asignatura()
    {
    	return $this->belongsTo(Asignatura::class,'idasignaturas');
    }
}
