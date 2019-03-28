<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    //   protected $table='tipoactividades';
    protected $primaryKey = 'idasignaturas';

    public $timestamps=false;

    protected $fillable =[
    	'nombreasignatura'
    ];

    protected $guarded= [

    ];

    /*public function propuestas()
    {
    	return $this->hasMany(Propuesta::class);
    }
 	*/
 	public function carrera()
    {
    	return $this->belongsTo(Carrera::class,'idcarreras');
    }
     
}
