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
use App\Criterio;
use App\Evaluacion;
use DB;

class ProyectosController extends Controller
{
    //
    public function __construct(){
		$this->middleware('auth');
	}

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
			->orwhere('per.periodo','LIKE','%'.$query.'%')
			->orderBy('pro.idpropuestas','desc')
			->paginate(8);
			return view('proyectos.propuestas.index',["propuestas"=>$propuestas, "searchText"=>$query]);	
		}
	
	}

	public function indexEvaluacion(Request $request ){
		if($request)
		{
			$query= trim($request->get('searchText'));
			$evaluaciones= DB::table('propuestas as pro')
				->join('asignaturas as asig', 'pro.idasignatura','=','asig.idasignaturas')
				->join('periodos as per','pro.idperiodos','=','per.idperiodos')
				->join('postulantes as postu','pro.idpostulantes','=','postu.idpostulantes')
				->join('carreras as car', 'asig.idcarreras', '=', 'car.idcarreras')
				->join('unidadacademica as ua', 'car.idunidadAcademica', '=', 'ua.idunidadAcademica')

				->join('evaluacion as eva','pro.idpropuestas','=','eva.idpropuestas')
				->join('criterios as cri','cri.idcriterios','=','eva.idcriterios')

				->select('pro.idpropuestas','postu.nombrepersona','ua.nombreUA as facultad','asig.nombreasignatura','pro.temapropuesta','per.periodo as periodo','cri.estado','eva.calificacion')


			->where('pro.temapropuesta','LIKE','%'.$query.'%')
			->orwhere('postu.nombrepersona','LIKE','%'.$query.'%')
			->orwhere('ua.nombreUA','LIKE','%'.$query.'%')
			->orwhere('per.periodo','LIKE','%'.$query.'%')
			->orwhere('cri.estado','LIKE','%'.$query.'%')

			->orderBy('pro.idpropuestas','desc')
			->paginate(8);
			return view('proyectos.evaluaciones.index',["evaluaciones"=>$evaluaciones, "searchText"=>$query]);	
		}
	
	}

	public function indexGanadores(Request $request ){
		if($request)
		{
			$query= trim($request->get('searchText'));
			$evaluaciones= DB::table('propuestas as pro')
				->join('asignaturas as asig', 'pro.idasignatura','=','asig.idasignaturas')
				->join('periodos as per','pro.idperiodos','=','per.idperiodos')
				->join('postulantes as postu','pro.idpostulantes','=','postu.idpostulantes')
				->join('carreras as car', 'asig.idcarreras', '=', 'car.idcarreras')
				->join('unidadacademica as ua', 'car.idunidadAcademica', '=', 'ua.idunidadAcademica')

				->join('evaluacion as eva','pro.idpropuestas','=','eva.idpropuestas')
				->join('criterios as cri','cri.idcriterios','=','eva.idcriterios')
				

				->select('pro.idpropuestas','postu.nombrepersona','ua.nombreUA as facultad','asig.nombreasignatura','pro.temapropuesta','per.periodo as periodo','cri.estado','eva.calificacion')
				//->where('calificacion','>=','80')

			->where('pro.temapropuesta','LIKE','%'.$query.'%')
			->orwhere('postu.nombrepersona','LIKE','%'.$query.'%')
			->orwhere('ua.nombreUA','LIKE','%'.$query.'%')
			->orwhere('per.periodo','LIKE','%'.$query.'%')
			->orwhere('cri.estado','LIKE','%'.$query.'%')

			->orderBy('pro.idpropuestas','desc')
			->paginate(8);
			return view('proyectos.ganadores.index',["evaluaciones"=>$evaluaciones, "searchText"=>$query]);	
		}
	
	}

	public function indexResultados(Request $request ){
		if($request)
		{
			$query= trim($request->get('searchText'));
			$evaluaciones= DB::table('propuestas as pro')
				->join('asignaturas as asig', 'pro.idasignatura','=','asig.idasignaturas')
				->join('periodos as per','pro.idperiodos','=','per.idperiodos')
				->join('postulantes as postu','pro.idpostulantes','=','postu.idpostulantes')
				->join('carreras as car', 'asig.idcarreras', '=', 'car.idcarreras')
				->join('unidadacademica as ua', 'car.idunidadAcademica', '=', 'ua.idunidadAcademica')

				->join('evaluacion as eva','pro.idpropuestas','=','eva.idpropuestas')
				->join('criterios as cri','cri.idcriterios','=','eva.idcriterios')
				

				->select('pro.idpropuestas','postu.nombrepersona','ua.nombreUA as facultad','asig.nombreasignatura','pro.temapropuesta','per.periodo as periodo','cri.estado','eva.calificacion')
				//->where('calificacion','>=','80')

			->where('pro.temapropuesta','LIKE','%'.$query.'%')
			->orwhere('postu.nombrepersona','LIKE','%'.$query.'%')
			->orwhere('ua.nombreUA','LIKE','%'.$query.'%')
			->orwhere('per.periodo','LIKE','%'.$query.'%')
			->orwhere('cri.estado','LIKE','%'.$query.'%')

			->orderBy('pro.idpropuestas','desc')
			->paginate(8);
			return view('resultados.index',["evaluaciones"=>$evaluaciones, "searchText"=>$query]);	
		}
	
	}


}
