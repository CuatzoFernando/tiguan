@extends('Administrador.layouts.app')
@section('content')

		<div class="panel-body">
			<div class="section">

				<h3>Importar Documento Excel</h3>

				@if ($errors->any())
						<ul class="alert alert-danger">
								@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
								@endforeach
						</ul>
				@endif

				@if (Session::has('msg'))
				    <div class="alert alert-success" role="alert">
				      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				      <strong>{{ Session::get('msg') }}</strong>
				    </div>
				@endif

				<ul class="nav nav-pills">
			    <li><a data-toggle="pill" href="#menu1">Linea de Proceso</a></li>
			    <li><a data-toggle="pill" href="#menu2">Transporte Externo</a></li>
			  </ul>

		  <div class="tab-content">

		    <div id="menu1" class="tab-pane fade">
		      <h3></h3>
		      @include('Administrador.documentos.formAfos')
		    </div>

		    <div id="menu2" class="tab-pane fade">
		      <h3></h3>
		      @include('Administrador.documentos.formTransporte')
		    </div>
		  </div>



			</div>

		</div>
		<div style="height: 475px;">

		</div>

@endsection
