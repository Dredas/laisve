<div class="<?php echo e($widget['wrapperClass'] ?? ''); ?>">
	<div class="jumbotron">

	  <?php if(isset($widget['heading'])): ?>
	  <h1 class="display-3"><?php echo $widget['heading']; ?></h1>
	  <?php endif; ?>

	  <?php if(isset($widget['content'])): ?>
	  <p><?php echo $widget['content']; ?></p>
	  <?php endif; ?>

	  <?php if(isset($widget['button_link'])): ?>
	  <p class="lead">
	    <a class="btn btn-primary" href="<?php echo e($widget['button_link']); ?>" role="button"><?php echo e($widget['button_text']); ?></a>
	  </p>
	  <?php endif; ?>
	</div>
</div><?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/base/src/resources/views/widgets/jumbotron.blade.php ENDPATH**/ ?>