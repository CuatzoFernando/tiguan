
<style>

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 64px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 12px;
        font-weight: 400;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .span {
      color: black;
      text-decoration: underline;
    }

</style>
<!-- Modal -->
<div class="modal fade" id="EditarDatoAfo" role="dialog">
  <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">Cancelar</button>
          </div>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('Editar_Dato')): ?>
          <div class="modal-body">
            <form role="form" id="EditarForm" method="post" autocomplete="off">
              <input type = 'hidden' name = '_token' value = '<?php echo e(Session::token()); ?>'>
              <input type="hidden" value="" id="id">

              <br>

              <div class="form-group <?php echo e($errors->has('naves') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('naves', 'Nave', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-md-6">
                          <select class="form-control input-sm" name="naves" id="naves" onload="naves();" required="">
                            <option value=""></option>
                            <option value="1">102</option>
                            <option value="2">23A</option>
                            <option value="3">TUNEL</option>
                            <option value="4">2</option>
                          </select>
                          <?php echo $errors->first('naves', '<p class="help-block">:message</p>'); ?>

                          <div class="">
                              <p id="errornaves"></p>
                          </div>
                      </div>
              </div>
              <br>
              <div class="form-group <?php echo e($errors->has('PROYECTO') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('PROYECTO', 'Nombre del Proyecto', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-sm-6">
                        <?php echo Form::text('PROYECTO', null, [
                            'class'                         => 'form-control input-sm',
                            'placeholder'                   => 'Nombre del Proyecto',
                            'required'                      => 'required',
                            'id'                            => 'PROYECTO',
                            'data-parsley-required-message' => 'Este campo es importante',
                            'data-parsley-trigger'          => 'change focusout',
                        ]); ?>

                          <?php echo $errors->first('PROYECTO', '<p class="help-block">:message</p>'); ?>


                      </div>
              </div>
              <br>
              <div class="form-group <?php echo e($errors->has('procesos') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('procesos', 'Proceso', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <select class="form-control input-sm" name="procesos" id="procesos" onchange="procesosEditarSelect()" onload="procesos();" required="">
                          <option value=""></option>
                          <option value="1">UB1</option>
                          <option value="2">UB2</option>
                          <option value="3">ANBAUTEILE</option>
                          <option value="4">AUFBAU</option>
                          <option value="5">COSTADOS</option>
                          <option value="6">FINISH</option>
                          <option value="7">TRANSPORTE N102</option>
                          <option value="8">TRANSPORTE EXTERNO</option>
                        </select>
                          <?php echo $errors->first('procesos', '<p class="help-block">:message</p>'); ?>

                      </div>
              </div>
              <br>
              <div class="form-group <?php echo e($errors->has('lineas') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('lineas', 'Lineas', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <select class="form-control input-sm" name="lineas" id="lineas" disabled="" required="" >
                          <option value=""></option>
                        </select>
                          <?php echo $errors->first('lineas', '<p class="help-block">:message</p>'); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('afos') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('afos', 'Afo', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <select class="form-control input-sm" name="afos" id="afos" disabled="" required="" >
                          <option value=""></option>
                        </select>
                          <?php echo $errors->first('afos', '<p class="help-block">:message</p>'); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('NOMBREPADRE') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('NOMBREPADRE', 'Nombre de la linea Padre', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <select class="form-control input-sm" name="NOMBREPADRE" id="NOMBREPADRE" disabled="" required="" >
                          <option value=""></option>
                        </select>
                        <?php echo e($errors->first('NOMBREPADRE','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('MODELOBEMIPADRE') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('MODELOBEMIPADRE', 'MODELO PADRE', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('MODELOBEMIPADRE', null, array('class' => 'form-control','placeholder'=>'MODELOBEMIPADRE', 'required'))); ?>

                        <?php echo e($errors->first('MODELOBEMIPADRE','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('DESCRIPCION') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('DESCRIPCION', 'Descripción del Padre', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('DESCRIPCION', null, array('class' => 'form-control','placeholder'=>'DESCRIPCION'))); ?>

                        <?php echo e($errors->first('DESCRIPCION','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('CANTPADRES') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('CANTPADRES', 'CANT. PADRES', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('CANTPADRES', null, array('class' => 'form-control','placeholder'=>'CANTPADRES'))); ?>

                        <?php echo e($errors->first('CANTPADRES','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('NOMBREEQUIPO') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('NOMBREEQUIPO', 'NOMBRE DEL EQUIPO/ Elemento', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('NOMBREEQUIPO', null, array('class' => 'form-control','placeholder'=>'NOMBREEQUIPO'))); ?>

                        <?php echo e($errors->first('NOMBREEQUIPO','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>  

              <div class="form-group <?php echo e($errors->has('MAXIMO') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('MAXIMO', '# VW', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('MAXIMO', null, array('class' => 'form-control','placeholder'=>'MAXIMO'))); ?>

                        <?php echo e($errors->first('MAXIMO','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('MARCAEQUIPO') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('MARCAEQUIPO', 'Marca Equipo / Elemento', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('MARCAEQUIPO', null, array('class' => 'form-control','placeholder'=>'MARCAEQUIPO'))); ?>

                        <?php echo e($errors->first('MARCAEQUIPO','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('TYPE') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('TYPE', 'Modelo del Equipo', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('TYPE', null, array('class' => 'form-control','placeholder'=>'TYPE'))); ?>

                        <?php echo e($errors->first('TYPE','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('NUMSERIE') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('NUMSERIE', '# de Serie (Fabr. Nr.)', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('NUMSERIE', null, array('class' => 'form-control','placeholder'=>'NUMSERIE'))); ?>

                        <?php echo e($errors->first('NUMSERIE','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('DESCRIPCIONCOMPLEMENTARIA') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('DESCRIPCIONCOMPLEMENTARIA', 'DESCRIPCION COMPLEMENTARIA', ['class' => 'col-md-4 control-label span', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('DESCRIPCIONCOMPLEMENTARIA', null, array('class' => 'form-control','placeholder'=>'DESCRIPCIONCOMPLEMENTARIA'))); ?>

                        <?php echo e($errors->first('DESCRIPCIONCOMPLEMENTARIA','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('CANTELEMENTO') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('CANTELEMENTO', 'Cantidad de Elemento', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('CANTELEMENTO', null, array('class' => 'form-control','placeholder'=>'CANTELEMENTO'))); ?>

                        <?php echo e($errors->first('CANTELEMENTO','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('NOMENCLATURA') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('NOMENCLATURA', 'Nomenclatura', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('NOMENCLATURA', null, array('class' => 'form-control','placeholder'=>'NOMENCLATURA'))); ?>

                        <?php echo e($errors->first('NOMENCLATURA','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('NUMTABLERO') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('NUMTABLERO', '# de Tablero', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('NUMTABLERO', null, array('class' => 'form-control','placeholder'=>'NUMTABLERO'))); ?>

                        <?php echo e($errors->first('NUMTABLERO','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('OBSERVACIONES') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('OBSERVACIONES', 'Observaciones', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('OBSERVACIONES', null, array('class' => 'form-control','placeholder'=>'OBSERVACIONES'))); ?>

                        <?php echo e($errors->first('OBSERVACIONES','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>

              <div class="form-group <?php echo e($errors->has('NUMINVENTARIO') ? 'has-error' : ''); ?>">
                      <?php echo Form::label('NUMINVENTARIO', '#de Inventario', ['class' => 'col-md-4 control-label', 'sr-only']); ?>

                      <div class="col-md-6">
                        <?php echo e(Form::text('NUMINVENTARIO', null, array('class' => 'form-control','placeholder'=>'NUMINVENTARIO'))); ?>

                        <?php echo e($errors->first('NUMINVENTARIO','<p class="help-block">:message</p>')); ?>

                      </div>
              </div>
              <br>
              
              <div class="modal-footer">
                <button type="button" name="button"  value="" onclick="validate();" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
          </div>
          <?php else: ?>
          <div class="modal-body">
            <div class="content">
                <div class="title m-b-md">
                    No Autorizado
                </div>
            </div>
          </div>
          <?php endif; ?>
          
        </div>

  </div>
</div>


<script type="text/javascript">
  function validate(){
     var naves = $('#naves');
     if (naves.val() === '') {
         alert("Selecciona una opción en nave.");
         $('#naves').focus();
         return false;
     }

     var procesos = $('#procesos');
     if (procesos.val() === '') {
         alert("Selecciona una opción en Proceso.");
         $('#procesos').focus();
         return false;
     }

     var lineas = $('#lineas');
     if (lineas.val() === '') {
         alert("Selecciona una opción en Linea.");
         $('#lineas').focus();
         return false;
     }

     var afos = $('#afos');
     if (afos.val() === '') {
         alert("Selecciona una opción en Afo.");
         $('#afos').focus();
         return false;
     }

     var nombrepadre = $('#NOMBREPADRE');
     if (nombrepadre.val() === '') {
         alert("Selecciona una opción en Linea Padre.");
         $('#NOMBREPADRE').focus();
         return false;
     }

     if (naves.val() != '' && procesos.val() != '' && lineas.val() != '' && afos.val() != '' && nombrepadre.val() != '') {
       //window.alert("todo esta bien");
       UpdateDatoAfo();
     }

     else return;

  }
</script>
