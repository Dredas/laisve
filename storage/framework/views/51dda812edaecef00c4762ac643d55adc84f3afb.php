<style>
    .map {
        height: 100%;
        width: 100%;
    }
</style>

<script src="<?php echo e('../js/app.js'); ?>"></script>

<?php $__env->startSection('content'); ?>
    <div id="map" class="map"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('blank_no_padding'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dredas/lp/web/lp/resources/views/map/map.blade.php ENDPATH**/ ?>