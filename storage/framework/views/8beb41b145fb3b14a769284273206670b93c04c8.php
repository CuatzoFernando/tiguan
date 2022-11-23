<ul id="tree1">
    <?php $__currentLoopData = $afos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $afo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div>
					<li><a href="#" ondblclick="AfosPadre(<?php echo e($afo->id); ?>)"><?php echo e($afo->nombre); ?></a>
            <?php if(count( $afo->padres)): ?>
                <?php echo $__env->make('menu.padres', ['padres' => $afo->padres], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php endif; ?>
	        </li>
				</div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
