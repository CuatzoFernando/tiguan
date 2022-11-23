@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Editar Rol</h3>
		</div>
		<div class="box-body">
			<form action="{{url('roles/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "role_id" value = "{{$role->id}}">
				<div class="form-group">
				<label for="">Rol</label>
					<input type="text" name = "name" class = "form-control" placeholder = "Name" value = "{{$role->name}}">
				</div>
				<div class="form-group">
				<label for="">Etiqueta</label>
					<input type="text" name = "label" class = "form-control" placeholder = "Etiqueta del Rol">
				</div>
				<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
				    {!! Form::label('label', 'Permisos: ', ['class' => 'col-md-4 control-label']) !!}
				    <div class="col-md-6">
				        {!! Form::select('permissions[]', $permissions, isset($role) ? $role->permissions->pluck('name') : [], ['class' => 'form-control', 'multiple' => true]) !!}
				        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
