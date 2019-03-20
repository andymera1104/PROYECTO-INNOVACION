@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $persona->nombre}}</h3>
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

			{!!Form::model($persona,['method'=>'PATCH', 'route'=>['cliente.update',$persona->idpersona]])!!}
            {{Form::token()}}
           	
     <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" requerid value="{{$persona->nombre}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" value="{{$persona->direccion}}" class="form-control" placeholder="Direecion cliente...">
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Documento</label>
                <select name="tipo_documento" class="form-control">
                @if($persona->tipo_documento=='Cedula')
                    <option value="Cedula" selected>Cedula</option>
                    <option value="Ruc">Ruc</option>
                    <option value="Pasaporte">Pasaporte</option>
                @elseif($persona->tipo_documento=='Ruc')
                    <option value="Cedula">Cedula</option>
                    <option value="Ruc" selected="">Ruc</option>
                    <option value="Pasaporte">Pasaporte</option>
                @else
                    <option value="Cedula">Cedula</option>
                    <option value="Ruc">Ruc</option>
                    <option value="Pasaporte" selected>Pasaporte</option>
                @endif
                    
                </select>
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="num_documento">Numero Documento</label>
                <input type="text" name="num_documento" requerid value="{{$persona->num_documento}}" class="form-control" placeholder="Numero del Documento...">
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" value="{{$persona->telefono}}" class="form-control" placeholder="Teléfono del Cliente...">
            </div>
        </div>  
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" value="{{$persona->email}}" class="form-control" placeholder="E-mail del Cliente...">
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