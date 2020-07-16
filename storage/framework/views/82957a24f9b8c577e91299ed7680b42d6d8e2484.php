<!-- select2 -->
<div <?php echo $__env->make('crud::inc.field_wrapper_attributes', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> >
    <label><?php echo $field['label']; ?></label>
    <?php echo $__env->make('crud::inc.field_translatable_icon', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php $entity_model = $crud->getModel(); ?>

    <div class="row">
        <?php $__currentLoopData = $field['model']::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $connected_entity_entry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-4">
                <div class="checkbox">
                  <label class="font-weight-normal">
                    <input type="checkbox"
                      name="<?php echo e($field['name']); ?>[]"
                      value="<?php echo e($connected_entity_entry->getKey()); ?>"

                      <?php if(isset($field['attributes'])): ?>
                          <?php $__currentLoopData = $field['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($attribute); ?>="<?php echo e($value); ?>"
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>

                      <?php if( ( old( $field["name"] ) && in_array($connected_entity_entry->getKey(), old( $field["name"])) ) || (isset($field['value']) && in_array($connected_entity_entry->getKey(), $field['value']->pluck($connected_entity_entry->getKeyName(), $connected_entity_entry->getKeyName())->toArray()))): ?>
                             checked = "checked"
                      <?php endif; ?> > <?php echo $connected_entity_entry->{$field['attribute']}; ?>

                  </label>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <?php if(isset($field['hint'])): ?>
        <p class="help-block"><?php echo $field['hint']; ?></p>
    <?php endif; ?>
</div>
<?php /**PATH /home/dredas/lp/web/lp/vendor/backpack/crud/src/resources/views/crud/fields/checklist.blade.php ENDPATH**/ ?>