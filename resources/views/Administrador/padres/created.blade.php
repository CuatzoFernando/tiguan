@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Crear Nueva Linea Padre </h3>
		</div>
		<div class="box-body">
			<form action="{{url('/Administracion/padres/store')}}" method = "post" enctype="multipart/form-data" autocomplete="off">
				{!! csrf_field() !!}
				<div class="form-group">

					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('procesos') ? 'has-error' : ''}}">
								{!! Form::label('procesos', 'Proceso', ['class' => 'col-md-4 control-label']) !!}
							</div>
						</div>
						<div class="col-md-8">
							<select class="form-group" name="procesos" id="procesos">
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

					<div class="col-md-12">
						<br>
					</div>

					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('lineas') ? 'has-error' : ''}}">
									{!! Form::label('lineas', 'Lineas', ['class' => 'col-md-4 control-label', 'sr-only']) !!}
							</div>
						</div>
						<div class="col-md-8">
							<select class="form-group" name="lineas" id="lineas">
								<option value="">Selecciona una opción</option>
								<option value=""></option>
							</select>
								{!! $errors->first('lineas', '<p class="help-block">:message</p>') !!}
						</div>
					</div>



					<div class="col-md-12">
						<br>
					</div>

					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('afos') ? 'has-error' : ''}}">
                {!! Form::label('afos', 'Afo', ['class' => 'col-md-1 control-label', 'sr-only']) !!}
		          </div>
						</div>
						<div class="col-md-8">
							<select class="" name="afos" id="afos">
								<option value="">Selecciona una opción</option>
								<option value=""></option>
							</select>
								{!! $errors->first('afos', '<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="col-md-12">
						<br>
					</div>

					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('NOMBREPADRE') ? 'has-error' : ''}}">
									{!! Form::label('NOMBREPADRE', 'NOMBRE PADRE', ['class' => 'col-md-12 control-label']) !!}
							</div>
						</div>
						<div class="col-md-6">
							{{ Form::text('NOMBREPADRE', null, array('class' => 'form-control','placeholder'=>'NOMBREPADRE' )) }}
							{!! $errors->first('NOMBREPADRE', '<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="col-md-12">
						<br>
					</div>

					<div class="col-md-12">
						<div class="col-md-4">
							<div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
								{!! Form::label('imagen', 'Foto', ['class' => 'col-md-4 control-label']) !!}
							</div>
						</div>
						<div class="col-md-8">
							{!! Form::file('imagen', null, ['class' => 'form-control']) !!}
							{!! $errors->first('imagen', '<p class="help-block">:message</p>') !!}
						</div>
					</div>

					<div class="col-md-12">
						<br>
					</div>

					<div class="col-md-12">
						<div class="col-md-4"></div>
						<div class="col-md-4">
								<button class = 'btn btn-primary' type = "submit">Crear</button>
						</div>
					</div>

			</form>
		</div>
	</div>
</section>
@endsection
