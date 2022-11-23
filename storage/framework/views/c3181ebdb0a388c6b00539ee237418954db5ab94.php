<?php $__env->startSection('content'); ?>
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Crear Nuevo</h3>
		</div>
		<div class="box-body">
			<form action="<?php echo e(url('/linea/store')); ?>" class="form-horizontal" method = "post" enctype="multipart/form-data" autocomplete="off">
				<?php echo csrf_field(); ?>

				<div class="form-group">

					<div class="form-group <?php echo e($errors->has('procesos') ? 'has-error' : ''); ?>">
						    <?php echo Form::label('procesos', 'Nombre de la Linea Proceso', ['class' => 'col-md-4 control-label']); ?>

						    <div class="col-md-6">
						        <?php echo Form::select('procesos', $procesos, null, ['class' => 'form-control col-md-4']); ?>

						        <?php echo $errors->first('procesos', '<p class="help-block">:message</p>'); ?>

						    </div>
						</div>

						<div class="form-group <?php echo e($errors->has('nombre') ? 'has-error' : ''); ?>">
						    <?php echo Form::label('nombre', 'Nombre de la Linea de Proceso', ['class' => 'col-md-4 control-label']); ?>

						    <div class="col-md-6">
						        <?php echo Form::text('nombre', null, ['class' => 'form-control']); ?>

						        <?php echo $errors->first('nombre', '<p class="help-block">:message</p>'); ?>

						    </div>
						</div>

						<div class="form-group <?php echo e($errors->has('imagen') ? 'has-error' : ''); ?>">
								<?php echo Form::label('imagen', 'Foto', ['class' => 'col-md-4 control-label']); ?>

								<div class="col-md-6">
										<?php echo Form::file('imagen', null, ['class' => 'form-control']); ?>

										<?php echo $errors->first('imagen', '<p class="help-block">:message</p>'); ?>

								</div>
						</div>

						<div class="box-footer">
							<button class = 'btn btn-primary' type = "submit">Crear</button>
						</div>

				</div>
				
			</form>
		</div>
	</div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Administrador.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>