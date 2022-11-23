<ul id="tree1">
<?php $__currentLoopData = $padres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $padre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
  <a href="#" id="padres_id" value="/padres/transporte/<?php echo e($padre->linea_id); ?>/<?php echo e($padre->NOMBREPADRE); ?>" onclick="Padres(<?php echo e($padre->id); ?>)">
    <?php echo e($padre->NOMBREPADRE); ?>

  </a>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
