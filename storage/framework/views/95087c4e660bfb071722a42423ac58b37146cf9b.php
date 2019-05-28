<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold"><?php echo e($exception->getMessage()); ?></h1>  
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\Project\daan\resources\views/errors/404.blade.php ENDPATH**/ ?>