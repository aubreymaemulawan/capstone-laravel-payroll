<?php $__env->startSection('master'); ?>
    <div class="row">

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-8">
            <?php
                $banner = settings('tenant_banner', 'app_banner');
                $banner = $banner ? asset($banner) : asset('images/default-banner.png');
            ?>
            <div class="back-image"
                 style="background-image: url(<?php echo e($banner); ?>)">
            </div>
        </div>

        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 pl-md-0">
            <?php echo $__env->yieldContent('contents'); ?>
        </div>

    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('common.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\payroll\src\resources\views/layout/auth.blade.php ENDPATH**/ ?>