<?php $__env->startSection('content'); ?>
<section class="content">
<div class="box box-primary">
<div class="box-header">
	<h3>Usuarios</h3>
</div>
	<div class="box-body">
		<a href="<?php echo e(url('/usuarios/create')); ?>" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> Nuevo Usuario</a>
		<table class = "table table-hover">
		<thead>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Email</th>
			<th>Rol</th>
			<th>Acciones</th>
		</thead>
		<tbody>
			<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($user->usuario); ?></td>
				<td><?php echo e($user->nombre); ?></td>
				<td><?php echo e($user->email); ?></td>
				<td>
				<?php if(!empty($user->roles)): ?>
					<?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<small class = 'label bg-blue'><?php echo e($role->name); ?></small>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<small class = 'label bg-red'>No Tiene Rol</small>
				<?php endif; ?>
				</td>
				<td>
					<a href="<?php echo e(url('/usuarios/edit')); ?>/<?php echo e($user->id); ?>" class = 'btn btn-primary btn-sm'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="<?php echo e(url('usuarios/delete')); ?>/<?php echo e($user->id); ?>" class = "btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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