@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Editar</h3>
		</div>
		<div class="box-body">
			<form action="{{url('/linea/update')}}" class="form-horizontal" method = "post" enctype="multipart/form-data", autocomplete="off">
				{!! csrf_field() !!}
				<div class="form-group">

					<input type="hidden" name = "linea_id" value = "{{$linea->id}}">

					<div class="form-group {{ $errors->has('procesos') ? 'has-error' : ''}}">
						    {!! Form::label('procesos', 'Nombre del Proceso', ['class' => 'col-md-4 control-label']) !!}
						    <div class="col-md-6">
						        {!! Form::select('procesos', $procesos, null, ['class' => 'form-control col-md-4']) !!}
						        {!! $errors->first('procesos', '<p class="help-block">:message</p>') !!}
						    </div>
						</div>

						<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
						    {!! Form::label('nombre', 'Nombre de la Linea de Proceso', ['class' => 'col-md-4 control-label']) !!}
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
							<button class = 'btn btn-primary' type = "submit">Actualizar</button>
						</div>

				</div>
			</form>
		</div>
	</div>
</section>
@endsection
