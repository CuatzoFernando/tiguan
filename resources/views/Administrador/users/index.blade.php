@extends('Administrador.layouts.app')
@section('content')
<section class="content">
<div class="box box-primary">
<div class="box-header">
	<h3>Usuarios</h3>
</div>
	<div class="box-body">
		<a href="{{url('/usuarios/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo Usuario</a>
		<table class = "table table-hover">
		<thead>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->usuario }}</td>
				<td>{{$user->nombre }}</td>
				<td>{{$user->email}}</td>
				<td>
				@if(!empty($user->roles))
					@foreach($user->roles as $role)
					<small class = 'label bg-blue'>{{$role->name}}</small>
					@endforeach
				@else
					<small class = 'label bg-red'>No Tiene Rol</small>
				@endif
				</td>
				<td>
					<a href="{{url('/usuarios/edit')}}/{{$user->id}}" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="{{url('usuarios/delete')}}/{{$user->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
</section>
@endsection
