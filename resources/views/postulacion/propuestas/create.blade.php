@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<h3>Nueva Propuesta </h3>
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
			{!!Form::open(array('url'=>'postulacion/propuestas','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="temapropuesta">Tema Propuesta</label>
                <input type="text" name="temapropuesta" requerid value="{{old('temapropuesta')}}" class="form-control" placeholder="Tema propuesta...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="presupuesto">Presupuesto</label>
                <input type="text" name="presupuesto" requerid value="{{old('presupuesto')}}" class="form-control" placeholder="Presupuesto...">
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" value="{{old('observaciones')}}" class="form-control" placeholder="Observaciones...">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Periodo</label>
                <select name="idperiodos" class="form-control">
                    @foreach($periodos as $per)
                    <option value="{{$per->idperiodos}}">{{$per->periodo}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Postulante</label>
                <select name="idpostulantes" class="form-control">
                    @foreach($postulantes as $postu)
                    <option value="{{$postu->idpostulantes}}">{{$postu->nombrepersona}}</option>
                    @endforeach
                </select>
            </div>
        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Asignatura</label>
                <select name="idasignatura" class="form-control">
                    @foreach($asignaturas as $asig)
                    <option value="{{$asig->idasignaturas}}">{{$asig->nombreasignatura}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="archivotema">Archivo Tema</label>
                <input type="file" name="archivotema" class="form-control"required>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="archivocronograma">Archivo Cronograma</label>
                <input type="file" name="archivocronograma" class="form-control" required>
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