@extends('layouts.admin')
@section('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
		<h1>LISTA ASIGNATURAS <a href="asignaturas/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('postulacion.asignaturas.search')
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="myTable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Asignaturas</th>
					<th>Carreras</th>
					<th>Unidad Academica</th>
					<th>Opciones</th>
				</thead>
				
				@foreach($asignaturas as $asig)
				<tr>
					<td>{{$asig-> idasignaturas}}</td>
					<td>{{$asig-> nombreasignatura}}</td>
					<td>{{$asig-> carrera}}</td>
					<td>{{$asig-> facultad}}</td>
					<td>
						<a href="{{URL::action('asignaturaController@edit',$asig-> idasignaturas)}}"> <button class="btn btn-info">Editar </button></a>
						<a href="" data-target="#modal-delete-{{$asig->idasignaturas}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('postulacion.asignaturas.modal')
				@endforeach

								
			</table>
		</div>	
		{{$asignaturas->render()}}
	</div>
</div>

  
@endsection
