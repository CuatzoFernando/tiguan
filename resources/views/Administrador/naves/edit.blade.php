@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Editar Nave  ({{$nave->nombre}})</h3>
		</div>
		<div class="box-body">
			<form action="{{url('/naves/update')}}" method = "post">
				{!! csrf_field() !!}

				<input type="hidden" name = "nave_id" value = "{{$nave->id}}">

				<label for="">Nave</label>
					<input type="text" name = "nombre" class = "form-control" placeholder = "Nombre">
				</div>

				<div class="form-group {{ $errors->has('imagen') ? 'has-error' : ''}}">
						{!! Form::label('imagen', 'Foto', ['class' => 'col-md-4 control-label']) !!}
						<div class="col-md-6">
								{!! Form::file('imagen', null, ['class' => 'form-control']) !!}
								{!! $errors->first('imagen', '<p class="help-block">:message</p>') !!}
						</div>
				</div>

				<div class="box-footer">
					<a href="/naves" class="btn btn-default">Regresar</a>
					<button class = 'btn btn-primary' type = "submit">Actualizar</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
