<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
//use Illuminate\Support\Facades\Input; //para subir los archivos al servidor
use App\Http\Requests\AsignaturaFormRequest;
use App\Asignatura;
use DB;


class AsignaturaController extends Controller
{
    //

    public function __construct(){

	}

	public function index(Request $request ){
		if($request)
		{
			$query= trim($request->get('searchText'));
			$asignaturas= DB::table('asignaturas as asig')
				->join('carreras as car', 'asig.idcarreras','=','car.idcarreras')
				->join('unidadacademica as ua','car.idunidadAcademica','=','ua.idunidadAcademica')
				->select('asig.idasignaturas','asig.nombreasignatura','car.nombrecarrera as carrera' ,'ua.nombreUA as facultad')

			->where('asig.nombreasignatura','LIKE','%'.$query.'%')
			->orwhere('car.nombrecarrera','LIKE','%'.$query.'%')
			->orderBy('asig.idasignaturas','desc')
			->paginate(8);
			return view('postulacion.asignaturas.index',["asignaturas"=>$asignaturas, "searchText"=>$query]);	
		}
	

	}

	public function create(){

		$carreras=DB::table('carreras')->get();
		$ua=DB::table('unidadacademica')->get();
		return view ("postulacion/asignaturas/create",["carreras"=>$carreras,"ua"=>$ua]);
	}

	public function store(AsignaturaFormRequest $request){
			$asignatura= new Asignatura;
			$asignatura->nombreasignatura=$request->get('nombreasignatura');
			$asignatura->idcarreras = $request->get('idcarreras');
			//$asignatura->idunidadAcademica=$request->get('idunidadAcademica');
			
				
			$asignatura->save();
			return Redirect::to("postulacion/asignaturas");
	}

	public function  show($id){
		return view("postulacion/asignaturas/show",["asignatura"=>Asignatura::findOrFail($id)]);
	}

	public function edit($id){
		
		$asignatura=Asignatura::findOrFail($id);
		$carreras=DB::table('carreras')->get();
		//$ua=DB::table('unidadacademica')->get();
		return view("postulacion/asignaturas/edit",["asignatura"=>$asignatura, "carreras"=>$carreras]);
		//,"ua"=>$ua //despues de $carreras
	}

	public function update(AsignaturaFormRequest $request,$id){
		$asignatura=Asignatura:: findOrFail($id);

		$asignatura->idcarreras = $request -> get('idcarreras');
		//$asignatura->idunidadAcademica=$request->get('idunidadAcademica');
		$asignatura->nombreasignatura=$request->get('nombreasignatura');
		$asignatura->save();
		return Redirect::to('postulacion/asignaturas');
	}

	public function destroy($id){
		$asignatura= Asignatura::find($id);
		$asignatura->delete();	
		return Redirect::to('postulacion/asignaturas');
	}

/*
	public function fetch(Request $request)
	{
		$select=$request->get('select');
		$value= $request->get('value');
		$dependent= $request->get('dependent');
		$data=DB::table('carreras')
		->where($select,$value)
		->groupBy($dependent)
		->get();
		$output='<option value="">Select'.ucfirst($dependent).'</option';
		foreach ($data as $row) 
		{
			$output .='<option value="'.$row->$dependent.'">'.$row->$dependent.'</option';
		}
		echo $output;
	}

*/
}
