<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <?php if( $data['route']->deleted == 1 ): ?>
            <h2 class="is-size-4 has-text-weight-bold">Archive</h2>
        <?php endif; ?>

        <h1 class="is-size-2 has-text-weight-bold"><?php echo e($data['route']->name); ?></h1>       

        <?php if( $data['route']->deleted == 1 && \Auth::user()->role == 'admin:1' ): ?>
        <div>
            <a href="<?php echo e(route('route_archive_restore', array('id' => $data['route']->id) )); ?>" class="button is-primary">Restore route</a>
        </div>
        <?php endif; ?>

        <mapbox 
        controls="true"
        waypointslist="true"
        routes="<?php echo e($data['route']->path); ?>"
        routeid="<?php echo e($data['route']->id); ?>"     
        userrole="<?php echo e($data['user_role']); ?>"   
        />     
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\Project\daan\resources\views/pages/route-single.blade.php ENDPATH**/ ?>