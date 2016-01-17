<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profesor</title>

	{!! Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
	
	{!! Html::style('bower_components/bootstrap-material-design/dist/css/ripples.min.css') !!}
	{!! Html::style('bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.min.css') !!}
	{!! Html::style('bower_components/sweetalert/dist/sweetalert.css') !!}

	{!! Html::style('css/adaptaciones.css') !!}




	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<!--oncontextmenu="return false"-->
<body >
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Education</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/perfil') }}">Inicio</a></li>
					<li><a href="{{ url('/cursos') }}">Cursos
					
					</a></li>
				</ul>

				
			</div>
		</div>
	</nav>

	@yield('content')

	<!-- Scripts -->
	{!! Html::script('bower_components/jquery/dist/jquery.min.js')!!}
	{!! Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js')!!}
	{!! Html::script('bower_components/bootstrap-material-design/dist/js/ripples.min.js')!!}
	{!! Html::script('bower_components/bootstrap-material-design/dist/js/material.min.js')!!}
	{!! Html::script('bower_components/sweetalert/dist/sweetalert.min.js')!!}
	{!! Html::script('bower_components/jquery-validation/dist/jquery.validate.min.js')!!}

<script type="text/javascript">
	$(document).on('ready',function(){

		$.material.init();
	});

</script>
</html>
