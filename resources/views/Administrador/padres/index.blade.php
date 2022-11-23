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
			<h3>Padres</h3>
		</div>
		<div class="box-body">

			<div class="col-sm-12 col-md-12">
				<div class="col-sm-6 col-md-6">
					<a href="{{url('/Administracion/padres/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i>Agregar Linea Padre</a>
				</div>
				<div class="col-sm-6 col-md-6">
					{!! Form::open(array('url'=>'/Administracion/padres','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" name="searchText" placeholder="Buscar por Nombre..." value="{{$searchText}}">
							<span class="input-group-btn">
									<button class="btn btn-default" type="submit">
											<i class="fa fa-search"></i>Buscar
									</button>
							</span>
						</div>
					</div>

					{{Form::close()}}
				</div>
			</div>

<hr>

			<table style="width: 100%;">
				<head>
					<th style="width: 15%">Linea</th>
					<th style="width: 15%">Afo</th>
					<th style="width: 15%">Nombre </th>
					<th style="width: 40%;">Imagén</th>
					<th style="width: 15%;">Acción</th>
				</head>
				<tbody id="myTable">
					@foreach($padres as $item)
					<tr>
						<td style="width: 15%;"><h2>{{ $item->linea }}</h2></td>
						<td style="width: 15%;"><h2>{{ $item->afo }}</h2></td>
						<td style="width: 15%;"><h2>{{ $item->NOMBREPADRE}}</h2></td>
						<td style=" width: 40%; img {border-radius: 8px;}">
							<img src="{{ asset('images/padres/' . $item->imagen ) }}" alt="" height="50%" width="50%" >
						</td>
						<td style="width: 10%;">
							<a href="{{url('/Administracion/padres/edit')}}/{{$item->id}}" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true">Editar</i></a>
							<a onclick="validate()" href="{{url('/Administracion/padres/delete')}}/{{$item->id}}" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true">Eliminar</i></a>
						</td>
					</tr>
					@endforeach

				</tbody>

			</table>
				<!--{{ $padres->links() }}-->

				{!! $padres->render() !!}

		</div>
	</div>
</section>
@endsection


<script type="text/javascript">

	function validate(){
		window.alert('Si eliminas el Padre, se eliminan los datos que dependen de este Padre.');
	}

</script>
