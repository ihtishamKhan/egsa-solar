

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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="<?php echo e(route('leads.siteSurveyUpdate', $lead->uuid)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="interestedIn" class="form-label">Interested In</label>
                                            <input type="text" class="form-control" id="interestedIn" name="interest_in"
                                                value="<?php echo e($lead->interest_in); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="InstallationLocation" class="form-label">Installation
                                                Location</label>
                                            <input type="text" class="form-control" id="InstallationLocation"
                                                name="installation_location" value="<?php echo e($lead->installation_location); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceOrientation" class="form-label">Surface
                                                Orientation</label>
                                            <input type="text" class="form-control" id="surfaceOrientation"
                                                name="surface_orientation" value="<?php echo e($lead->surface_orientation); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ownershipStatus" class="form-label">Ownership Status</label>
                                            <input type="text" class="form-control" id="ownershipStatus"
                                                name="ownership_status" value="<?php echo e($lead->ownership_status); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceOrientation" class="form-label">Surface
                                                Orientation</label>
                                            <input type="text" class="form-control" id="surfaceOrientation"
                                                name="surface_orientation" value="<?php echo e($lead->surface_orientation); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="ownershipStatus" class="form-label">Ownership Status</label>
                                            <input type="text" class="form-control" id="ownershipStatus"
                                                name="ownership_status" value="<?php echo e($lead->ownership_status); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceAge" class="form-label">Surface Age</label>
                                            <input type="text" class="form-control" id="surfaceAge" name="surface_age"
                                                value="<?php echo e($lead->surface_age); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="powerConsumption" class="form-label">Power
                                                Consumption</label>
                                            <input type="text" class="form-control" id="powerConsumption"
                                                name="power_consumption" value="<?php echo e($lead->power_consumption); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="sunnyArea" class="form-label">Sunny Area (sqm)</label>
                                            <input type="text" class="form-control" id="sunnyArea" name="sunny_area_sqm"
                                                value="<?php echo e($lead->sunny_area_sqm); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="storageInterest" class="form-label">Storage Interest</label>
                                            <input type="text" class="form-control" id="storageInterest"
                                                name="storage_interest" value="<?php echo e($lead->storage_interest); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surfaceInclination" class="form-label">Surface
                                                Inclination</label>
                                            <input type="text" class="form-control" id="surfaceInclination"
                                                name="surface_inclination" value="<?php echo e($lead->surface_inclination); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="purchaseType" class="form-label">Purchase Type</label>
                                            <input type="text" class="form-control" id="purchaseType"
                                                name="purchase_type" value="<?php echo e($lead->purchase_type); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="additionalInterests" class="form-label">Additional
                                                Interests</label>
                                            <input type="text" class="form-control" id="additionalInterests"
                                                name="additional_interests" value="<?php echo e($lead->additional_interests); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="additionalInformation" class="form-label">Additional
                                                Information</label>
                                            <input type="text" class="form-control" id="additionalInformation"
                                                name="additional_information"
                                                value="<?php echo e($lead->additional_information); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date"
                                                value="<?php echo e($lead->date); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Projects\Git\egsa-solar\resources\views/admin/leads/site-survey.blade.php ENDPATH**/ ?>