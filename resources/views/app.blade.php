 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CONTROL INVENTARIOS Y USUARIOS JUMA</title>

	<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/js/bootstrap.min.js') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">CONTROL JUMA</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					@if(Auth::guest())
					<li><a href="{{ url('/') }}">Inicio</a></li>
					@elseif(Auth::user()->rol == "Administrador")
					<li><a href="{{ url('/Usuarios') }}">Usuarios</a></li>
					<li><a href="{{ url('/Dependencias') }}">Dependencias</a></li>
					<li><a href="{{ url('/Marca') }}">Marca</a></li>
					<li><a href="{{ url('/Parte') }}">Parte</a></li>
					<li class="color"><a class="blanco" href="{{ url('/Proveedor') }}">Proveedor</a></li>
					<li class="color"><a class="blanco" href="{{ url('/Garantia') }}">Garantias</a></li>
					<li class="color"><a class="blanco" href="{{ url('/Licencia') }}">Licencias</a></li>
					<li class="color"><a class="blanco" href="{{ url('/Equipo') }}">Equipo</a></li>
					
					<li class="dropdown color">
							<a href="#" class="dropdown-toggle blanco" data-toggle="dropdown" role="button" aria-expanded="false">Reportes<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li class="color"><a class="" href="{{ url('/ReporteUsuario') }}">Usuarios</a></li>
								<li class="color"><a class="" href="{{ url('/ReporteProveedor') }}">Proveedores</a></li>
								<li class="color"><a class="" href="{{ url('/ReporteEquipo') }}">Equipos</a></li>
							</ul>
						</li>
					@elseif(Auth::user()->rol == "Tecnico")
					<li><a href="{{ url('/Mantenimiento') }}">Mantenimiento</a></li>
					<li><a href="{{ url('/Equipo') }}">Equipo</a></li>
					@elseif(Auth::user()->rol == "Usuario")
					<li><a href="{{ url('/Incidencia') }}">Incidencia</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li class="color"><a class="blanco" href="{{ url('/auth/login') }}">Entrar</a></li>
					@else
						<li class="dropdown color">
							<a href="#" class="dropdown-toggle blanco" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->nombre }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Cerrar Sesion</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('/js/jquery-1.11.3.min.js') }}"></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<script>
	$(document).ready(function() {
		$('.btn-alert').click(function(event) {
			if(confirm('Realmente desea elminar!')) {
				$( "#frmdelete" ).submit();
			} else {
				return false;
			}
		});

		$('#adicionar_parte').click(function(event) {
			$parte_id = $('#parte').val();
			$parte_name = $('#parte option:selected').text();
			$cant = $('#cantidad_parte').val();
			if ($parte_id != 'Seleccionar....' && $cant.length >= 1) {
				$('table tbody.partes').append('<tr class="insumo"><td class="hide"><input type="text" name="parte[]" value="'+$parte_id+'" class="form-control"></td><td class="center">'+$parte_name+'</td><td class="center1"><input class="center" style="border:none" name="cantidad_parte[]" value="'+$cant+'"></td><td class="td3 center"><a class="btn btn-danger quitar_parte">Quitar</a></td></tr>');

				$('select.clean').val('Seleccionar....');
				$('.clear').val('');

			} else {
				alert('Verifique sus datos');
			}
			return false;
		});

		$('body').on('click','.quitar_parte',function() {
			$(this).parent().parent().remove();
		});


		$('#buscar_usuario').keyup(function() {
		 $title = $(this).val();
		 $.get('buscar_usuario_ajax', {nombre: $title}, function(data) {
		 $('.table').html(data);
		 });
		});

	});
	</script>
</body>
</html>
