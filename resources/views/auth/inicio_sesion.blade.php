<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registro de usuarios </title>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" href="https://i2.wp.com/www.geomarvaldez.com/wp-content/uploads/2018/11/cropped-logo_geomar-1-1.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->	
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
	<script type="text/javascript">
	    $(document).ready(function() {
	        setTimeout(function() {
	            $("#div_msj").fadeOut(2000);
	        },5000);
	    });
	</script>

	<script type="text/javascript">
	    $(document).ready(function() {
	        setTimeout(function() {
	            $("#errores").fadeOut(2000);
	        },5000);
	    });
	</script>

	<style type="text/css">
		body{
			  background-image: url(images/fondo8.jpg);
			  
		}
		li{
			font-size: 12px;
		}
	
	</style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						REGISTRARSE
					</span>
				</div>
				<br>
				<center>
					<div id="div_msj">
						
							@if(Session::has('flash_message'))
								@if(Session::get('flash_message') === "Registrado exitosamente")
									<strong id="msj" style="color: green">
										{{Session::get('flash_message')}}	
									</strong> 		
								@else
									<strong id="msj" style="color: red">
										{{Session::get('flash_message')}}	
									</strong> 
								@endif
							@endif 
						
					</div>
					@if ($errors->any())
	                  <div class="alert alert-danger" id="errores">
	                    <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
	                    <ul>
	                      @foreach ($errors->all() as $error)
	                        <li> {{ $error }}</li>
	                      @endforeach
	                    </ul>
	                  </div>
	                @endif
				</center>
				
				<form class="login100-form validate-form" method="POST" action="{{ route('store_api') }}">
                    {{ csrf_field() }}
						
					<div class="wrap-input100 validate-input m-b-13" data-validate="Nombre de usuario es requerido">
						<span class="label-input100">Nombre de Usuario</span>
						<input class="input100" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Ingrese nombre de usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-13" data-validate="Nombres es requerido">
						<span class="label-input100">Nombres</span>
						<input class="input100" type="text" name="nombres" id="nombres" placeholder="Ingrese nombres">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-13" data-validate="Apellidos es requerido">
						<span class="label-input100">Apellidos</span>
						<input class="input100" type="text" name="apellidos" id="apellidos" placeholder="Ingrese apellidos">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-13" data-validate="Email es requerido">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email_user" id="email_user" placeholder="Ingrese email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-13" data-validate = "Password es requerido">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" placeholder="Ingrese password">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-33" data-validate = "Confirmar Password es requqerido">
						<span class="label-input100">Confirmar Password</span>
						<input class="input100" type="password" name="password_confirmation" id="password_confirmation" placeholder="Ingresa nuevamente  password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Registrar
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>