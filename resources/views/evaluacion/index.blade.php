@extends('layouts.admin')
@section('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
		<h1>EVALUACIÓN PROPUESTAS  <a href="evaluacion/create"><button class="btn btn-success">Evaluar</button></a></h1>  
		@include('evaluacion.search')
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="myTable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Tema Propuesta</th>
					<th>Archivo Evaluación</th>
					<th>Calificación</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				
				@foreach($criterios as $cp)
				<tr>
					<td>{{$cp-> idevaluacion}}</td>
					<td><b>{{$cp-> temapropuesta}}</td>
					<td>	
						<a href="{{asset('archivos/evaluaciones/'.$cp->archivoEvaluacion)}}" target="_blank"><button>Evaluación </button></a>
					</td>
					<td>{{$cp-> calificacion}}</td>
					<td>{{$cp-> estado}}</td>
					
					<td>
						
						<a href="{{URL::action('CriteriosController@edit',$cp-> idevaluacion)}}"> <button class="btn btn-info">Editar </button></a>

						<a href="" data-target="#modal-delete-{{$cp->idevaluacion}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>

					</td>
				</tr>

				@include('evaluacion.modal')
				@endforeach

									
			</table>						
		</div>	
		{{$criterios->render()}}
	</div>
</div>

  
@endsection
