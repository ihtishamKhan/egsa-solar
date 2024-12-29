

<?php $__env->startSection('title'); ?>
    Jobs
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Jobs
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Job List
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-end align-items-center p-2">

                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
                        

                        
                        <div id="add-lead" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Add Lead</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="<?php echo e(route('jobs.store')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label required">Title</label>
                                                        <input type="text" name="title"
                                                            class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="title" value="<?php echo e(old('title')); ?>">

                                                        <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="text-danger"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label required">Description</label>
                                                        <textarea name="description" class="form-control <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="description"
                                                            cols="30" rows="2" required><?php echo e(old('description')); ?></textarea>

                                                        <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="text-danger"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="priority" class="form-label required">Priority</label>
                                                        <select name="priority"
                                                            class="form-select <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="priority" required>
                                                            <option value="">Select Priority</option>
                                                            <option value="low">Low</option>
                                                            <option value="medium">Medium</option>
                                                            <option value="high">High</option>
                                                        </select>

                                                        <?php $__errorArgs = ['priority'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="text-danger"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="assign-to" class="form-label required">Assign To</label>
                                                        <select name="employee_id"
                                                            class="form-select <?php $__errorArgs = ['employee_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="assign-to" required>
                                                            <option value="">Select Employee</option>

                                                        </select>

                                                        <?php $__errorArgs = ['employee_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <div class="text-danger"><?php echo e($message); ?></div>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Save</button>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    <?php endif; ?>

                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Taken By</th>
                                <th>Title</th>
                                <th>Client</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($job->takenBy ? $job->takenBy->name : ''); ?></td>
                                    <td><?php echo e($job->title); ?></td>
                                    <td><?php echo e($job->client_name); ?></td>
                                    <td>
                                        <div class="d-inline-block text-truncate" style="max-width: 150px;"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="<?php echo e($job->description); ?>">
                                            <?php echo e($job->description); ?>

                                        </div>
                                    </td>


                                    <td>
                                        <?php if($job->status == 'pending'): ?>
                                            <span class="badge bg-warning">Pending</span>
                                        <?php elseif($job->status == 'released'): ?>
                                            <span class="badge bg-primary">Released</span>
                                        <?php elseif($job->status == 'taken'): ?>
                                            <span class="badge bg-info">Taken</span>
                                        <?php else: ?>
                                            <span class="badge bg-success">Completed</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($job->created_at->format('d M Y')); ?></td>
                                    <td>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#view-job-<?php echo e($job->id); ?>" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-job-<?php echo e($job->id); ?>"
                                                class="btn
                                            btn-primary btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        <?php endif; ?>
                                        
                                    </td>
                                </tr>

                                
                                <div id="view-job-<?php echo e($job->id); ?>" class="modal fade" tabindex="-1"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">View Job</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div>
                                                            <p><strong>Taken By:</strong>
                                                                <?php echo e($job->taken_by->name ?? ''); ?>

                                                        </div>

                                                        <div>
                                                            <p><strong>Job Main:</strong>
                                                                <?php echo e($job->work_main); ?>

                                                        </div>

                                                        <div>
                                                            <p><strong>Job Sub:</strong>
                                                                <?php echo e($job->work_sub); ?>

                                                        </div>


                                                        <div>
                                                            <p><strong>Title:</strong> <?php echo e($job->title); ?>

                                                            </p>
                                                        </div>

                                                        <div>
                                                            <p><strong>Description:</strong>
                                                                <?php echo e($job->description); ?></p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Status:</strong>
                                                                <?php if($job->status == 'pending'): ?>
                                                                    <span class="badge bg-warning">Pending</span>
                                                                <?php elseif($job->status == 'released'): ?>
                                                                    <span class="badge bg-primary">Released</span>
                                                                <?php elseif($job->status == 'taken'): ?>
                                                                    <span class="badge bg-info">Taken</span>
                                                                <?php else: ?>
                                                                    <span class="badge bg-success">Completed</span>
                                                                <?php endif; ?>
                                                            </p>
                                                        </div>

                                                        <div>
                                                            <p><strong>Created At:</strong>
                                                                <?php echo e($job->created_at->format('d M Y')); ?></p>
                                                        </div>

                                                        <hr>

                                                        <h4>Client Details</h4>

                                                        <div>
                                                            <p class="m-0"><strong>Name:</strong>
                                                                <?php echo e($job->client_name); ?></p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Email:</strong>
                                                                <?php echo e($job->client_email); ?></p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Phone:</strong>
                                                                <?php echo e($job->client_phone); ?></p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Address:</strong>
                                                                <?php echo e($job->client_address); ?></p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>City:</strong>
                                                                <?php echo e($job->client_city); ?></p>
                                                        </div>

                                                        <div>
                                                            <p class="m-0"><strong>Postal Code:</strong>
                                                                <?php echo e($job->client_postal_code); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary waves-effect"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                

                                
                                <div id="edit-job-<?php echo e($job->id); ?>" class="modal fade" tabindex="-1"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">Edit Task</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo e(route('jobs.update', $job->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label for="skills" class="form-label required">Skills
                                                                    Required</label>

                                                                
                                                                <div class="form-text">Please enter skills required for
                                                                    this job separated by comma
                                                                </div>
                                                                
                                                                <input type="text" name="skills"
                                                                    class="form-control <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                                    id="skills" value="">
                                                                <?php $__errorArgs = ['skills'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                                    <div class="text-danger"><?php echo e($message); ?></div>
                                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                        class="btn btn-primary waves-effect waves-light">Save</button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            <?php if($errors->any()): ?>
                $('#add-expense').modal('show');
            <?php endif; ?>
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Web dev\my-projects\depannage\resources\views/admin/jobs/index.blade.php ENDPATH**/ ?>