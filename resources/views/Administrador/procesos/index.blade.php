@extends('Administrador.layouts.app')
@section('content')

<style media="screen">

	table {
		border-collapse: collapse;
	}

	table, th, td, tr{
		text-align: center;
		border: 1px solid black;
	}

</style>

<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Procesos</h3>
		</div>
		<div class="box-body">

			<a href="{{url('/Administracion/proceso/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i>Agregar Nuevo Proceso</a>


			<table style="width: 100%;">
				<head>
					<th style="width: 15%">Nombre del Proceso</th>
					<th style="width: 40%;">Imagén</th>
					<th style="width: 15%;">Acción</th>
				</head>
				<tbody>
					@foreach($procesos as $item)
					<tr>
						<td style="width: 15%;"><h2>{{ $item->nombre}}</h2></td>
						<td style=" width: 40%; img {border-radius: 8px;}">
							<img src="{{ asset('/images/procesos/' . $item->imagen ) }}" alt="" height="50%" width="50%" >
						</td>
						<td style="width: 10%;">
							<a href="{{url('/Administracion/proceso/edit')}}/{{$item->id}}" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true">Editar</i></a>
							<a onclick="validate()" href="{{url('/Administracion/proceso/delete')}}/{{$item->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true">Eliminar</i></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</section>
@endsection

<script type="text/javascript">
	
	function validate(){
		window.alert('Si eliminas el Proceso, se eliminan los datos que dependen de este Proceso.');
	}

</script>
