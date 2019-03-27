@extends('layouts.admin')
@section('contenido')

	
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm8 col-xs-12">
		<h1>LISTA POSTULANTES <a href="postulantes/create"><button class="btn btn-success">Nuevo</button></a></h1>
		@include('postulacion.postulantes.search')

	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>Cédula</th>
					<th>Opciones</th>
				</thead>
				@foreach($postulantes as $postu)
				<tr>
					<td>{{$postu-> idpostulantes}}</td>
					<td>{{$postu-> nombrepersona}}</td>
					<td>{{$postu-> apellidopersona}}</td>
					<td>{{$postu-> cedula}}</td>
					<td>
						<a href="{{URL::action('postulanteController@edit',$postu-> idpostulantes)}}"> <button class="btn btn-info">Editar </button></a>
						<a href="" data-target="#modal-delete-{{$postu->idpostulantes}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('postulacion.postulantes.modal')
				@endforeach
			</table>
		</div>	
		{{$postulantes->render()}}
	</div>
</div>
	
@endsection