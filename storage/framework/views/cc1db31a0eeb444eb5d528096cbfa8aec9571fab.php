<li class="nav-item dropdown pr-4">
  <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    <img class="img-avatar" src="https://placehold.it/160x160/ffdd00/f60060/&text=<?php echo e(backpack_auth()->user()->name[0]); ?>" alt="<?php echo e(backpack_auth()->user()->name); ?>">
  </a>
  <div class="dropdown-menu dropdown-menu-right mr-4 pb-1 pt-1">
    <a class="dropdown-item" href="<?php echo e(route('backpack.account.info')); ?>"><i class="fa fa-user"></i> <?php echo e(trans('backpack::base.my_account')); ?></a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="<?php echo e(backpack_url('logout')); ?>"><i class="fa fa-lock"></i> <?php echo e(trans('backpack::base.logout')); ?></a>
  </div>
</li>
<?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/crud/src/resources/views/base/inc/menu_user_dropdown.blade.php ENDPATH**/ ?>