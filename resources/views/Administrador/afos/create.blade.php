@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Crear Nuevo Afo</h3>
		</div>
		<div class="box-body">
			<form action="{{url('/Administracion/afo/store')}}" method = "post" class="form-horizontal" enctype="multipart/form-data" autocomplete="off">
				{!! csrf_field() !!}
				<div class="form-group">
				
					<div class="form-group {{ $errors->has('lineas') ? 'has-error' : ''}}">
						    {!! Form::label('lineas', 'Ingresa la Linea', ['class' => 'col-md-2 control-label']) !!}
						    <div class="col-md-6">
						        {!! Form::select('lineas', $lineas, null, ['class' => 'col-md-4 form-control']) !!}
						        {!! $errors->first('lineas', '<p class="help-block">:message</p>') !!}
						    </div>
						</div>

						<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
						    {!! Form::label('nombre', 'Nombre del Afo', ['class' => 'col-md-2 control-label']) !!}
						    <div class="col-md-6">
						        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
						        {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
						    </div>
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

				</div>
			</form>
		</div>
	</div>
</section>
@endsection
