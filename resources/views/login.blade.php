<!DOCTYPE html>
<html>
<head>
	<title>Ventana de Login</title>
	<div id="fullscreen_bg" class="fullscreen_bg"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body class="hold-transition login-page">
        <form class="form-signin" action="login" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
            <h1 class="form-signin-heading text-muted">Autentificación</h1>
          
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>

          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
         
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-lg btn-primary btn-block">Ingresar</button>
            </div><!-- /.col -->
          </div>
        </form>

     
       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

</body>
</html>