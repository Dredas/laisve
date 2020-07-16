<header class="<?php echo e(config('backpack.base.header_class')); ?>">
  <!-- Logo -->
  <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?php echo e(url('')); ?>">
    <?php echo config('backpack.base.project_logo'); ?>

  </a>
  <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php echo $__env->make(backpack_view('inc.menu'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</header>
<?php /**PATH /home/dredas/lp/web/lp/resources/views/vendor/backpack/inc/main_header.blade.php ENDPATH**/ ?>