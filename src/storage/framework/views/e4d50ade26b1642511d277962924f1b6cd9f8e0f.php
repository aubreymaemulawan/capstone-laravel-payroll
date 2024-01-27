<?php $__env->startSection('title', __t('summery')); ?>

<?php $__env->startSection('contents'); ?>
    <app-attendance-summery
            first-user="<?php echo e(json_encode($user)); ?>"
            details-id="<?php echo e(request()->query('details_id')); ?>"
            attendance-id="<?php echo e(request()->query('id')); ?>"
    ></app-attendance-summery>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\payroll\src\resources\views/tenant/attendance/attendance_summaries.blade.php ENDPATH**/ ?>