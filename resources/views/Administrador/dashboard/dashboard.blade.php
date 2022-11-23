@extends('Administrador.layouts.app')
@section('content')
<section class="content-header">
	<h1>
	Dashboard
	<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Panel de Control</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		@can('Control_Usuarios')
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$users}}</h3>
					<p>Usuarios</p>
				</div>
				<a href="{{url('usuarios')}}" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		@endcan
		@can('Control_Roles')
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{$roles}}</h3>
					<p>Roles</p>
				</div>
				<div class="icon">
					<i class="fa fa-user-plus"></i>
				</div>
				<a href="{{url('roles')}}" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		@endcan
		@can('Control_Permisos')
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{$permissions}}</h3>
					<p>Permisos</p>
				</div>
				<div class="icon">
					<i class="fa fa-key"></i>
				</div>
				<a href="{{url('permissions')}}" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		@endcan

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{$lineas}}</h3>
					<p>Lineas</p>
				</div>
				<a href="{{url('linea')}}" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>


		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$afos}}</h3>
					<p>Afos</p>
				</div>
				<a href="{{url('Administracion/afo')}}" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$padres}}</h3>
					<p>Padres</p>
				</div>
				<a href="{{url('Administracion/padres')}}" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{$documentos}}</h3>
					<p>Documentos</p>
				</div>
				<a href="{{url('Administracion/documentos')}}" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>



	</div>
</section>
@endsection
