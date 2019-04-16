@extends('layouts.admin')
@section('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
		<h1>REPORTE EVALUACIONES </h1>
		@include('proyectos.evaluaciones.search')
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="myTable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombres</th>
					<th>Facultad</th>
					<th>Asignaturas</th>
					<th>Tema Propuesta</th>
					<th>Periodo</th>
					<th>Estado</th>
					<th>Calificación</th>
					
				</thead>
				
				@foreach($evaluaciones as $eva)
					

				<tr>
					<td>{{$eva-> idpropuestas}}</td>
					<td>{{$eva-> nombrepersona}}</td>
					<td>{{$eva-> facultad}}</td>
					<td>{{$eva-> nombreasignatura}}</td>
					<td><b>{{$eva-> temapropuesta}}</td>
					<td>{{$eva->periodo}}</td>
					<td>{{$eva-> estado}}</td>
					<th>{{$eva-> calificacion}}</th>
					
					
				</tr>

					
				@endforeach

								
			</table>
		</div>	
		{{$evaluaciones->render()}}
	</div>
</div>

  
@endsection
