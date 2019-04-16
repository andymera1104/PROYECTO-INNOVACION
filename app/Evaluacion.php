<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
     protected $primaryKey = 'idevaluacion';
    protected $table='evaluacion';
    public $timestamps=false;

    public $fillable =[
        'idcriterios',
        'idpropuestas',
        'archivoEvaluacion',
    	'calificacion'
    ];

    protected $guarded= [

    ];

     public function propuesta()
    {
        return $this->belongsTo(Propuesta::class,'idpropuestas');
    }

    public function criterio()
    {
        return $this->belongsTo(Criterio::class,'idcriterios');
    }
}
