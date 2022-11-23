@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Crear Nuevo Proceso</h3>
		</div>
		<div class="box-body">
			<form action="{{url('/Administracion/proceso/store')}}" method = "post" enctype="multipart/form-data" autocomplete="off">
				{!! csrf_field() !!}
				<div class="form-group">

					<label for="">Ingresa el Nombre de la Nave</label>
					{!! Form::select('proyectos', $proyectos, null, ['class' => 'form-control']) !!}

				<label for="">Nombre del Proceso</label>
					<input type="text" name = "nombre" class = "form-control" placeholder = "Nombre" required="required">
				</div>

				<div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
						{!! Form::label('imagen', 'Foto', ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
								{!! Form::file('imagen', null, ['class' => 'form-control']) !!}
								{!! $errors->first('imagen', '<p class="help-block">:message</p>') !!}
						</div>
				</div>

				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Crear</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
