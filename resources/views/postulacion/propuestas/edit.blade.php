@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Propuesta: <b>{{ $propuesta->temapropuesta}}</b></h3>
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

			{!!Form::model($propuesta,['method'=>'PATCH', 'route'=>['propuestas.update',$propuesta->idpropuestas],'files'=>'true'])!!}
            {{Form::token()}}
           	
    
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="temapropuesta">Tema Propuesta</label>
                <input type="text" name="temapropuesta" requerid value="{{$propuesta->temapropuesta}}" class="form-control">
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="presupuesto">Presupuesto</label>
                <input type="text" name="presupuesto" requerid value="{{$propuesta->presupuesto}}" class="form-control">
            </div>
        </div>
        
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <input type="text" name="observaciones" value="{{$propuesta->observaciones}}" class="form-control" >
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Periodo</label>
                <select name="idperiodos" class="form-control">
                    @foreach($periodos as $per)
                         @if($per->idperiodos==$propuesta->idperiodos)
                         <option value="{{$per->idperiodos}}" selected>{{$per->periodo}}</option>
                         @else
                         <option value="{{$per->idperiodos}}">{{$per->periodo}}</option>
                         @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Postulante</label>
                <select name="idpostulantes" class="form-control">
                    @foreach($postulantes as $pos)
                        @if($pos->idpostulantes==$propuesta->idpostulantes)

                        <option value="{{$pos->idpostulantes}}" selected>{{$pos->nombrepersona}}</option>
                        @else
                         <option value="{{$pos->idpostulantes}}" >
                             {{$pos->nombrepersona}}
                         </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label>Asignatura</label>
                <select name="idasignatura" class="form-control">
                    @foreach($asignaturas as $asig)
                         @if($asig->idasignaturas==$propuesta->idasignatura)
                        <option value="{{$asig->idasignaturas}}" selected>{{$asig->nombreasignatura}}</option>
                         @else
                          <option value="{{$asig->idasignaturas}}">{{$asig->nombreasignatura}}
                          </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <!--
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="archivotema">Archivo Tema</label>
                <input type="file" name="archivotema" class="form-control">
                @if(($propuesta->archivotema)!="")
                    
                 <a href="{{asset('archivos/temas/'.$propuesta->archivotema)}}" target="_blank"><button>Archivo PDF</button></a>
                @endif
            </div>
        </div>

        
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <div class="form-group">
                <label for="archivocronograma">Archivo Cronograma</label>
                <input type="file" name="archivocronograma" class="form-control">
                 @if(($propuesta->archivocronograma)!="")
                    
                   <a href="{{asset('archivos/cronogramas/'.$propuesta->archivocronograma)}}" target="_blank"><button>Archivo EXCEL</button></a>
   
                @endif
            </div>
        </div>
        -->

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
             <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
        </div>
        
    </div>


			{!!Form::close()!!}		
            
		
@endsection