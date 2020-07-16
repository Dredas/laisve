<li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('dashboard')); ?>"><i class="nav-icon fa fa-dashboard"></i> <span><?php echo e(trans('backpack::base.dashboard')); ?></span></a></li>

<?php if(auth()->check() && auth()->user()->hasRole('superadmin')): ?>
<li class="nav-title">Valdymas</li>

<!-- Users, Roles Permissions -->
<li class="nav-item nav-dropdown">
  <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-group"></i> Nariai</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('user')); ?>"><i class="nav-icon fa fa-user"></i> <span>Visi</span></a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('role')); ?>"><i class="nav-icon fa fa-group"></i> <span>Rolės</span></a></li>
    <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('permission')); ?>"><i class="nav-icon fa fa-key"></i> <span>Leidimai</span></a></li>
  </ul>
</li>


<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon fa fa-globe"></i> Žemėlapis</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('map')); ?>"><i class="nav-icon fa fa-map"></i> <span>Bendras</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo e(backpack_url('role')); ?>"><i class="nav-icon fa fa-map-marker"></i> <span>Mano apygarda</span></a></li>
    </ul>
</li>
<?php endif; ?>
<?php /**PATH /home/dredas/lp/web/lp/resources/views/vendor/backpack/base/inc/sidebar_content.blade.php ENDPATH**/ ?>