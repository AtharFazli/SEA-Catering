<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-receipt"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SEA Catering</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }} {{ request()->routeIs('subscriptions.show') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @role('user')
        <li class="nav-item {{ request()->routeIs('subscriptions') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subscriptions') }}">
                <i class="fas fa-fw fa-utensils"></i>
                <span>Add Subscription</span></a>
        </li>

        <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('contact') }}">
                <i class="fas fa-fw fa-phone"></i>
                <span>Contact Us</span></a>
        </li>
    @endrole

    @role('admin')
        @php
            $tableRoutes = ['dashboard.table', 'reactivate.index'];
            $isTableOpen = request()->routeIs($tableRoutes);
        @endphp

        <li class="nav-item {{ $isTableOpen ? 'active' : '' }}">
            <a class="nav-link {{ $isTableOpen ? '' : 'collapsed' }}" data-toggle="collapse"
                data-target="#collapseUtilities" href="#" aria-expanded="{{ $isTableOpen ? 'true' : 'false' }}"
                aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span>
            </a>

            <div class="{{ $isTableOpen ? 'show' : '' }} collapse" id="collapseUtilities" data-parent="#accordionSidebar"
                aria-labelledby="headingUtilities">
                <div class="collapse-inner rounded bg-white py-2">
                    <h6 class="collapse-header">Customer Tables:</h6>
                    <a class="collapse-item {{ request()->routeIs('dashboard.table') ? 'active' : '' }}"
                        href="{{ route('dashboard.table') }}">Subscriptions</a>
                    <a class="collapse-item {{ request()->routeIs('reactivate.index') ? 'active' : '' }}"
                        href="{{ route('reactivate.index') }}">Reactivation</a>
                </div>
            </div>
        </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="d-none d-md-inline text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
