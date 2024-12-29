

<?php $__env->startSection('title'); ?>
    Project Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <style>
        .d-flex span:first-child {
            width: 190px;
            font-weight: 600;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Projects
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Project Details
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">

                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-truncate font-size-15"><?php echo e($project->title); ?></h5>
                        </div>
                    </div>

                    <h6 class="font-size-16 mt-4 font-weight-8">Project Description:</h6>

                    <p class="text-muted"><?php echo $project->description; ?></p>

                    <div class="row task-dates">
                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-calendar me-1 text-primary"></i> Start Date</h5>
                                <p class="text-muted mb-0">
                                    <?php echo e(Carbon\Carbon::parse($project->start_date)->format('d M, Y')); ?></p>
                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-calendar-check me-1 text-primary"></i> Due Date
                                </h5>
                                <p class="text-muted mb-0">
                                    <?php echo e($project->end_date ? Carbon\Carbon::parse($project->end_date)->format('d M, Y') : 'N/A'); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row task-dates">
                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-user me-1 text-primary"></i> Client name</h5>
                                <p class="text-muted mb-0">
                                    <?php echo e($project->client_name); ?>

                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-dollar me-1 text-primary"></i> Budget
                                </h5>
                                <p class="text-muted mb-0">
                                    <?php echo e($project->budget ? '$' . number_format($project->budget, 2) : 'N/A'); ?>

                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row task-dates">
                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-map me-1 text-primary"></i> Location</h5>
                                <p class="text-muted mb-0">
                                    <?php echo e($project->location); ?>

                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="mt-4">
                                <h5 class="font-size-14"><i class="bx bx-info-circle me-1 text-primary"></i> Status
                                </h5>
                                <p class="text-muted mb-0">
                                    <?php if($project->status == 'planning'): ?>
                                        <span class="badge bg-success">Planning</span>
                                    <?php elseif($project->status == 'in_progress'): ?>
                                        <span class="badge bg-primary">In Progress</span>
                                    <?php elseif($project->status == 'not_started'): ?>
                                        <span class="badge bg-warning">Not Started</span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed-application\laragon\www\egs-solar\resources\views/admin/projects/show.blade.php ENDPATH**/ ?>