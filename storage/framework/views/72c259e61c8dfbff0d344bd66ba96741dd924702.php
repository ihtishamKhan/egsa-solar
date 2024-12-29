<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show flash" style="position: fixed; top: 78px; right: 50px; z-index: 1000; width: 400px;" role="alert"><?php echo e(session()->get('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <div class="alert alert-danger dark alert-dismissible fade show flash" style="position: fixed; top: 78px; right: 50px; z-index: 1000; width: 400px;" role="alert"><?php echo e(session()->get('error')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?><?php /**PATH D:\installed-application\laragon\www\egs-solar\resources\views/layouts/alerts/messages.blade.php ENDPATH**/ ?>