<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?php echo app('translator')->get('translation.Menu'); ?></li>

                <li>
                    <a href="<?php echo e(route('root')); ?>" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin')): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-employees">Employees</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo e(route('employees.index')); ?>" key="t-employees-list">Employees List</a></li>
                            <li><a href="<?php echo e(route('employees.create')); ?>" key="t-create-employee">Create Employee</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Admin|Employee')): ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase-alt-2"></i>
                            <span key="t-jobs">Jobs</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="<?php echo e(route('jobs.index')); ?>" key="t-jobs-list">Jobs List</a></li>
                            <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Employee')): ?>
                                <li><a href="<?php echo e(route('jobs.taken')); ?>" key="t-taken-jobs">Taken Jobs</a></li>
                            <?php endif; ?>
                            
                        </ul>
                    </li>
                <?php endif; ?>

                

                

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<?php /**PATH D:\Web dev\my-projects\depannage\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>