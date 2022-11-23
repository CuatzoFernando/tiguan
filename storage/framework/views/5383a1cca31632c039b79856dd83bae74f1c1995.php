<?php $__env->startSection('content'); ?>

		<div class="panel-body">
			<div class="section">

				<h3>Importar Documento Excel</h3>

				<?php if($errors->any()): ?>
						<ul class="alert alert-danger">
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
				<?php endif; ?>

				<?php if(Session::has('msg')): ?>
				    <div class="alert alert-success" role="alert">
				      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				      <strong><?php echo e(Session::get('msg')); ?></strong>
				    </div>
				<?php endif; ?>

				<ul class="nav nav-pills">
			    <li><a data-toggle="pill" href="#menu1">Linea de Proceso</a></li>
			    <li><a data-toggle="pill" href="#menu2">Transporte Externo</a></li>
			  </ul>

		  <div class="tab-content">

		    <div id="menu1" class="tab-pane fade">
		      <h3></h3>
		      <?php echo $__env->make('Administrador.documentos.formAfos', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		    </div>

		    <div id="menu2" class="tab-pane fade">
		      <h3></h3>
		      <?php echo $__env->make('Administrador.documentos.formTransporte', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		    </div>
		  </div>



			</div>

		</div>
		<div style="height: 475px;">

		</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('Administrador.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>