<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Postulante;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PostulanteFormRequest;
use DB;

class PostulanteController extends Controller
{
    //
	public function __construct(){

	}

	public function index(Request $request ){
		if($request)
		{
			$query= trim($request->get('searchText'));
			$postulantes= DB::table('postulantes')->where('nombrepersona','LIKE','%'.$query.'%')
				->where('cedula','LIKE','%'.$query.'%')
				->paginate(8);
			return view('postulantes.index',["postulantes"=>$postulantes, "searchText"=$query]);
		}
	}

	public function create(){
		return view ("postulantes.create");
	}

	public function store(PostulanteFormRequest $request){
			$postulante= new Postulante;
			$postulante->nombrepersona=$request->get('nombrepersona');
			$postulante->apellidopersona=$request->get('apellidopersona');
			$postulante->cedula=$request->get('cedula');
			$postulante->save();
			return Redirect::to('postulantes');
	}

	public function  show($id){
		return view("postulantes.show",["postulante"=>Postulante::findOrFail($id)]);
	}

	public function edit(){
		return view("postulantes.edit",["postulante"=>Postulante::findOrFail($id)]);
	}

	public function update(PostulanteFormRequest $request,$id){
		$postulante=Postulante:: findOrFail($id);
		$postulante->nombrepersona=$request->get('nombrepersona');
		$postulante->apellidopersona=$request->get('apellidopersona');
		$postulante->cedula=$request->get('cedula');
		$postulante->save();
		return Redirect::to('postulantes')
	}

	public function destroy($id){
		$postulante= Postulante::find($id);
		$postulante->delete();	
	}





}