<!doctype html>
<html lang="pt-br">

<head>
	<title>Painel de Controle | QMS - Operador</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="/vend/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/vend/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/vend/linearicons/style.css">
	<link rel="stylesheet" href="/vend/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="/css/main.css">
	<link rel="stylesheet" href="/css/my-style.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/img/favicon.png">
</head>

<body>
	<div class="loading">
		<div class="sk-fading-circle">
      <div class="sk-circle1 sk-circle"></div>
      <div class="sk-circle2 sk-circle"></div>
      <div class="sk-circle3 sk-circle"></div>
      <div class="sk-circle4 sk-circle"></div>
      <div class="sk-circle5 sk-circle"></div>
      <div class="sk-circle6 sk-circle"></div>
      <div class="sk-circle7 sk-circle"></div>
      <div class="sk-circle8 sk-circle"></div>
      <div class="sk-circle9 sk-circle"></div>
      <div class="sk-circle10 sk-circle"></div>
      <div class="sk-circle11 sk-circle"></div>
      <div class="sk-circle12 sk-circle"></div>
    </div>
	</div>


	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/operador"><img src="/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="">
							<a><i class="lnr lnr-calendar-full"></i> <span class="data_hoje"></span></a>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Ajuda</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{{ action('OperadorController@manualOperador') }}">Manual de Usuário</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user-circle"></i><span>{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="{{ action('OperadorController@perfil') }}"><i class="lnr lnr-user"></i> <span>Meu Perfil</span></a></li>
								<li><a href="{{ action('OperadorController@alterarSenha') }}"><i class="lnr lnr-cog"></i> <span>Alterar Senha</span></a></li>
								<li>
										<a href="{{ route('logout') }}"	onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
												<i class="lnr lnr-exit"></i> <span>Sair</span>
										</a>

										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												{{ csrf_field() }}
										</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<!-- meus itens meu -->
						<li><a href="{{ action('OperadorController@index') }}" id="home" class=""><i class="fa fa-home"></i> <span>Home</span></a></li>

						<li>
							<a href="#subPaciente" id="pacientes" data-toggle="collapse" class="collapsed"><i class="fa fa-users"></i> <span>Pacientes</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPaciente" class="collapse">
								<ul class="nav">
									<li><a href="{{ action('PacienteController@cadastrarPaciente') }}" class="" id="menu_cadastrar_paciente">Cadastrar Paciente</a></li>
									<li><a href="{{ action('PacienteController@pesquisarPacientes') }}" class="" id="menu_pesquisar_paciente">Pesquisar Pacientes</a></li>
									<li><a href="{{ action('PacienteController@alterarPaciente') }}" class="hidden" id="menu_alterar_paciente">Alterar Paciente</a></li>
								</ul>
							</div>
						</li>

						<li>
							<a href="#subConsulta" id="consultas" data-toggle="collapse" class="collapsed"><i class="fa fa-stethoscope"></i> <span>Consultas</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subConsulta" class="collapse">
								<ul class="nav">
									<li><a href="{{ action('ConsultaController@agendarConsulta') }}" class="hidden" id="menu_agendar_consulta">Agendar Consulta Médica</a></li>
									<li><a href="{{ action('ConsultaController@listagemConsultas') }}" class="" id="menu_lista_consulta" >Listar Consultas</a></li>
								</ul>
							</div>
						</li>

						<li>
								<a href="{{ route('logout') }}"	onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
										<i class="lnr lnr-exit"></i> <span>Sair</span>
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										{{ csrf_field() }}
								</form>
						</li>

					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">

					@yield('conteudo')

				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<!-- <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p> -->
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="/vend/jquery/jquery.min.js"></script>
	<script src="/vend/bootstrap/js/bootstrap.min.js"></script>
	<script src="/vend/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="/vend/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="/vend/chartist/js/chartist.min.js"></script>
	<script src="/scripts/klorofil-common.js"></script>
	<script src="/scripts/jquery.validate.js"></script>
	<script src="/scripts/additional-methods.js"></script>
	<script src="/scripts/moment.js"></script>
	<script src="/scripts/moment-with-locales.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>
	<script src="/scripts/validation.js"></script>
	<script src="/scripts/validator.min.js"></script>
	<script src="/scripts/script.js"></script>

	@yield('pos-script')
	<script>
		moment.locale('pt-br');

		$('.data_hoje').html(moment().format('LL'));
	</script>

</body>

</html>
