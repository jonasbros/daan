<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">        
        <div class="dashboard__content-inner">
            <h1 class="is-size-2">New Route</h1>

            <div class="route-new__input columns">
                <div class="route-new__name column is-two-thirds">
                    
                    <label for="route-new__name">
                        Name: 
                        <input type="text" name="name" id="route-new__name" class="input" form="waypoints-form" required>
                    </label>

                    
                    <div class="route-cp__container columns">
                        <div class="column is-half">
                            
                            <label for="route-province">
                                Province: 
                            
                            </label>
                            <select class="input" name="province" id="route-province" placeholder="Province" form="waypoints-form" value="" onchange="alert(123454)">
                                <option value="">Select Province</option>

                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($province->id); ?>"><?php echo e($province->province); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="column is-half">
                             
                            <label for="route-city">
                                City: 
                            
                            </label>
                            <select class="input" name="city" id="route-city" placeholder="City" form="waypoints-form" value="">
                                <option value="">Select City</option>
                                <option value="1">Bacolod</option>
                            </select>                
                        </div>                          
                    </div>
                    
                    <label for="route-add_tags">
                        Tags: 
                      
                    </label>
                    <input type="tags" class="input" name="tags" id="route-add_tags" placeholder="Add tags" form="waypoints-form" value="">
                    
                    <div class="route-new__errors">
                        <?php if( $errors->any() ): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <p><?php echo e($error); ?></p>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    
                </div>    
            </div>
            
            <mapbox 
            waypointslist="true"
            routes="''"        
            controls="true"
            />   

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\Project\daan\resources\views/pages/route-new.blade.php ENDPATH**/ ?>