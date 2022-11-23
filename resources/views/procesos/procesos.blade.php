@extends('layouts.heada')

@section('content')

@if (Session::has('msg'))
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>{{ Session::get('msg') }}</strong>
    </div>
@endif

<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

  <div class="breadcrumb">
      <div class="item"><a href="/home">INICIO / </a></div>
  </div>

	<div class="col-sm-12 col-md-12 col-lg-12">
		<div class="col-sm-4 col-md-4 col-lg-4">
		@include('menu.proceso')
		</div>

		<div class="col-sm-8 col-md-8 col-lg-8">
			<div class="container-proceso" id="container-proceso" value="" >
			  <div class="panel-heading" style="background-color: powderblue; text-align: center; font-size: 18px;" id="panel-title" >
			  </div>
			  <div class="panel-body" id="img" style="border: 1px solid blue;">
			  </div>
			</div>
		</div>
	</div>


	<div class="col-sm-12 col-md-12">
		<br>
		<br>
	</div>

	<div class="col-sm-12 col-md-12">
		<div class="col-sm-5 col-md-5">
      @can('Crear_Dato')
			<button type="button" data-toggle="modal" data-target="#CrearDato" name="button" id="btnCrearDato" class="btn btn-md btn-success">Agregar</button>
      @endcan
    </div>
		<div class="col-sm-7 col-md-7">
			<input class="form-control" id="myInput" type="text" placeholder="BUSCADOR..">
		</div>
	</div>

	<div class="col-sm-12 col-md-12">
		<br>
	</div>

	<div class="col-sm-12 col-md-12 col-lg-12" id="tablea">
		<table class="table table-responsive">
			<thead>
		    <tr>
		      <th>PROCESO</th>
		      <th>LINEA</th>
					<th>AFO</th>
					<th>NOMBRE PADRE</th>
					<th>MODELO BEMIPADRE</th>
					<th>CANT. PADRES</th>
					<th>NOMBRE DEL EQUIPO</th>
					<th>#ro VW</th>
					<th>Marca</th>
					<th>MODELO EQUIPO</th>
					<th># Serie</th>
					<th>Descripción Coplementaria</th>
					<th></th>
					<th></th>
		    </tr>
		  </thead>
		  <tbody id="datesa">
		  </tbody>
		</table>

	</div>

	<div class="col-sm-12 col-md-12">
		<br>
	</div>

	@can('Descargar_Excel')
		<div class="col-sm-12 col-md-12 col-kg-12">
			<div class="col-sm-4 col-md-4 col-lg-4">
				<a href="" id="btnExcela" value="" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
          Exportar a Excel
        </a>
			</div>
		</div>
	@endcan

	<div class="col-sm-12 col-md-12">
		<br>
	</div>

	<div class="col-sm-12 col-md-12 col-lg-12" id="documentos">
    <div class="col-sm-3 col-md-3 col-lg-3"></div>
    <div class="col-sm-6 col-md-6 col-lg-6">
      <table class="table table-responsive">
  			<thead>
  		    <tr>
  		      <th>Nombre</th>
  		      <th></th>
  		    </tr>
  		  </thead>
  		  <tbody id="datosdoc">
  		  </tbody>
  		</table>
    </div>


	</div>

	@include('modal.editar')
	@include('modal.eliminar')
  @include('modal.crear')
  @include('manual.principal')
</div>



@endsection
