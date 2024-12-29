<div class="col-12">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('projects.show') ? 'active' : '' }}"
                href="{{ route('projects.show', $project->slug) }}" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Home</span>
            </a>
        </li>
        @hasrole('Admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('projects.expenses.index') ? 'active' : '' }}"
                    href="{{ route('projects.expenses.index', $project->slug) }}" role="tab">
                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                    <span class="d-none d-sm-block">Expenses</span>
                </a>
            </li>
        @endhasrole
        {{-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('projects.team.members') ? 'active' : '' }}"
                href="{{ route('projects.team.members', $project->slug) }}" role="tab">
                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                <span class="d-none d-sm-block">Team Members</span>
            </a>
        </li>
        @if (auth()->user()->hasPermissionToAccess($project->id, 'show_deadlines'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('projects.deadlines') ? 'active' : '' }}"
                    href="{{ route('projects.deadlines', $project->slug) }}" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                    <span class="d-none d-sm-block">Deadlines</span>
                </a>
            </li>
        @endif --}}

        {{-- @if (auth()->user()->hasPermissionToAccess($project->id, 'show_invoices'))
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('projects.invoices') ? 'active' : '' }}"
                    href="{{ route('projects.invoices', $project->slug) }}" role="tab">
                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                    <span class="d-none d-sm-block">Invoices</span>
                </a>
            </li>
        @endif --}}
    </ul>
</div>
