<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('products.index') }}">
            <i class="fas fa-box"></i>
            <span>Products</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('categories.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="fas fa-box"></i>
            <span>Categories</span>
        </a>
    </li>

    <li class="nav-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('orders.index') }}">
            <i class="fas fa-box"></i>
            <span>Confirm Payment</span>
        </a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Homepage</span>
        </a>
    </li>
</ul>
