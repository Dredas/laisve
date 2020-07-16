<style>
    .districts {
        height: 100%;
        width: 100%;
    }
</style>
<script>
    var districtsKML = '/districts/<?php echo e($county->no); ?>.kml';
</script>
<script src="<?php echo e('../../js/app.js'); ?>"></script>

<?php $__env->startSection('content'); ?>
    <div id="districts" class="districts"></div>
    <div class="zoom">
        <a class="zoom-fab zoom-btn-large" id="zoomBtn"><i class="fa fa-bars"></i></a>
        <ul class="zoom-menu">
            <li><a class="zoom-fab zoom-btn-sm zoom-btn-person scale-transition scale-out"><i class="fa fa-user"></i></a></li>
            <li><a class="zoom-fab zoom-btn-sm zoom-btn-doc scale-transition scale-out"><i class="fa fa-book"></i></a></li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank_no_padding'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dredas/lp/web/lp/resources/views/map/districts.blade.php ENDPATH**/ ?>