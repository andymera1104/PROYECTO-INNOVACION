<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //para subir los archivos al servidor
use App\Http\Requests\CriteriosFromRequest;
use App\Evaluacion;
use DB;


class CriteriosController extends Controller
{
    //

    public function __construct(){
		$this->middleware('auth');
	}

	 public function index(Request $request ){
		if($request)
		{
			$query= trim($request->get('searchText'));
			$criterios= DB::table('evaluacion as eva')
				->join('propuestas as pro','eva.idpropuestas','=','pro.idpropuestas')
				->join('criterios as cri','eva.idcriterios','=','cri.idcriterios')			
				->select('eva.idevaluacion','pro.temapropuesta','eva.archivoEvaluacion','eva.calificacion','cri.estado')

			//->where('eva.idpropuestas','LIKE','%'.$query.'%')
			->where('pro.temapropuesta','LIKE','%'.$query.'%')
			->orderBy('eva.idevaluacion','desc')
			->paginate(10);
			return view('evaluacion.index',["criterios"=>$criterios, "searchText"=>$query]);	
		}
	

	}

	
	public function create(){

		$propuestas=DB::table('propuestas')->get();
		$criterios=DB::table('criterios')->get();
		
		return view ("evaluacion/create",["propuestas"=>$propuestas,"criterios"=>$criterios]);
	}

	public function store(CriteriosFromRequest $request)
	{
	


		/*
		$cali = $request->input('calificacion');
		$ponderacion = $request->input('ponderacion');
			for ($i=1; $i <=sizeof($cali) ; $i++) { 
				
			$criterio= new Evaluacion;
			$criterio->idpropuestas=$request->get('idpropuestas');
			$criterio->idcriterios=$i;
			$criterio->ponderacion=$ponderacion[$i];
			$criterio->calificacion=$cali[$i];
			
			$criterio->save();
			
			}
			
		*/	

			$criterio = new Evaluacion;
			$criterio->idpropuestas=$request->get('idpropuestas');
			$criterio->idcriterios=$request->get('idcriterios');
			$criterio->calificacion=$request->get('calificacion');
			
			if(Input::hasFile('archivoEvaluacion')){
				$file=Input::file('archivoEvaluacion');
										 
				$file->move(public_path().'/archivos/evaluaciones/',$file->getClientOriginalName());
				$criterio->archivoEvaluacion=$file->getClientOriginalName();
			}

			$criterio->save();
			return Redirect::to("evaluacion");
	}

	public function  show($id)
	{
		return view("evaluacion/show",["criterio"=>Evaluacion::findOrFail($id)]);
	}

	public function edit($id)
	{
		
		$criterio=Evaluacion::findOrFail($id);
		$propuestas=DB::table('propuestas')->get();
		$criterios=DB::table('criterios')->get();
		
		return view("evaluacion/edit",["criterio"=>$criterio,"propuestas"=>$propuestas, "criterios"=>$criterios]);
		
	}

	public function update(CriteriosFromRequest $request,$id)
	{

		/*
		$criterio=  Evaluacion::findOrFail($id);
		$cali = $request->input('calificacion');
		$ponderacion = $request->input('ponderacion');
			for ($i=1; $i <=sizeof($cali) ; $i++) { 
				
			$criterio= new Evaluacion;
			$criterio->idpropuestas=$request->get('idpropuestas');
			$criterio->idcriterios=$i;
			$criterio->ponderacion=$ponderacion[$i];
			$criterio->calificacion=$cali[$i];
			
			$criterio->save();
		}
		*/
		$criterio=  Evaluacion::findOrFail($id);
		$criterio->idpropuestas=$request->get('idpropuestas');
		$criterio->idcriterios=$request->get('idcriterios');
		$criterio->calificacion=$request->get('calificacion');

		$criterio->save();


		return Redirect::to("evaluacion");

	}

	public function destroy($id)
	{
		$criterio= Evaluacion::find($id);
		$criterio->delete();	
		return Redirect::to('evaluacion');
	}
}


