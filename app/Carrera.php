<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    //
    protected $table='carreras';
    protected $primaryKey = 'idcarreras';

    public $timestamps=false;

    protected $fillable =[
    	'nombrecarrera'
    ];

    protected $guarded= [

    ];

    public function unidadacademica()
    {
    	return $this->belongsTo(Unidadacademica::class,'idunidadAcademica');
    }
	
	/*
    public function asignaturas()
    {
    	return $this->hasMany(Asignatura::class);
    }
    */
}
