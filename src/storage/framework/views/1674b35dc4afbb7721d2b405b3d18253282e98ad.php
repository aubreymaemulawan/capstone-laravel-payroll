

<?php $__env->startSection('title', __t('app_settings')); ?>

<?php $__env->startPush('before-styles'); ?>
    <?php echo e(style('vendor/summernote/summernote-lite.css')); ?>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('contents'); ?>
    <app-tenant-settings-layout></app-tenant-settings-layout>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-Payroll\src\resources\views/tenant/settings/index.blade.php ENDPATH**/ ?>