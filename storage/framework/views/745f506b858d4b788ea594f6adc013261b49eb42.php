<?php if(!empty($widgets)): ?>
	<?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php if(isset($widget['viewNamespace'])): ?>
			<?php echo $__env->make($widgetsViewNamespace.'.'.$widget['type'], ['widget' => $widget], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php else: ?>
			<?php echo $__env->make(backpack_view('widgets.'.$widget['type']), ['widget' => $widget], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php endif; ?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?><?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/base/src/resources/views/inc/widgets.blade.php ENDPATH**/ ?>