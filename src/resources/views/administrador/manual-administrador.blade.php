@extends('layouts.layout-administrador')

@section('conteudo')

	<div class="row">
    <ol class="breadcrumb">
      <li><a href="{{ action('AdministradorController@index') }}">Administrador</a></li>
      <li class="active">Manual do Administrador</li>
    </ol>
  </div>

	<div class="row">
		<div class="col-md-12">
			<!-- PANEL HEADLINE -->
			<div class="panel panel-headline">
				<div class="panel-heading">
					<h3 class="panel-title">Manual de Administrador do QMS</h3>
					<p class="panel-subtitle">Aqui abaixo você pode ver o manual de utilização do sistema QMS</p>
					<hr>
				</div>
				<div class="panel-body">
					<div class="row">
						PDF fica aqui!
					</div>
				</div>
			</div>

	</div>
</div>

@endsection
