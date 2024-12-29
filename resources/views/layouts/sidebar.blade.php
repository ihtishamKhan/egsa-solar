<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('translation.Menu')</li>

                <li>
                    <a href="{{ route('root') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                @hasrole('Super Admin')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-employees">Employees</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('employees.index') }}" key="t-employees-list">Employees List</a></li>
                            <li><a href="{{ route('employees.create') }}" key="t-create-employee">Create Employee</a></li>
                        </ul>
                    </li>
                @endhasrole

                @hasrole('Super Admin|Employee')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user-circle"></i>
                            <span key="t-leads">Leads</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('leads.index') }}" key="t-leads-list">Leads List</a></li>
                            <li><a href="{{ route('leads.create') }}" key="t-create-lead">Create Lead</a></li>
                        </ul>
                    </li>
                @endhasrole

                @hasrole('Super Admin|Employee')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-box"></i>
                            <span key="t-products">Products</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('products.index') }}" key="t-products-list">Products List</a></li>
                            <li><a href="{{ route('products.create') }}" key="t-product-lead">Create Product</a></li>
                        </ul>
                    </li>
                @endhasrole

                @hasrole('Super Admin|Employee')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-briefcase"></i>
                            <span key="t-products">Projects</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('projects.index') }}" key="t-projects-list">Projects List</a></li>
                            <li><a href="{{ route('projects.create') }}" key="t-project-lead">Create Project</a></li>
                        </ul>
                    </li>
                @endhasrole

                @hasrole('Super Admin|Employee')
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-check-square"></i>
                            <span key="t-tasks">Tasks</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('tasks.index') }}" key="t-tasks-list">Tasks List</a></li>
                            {{-- <li><a href="{{ route('tasks.create') }}" key="t-task-lead">Create Task</a></li> --}}
                        </ul>
                    </li>
                @endhasrole


                {{-- <li>
                        <a href="{{ route('tasks.index') }}" class="waves-effect">
                            <i class="bx bx-task"></i>
                            <span key="t-tasks">Tasks</span>
                        </a>
                    </li> --}}

                {{-- @hasrole('Admin')
                    <li>
                        <a href="{{ route('expenses.index') }}" class="waves-effect">
                            <i class="bx bx-dollar-circle"></i>
                            <span key="t-file-manager">Expenses</span>
                        </a>
                    </li>
                @endhasrole --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
