<?php $__env->startSection('content'); ?>
<section class="section register-section">
    <div class="container">       
        <div class="register-form__container">            
            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <h1 class="is-size-3 has-text-weight-bold">Add new admin</h1>

                <?php if( \Session::get('success') ): ?>
                <article class="message is-success">
                    <div class="message-header">
                        <p><?php echo e(\Session::get('success')); ?></p>
                        <button class="delete" aria-label="delete"></button>
                    </div>
                </article>
                <?php endif; ?>

                <div class="name__container">                    
                    <input
                        type="text"
                        class="input <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?> is-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="name" value="<?php echo e(old('name')); ?>"
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="Name">

                    <?php if ($errors->has('name')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('name'); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                </div>

                <div class="email__container">
                    <input
                        type="email"
                        class="input <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-danger <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>"
                        name="email"
                        value="<?php echo e(old('email')); ?>"
                        required
                        autocomplete="email"
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
                        autocomplete="new-password"
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

                <div class="password-confirm__container">
                    <input
                        type="password"
                        class="input"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm Password">
                </div>

                <div class="role__container">
                    <div class="select is-primary">                        
                        <select 
                            name="role"
                        >
                            <option value="">Select Level</option>
                            <option value="admin:1">1</option>
                            <option value="admin:2">2</option>                            
                        </select>
                    </div>

                    <p>
                        <small>Admin Level 1 = Super admin</small>
                    </p>
                </div>

                <div class="button__container">
                    <button type="submit" class="button is-primary is-medium">
                        <?php echo e(__('Register')); ?>

                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /projects/daan/resources/views/auth/register.blade.php ENDPATH**/ ?>