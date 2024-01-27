<?php $__env->startSection('title', __t('payroll_summery')); ?>

<?php $__env->startSection('contents'); ?>
    <app-payroll-summery
            first-user="<?php echo e(json_encode($user)); ?>"
    ></app-payroll-summery>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\payroll\src\resources\views/tenant/payroll/payroll_summery.blade.php ENDPATH**/ ?>