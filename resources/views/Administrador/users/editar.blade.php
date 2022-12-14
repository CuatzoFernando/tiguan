@extends('Administrador.layouts.app')

@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Editar Usuario ({{$user->nombre}})</h3>
		</div>
		<div class="box-body">
      {!! Form::model($user, [
          'method' => 'PATCH',
          'url' => ['usuarios/update', $user->id]
      ]) !!}

				{!! csrf_field() !!}
				<input type="hidden" name = "user_id" value = "{{$user->id}}">
				<div class="form-group">
					<label for="">Email</label>
					<input type="email" name = "email" value = "{{$user->email}}" class = "form-control">
				</div>
				<div class="form-group">
					<label for="">Nombre</label>
					<input type="text" name = "nombre" value = "{{$user->nombre}}" class = "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Usuario</label>
					<input type="text" name = "usuario" value = "{{$user->usuario}}" class = "form-control" required>
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name = "password" class = "form-control" placeholder = "password">
				</div>
				<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
				    {!! Form::label('role', 'Rol: ', ['class' => 'col-md-4 control-label']) !!}
				    <div class="col-md-6">
							<select class="form-control" name="roles">
								<option value=""></option>
								@foreach($roles as $rol)
									<option value="{{ $rol->id }}">{{ $rol->name }}</option>
								@endforeach
							</select>
				    </div>
				</div>
				<button class = "btn btn-primary" type="submit">Actualizar</button>


      {!! Form::close() !!}

		</div>
	</div>
</section>
@endsection
