

<?php $__env->startSection('title'); ?>
    Leads List
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Leads
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Leads List
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="d-flex justify-content-between align-items-center p-2">

                    <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Super Admin|Employee')): ?>
                    <form method="GET" action="<?php echo e(route('leads.index')); ?>">
                    <div class="">
                                    <label for="leadStatus" class="form-label">Status</label>
                                    <select id="leadStatus" name="status" class="form-select" <?php if(true): echo 'readonly'; endif; ?> onchange="this.form.submit()">
                                        <option value="">Filter By Status</option>
                                        <option value="Fresh" >Fresh
                                        </option>
                                        <option value="Site Survey Done"
                                        >Site Survey Done
                                        </option>
                                        <option value="Engineering Design"
                                        >Engineering Design
                                        </option>
                                        <option value="Proposal Sent" value='selected'
                                        >
                                            Proposal Sent
                                        </option>
                                        <option value="Commercials Finalized" select
                                            >
                                            Commercials Finalized
                                        </option>
                                        <option value="PO Received" >
                                            PO Received
                                        </option>
                                        <option value="Cold" >Cold
                                        </option>
                                    </select>

                                    <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback d-block">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
</form>
                    

<div class="col-md-3 d-flex justify-content-end">
                        <div class="text-end">
                            <a class="btn btn-primary btn-sm text-light" href="<?php echo e(route('leads.create')); ?>">Add Leads</a>
                        </div>

                        <div class="text-end mx-2">
                            <a class="btn btn-info btn-sm text-light" data-bs-toggle="modal"
                                data-bs-target="#importLeads">Import
                                Leads</a>
                        </div>
                        </div>


                        
                        <div id="importLeads" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="myModalLabel">Import Leads</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="<?php echo e(route('leads.import')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label for="file" class="form-label required">Upload File</label>
                                                        <input type="file" name="file"
                                                            class="form-control <?php $__errorArgs = ['file'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                                            id="file" required>

                                                        <?php $__errorArgs = ['file'];
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
                                                class="btn btn-primary waves-effect waves-light">Import</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Contact Number</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($lead->title); ?></td>
                                    <td><?php echo e($lead->first_name); ?> <?php echo e($lead->last_name); ?></td>
                                    <td><?php echo e($lead->contact_number); ?></td>
                                    <td>
                                        <?php if($lead->assignedTo): ?>
                                            <?php echo e($lead->assignedTo->name); ?>

                                        <?php else: ?>
                                            <span class="text-danger">No User</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($lead->status); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('leads.show', $lead->uuid)); ?>">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-eye btn-action"></i>
                                            </button>
                                        </a>
                                        <a href="<?php echo e(route('leads.edit', $lead->id)); ?>">
                                            <button class="btn btn-info btn-sm"><i class="fa fa-edit btn-action"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- Required datatable js -->
    <script src="<?php echo e(URL::asset('/assets/libs/datatables/datatables.min.js')); ?>"></script>
    <!-- Datatable init js -->
    <script src="<?php echo e(URL::asset('/assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\Git\egsa-solar\resources\views/admin/leads/index.blade.php ENDPATH**/ ?>