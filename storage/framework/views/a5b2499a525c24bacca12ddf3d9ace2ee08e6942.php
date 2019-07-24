<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">Audit Trail</h1>

        <div>
            <div class="dashboard__content-inner">
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                    <tr>
                        <th>
                            History
                        </th>            
                    </tr> 
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
                    <tr>                    
                        <td>
                            <a href="<?php echo e($data->link); ?>">
                                <?php echo e($data->name . ' ' . $data->action . ' ' . $data->what); ?>

                            </a>                        
                        </td>        
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>   
            </div>                     
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /projects/daan/resources/views/pages/audit-trail.blade.php ENDPATH**/ ?>