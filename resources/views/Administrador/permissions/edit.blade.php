@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Editar Permiso</h3>
		</div>
		<div class="box-body">
			<form action="{{url('permissions/update')}}" method = "post">
				{!! csrf_field() !!}
				<input type="hidden" name = "permission_id" value = "{{$permission->id}}">
				<div class="form-group">
				<label for="">Nombre Permiso</label>
					<input type="text" name = "name" class = "form-control" placeholder = "Nombre" value = "{{$permission->name}}">
				</div>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
