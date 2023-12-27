<?php $__env->startSection('title', trans('default.login')); ?>

<?php $__env->startSection('contents'); ?>
    <?php
        ['logo' => $logo] = \App\Http\Composer\Helper\LogoIcon::new(true)->logoIcon();
    ?>
   <app-auth-login
            logo-url="<?php echo e($logo); ?>"
            demo="<?php echo e(count($demo) ? json_encode($demo) : ''); ?>"
            app-name="<?php echo e(settings('tenant_name', 'app_name')); ?>"
            previous-page="<?php echo e($previous_page ?? '/'); ?>"
    ></app-auth-login>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\payroll_final\src\resources\views/auth/login.blade.php ENDPATH**/ ?>