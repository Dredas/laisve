<?php $__env->startSection('before_content_widgets'); ?>
	<?php if(isset($widgets['before_content'])): ?>
		<?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => $widgets['before_content'] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('after_content_widgets'); ?>
	<?php if(isset($widgets['after_content'])): ?>
		<?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => $widgets['after_content'] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('layouts.top_left_full'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dredas/lp/web/lp/resources/views/vendor/backpack/base/full.blade.php ENDPATH**/ ?>