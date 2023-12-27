<?php $__env->startSection('master'); ?>
    <div class="container-scroller">
        <?php $__env->startSection('top-bar'); ?>
            <app-top-navigation-bar logo-icon-src="<?php echo e($logo_icon); ?>"
                                    :profile-data="<?php echo e(json_encode($top_bar_menu)); ?>"
                                    :has-work-shift="<?php echo e($hasDefaultWorkShift ? 'true' : 'false'); ?>">
            </app-top-navigation-bar>
        <?php echo $__env->yieldSection(); ?>

        <?php $__env->startSection('side-bar'); ?>
            <sidebar :data="<?php echo e(json_encode($permissions)); ?>"
                     logo-src="<?php echo e($logo); ?>"
                     logo-icon-src="<?php echo e($logo_icon); ?>"
                     logo-url="<?php echo e(request()->root()); ?>">
            </sidebar>
        <?php echo $__env->yieldSection(); ?>
        <div class="container-fluid page-body-wrapper">
            <div class="main-panel">
                <?php echo $__env->yieldContent('contents'); ?>
            </div>
        </div>
            <?php if(env('IS_DEMO', false)): ?>
                <div class="" style="z-index:201; bottom:0; right:0; position:fixed; margin:50px;">
                    <a href="https://codecanyon.net/item/payday-hrm-solutions/33681719" class="btn btn-warning rounded-pill shadow-lg">
                        <span class="mr-2"><app-icon name="shopping-cart"/></span>Buy now!
                    </a>
                </div>
            <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('before-scripts'); ?>
    <script>
        window.tenant = <?php echo json_encode(tenant()); ?>

    </script>
    <script>
        window.settings = <?php echo json_encode($settings); ?>

    </script>
    <script>
        window.user = <?php echo auth()->user()->load('profilePicture', 'roles:id,name'); ?>

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\upload\src\resources\views/layout/tenant.blade.php ENDPATH**/ ?>