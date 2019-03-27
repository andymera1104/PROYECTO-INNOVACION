@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Postulante: <b> {{ $postulante->nombrepersona}} {{$postulante->apellidopersona}}</b></h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

			{!!Form::model($postulante,['method'=>'PATCH', 'route'=>['postulantes.update',$postulante->idpostulantes]])!!}
            {{Form::token()}}
           	
     <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombrepersona">Nombres</label>
                <input type="text" name="nombrepersona" requerid value="{{$postulante->nombrepersona}}" class="form-control" placeholder="Nombres...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="apellidopersona">Apellidos</label>
                <input type="text" name="apellidopersona" value="{{$postulante->apellidopersona}}" class="form-control" placeholder="Apellidos...">
            </div>
        </div>
      
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="cedula">Cédula</label>
                <input type="text" name="cedula" requerid value="{{$postulante->cedula}}" class="form-control" placeholder="Numero de Cédula...">
            </div>
        </div>     
            
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>

    </div>


			{!!Form::close()!!}		
            
		
@endsection