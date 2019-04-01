<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    //
    protected $table='postulantes';
    protected $primaryKey = 'idpostulantes';

    public $timestamps=false;

    protected $fillable =[
    	'nombrepersona',
    	'apellidopersona',
    	'cedula'
    ];

    protected $guarded= [

    ];

     public function postulantes_propuestas()
    {
        return $this->hasMany(Propuesta::class,'idpostulantes');
    }
}
