<?php $__env->startSection('content'); ?>
    <div class="dashboard__content">
        <h1 class="is-size-2 has-text-weight-bold">Settings</h1>

        <div>
            <div class="dashboard__content-inner">
                <div class="settings-form__container">
                    <form>
                        <input type="text" placeholder="Settings here...">
                    </form>
                </div>  
            </div>                     
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin-dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /projects/daan/resources/views/pages/settings.blade.php ENDPATH**/ ?>