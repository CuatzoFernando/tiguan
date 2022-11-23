@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Editar Proceso</h3>
		</div>
		<div class="box-body">
			<!--<form action="{{url('/Administracion/proceso/update')}}" method = "post" enctype="multipart/form-data", autocomplete="off">-->
				{!! Form::model($proceso, [
	                            'method' => 'POST',
	                            'url' => ['/Administracion/proceso/update', $proceso->id],
	                            'class' => 'form-horizontal',
	                            'files' => true
	                        ]) !!}
				{!! csrf_field() !!}
				<div class="form-group">

					<input type="hidden" name = "proceso_id" value = "{{$proceso->id}}">

					<label for="">Ingresa el Nombre de la Nave</label>
					{!! Form::select('naves', $naves, null, ['class' => 'form-control']) !!}

				<label for="">Nombre del Proceso</label>
				{{ Form::text('nombre', null, array('class' => 'form-control','placeholder'=>'Nombre' )) }}
					<!--<input type="text" name = "nombre" class = "form-control" placeholder = "Nombre">-->
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
			</form>
		</div>
	</div>
</section>
@endsection
