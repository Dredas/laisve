
<script type="text/javascript">
  Noty.overrideDefaults({
    layout   : 'topRight',
    theme    : 'backstrap',
    timeout  : 2500, 
    closeWith: ['click', 'button'],
  });

  <?php $__currentLoopData = \Alert::getMessages(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $messages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

      <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        new Noty({
          type: "<?php echo e($type); ?>",
          text: "<?php echo str_replace('"', "'", $message); ?>"
        }).show();

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  <?php if(app('env') != 'local'): ?>
  <?php
    $now = \Carbon\Carbon::now();
    $refreshTime = \Carbon\Carbon::now()->endOfHour();

    if ($now->diffInMinutes($refreshTime) < 3) {
      ?>
        new Noty({
          type: "info",
          text: "<strong>Demo Refresh in <?php echo e($now->diffInMinutes($refreshTime)); ?> Minutes</strong><br>You'll lose all changes.",
          timeout  : 5000, 
        }).show();
      <?php
    }
    if ($now->diffInMinutes($refreshTime) > 57) {
      ?>
        new Noty({
          type: "info",
          text: "<strong>Demo Refreshed <?php echo e(60-$now->diffInMinutes($refreshTime)); ?> Minutes Ago</strong><br>All custom entries & files have been deleted.",
          timeout  : 5000, 
        }).show();
      <?php
    }
  ?>
  <?php endif; ?>
</script><?php /**PATH /home/dredas/lp/web/lp/resources/views/vendor/backpack/base/inc/alerts.blade.php ENDPATH**/ ?>