

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
                <div class="col-md-4">
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

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Interested In</th>
                                            <td><?php echo e($lead->interest_in); ?></td>
                                            <th>Installation Location</th>
                                            <td><?php echo e($lead->installation_location); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Surface Orientation</th>
                                            <td><?php echo e($lead->surface_orientation); ?></td>
                                            <th>Ownership Status</th>
                                            <td><?php echo e($lead->ownership_status); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Surface Age</th>
                                            <td><?php echo e($lead->Surface_age); ?></td>
                                            <th>Power Consumption</th>
                                            <td><?php echo e($lead->power_consumption); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Sunny Area (sqm)</th>
                                            <td><?php echo e($lead->sunny_area_sqm); ?></td>
                                            <th>Storage Interest</th>
                                            <td><?php echo e($lead->storage_interest); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Surface Inclination</th>
                                            <td><?php echo e($lead->surface_inclination); ?></td>
                                            <th>Purchase Type</th>
                                            <td><?php echo e($lead->purchase_type); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Additional Interests</th>
                                            <td><?php echo e($lead->additional_interests); ?></td>
                                            <th>Additional Information</th>
                                            <td><?php echo e($lead->additional_information); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Date</th>
                                            <td><?php echo e($lead->date); ?></td>
                                            <th>Status</th>
                                            <td>
                                                <span
                                                    class="badge badge-<?php echo e($lead->status == 'New' ? 'primary' : ($lead->status == 'In Progress' ? 'warning' : 'success')); ?>"><?php echo e($lead->status); ?>

                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\installed-application\laragon\www\egs-solar\resources\views/admin/leads/show.blade.php ENDPATH**/ ?>