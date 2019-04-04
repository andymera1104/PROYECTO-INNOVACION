<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; //para subir los archivos al servidor
use App\Http\Requests\PropuestaFormRequest;
use App\Propuesta;
use DB;

class PropuestaController extends Controller
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

				->select('pro.idpropuestas','postu.nombrepersona','asig.nombreasignatura','pro.temapropuesta','pro.presupuesto as presupuesto','pro.archivotema','pro.archivocronograma','pro.observaciones as observaciones')

			->where('pro.temapropuesta','LIKE','%'.$query.'%')
			->orwhere('postu.nombrepersona','LIKE','%'.$query.'%')
			->orderBy('pro.idpropuestas','desc')
			->paginate(8);
			return view('postulacion.propuestas.index',["propuestas"=>$propuestas, "searchText"=>$query]);	
		}
	

	}

	//hasta aqui funciona bien

	public function create(){

		$postulantes=DB::table('postulantes')->get();
		$asignaturas=DB::table('asignaturas')->get();
		$periodos=DB::table('periodos')->get();
		return view ("postulacion/propuestas/create",["postulantes"=>$postulantes,"asignaturas"=>$asignaturas,"periodos"=>$periodos]);
	}

	public function store(PropuestaFormRequest $request){
			$propuesta= new Propuesta;
			$propuesta->temapropuesta=$request->get('temapropuesta');
			$propuesta->presupuesto=$request->get('presupuesto');
			$propuesta->observaciones=$request->get('observaciones');

			$propuesta->idperiodos=$request->get('idperiodos');
			$propuesta->idasignatura=$request->get('idasignatura');
			$propuesta->idpostulantes=$request->get('idpostulantes');
			

			//para subir archivos
			if(Input::hasFile('archivotema')){
				$file=Input::file('archivotema');
				$file->move(public_path().'/archivos/temas/',$file->getClientOriginalName());
				$propuesta->archivotema=$file->getClientOriginalName();
			}

			if(Input::hasFile('archivocronograma')){
				$file=Input::file('archivocronograma');
				$file->move(public_path().'/archivos/cronogramas/',$file->getClientOriginalName());
				$propuesta->archivocronograma=$file->getClientOriginalName();
			}



			
				
			$propuesta->save();
			return Redirect::to("postulacion/propuestas");
	}

	public function  show($id){
		return view("postulacion/propuestas/show",["propuesta"=>Propuesta::findOrFail($id)]);
	}

	public function edit($id){
		
		$propuesta=Propuesta::findOrFail($id);
		$postulantes=DB::table('postulantes')->get();
		$asignaturas=DB::table('asignaturas')->get();
		$periodos=DB::table('periodos')->get();
		
		return view("postulacion/propuestas/edit",["propuesta"=>$propuesta, "postulantes"=>$postulantes,"asignaturas"=>$asignaturas,"periodos"=>$periodos]);
		
	}

	public function update(PropuestaFormRequest $request,$id){
		$propuesta=Propuesta:: findOrFail($id);

		$propuesta->temapropuesta=$request->get('temapropuesta');
			$propuesta->presupuesto=$request->get('presupuesto');
			$propuesta->observaciones=$request->get('observaciones');
			//para subir archivos
			if(Input::hasFile('archivotema')){
				$file=Input::file('archivotema');
				$file->move(public_path().'/archivos/temas/',$file->getClientOriginalName());
				$propuesta->archivotema=$file->getClientOriginalName();
			}

			if(Input::hasFile('archivocronograma')){
				$file=Input::file('archivocronograma');
				$file->move(public_path().'/archivos/cronogramas/',$file->getClientOriginalName());
				$propuesta->archivocronograma=$file->getClientOriginalName();
			}

			

			$propuesta->idperiodos = $request->get('idperiodos');
			$propuesta->idasignatura=$request->get('idasignatura');
			$propuesta->idpostulantes=$request->get('idpostulantes');
		$propuesta->save();
		return Redirect::to('postulacion/propuestas');
	}

	public function destroy($id){
		$propuesta= Propuesta::find($id);
		$propuesta->delete();	
		return Redirect::to('postulacion/propuestas');
	}
}
