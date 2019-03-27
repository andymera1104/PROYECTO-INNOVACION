@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<h3>Nueva Postulacion </h3>
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
			{!!Form::open(array('url'=>'postulacion/postulantes','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="nombrepersona">Nombres</label>
            	<input type="text" name="nombrepersona" requerid value="{{old('nombrepersona')}}" class="form-control" placeholder="Nombres...">
            </div>
    	</div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="apellidopersona">Apellidos</label>
                <input type="text" name="apellidopersona" requerid value="{{old('apellidopersona')}}" class="form-control" placeholder="Apellidos...">
            </div>
        </div>

           	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="cedula">Cedula</label>
                <input type="text" name="cedula" requerid value="{{old('cedula')}}" class="form-control" placeholder="Cedula...">
            </div>
        </div>
 <!--
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="roles">Rol</label>
                <input type="text" name="roles" value="{{old('roles')}}" class="form-control" placeholder="Rol a desempeñar...">
            </div>
        </div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="temapropuesta">Tema Propuesta</label>
            	<input type="text" name="temapropuesta" requerid value="{{old('temapropuesta')}}" class="form-control" placeholder="Tema de la propuesta...">
            </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="presupuesto">Presupuesto</label>
            	<input type="text" name="presupuesto" value="{{old('presupuesto')}}" class="form-control" placeholder="Presupuesto...">
            </div>
    	</div>	
    	
        
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="archivotema">Archivo Tema</label>
            	<input type="file" name="archivotema" value="{{old('archivotema')}}" class="form-control" ">
            </div>
    	</div>	

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="archivocronograma">Archivo Cronograma</label>
                <input type="file" name="archivocronograma" value="{{old('archivocronograma')}}" class="form-control" ">
            </div>
        </div>  
    	
      
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label >Periodo</label>
                <select name="idperiodos" class="form-control">
                    
                    <option value="1">2019-01</option>
                    <option value="2">2019-02</option>
                    <option value="3">2020-01</option>
                    <option value="4">2020-02</option>
                    
                </select>
            </div>
        </div>  
    		
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombreasignatura">Asignatura</label>
                <input type="text" name="nombreasignatura" value="{{old('nombreasignatura')}}" class="form-control" placeholder="Asignatura...">
            </div>
        </div>  

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label >Carrera</label>
                <select name="idcarreras" class="form-control">
                    
                    <option value="1">Administración de Empresas</option>
                    <option value="2">Contabilidad y Auditoria</option>
                    <option value="3">Finanzas</option>
                    <option value="4">Mercadotecnia</option>
                    <option value="5">Negocios Internacionales</option>
                    <option value="6">Arquitectura</option>
                    <option value="7">Artes Visuales</option>
                    <option value="8">Diseño Gráfico</option>
                    <option value="9">Diseño de Productos</option>
                    <option value="10">Filosofía</option>
                    <option value="11">Teología</option>
                    <option value="12">Psicología</option>
                    <option value="13">Psicología Clínica</option>
                    <option value="14">Ingeniería Civil</option>
                    <option value="15">Tecnologías de la Información</option>
                    <option value="16">Sistemas de Información</option>
                    <option value="17">Comunicación</option>
                    <option value="18">Lingüística</option>
                    <option value="19">Antropología</option>
                    <option value="20">Arqueología</option>
                    <option value="21">Ciencias Políticas</option>
                    <option value="22">Geografía y Territorio</option>
                    <option value="23">Gestión Social y Desarrollo</option>
                    <option value="24">Historia</option>
                    <option value="25">Hospitalidad y Hostelería</option>
                                       
                </select>
            </div>
        </div> 

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label >Unidad Academica</label>
                <select name="idunidadAcademica" class="form-control">
                    
                    <option value="1">Facultad de Ingeniería</option>
                    <option value="2">Facultad de Ciencias Administrativas y  Contables</option>
                    <option value="3">Facultad de Arquitectura Diseño y Artes</option>
                    <option value="4">Facultad Eclesiástica de Ciencias Filosófico-Teológicas</option>
                    <option value="5">Facultad de Psicología</option>
                    <option value="6">Facultad de Comunicación Lingüística y Literatura</option>
                    <option value="7">Facultad de Ciencias Humanas</option>
                    <option value="8">Facultad de Ciencias Exactas y Naturales</option>
                    <option value="9">Facultad de Jurisprudencia</option>
                    <option value="10">Facultad de Medicina</option>
                    <option value="11">Facultad de Enfermería</option>
                    <option value="12">Facultad de Ciencias de la Educación</option>
                    <option value="13">Facultad de Economía</option>
                    <option value="14">Dirección de Pastoral Universitaria</option>
                                                           
                </select>
            </div>
        </div>  

          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="observaciones">0bservaciones</label>
                <input type="text" name="observaciones" value="{{old('observaciones')}}" class="form-control" placeholder="Observaciones...">
            </div>
        </div>  
-->

    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		 <div class="form-group">
                <br>
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
    	</div>

    </div>


			{!!Form::close()!!}		
            

@endsection