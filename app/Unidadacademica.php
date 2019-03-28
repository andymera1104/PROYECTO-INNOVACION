<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidadacademica extends Model
{
    //
       protected $table='unidadacademica';
    protected $primaryKey = 'idunidadAcademica';

    public $timestamps=false;

    protected $fillable =[
    	'nombreUA'
    ];

    protected $guarded= [

    ];

   /* public function carreras()
    {
    	return $this->hasMany(Carrera::class);
    }
    */
}
