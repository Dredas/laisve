<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-4">
            <h1 class="text-center mb-4"><?php echo e(trans('backpack::base.login')); ?></h1>
            <div class="card">
                <div class="card-body">
                    <form class="col-md-12 p-t-10 form-padding" role="form" method="POST" action="<?php echo e(route('backpack.auth.login')); ?>">
                        <?php echo csrf_field(); ?>


                        <div class="form-group">
                            <label class="control-label" for="<?php echo e($username); ?>"><?php echo e(trans('backpack::base.email_address')); ?></label>

                            <div>
                                <input type="text" class="form-control<?php echo e($errors->has($username) ? ' is-invalid' : ''); ?>" name="<?php echo e($username); ?>" value="<?php echo e(old($username)); ?>" id="<?php echo e($username); ?>">

                                <?php if($errors->has($username)): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first($username)); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password"><?php echo e(trans('backpack::base.password')); ?></label>

                            <div>
                                <input type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" id="password">

                                <?php if($errors->has('password')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> <?php echo e(trans('backpack::base.remember_me')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="center-button">
                                <button type="submit" class="lp-button">
                                    <img src="/images/button-shine.svg">
                                    <span><?php echo e(trans('backpack::base.login')); ?></span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php if(backpack_users_have_email()): ?>
                <div class="text-center"><a href="<?php echo e(route('backpack.auth.password.reset')); ?>"><?php echo e(trans('backpack::base.forgot_your_password')); ?></a></div>
            <?php endif; ?>
            <?php if(config('backpack.base.registration_open')): ?>
                <div class="text-center"><a href="<?php echo e(route('backpack.auth.register')); ?>"><?php echo e(trans('backpack::base.register')); ?></a></div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(backpack_view('layouts.guest'), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/dredas/lp/web/lp/resources/views/vendor/backpack/base/auth/login.blade.php ENDPATH**/ ?>