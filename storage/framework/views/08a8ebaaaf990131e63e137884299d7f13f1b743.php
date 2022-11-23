<?php $__env->startSection('content'); ?>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Roles</h3>
		</div>
		<div class="box-body">
			<a href="<?php echo e(url('roles/create')); ?>" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo </a>
			<table class="table table-striped">
				<head>
					<th>Rol</th>
					<th>Permisos</th>
					<th>Acciones</th>
				</head>
				<tbody>
					<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e($role->name); ?></td>
						<td>
						<?php if(!empty($role->permissions)): ?>
							<?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<small class = 'label bg-orange'><?php echo e($permission->name); ?></small>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php else: ?>
							<small class = 'label bg-red'>No Tiene Permisos</small>
						<?php endif; ?>
						</td>
						<td>
							<a href="<?php echo e(url('/roles/edit')); ?>/<?php echo e($role->id); ?>" class = "btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<a href="<?php echo e(url('/roles/delete')); ?>/<?php echo e($role->id); ?>" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Administrador.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>