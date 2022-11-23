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


</head>

<style>

/* Change styles for span and cancel button on extra small screens */
@media  screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

#container{
  padding-top: 3%;;
}

</style>
<body style="background-color: white;">

<div class="container" id="container" >
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <span class=" lbl col-xs-12 col-sm-12 col-lg-12 lbl" style="text-align:center; font-size:40px; ">Vistas Aéreas Tiguan</span>
      </div>
      <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <!--<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#LoginManual">Manual para Ingreso</button>-->
      </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <br>
      <br>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <div class="col-md-3 col-lg-3"></div>
      <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
            <?php echo e(csrf_field()); ?>


            <div class="panel panel-default">
              <div class="panel-heading">
                <span style="font-size: 18px;">Iniciar Sesión</span>
              </div>
              <div class="panel-body">
                <input type="text" name="usuario" value="" placeholder="Usuario" class="form-control" >
                <?php if($errors->has('usuario')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('usuario')); ?></strong>
                    </span>
                <?php endif; ?>

                <br>

                <input type="password" name="password" value="" placeholder="Contraseña" class="form-control" >
                <?php if($errors->has('password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password')); ?></strong>
                    </span>
                <?php endif; ?>

                <br>

                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">
                            Iniciar Sesión
                        </button>
                    </div>
                </div>

              </div>
            </div>

          </form>
        </div>
      </div>
      <div class="col-md-3 col-lg-3"></div>
    </div>

  </div>
</div>

<?php echo $__env->make('manual.login', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;

<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>

</body>
</html>
