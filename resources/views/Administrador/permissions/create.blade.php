@extends('Administrador.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Crear nuevo Permiso</h3>
		</div>
		<div class="box-body">
			<form action="{{url('permissions/store')}}" method = "post">
				{!! csrf_field() !!}
				<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
				    {!! Form::label('name', 'Name: ', ['class' => 'col-md-4 control-label']) !!}
				    <div class="col-md-6">
				        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
				        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>
				<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
				    {!! Form::label('label', 'Label: ', ['class' => 'col-md-4 control-label']) !!}
				    <div class="col-md-6">
				        {!! Form::text('label', null, ['class' => 'form-control']) !!}
				        {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
				    </div>
				</div>
				<br><br>
				<div class="box-footer">
					<button class = 'btn btn-primary' type = "submit">Crear</button>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection
