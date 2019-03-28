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
    	'descripcion'
    ];

    protected $guarded= [

    ];

    /*public function criterios_propuesta()
    {
    	return $this->hasMany(Criterio_propuesta::class);
    }*/
}
