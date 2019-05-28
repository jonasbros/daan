<?php $__env->startSection('content'); ?>
<section class="section login-section">
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="login-form__container">
                    <h1 class="__title has-text-centered is-size-2 has-text-weight-bold">DaanPH Admin</h1>

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        
                        <div class="email__container">
                            <input 
                                type="email"
                                class="input <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-dannger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" 
                                name="email" 
                                value="<?php echo e(old('email')); ?>"
                                required
                                autocomplete="email"
                                autofocus
                                placeholder="Email Address">
        
                            <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        
        
                        <div class="password__container">
                            <input 
                                type="password"
                                class="input <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                                name="password"
                                required
                                autocomplete="current-password"
                                placeholder="Password">
        
                            <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        
                        <div class="checkbox__container">
                            <input 
                                type="checkbox"
                                name="remember"
                                id="remember"
                                <?php echo e(old('remember') ? 'checked' : ''); ?>>
        
                                <label class="checkbox" for="remember">
                                    <?php echo e(__('Remember Me')); ?>

                                </label>
                        </div>
                        
                        
                        <div class="button__container">
                            <button 
                                type="submit"
                                class="button is-primary is-medium">
                                <?php echo e(__('Login')); ?>

                            </button>
        
                            <?php if(Route::has('password.request')): ?>
                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
                                    <?php echo e(__('Forgot Your Password?')); ?>

                                </a>
                            <?php endif; ?>
                        </div>                        
    
                    </form>
                </div>

                
            </div>
        </div>
        
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /projects/daan/resources/views/auth/login.blade.php ENDPATH**/ ?>