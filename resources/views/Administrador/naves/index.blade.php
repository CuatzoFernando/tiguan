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
			<h3>Naves</h3>
		</div>
		<div class="box-body">

			<a href="{{url('/naves/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i>Agregar Nave</a>


			<table style="width: 90%;">
				<head>
					<th style="width: 20%;">Nombre de la Nave</th>
					<th style="width: 50%;">Imagén</th>
					<th style="width: 20%;">Acción</th>
				</head>
				<tbody>
					@foreach($naves as $item)
					<tr>
						<td style="width: 20%;"><h2>{{ $item->nombre}}</h2></td>
						<td style=" width: 50%; img {border-radius: 8px;}">
							<img src="{{ asset('/images/naves/' . $item->imagen ) }}" alt="" height="50%" width="50%" >
						</td>
						<td>
							<a href="{{url('/naves/edit')}}/{{$item->id}}" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true">Editar</i></a>
							<a onclick="validate()" href="{{url('/naves/delete')}}/{{$item->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true">Eliminar</i></a>
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
		window.alert('Si eliminas la Nave, se eliminan los datos que dependen de esta Nave.');
	}

</script>
