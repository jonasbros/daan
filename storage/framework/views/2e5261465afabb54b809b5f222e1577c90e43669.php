<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">Routes</h1>

        <div>
            <div class="waypoint__controls">
                <a href="<?php echo e(route('route_new')); ?>" class="button is-primary">New Route</a>
                <a href="<?php echo e(route('route_archive')); ?>" class="button is-primary">Archive</a>
            </div>     
            
            <div class="dashboard__content-inner">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <tr>
                        <th>
                            Route
                        </th>            
                    </tr> 
                    <?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $route): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
                    <tr>                    
                        <td>
                            <a href="<?php echo e(route( 'route', array('name' => $route->name) )); ?>">
                                <?php echo e($route->name); ?>

                            </a>                        
                        </td>        
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>   
            </div>                     
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /projects/daan/resources/views/pages/routes.blade.php ENDPATH**/ ?>