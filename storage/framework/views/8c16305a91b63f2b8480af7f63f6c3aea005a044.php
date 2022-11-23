  <div class="items">
      <ul id="tree1">
        <?php $__currentLoopData = $transportes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transporte): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="panel panel-primary">
          <div class="panel-heading"><?php echo e($transporte->nombre); ?></div>
            <div class="panel-body">
              <?php if(count( $transporte->lineas) > 0 ): ?>
                  <?php echo $__env->make('menu.Transport', ['lineas' => $transporte->lineas], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php endif; ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
