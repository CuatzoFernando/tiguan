<div class="items">
    <ul id="tree1">
    <?php $__currentLoopData = $procesos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proceso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo e($proceso->nombre); ?></div>
          <div class="panel-body">
            <?php if(count( $proceso->lineas) > 0 ): ?>
              <?php echo $__env->make('menu.lineas', ['lineas' => $proceso->lineas], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
          </div>
      </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
