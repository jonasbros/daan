<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold"><?php echo e($route[0]->name); ?></h1>
        <h2></h2>

        <mapbox 
        controls="true"
        waypointslist="true"
        routes="<?php echo e($route[0]->path); ?>"        
        />     
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /projects/daan/resources/views/pages/route-single.blade.php ENDPATH**/ ?>