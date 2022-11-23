<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Volkswagen</title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/font-awesome.min.css')); ?>" rel="stylesheet">


    <style type="text/css">
      body{
        /*background-color: rgba(0,0,0,0.7);*/
        background-color: white;
      }
    </style>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/MenuInicio.js')); ?>" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });

      document.onkeydown = function(e) {
        if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 ||     e.keyCode === 117 || e.keycode === 17 || e.keycode === 85)) {//ctrl+u Alt+c, Alt+v will also be disabled sadly.
            alert('Sin Servicio');
        }
        return false;
      };

    </script>

</head>
<body>

<div style="padding-top: .3cm;">
  <?php if(Auth::guest()): ?>
      <li><a href="<?php echo e(route('login')); ?>" class="btn-primary">Login</a></li>
  <?php else: ?>

  <table width="100%">
    <tr>
      <th width="2%"></th>
      <th width="10%">
        <?php if(Auth::check() && Auth::user()->hasRole('Administrador')): ?>
          <a href="/Administracion" class="btn btn-md btn-success">Administración</a>
        <?php endif; ?>
        <?php if(Auth::check() && Auth::user()->hasRole('Coordinador')): ?>
          <a href="/Administracion" class="btn btn-md btn-success">Administración</a>
        <?php endif; ?>
      </th>
      <th width="10%">
        <a href="#" class="btn btn-md btn-primary">Usuario: <?php echo e(Auth::user()->usuario); ?></a>
      </th>
      <th width="20%" style="text-align: center;">Vistas Aéreas Tiguan N102</th>
      <th width="20%" style="text-align: center;">Plan. Estandarización</th>
      <th width="20%" style="text-align: center;"><button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#ManualPDF">Manual</button></th>
      <th>
        <a href="<?php echo e(url('logout')); ?>" class="pull-right btn btn-danger btn-md"
              onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fa fa-power-off"></i> &nbsp; Cerrar Sesión</a>
            <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
              <?php echo e(csrf_field()); ?>

              </form>
      </th>
    </tr>
  </table>

  <?php echo $__env->yieldContent('content'); ?>

  <?php endif; ?>
</div>

</body>
</html>

<!-- Modal -->
  <div class="modal fade" id="ManualPDF" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
        </div>
        <div class="modal-body">
          <embed src="<?php echo e(asset('manual/manual.pdf')); ?>" type="application/pdf" width="100%" height="800px" />
        </div>
      </div>

    </div>
  </div>
