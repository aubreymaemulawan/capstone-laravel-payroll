

<?php $__env->startSection('title', __t('attendance_request')); ?>

<?php $__env->startSection('contents'); ?>
    <app-attendance-request
            details-id="<?php echo e(request()->query('details_id')); ?>"
            attendance-id="<?php echo e(request()->query('id')); ?>">
    </app-attendance-request>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-Payroll\src\resources\views/tenant/attendance/attendance_request.blade.php ENDPATH**/ ?>