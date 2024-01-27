<?php $__env->startSection('title', __t('summery')); ?>

<?php $__env->startSection('contents'); ?>
    <app-leave-summary
            first-user="<?php echo e(json_encode($user)); ?>"
            :manager-dept="<?php echo e(json_encode($manager_dept)); ?>"
            leave-id="<?php echo e(request()->query('leave_id')); ?>"
    ></app-leave-summary>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\payroll\src\resources\views/tenant/leave/leave_summaries.blade.php ENDPATH**/ ?>