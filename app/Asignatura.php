<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    //   protected $table='tipoactividades';
    protected $primaryKey = 'idasignaturas';

    public $timestamps=false;

    protected $fillable =[
    	'nombreasignatura',
        'idcarreras'

    ];

    protected $guarded= [

    ];

   
 	public function carrera()
    {
    	return $this->belongsTo(Carrera::class,'idcarreras');
    }

     public function propuestas()
    {
        return $this->hasMany(Propuesta::class,'idpropuestas');
    }
    
     
}
