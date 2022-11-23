@extends('Administrador.layouts.app')
@section('content')

		<div class="panel-body">
			<div class="section">

				<h3>Crear Nueva Linea Padre </h3>

				@if ($errors->any())
						<ul class="alert alert-danger">
								@foreach ($errors->all() as $error)
										<li>{{ $error }}</li>
								@endforeach
						</ul>
				@endif

				{!! Form::open(['url' => '/Administracion/padres/store',
												'autocomplete' => 'off',
												'files' => true]) !!}

					<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
					<br>
					<div class="form-group {{ $errors->has('procesos') ? 'has-error' : ''}}">
									{!! Form::label('procesos', 'Proceso', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
									<div class="col-md-6">
										<select class="form-control input-sm" name="procesos" id="procesos">
											<option value=""></option>
											<option value="1">UB1</option>
											<option value="2">UB2</option>
											<option value="3">ANBAUTEILE</option>
											<option value="4">AUFBAU</option>
											<option value="5">COSTADOS</option>
											<option value="6">FINISH</option>
											<option value="7">TRANSPORTE N102</option>
											<option value="8">TRANSPORTE EXTERNO</option>
										</select>
											{!! $errors->first('procesos', '<p class="help-block">:message</p>') !!}
									</div>
					</div>
					<br>
					<div class="form-group {{ $errors->has('lineas') ? 'has-error' : ''}}">
									{!! Form::label('lineas', 'Lineas', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
									<div class="col-md-6">
										<select class="form-control input-sm" name="lineas" id="lineas">
											<option value=""></option>
										</select>
											{!! $errors->first('lineas', '<p class="help-block">:message</p>') !!}
									</div>
					</div>
					<br>
					<div class="form-group {{ $errors->has('afos') ? 'has-error' : ''}}">
									{!! Form::label('afos', 'Afo', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
									<div class="col-md-6">
										<select class="form-control input-sm" name="afos" id="afos">
											<option value=""></option>
										</select>
											{!! $errors->first('afos', '<p class="help-block">:message</p>') !!}
									</div>
					</div>
					<br>

					<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
									{!! Form::label('NOMBREPADRE', 'NOMBRE PADRE', ['class' => 'col-md-4 control-label']) !!}
									<div class="col-md-6">
                    {{ Form::text('NOMBREPADRE', null, array('class' => 'form-control','placeholder'=>'NOMBREPADRE' )) }}
      							{!! $errors->first('NOMBREPADRE', '<p class="help-block">:message</p>') !!}
									</div>
					</div>
					<br>

					<div class="form-group">
							     {!! Form::label('imagen', 'Foto', ['class' => 'col-md-4 control-label']) !!}
							<div class="col-md-6">
							     {!! Form::file('imagen', null, ['class' => 'form-control']) !!}
							</div>
					</div>

					<div class="">
						<button class = 'btn btn-primary' type = "submit">Crear</button>
					</div>


				{!! Form::close() !!}

			</div>

		</div>
		<div style="height: 285px;">

		</div>

@endsection
