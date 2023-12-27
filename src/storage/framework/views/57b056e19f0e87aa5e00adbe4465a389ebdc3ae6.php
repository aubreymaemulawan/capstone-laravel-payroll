

<?php $__env->startSection('title', __t('payslip')); ?>

<?php $__env->startSection('contents'); ?>
    <app-payslip payrun="<?php echo e(request()->get('payrun')); ?>"></app-payslip>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-Payroll\src\resources\views/tenant/payroll/payslip.blade.php ENDPATH**/ ?>