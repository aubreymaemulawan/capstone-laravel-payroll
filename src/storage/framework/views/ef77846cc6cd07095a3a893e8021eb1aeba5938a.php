

<?php $__env->startSection('title', __t('employee_details')); ?>

<?php $__env->startSection('contents'); ?>
    <app-employee-details
            :employee-id="<?php echo e($employee_id); ?>"
            :manager-dept="<?php echo e(json_encode($manager_dept)); ?>"
    ></app-employee-details>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.tenant', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Laravel-Payroll\src\resources\views/tenant/employee/employee_details.blade.php ENDPATH**/ ?>