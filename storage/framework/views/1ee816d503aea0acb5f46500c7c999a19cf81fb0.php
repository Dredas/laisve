<!-- password -->

<?php
    // autocomplete off, if not otherwise specified
    if (!isset($field['attributes']['autocomplete'])) {
        $field['attributes']['autocomplete'] = "off";
    }
?>

<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> >
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::inc.field_translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <input
    	type="password"
    	name="<?php echo e($field['name']); ?>"
        <?php echo $__env->make('crud::inc.field_attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
</div>
<?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/crud/src/resources/views/crud/fields/password.blade.php ENDPATH**/ ?>