<?php $__env->startSection('title', __t('leave_request')); ?>

<?php $__env->startSection('contents'); ?>
    <app-leave-requests
            leave-id="<?php echo e(request()->query('leave_id')); ?>"
            :manager-dept="<?php echo e(json_encode($manager_dept)); ?>"
    ></app-leave-requests>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\payroll\src\resources\views/tenant/leave/leave_requests.blade.php ENDPATH**/ ?>