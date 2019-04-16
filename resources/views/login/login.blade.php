<!DOCTYPE html>
<html>
 <head>
  <title>Sistema de Innovacion</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <link rel="stylesheet" href="css/font-awesome.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:650px;
    height: 375px;
    margin:0 auto;
    border-radius: 15px 15px 15px 15px;
    border:2px solid #2133A1;
    }
    #caja{
      width: 550px;
      align-content:center; 
    }

   }
  </style>
 </head>
 <body style="background-color:#393E49;" >
  <br />
  <br><br>
  <div align="center">

  <img   width="450px" height="120px" src="img/bannerlogo.png "  >
  </div>

  <div class="container box" style="background-color: #44C3DA;">
            
            <h2 align="center" style="font-family:Comic Sans">SISTEMA DE INNOVACIÓN</h2>
            <h4 align="center" style="font-family:Comic Sans"> <b> DIRECCIÓN DE INVESTIGACIÓN</b></h4>
            <h4 align="center" style="font-family:Comic Sans"><b>INICIO DE SESIÓN</b></h4>
            
            

   @if(isset(Auth::user()->email))
    <script>window.location="/main/successlogin";</script>
   @endif

   @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif

   @if (count($errors) > 0)
    <div class="alert alert-danger">
          <ul>
     @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
          </ul>
    </div>
   @endif

          <form method="post" action="{{ url('/main/checklogin') }}">
              {{ csrf_field() }}
            <div class="form-group"  >
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-sign-in fa-2x"></i>
              <input type="email" id="caja" name="email" class="form-control" placeholder="Ingrese Correo..." style = "float: right"/>

            </div>
            <div class="form-group">
              &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<i class="fa fa-lock fa-2x" ></i>
              <input type="password" id="caja" name="password" class="form-control"  placeholder="Ingrese Contraseña..."style = "float: right" />
            </div>

            <div class="form-group" align="center">
            <br>
              <input type="submit" name="login" class="btn btn-primary" value="Ingresar"/>
            </div>
          </form>
  </div>
</body>
</html>
