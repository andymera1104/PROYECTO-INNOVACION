@extends('layouts.admin')
@section('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
		<h1>REPORTE PROPUESTAS </h1>
		@include('proyectos.search')
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="myTable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombres</th>
					<th>Carrera</th>
					<th>Facultad</th>
					<th>Asignaturas</th>
					<th>Tema Propuesta</th>
					<th>Presupuesto</th>
					<th>Periodo</th>
					<th>Observaciones</th>
					
				</thead>
				
				@foreach($propuestas as $pro)
					

				<tr>
					<td>{{$pro-> idpropuestas}}</td>
					<td>{{$pro-> nombrepersona}}</td>
					<td>{{$pro-> carrera}}</td>
					<td>{{$pro-> facultad}}</td>
					<td>{{$pro-> nombreasignatura}}</td>
					<td><b>{{$pro-> temapropuesta}}</td>
					<td>{{$pro-> presupuesto}}</td>
					<td>{{$pro->periodo}}</td>
					<td>{{$pro-> observaciones}}</td>
					
					
				</tr>

					
				@endforeach

								
			</table>
		</div>	
		{{$propuestas->render()}}
	</div>
</div>

  
@endsection
