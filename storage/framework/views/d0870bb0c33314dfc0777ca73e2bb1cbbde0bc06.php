<div class="col-12 mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('leads.show') ? 'active' : ''); ?>"
                href="<?php echo e(route('leads.show', $lead->uuid)); ?>" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('leads.products') ? 'active' : ''); ?>"
                href="<?php echo e(route('leads.products', $lead->uuid)); ?>" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('leads.files') ? 'active' : ''); ?>"
                href="<?php echo e(route('leads.files', $lead->uuid)); ?>" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Files</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link <?php echo e(request()->routeIs('leads.notes') ? 'active' : ''); ?>"
                href="<?php echo e(route('leads.notes', $lead->uuid)); ?>" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Notes</span>
            </a>
        </li>
    </ul>
</div>
<?php /**PATH D:\installed-application\laragon\www\egs-solar\resources\views/layouts/leads-menu.blade.php ENDPATH**/ ?>