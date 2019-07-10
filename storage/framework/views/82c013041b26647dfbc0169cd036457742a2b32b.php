<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold"><?php echo e($data['route']->name); ?></h1>
        <h2></h2>

        <mapbox 
        controls="true"
        waypointslist="true"
        routes="<?php echo e($data['route']->path); ?>"
        routeid="<?php echo e($data['route']->id); ?>"     
        userrole="<?php echo e($data['user_role']); ?>"   
        />     
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /projects/daan/resources/views/pages/route-single.blade.php ENDPATH**/ ?>