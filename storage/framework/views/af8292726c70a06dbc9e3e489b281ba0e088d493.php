<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">

        <div class="dashboard__content-inner">
            <h1 class="is-size-2">New Route</h1>
            
           

            <div class="route-new__input columns">
                <div class="route-new__name column is-two-thirds">
                    
                     <form id="test-form" action="/api/fetch" method="POST">
                        <?php echo csrf_field(); ?>   
                        
                        <label for="route-new__name">
                            Name: 
                            <input type="text" name="name" id="route-new__name" class="input" required>
                        </label> 
                        
                        <button type="submit" class="button is-primary">Save</button>
                    </form>                             
                </div>    
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH H:\Project\daan\resources\views/pages/settings.blade.php ENDPATH**/ ?>