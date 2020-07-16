<div class="<?php echo e($widget['class'] ?? 'alert alert-primary'); ?>" role="alert">

	<?php if(isset($widget['close_button']) && $widget['close_button']): ?>	
	<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
	<?php endif; ?>

	<?php if(isset($widget['heading'])): ?>
	<h4 class="alert-heading"><?php echo $widget['heading']; ?></h4>
	<?php endif; ?>

	<?php if(isset($widget['content'])): ?>
	<p><?php echo $widget['content']; ?></p>
	<?php endif; ?>

</div><?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/crud/src/resources/views/base/widgets/alert.blade.php ENDPATH**/ ?>