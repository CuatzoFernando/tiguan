@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Permisos</h3>
		</div>
		<div class="box-body">
			<!--<a href="{{url('permissions/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo </a>-->
			<table class="table table-striped">
				<head>
					<th>Permisos</th>
					<!--<th>Acciones</th>-->
				</head>
				<tbody>
					@foreach($permissions as $permission)
					<tr>
						<td>{{$permission->label}}</td>
						<!--
						<td>
							<a href="{{url('/permissions/edit')}}/{{$permission->id}}" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="{{url('/permissions/delete')}}/{{$permission->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					-->
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection
