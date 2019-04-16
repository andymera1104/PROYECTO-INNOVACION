@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<h3>Nueva Evaluación </h3>
            <br>
            <p>
            <b>Adjunte archivo de EVALUACIÓN que se encuentra en la sección FORMATOS e indique la calificación en el apartado CALIFICACIÓN.</b>
            </p>
            <b><p>Para ser aprobado un proyecto su calificación debe ser mayor o igual que 80 puntos</p></b>
            <br>
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
			{!!Form::open(array('url'=>'evaluacion','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
            {{Form::token()}}

    <div class="row">
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Propuestas</label>
                <select name="idpropuestas" class="form-control">
                    @foreach($propuestas as $pro)
                    <option value="{{$pro->idpropuestas}}">{{$pro->temapropuesta}}</option>
                    @endforeach
                </select>

            </div>
        
         </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Calificación</label>
                <input type="number" name="calificacion" required value="{{old('calificacion')}}" class="form-control" placeholder="Ingrese Calificación entre 0-100 pts" min="0" max="100">
            </div>
        
         </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="idcriterios" class="form-control">
                    @foreach($criterios as $cri)
                    <option value="{{$cri->idcriterios}}">{{$cri->estado}}</option>
                    @endforeach
                </select>
            </div>
         </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="archivoEvaluacion">Evaluacion Excel</label>
                <input type="file" name="archivoEvaluacion" class="form-control" required>
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