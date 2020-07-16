<!DOCTYPE html>

<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
  <?php echo $__env->make(backpack_view('inc.head'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</head>

<body class="<?php echo e(config('backpack.base.body_class')); ?>">

  <?php echo $__env->make(backpack_view('inc.main_header'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="app-body">

    <?php echo $__env->make(backpack_view('inc.sidebar'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="main">

       <?php echo $__env->renderWhen(isset($breadcrumbs), backpack_view('inc.breadcrumbs'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path'])); ?>

       <?php echo $__env->yieldContent('header'); ?>

        <div class="container-fluid animated fadeIn">
          
          <?php if(isset($widgets['before_content'])): ?>
            <?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => $widgets['before_content'] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>
          
          <?php echo $__env->yieldContent('content'); ?>
          
          <?php if(isset($widgets['after_content'])): ?>
            <?php echo $__env->make(backpack_view('inc.widgets'), [ 'widgets' => $widgets['after_content'] ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endif; ?>

        </div>

    </main>

  </div><!-- ./app-body -->

  <footer class="app-footer">
    <?php echo $__env->make(backpack_view('inc.footer'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  </footer>

  <?php echo $__env->yieldContent('before_scripts'); ?>
  <?php echo $__env->yieldPushContent('before_scripts'); ?>

  <?php echo $__env->make(backpack_view('inc.scripts'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <?php echo $__env->yieldContent('after_scripts'); ?>
  <?php echo $__env->yieldPushContent('after_scripts'); ?>
</body>
</html>
<?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/base/src/resources/views/layouts/top_left.blade.php ENDPATH**/ ?>