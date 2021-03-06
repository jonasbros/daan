<aside class="menu">
    <p class="menu-label">
        General
    </p>
    <ul class="menu-list">
        <li><a href="<?php echo e(route('dashboard')); ?>" class="<?php echo e(( request()->is('dashboard') ? 'is-active' : '' )); ?>">Dashboard</a></li>
        <li><a href="<?php echo e(route('routes')); ?>" class="<?php echo e(( request()->is('routes') || request()->is('routes/*') ? 'is-active' : '' )); ?>">Routes</a></li>
        <li><a href="<?php echo e(route('users')); ?>" class="<?php echo e(( request()->is('users') || request()->is('users/*') ? 'is-active' : '' )); ?>">Users</a></li>
        <li><a href="<?php echo e(route('audit-trail')); ?>" class="<?php echo e(request()->is('audit-trail') ? 'is-active' : ''); ?>">Audit Trail</a></li>
        <li><a href="<?php echo e(route('settings')); ?>" class="<?php echo e(request()->is('settings') ? 'is-active' : ''); ?>">Settings</a></li>
    </ul>
</aside><?php /**PATH H:\Project\daan\resources\views/includes/admin-sidebar.blade.php ENDPATH**/ ?>