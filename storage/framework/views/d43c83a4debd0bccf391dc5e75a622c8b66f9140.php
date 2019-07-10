<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">      
        <?php if( !Request::is('login') && !Request::is('/') ): ?> 
            <?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        
        <div class="section dashboard__section">
            <div class="container is-clearfix">
                <div class="sidebar__container">
                        <?php echo $__env->make('includes.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div> 
                <?php echo $__env->yieldContent('content'); ?>   
            </div>
        </div>
        
    </div>  
    <?php if( Request::is('routes/*') ): ?>
        <?php   
            $form_action = ( isset($data) && $data ? '/routes/update/' . $data['route']->id : '/routes/new/submit');            
        ?>

        <form method="POST" action="<?php echo e($form_action); ?>" id="waypoints-form">
            <?php echo csrf_field(); ?>
        </form>

        <script src="https://api.mapbox.com/mapbox.js/v3.2.0/mapbox.js"></script>
        <script src="https://api.mapbox.com/mapbox.js/plugins/mapbox-directions.js/v0.4.0/mapbox.directions.js"></script>
        <script src="<?php echo e(asset('js/bulma-tagsinput.js')); ?>" defer></script>
    <?php endif; ?>
</body>
</html>
<?php /**PATH /projects/daan/resources/views/layouts/admin-dashboard.blade.php ENDPATH**/ ?>