<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">

        <div class="dashboard__content-inner">
            <h1 class="is-size-2">New Route</h1>

            <div class="route-new__input columns">
                <div class="route-new__name column is-two-thirds">
                    <label for="route-new__name">
                        Name: 
                        <input type="text" name="route_name" id="route-new__name" class="input" form="waypoints-form" required>
                    </label>
                    
                    <div class="route-new__errors">
                        <?php if( $errors->any() ): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    <button type="submit" form="waypoints-form" class="button is-primary">Save</button>
                </div>    
            </div>
            
            <mapbox 
            waypointslist="true"
            routes="''"        
            />   

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\Project\daan\resources\views/pages/route-new.blade.php ENDPATH**/ ?>