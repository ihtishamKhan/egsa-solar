<div class="col-12">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('projects.show') ? 'active' : ''); ?>"
                href="<?php echo e(route('projects.show', $project->slug)); ?>" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Home</span>
            </a>
        </li>
        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo e(request()->routeIs('projects.expenses.index') ? 'active' : ''); ?>"
                    href="<?php echo e(route('projects.expenses.index', $project->slug)); ?>" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                    <span class="d-none d-sm-block">Expenses</span>
                </a>
            </li>
        <?php endif; ?>
        

        
    </ul>
</div>
<?php /**PATH D:\installed-application\laragon\www\egs-solar\resources\views/layouts/project-menu.blade.php ENDPATH**/ ?>