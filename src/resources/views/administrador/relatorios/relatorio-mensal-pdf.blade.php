<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PDF</title>

		<style type="text/css">
		body {
		  font-family: arial, helvetica, sans-serif;
		}
		table {
			width: 100%;
		}
		.text-center {
    	text-align: center;
		}
		.text-right {
    	text-align: right;
		}
		#marcaDagua {
	    position: fixed;
			top: 3%;
	    width: 100%;
	    text-align: center;
	    opacity: .2;
	    z-index: -1000;
	  }
		.footer {
			position: fixed;
			bottom: 0px;
		}
		.hidden {
			display: none !important;
		}
		</style>

	</head>
	<body>
		<div class="" id="marcaDagua">
			<img src="/var/www/html/repositorio-qms/src/public/img/milagres.jpg">
		</div>

		<div class="container">
			<div class="row">
				<div class="text-center">
					<img src="/var/www/html/repositorio-qms/src/public/img/logo-prefeitura.png" width="100" height="100">
				</div>
				<h2 class="text-center"> SECRETÁRIA MUNICIPAL DE MILAGRES </h2>
				<h3 class="text-center"> CENTRAL MUNICIPAL DE REGULAÇÃO - QMS </h3>
			</div>
			<hr>
			<div class="row">
				<h3 class="text-center"> Relatório de Consultas Mensal</h3>
			</div>
			<hr>
			<div class="row">
				<table border="1px">
					<thead>
						<tr>
							<th><b>Código</b></th>
							<th><b>Nome do Paciente</b></th>
							<th><b>Número do CNS</b></th>
							<th><b>Especialidade</b></th>
							<th><b>Médico</b></th>
							<th><b>Data</b></th>
							<th><b>Período</b></th>
							<th><b>Atendido</b></th>
						</tr>
					</thead>
					<tbody>
						@isset($consultas)
							@foreach ($consultas as $consulta)
								<tr>
									<td>{{ $consulta->codigo_consulta }}</td>
									<td>{{ $consulta->nome_paciente }}</td>
									<td>{{ $consulta->numero_cns }}</td>
									<td>{{ $consulta->nome_especialidade }}</td>
									<td>{{ $consulta->nome_medico }}</td>
									<td>{{ date("d/m/Y", strtotime($consulta->data)) }}</td>
									<td>{{ $consulta->nome }}</td>
									<td>
										@if ($consulta->status_atendimento === 'true')
											Sim
										@else
											Não
										@endif
									</td>
								</tr>
							@endforeach
						@endisset
					</tbody>
				</table>
			</div>

		<div class="footer">
			<hr>
			<div class="text-center">
				<span class="hidden">{{date_default_timezone_set('America/Fortaleza')}}</span>
				QMS - Query System Management   -   {{date('H:i:s  -  d/m/Y')}}
			</div>
		</div>


	</body>
</html>
