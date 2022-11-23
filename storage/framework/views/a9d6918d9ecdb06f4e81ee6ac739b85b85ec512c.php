<?php $__env->startSection('content'); ?>

<?php if(Session::has('msg')): ?>
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong><?php echo e(Session::get('msg')); ?></strong>
    </div>
<?php endif; ?>

<div class="breadcrumb">
    <div class="item"><a href="/home">INICIO / </a></div>
</div>

<div class="col-sm-12 col-md-12 col-lg-12">
	<div class="col-sm-4 col-md-4 col-lg-4">
		<?php echo $__env->make('menu.transporte', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>

	<div class="col-sm-8 col-md-8 col-lg-8">
		<div class="container-proceso" id="container-proceso">
		  <div class="panel-heading" style="background-color: powderblue; text-align: center; font-size: 18px;" id="panel-title" >
		  </div>
		  <div class="panel-body" id="img" style="border: 1px solid blue;">
		  </div>
		</div>
	</div>
</div>


<div class="col-sm-12 col-md-12">
	<br>
	<br>
</div>

<div class="col-sm-12 col-md-12">
	<div class="col-sm-5 col-md-5">
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Crear_Dato')): ?>
    <button type="button" data-toggle="modal" data-target="#CrearDato" name="button" id="btnCrearDato" class="btn btn-md btn-success">Agregar</button>
    <?php endif; ?>
  </div>
	<div class="col-sm-7 col-md-7">
		<input class="form-control" id="myInput" type="text" placeholder="BUSCADOR..">
	</div>
</div>

<div class="col-sm-12 col-md-12">
	<br>
	<br>
</div>

<div class="col-sm-12 col-md-12 col-lg-12" id="table-t">
	<table class="table table-responsive">
		<thead>
	    <tr>
        <th>PROCESO</th>
        <th>LINEA</th>
        <th>NOMBRE PADRE</th>
        <th>MODELO BEMIPADRE</th>
        <th>CANT. PADRES</th>
        <th>NOMBRE DEL EQUIPO</th>
        <th>#ro VW</th>
        <th>Marca</th>
        <th>MODELO EQUIPO</th>
        <th># Serie</th>
        <th>Descripción Coplementaria</th>
        <th></th>
        <th></th>
	    </tr>
	  </thead>
	  <tbody id="dates-t">
	  </tbody>
	</table>

</div>

<div class="col-sm-12 col-md-12">
	<br>
</div>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Descargar_Excel')): ?>
	<div class="col-sm-12 col-md-12 col-kg-12">
		<div class="col-sm-4 col-md-4 col-lg-4">
			<a href="" id="btnExcelt" value="" class="btn btn-success">
        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
        Exportar a Excel</a>
		</div>
	</div>
<?php endif; ?>

<div class="col-sm-12 col-md-12">
	<br>
</div>

<div class="col-sm-12 col-md-12 col-lg-12" id="documentost">
  <div class="col-sm-3 col-md-3 col-lg-3"></div>
  <div class="col-sm-6 col-md-6 col-lg-6">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Nombre</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="datosdoct">
      </tbody>
    </table>
  </div>

<?php echo $__env->make('modal.editarTransporte', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modal.crear', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('modal.eliminarTransporte', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('manual.principal', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.headt', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>