<?php $__env->startSection('content'); ?>

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
			<h3>Lineas</h3>
		</div>
		<div class="box-body">

			<div class="col-sm-12 col-md-12">
				<div class="col-sm-6 col-md-6">
					<a href="<?php echo e(url('/linea/create')); ?>" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i>Agregar Nueva Linea de Proceso</a>
				</div>
				<div class="col-sm-6 col-md-6">
					<input class="form-control" id="myInput" type="text" placeholder="BUSCADOR..">
				</div>
			</div>

<hr>

			<table style="width: 100%;">
				<head>
					<th style="width: 15%;">Nombre del Proceso</th>
					<th style="width: 15%">Nombre de la linea</th>
					<th style="width: 40%;">Imagén</th>
					<th style="width: 15%;">Acción</th>
				</head>
				<tbody id="myTable">
					<?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td style="width: 15%;"><h2><?php echo e($item->proceso->nombre); ?></h2></td>
						<td style="width: 15%;"><h2><?php echo e($item->nombre); ?></h2></td>
						<td style=" width: 40%; img {border-radius: 8px;}">
							<img src="<?php echo e(asset('images/lineas/' . $item->imagen )); ?>" alt="" height="50%" width="50%" >
						</td>
						<td style="width: 10%;">
							<a href="<?php echo e(url('/linea/edit')); ?>/<?php echo e($item->id); ?>" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true">Editar</i></a>
							<a onclick="validate()" href="<?php echo e(url('/linea/delete')); ?>/<?php echo e($item->id); ?>" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true">Eliminar</i></a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>

		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<script type="text/javascript">
	
	function validate(){
		window.alert('Si eliminas la linea, se eliminan los datos que dependen de esta Linea.');
	}

</script>

<?php echo $__env->make('Administrador.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>