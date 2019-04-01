<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipoactividad extends Model
{
    //
     protected $table='tipoactividades';
    protected $primaryKey = 'idsecuencia';

    public $timestamps=false;

    protected $fillable =[
    	'secuencia'
    ];

    protected $guarded= [

    ];

    public function actividades()
    {
    	return $this->hasMany(Actividad::class,'idsecuencia');
    }
}
