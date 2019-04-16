<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criterio extends Model
{
    //
    protected $table='criterios';
    protected $primaryKey = 'idcriterios';

    public $timestamps=false;

    protected $fillable =[
    	'idpropuestas',
        'descripcion'
        //'ponderacion',
        //'calificacion'
    ];

    protected $guarded= [

    ];

    public function propuesta()
    {
    	return $this->belongsTo(Propuesta::class,'idpropuestas');
    }
}
