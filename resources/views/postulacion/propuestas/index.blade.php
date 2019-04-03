@extends('layouts.admin')
@section('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
		<h1>LISTA PROPUESTAS <a href="propuestas/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('postulacion.propuestas.search')
		
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="myTable" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombres</th>
					<th>Asignaturas</th>
					<th>Tema Propuesta</th>
					<th>Presupuesto</th>
					<th>Archivo Tema</th>
					<th>Archivo Cronograma</th>
					<th>Observaciones</th>
					<th>Opciones</th>
				</thead>
				
				@foreach($propuestas as $pro)
				<tr>
					<td>{{$pro-> idpropuestas}}</td>
					<td>{{$pro-> nombrepersona}}</td>
					<td>{{$pro-> nombreasignatura}}</td>
					<td><b>{{$pro-> temapropuesta}}</td>
					<td>{{$pro-> presupuesto}}</td>
					<td>
						
								<a href="{{asset('archivos/temas/'.$pro->archivotema)}}" target="_blank"><button>Archivo PDF</button></a>

					</td>
					<td>
						
						<a href="{{asset('archivos/cronogramas/'.$pro->archivocronograma)}}" target="_blank"><button>Archivo EXCEL</button></a>

					</td>
					<td>{{$pro-> observaciones}}</td>
					
					<td>
						<a href="{{URL::action('propuestaController@edit',$pro-> idpropuestas)}}"> <button class="btn btn-info">Editar </button></a>
						<a href="" data-target="#modal-delete-{{$pro->idpropuestas}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>

				@include('postulacion.propuestas.modal')
				@endforeach

								
			</table>
		</div>	
		{{$propuestas->render()}}
	</div>
</div>

  
@endsection
