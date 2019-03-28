<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante_propuesta extends Model
{
    //
    //protected $primaryKey = ' ';

    public $timestamps=false;

    protected $fillable =[
    	'roles'
    ];

    protected $guarded= [

    ];

    public function postulante()
    {
    	return $this->belongsTo(Postulante::class,'idpostulantes');
    }
 	
 	public function propuesta()
    {
    	return $this->belongsTo(Propuesta::class,'idpropuestas');
    }
}
