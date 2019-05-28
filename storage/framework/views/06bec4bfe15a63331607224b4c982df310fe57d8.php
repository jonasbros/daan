<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="container">
        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item is-size-4 has-text-weight-bold has-text-primary" href="<?php echo e(url('/dashboard')); ?>">
                    <?php echo e(config('app.name', 'Daan Admin')); ?>

                </a>
            </div>
        
            <div class="navbar-end">                   
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        <?php echo e(Auth::user()->name); ?>

                    </a>
            
                    <div class="navbar-dropdown">
                        <a class="navbar-item"
                            href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>                   
                    </div>
                </div>
            </div>
        </div> 
    </div>        
</nav><?php /**PATH H:\Project\daan\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>