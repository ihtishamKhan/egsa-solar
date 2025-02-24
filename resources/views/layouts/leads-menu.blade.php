<div class="col-12 mb-4">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('leads.show') ? 'active' : '' }}"
                href="{{ route('leads.show', $lead->uuid) }}" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Home</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('leads.siteSurvey') ? 'active' : '' }}"
                href="{{ route('leads.siteSurvey', $lead->uuid) }}" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Site Survey</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('leads.products') ? 'active' : '' }}"
                href="{{ route('leads.products', $lead->uuid) }}" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Products</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('leads.files') ? 'active' : '' }}"
                href="{{ route('leads.files', $lead->uuid) }}" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Files</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('leads.notes') ? 'active' : '' }}"
                href="{{ route('leads.notes', $lead->uuid) }}" role="tab">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Notes</span>
            </a>
        </li>
    </ul>
</div>
