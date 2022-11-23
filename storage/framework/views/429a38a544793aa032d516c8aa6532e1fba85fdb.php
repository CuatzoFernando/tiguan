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
			<h3>Documento</h3>
		</div>
		<div class="box-body">

			<?php if(Session::has('msg')): ?>
			    <div class="alert alert-success" role="alert">
			      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      <strong><?php echo e(Session::get('msg')); ?></strong>
			    </div>
			<?php endif; ?>

			<div class="col-sm-12 col-md-12">
				<div class="col-sm-6 col-md-6">
					<a href="<?php echo e(url('/Administracion/documentos/create')); ?>" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i>Agregar Documento</a>
				</div>
				<div class="col-sm-6 col-md-6">
					<?php echo Form::open(['method' => 'GET', 'url' => '/Administracion/documentos', 'class' => 'navbar-form navbar-right', 'role' => 'search']); ?>

					<div class="input-group">
							<input type="text" class="form-control" name="search" placeholder="Buscar por Nombre..." value="<?php echo e(request('search')); ?>">
							<span class="input-group-btn">
									<button class="btn btn-default" type="submit">
											<i class="fa fa-search"></i>Buscar
									</button>
							</span>
					</div>
					<?php echo Form::close(); ?>

				</div>
			</div>

<hr>

			<table style="width: 100%;">
				<head>
					<th style="width: 15%;">Nombre Documento</th>
					<th style="width: 15%;">Acción</th>
				</head>
				<tbody id="myTable">
					<?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td style="width: 15%;"><h2><?php echo e($item->nombre); ?></h2></td>
						<td style="width: 10%;">
							<a href="<?php echo e(url('/Administracion/documentos/descargar')); ?>/<?php echo e($item->id); ?>" class = 'btn btn-primary btn-sm'><i class="fa fa-download" aria-hidden="true"></i>&nbsp;Descargar</a>
							<!--<a href="<?php echo e(url('/Administracion/documentos/edit')); ?>/<?php echo e($item->id); ?>" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true">&nbsp;Editar</i></a>-->
							<a href="<?php echo e(url('/Administracion/documentos/delete')); ?>/<?php echo e($item->id); ?>" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true">&nbsp;Eliminar</i></a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
			<?php echo $documentos->render(); ?>


		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Administrador.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>