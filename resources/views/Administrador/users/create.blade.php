@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Crear nuevo usuario</h3>
		</div>
		<div class="box-body">
			<form action="{{url('usuarios/store')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "user_id">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name = "email" class = "form-control" placeholder = "Email">
				</div>
				<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" name = "nombre" class = "form-control" placeholder = "Nombre" required>
				</div>
				<div class="form-group">
					<label for="">Usuario</label>
					<input type="text" name = "usuario" class = "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name = "password" class = "form-control" placeholder = "Password" required>
				</div>
				<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
				    {!! Form::label('role', 'Role: ', ['class' => 'col-md-4 control-label']) !!}
				    <div class="col-md-6">
				        {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]) !!}
				    </div>
				</div>
				<button class = "btn btn-primary" type="submit">Crear</button>
			</form>
		</div>
	</div>
</section>
@endsection
