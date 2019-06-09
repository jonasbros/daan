<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">Administrators</h1>

        <div>
            <div class="waypoint__controls">
                <a href="<?php echo e(route('register')); ?>" class="button is-primary">Add new admin</a>
            </div>     
            
            <div class="dashboard__content-inner">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <tr>
                        <th>
                            Name
                        </th>  
                        <th>
                            Email
                        </th>  
                        <th></th>                 
                    </tr> 
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>                            
                            <td>
                                <a href="<?php echo e(route( 'user', array('id' => $user->id) )); ?>"><?php echo e($user->name); ?></a>    
                            </td>
                            <td>
                                <a href="<?php echo e(route( 'user', array('id' => $user->id) )); ?>"><?php echo e($user->email); ?></a>                                    
                            </td>     
                            <td>
                                <a class="button is-primary" href="<?php echo e(route('audit-trail')); ?>">View Audit Trail</a>        
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                   
                </table>   
            </div>                     
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\Project\daan\resources\views/pages/users.blade.php ENDPATH**/ ?>