<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //para subir los archivos al servidor
use App\Http\Requests\PropuestaFormRequest;
use App\Propuesta;
use App\Asignatura;
use App\Carrera;
use App\Unidadacademica;
use DB;

class ProyectosController extends Controller
{
    //

	public function index(Request $request ){
		if($request)
		{
			$query= trim($request->get('searchText'));
			$propuestas= DB::table('propuestas as pro')
				->join('asignaturas as asig', 'pro.idasignatura','=','asig.idasignaturas')
				->join('periodos as per','pro.idperiodos','=','per.idperiodos')
				->join('postulantes as postu','pro.idpostulantes','=','postu.idpostulantes')
				->join('carreras as car', 'asig.idcarreras', '=', 'car.idcarreras')
				->join('unidadacademica as ua', 'car.idunidadAcademica', '=', 'ua.idunidadAcademica')

				->select('pro.idpropuestas','postu.nombrepersona','asig.nombreasignatura','car.nombrecarrera as carrera','ua.nombreUA as facultad','pro.temapropuesta','pro.presupuesto as presupuesto','per.periodo as periodo','pro.observaciones as observaciones')


			->where('pro.temapropuesta','LIKE','%'.$query.'%')
			->orwhere('postu.nombrepersona','LIKE','%'.$query.'%')
			->orwhere('ua.nombreUA','LIKE','%'.$query.'%')
			->orderBy('pro.idpropuestas','desc')
			->paginate(8);
			return view('proyectos.index',["propuestas"=>$propuestas, "searchText"=>$query]);	
		}
	
	}


}
