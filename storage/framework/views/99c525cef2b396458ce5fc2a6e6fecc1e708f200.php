<?php $__env->startSection('content'); ?>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Permisos</h3>
		</div>
		<div class="box-body">
			<!--<a href="<?php echo e(url('permissions/create')); ?>" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo </a>-->
			<table class="table table-striped">
				<head>
					<th>Permisos</th>
					<!--<th>Acciones</th>-->
				</head>
				<tbody>
					<?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($permission->label); ?></td>
						<!--
						<td>
							<a href="<?php echo e(url('/permissions/edit')); ?>/<?php echo e($permission->id); ?>" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="<?php echo e(url('/permissions/delete')); ?>/<?php echo e($permission->id); ?>" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					-->
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Administrador.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>