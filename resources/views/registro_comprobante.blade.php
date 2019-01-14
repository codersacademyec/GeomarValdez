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
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href=" {{ asset('css/util.css')}} ">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}} ">
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
	
		li{
			font-size: 12px;
		}
	
	</style>

</head>
<body style="background-image: url({{asset('images/fondo8.jpg')}});" >
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url({{asset('images/bg-01.jpg')}});">
					<span class="login100-form-title-1">
						REGISTRAR PAGO
					</span>
				</div>
				<br>
				<center>
					<div id="div_msj">
						
							@if(Session::has('flash_message'))
								@if(Session::get('flash_message') === "Tus datos han sido registrados")
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
				
				<form class="login100-form validate-form" method="POST" action="{{ route('store_comprobante') }}">
                    {{ csrf_field() }}
						
					<div class="wrap-input100 validate-input m-b-13" data-validate="Nombre de usuario es requerido">
						<span class="label-input100">Nombre de Usuario</span>
						<input class="input100" type="text" name="nombre_usuario" id="nombre_usuario" placeholder="Ingrese nombre de usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-13" data-validate="Número de comprobante es requerido">
						<span class="label-input100"># de comprobante</span>
						<input class="input100" type="text" name="comprobante" id="comprobante" placeholder="Ingrese el número de comprobante" maxlength="10">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-30" data-validate="El monto en dolares es requerido">
						<span class="label-input100">Monto</span>
						<select class="form-control" name="monto"  id="monto">
					    <option value="1">$ 1</option>
					    <option value="10">$ 10</option>
					  </select>
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
	<script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('js/main.js')}}"></script>

</body>
</html>