@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Editar Padre</h3>
		</div>
		<div class="box-body">

			<!--<form action="{{url('/padres/update')}}" method = "post" enctype="multipart/form-data", autocomplete="off">-->
				{!! Form::model($padre, [
	                            'method' => 'POST',
	                            'url' => ['/Administracion/padres/update', $padre->id],
	                            'class' => 'form-horizontal',
	                            'files' => true
	                        ]) !!}
				{!! csrf_field() !!}
				<div class="form-group">

					<input type="hidden" name = "padre_id" value = "{{$padre->id}}">

					<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
									{!! Form::label('NOMBREPADRE', 'Nombre', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
									<div class="col-md-6">
										{{ Form::text('NOMBREPADRE', null, array('class' => 'form-control','placeholder'=>'NOMBREPADRE' )) }}
										{!! $errors->first('afos', '<p class="help-block">:message</p>') !!}
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

				{!! Form::close() !!}
			<!--</form>-->
		</div>
	</div>
</section>
@endsection
