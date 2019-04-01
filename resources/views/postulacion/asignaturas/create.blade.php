@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<h3>Nueva Asignatura </h3>
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
			{!!Form::open(array('url'=>'postulacion/asignaturas','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombreasignatura">Nombre Asignatura</label>
                <input type="text" name="nombreasignatura" requerid value="{{old('nombreasignatura')}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Carreras</label>
                <select name="idcarreras" class="form-control">
                    @foreach($carreras as $car)
                    <option value="{{$car->idcarreras}}">{{$car->nombrecarrera}}</option>
                    @endforeach
                </select>
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