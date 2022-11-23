<?php $__env->startSection('content'); ?>
<section class="content-header">
	<h1>
	Dashboard
	<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li class="active">Panel de Control</li>
	</ol>
</section>
<section class="content">
	<div class="row">
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Control_Usuarios')): ?>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?php echo e($users); ?></h3>
					<p>Usuarios</p>
				</div>
				<a href="<?php echo e(url('usuarios')); ?>" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Control_Roles')): ?>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3><?php echo e($roles); ?></h3>
					<p>Roles</p>
				</div>
				<div class="icon">
					<i class="fa fa-user-plus"></i>
				</div>
				<a href="<?php echo e(url('roles')); ?>" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Control_Permisos')): ?>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?php echo e($permissions); ?></h3>
					<p>Permisos</p>
				</div>
				<div class="icon">
					<i class="fa fa-key"></i>
				</div>
				<a href="<?php echo e(url('permissions')); ?>" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<?php endif; ?>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3><?php echo e($lineas); ?></h3>
					<p>Lineas</p>
				</div>
				<a href="<?php echo e(url('linea')); ?>" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>


		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?php echo e($afos); ?></h3>
					<p>Afos</p>
				</div>
				<a href="<?php echo e(url('Administracion/afo')); ?>" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?php echo e($padres); ?></h3>
					<p>Padres</p>
				</div>
				<a href="<?php echo e(url('Administracion/padres')); ?>" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3><?php echo e($documentos); ?></h3>
					<p>Documentos</p>
				</div>
				<a href="<?php echo e(url('Administracion/documentos')); ?>" class="small-box-footer">Información <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>



	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Administrador.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>