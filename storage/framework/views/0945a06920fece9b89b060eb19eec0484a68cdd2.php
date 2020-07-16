<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>" dir="<?php echo e(config('backpack.base.html_direction')); ?>">

<head>
  <?php echo $__env->make(backpack_view('inc.head'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class="<?php echo e(config('backpack.base.body_class')); ?>">

  <?php echo $__env->make(backpack_view('inc.main_header'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="app-body">

    <?php echo $__env->make(backpack_view('inc.sidebar'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main">
       <?php echo $__env->yieldContent('header'); ?>

        <div class="animated fadeIn">
          <?php echo $__env->yieldContent('content'); ?>
        </div>

    </main>

  </div><!-- ./app-body -->

  <?php echo $__env->yieldContent('before_scripts'); ?>
  <?php echo $__env->yieldPushContent('before_scripts'); ?>

  <?php echo $__env->make(backpack_view('inc.scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('after_scripts'); ?>
  <?php echo $__env->yieldPushContent('after_scripts'); ?>
</body>
</html>
<?php /**PATH /home/dredas/lp/web/lp/resources/views/vendor/backpack/base/layouts/top_left_no_padding.blade.php ENDPATH**/ ?>