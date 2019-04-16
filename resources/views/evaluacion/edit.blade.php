@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Evaluacion de Propuesta {{ $criterio->temapropuesta}} </h3>
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

			{!!Form::model($criterio,['method'=>'PATCH', 'route'=>['evaluacion.update',$criterio->idevaluacion]])!!}
            {{Form::token()}}
           	
      {!!Form::open(array('url'=>'evaluacion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
     
      <div class="row">
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Propuestas</label>
                <select name="idpropuestas" class="form-control">
                    @foreach($propuestas as $pro)
                     @if($pro->idpropuestas==$criterio->idpropuestas)
                    <option value="{{$pro->idpropuestas}}" selected>{{$pro->temapropuesta}}</option>
                    @else
                    <option value="{{$pro->idpropuestas}}">{{$pro->temapropuesta}}</option>
                    @endif
                    @endforeach
                </select>

            </div>
        
         </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Calificación</label>
                <input type="number" name="calificacion" required value="{{$criterio->calificacion}}" class="form-control"  min="0" max="100">
            </div>
        
         </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Estado</label>
                <select name="idcriterios" class="form-control">
                    @foreach($criterios as $cri)
                    @if($cri->idcriterios==$criterio->idcriterios)
                    <option value="{{$cri->idcriterios}}" selected>{{$cri->estado}}</option>
                    @else
                    <option value="{{$cri->idcriterios}}">{{$cri->estado}}</option>
                    @endif
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