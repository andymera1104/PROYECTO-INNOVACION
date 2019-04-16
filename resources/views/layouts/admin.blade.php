<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Innovacion</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{('inicio')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini" ><b>SI</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sistema Innovación</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-green"> <b>En Linea</b>  </small>
                  <span class="hidden-xs"> &nbsp;&nbsp;{{ Auth::user()-> name }}</span>
                </a>
                <ul class="dropdown-menu">
                 
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="{{url('main/logout')}}" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="/main/postulacion">
                <i class="fa fa-laptop"></i>
                <span>Postulación</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('postulacion/postulantes')}}"><i class="fa fa-circle-o"></i> Postulante</a></li>
                <li><a href="{{url('postulacion/asignaturas')}}"><i class="fa fa-circle-o"></i> Asignatura</a></li>
                <li><a href="{{url('postulacion/propuestas')}}"><i class="fa fa-circle-o"></i> Propuestas</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="{{url('evaluacion')}}">
                <i class="fa fa-pencil fa-fw"></i>
                <span>Evaluación</span>
              </a>
            </li>

            <li class="treeview">
              <a href="{{url('resultados/evaluaciones')}}">
                 <i class="fa fa-book fa-fw"></i>
                <span>Resultados</span>
              </a>
            </li>
                       
            
             <li class="treeview">
              <a href="#">
                <i class="fa fa-flag"></i>
                <span>Proyectos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
               <ul class="treeview-menu">
                <li><a href="{{url('proyectos/propuestas')}}"><i class="fa fa-circle-o"></i>Reporte Propuestas</a></li>
                <li><a href="{{url('proyectos/evaluaciones')}}"><i class="fa fa-circle-o"></i> Reporte Evaluaciones</a></li>
                <li><a href="{{url('proyectos/ganadores')}}"><i class="fa fa-circle-o"></i> Reporte Ganadores</a></li>
              </ul>
              
            </li>
             

             <li class="treeview">
              <a href="#">
                <i class="fa fa-envelope-o fa-fw"></i>
                <span>Contacto</span>
              </a>
             
            </li>

             <li class="treeview">
              <a href="#">
                <i class="fa fa-key fa-fw"></i>
                <span>Formatos</span>
              </a>
             
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Innovación</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido')		
                                                        
                              <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!--b>Version</b--> 
        </div>
        <strong>Copyright &copy; 2019 <a> systemsecret</a>.</strong> 
      </footer>

      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
    
  </body>
</html>
