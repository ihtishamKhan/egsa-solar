

<?php $__env->startSection('title'); ?>
    Lead Details
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Leads
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Lead Details
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

    <?php echo $__env->make('layouts.leads-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Title</th>
                                            <td><?php echo e($lead->title); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Name</th>
                                            <td><?php echo e($lead->first_name); ?> <?php echo e($lead->last_name); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Company</th>
                                            <td><?php echo e($lead->company); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Contact Number</th>
                                            <td><?php echo e($lead->contact_number); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Additional Number</th>
                                            <td><?php echo e($lead->additional_number); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo e($lead->email); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Street</th>
                                            <td><?php echo e($lead->street_address); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Postal Code</th>
                                            <td><?php echo e($lead->postal_code); ?></td>
                                        </tr>
                                        <tr>
                                            <th>City</th>
                                            <td><?php echo e($lead->city); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Latitude</th>
                                            <td><?php echo e($lead->latitude); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Longitude</th>
                                            <td><?php echo e($lead->longitude); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="leadStatus" class="form-label">Status</label>
                                <select class="form-select" id="leadStatus" name="status">
                                    <option value="">Select Status</option>
                                    <option value="Fresh" <?php echo e($lead->status == 'Fresh' ? 'selected' : ''); ?>>Fresh</option>
                                    <option value="Site Survey Done"
                                        <?php echo e($lead->status == 'Site Survey Done' ? 'selected' : ''); ?>>Site Survey Done
                                    </option>
                                    <option value="Engineering Design"
                                        <?php echo e($lead->status == 'Engineering Design' ? 'selected' : ''); ?>>Engineering Design
                                    </option>
                                    <option value="Proposal Sent" <?php echo e($lead->status == 'Proposal Sent' ? 'selected' : ''); ?>>
                                        Proposal Sent
                                    </option>
                                    <option value="Commercials Finalized"
                                        <?php echo e($lead->status == 'Commercials Finalized' ? 'selected' : ''); ?>>
                                        Commercials Finalized
                                    </option>
                                    <option value="PO Received" <?php echo e($lead->status == 'PO Received' ? 'selected' : ''); ?>>
                                        PO Received
                                    </option>
                                    <option value="Cold" <?php echo e($lead->status == 'Cold' ? 'selected' : ''); ?>>Cold</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nextAction" class="form-label">Next Action</label>
                                <select class="form-select" id="nextAction" name="next_action">
                                    <option value="">Select Next Action</option>
                                    <option value="Site Survey"
                                        <?php echo e($lead->next_action == 'Site Survey' ? 'selected' : ''); ?>>
                                        Site Survey
                                    </option>
                                    <option value="Engineering Design"
                                        <?php echo e($lead->next_action == 'Engineering Design' ? 'selected' : ''); ?>>
                                        Engineering Design
                                    </option>
                                    <option value="Proposal" <?php echo e($lead->next_action == 'Proposal' ? 'selected' : ''); ?>>
                                        Proposal
                                    </option>
                                    <option value="Commercials"
                                        <?php echo e($lead->next_action == 'Commercials' ? 'selected' : ''); ?>>
                                        Commercials
                                    </option>
                                    <option value="PO" <?php echo e($lead->next_action == 'PO' ? 'selected' : ''); ?>>PO</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="nextActionDate" class="form-label">Next Action Date</label>
                                <input type="date" class="form-control" id="nextActionDate" name="next_action_date"
                                    value="<?php echo e($lead->next_action_date); ?>">
                            </div>

                            <div class="mb-3">
                                <label for="nextActionOwner" class="form-label">Next Action Owner</label>
                                <select class="form-select" id="nextActionOwner" name="next_action_owner">
                                    <option value="">Select Next Action Owner</option>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($user->id); ?>"
                                            <?php echo e($lead->next_action_owner == $user->id ? 'selected' : ''); ?>>
                                            <?php echo e($user->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\Git\egsa-solar\resources\views/admin/leads/show.blade.php ENDPATH**/ ?>