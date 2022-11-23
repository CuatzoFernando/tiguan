<div style="overflow-y: scroll;  height: 350px;">
  <ul id="tree1">
      <?php $__currentLoopData = $lineas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $linea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="#" ondblclick="LineasTransporte(<?php echo e($linea->id); ?>)"><?php echo e($linea->nombre); ?></a>
              <?php if(count( $linea->padres)): ?>
                  <?php echo $__env->make('menu.padresTransporte', ['padres' => $linea->padres], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
              <?php endif; ?>
          </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
