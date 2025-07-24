<div class="sidebar glass-sidebar p-3 position-fixed top-0 start-0 z-3" id="sidebar" style="width: 260px;">
    <div class="glass-content d-flex flex-column h-100">

        <div class="sidebar-header mb-4">
            @include('front.partials.logo')
        </div>


        <ul class="nav flex-column sidebar-nav flex-grow-1">
            <li class="nav-item mb-2">
                <a href="{{ route('support_stuff.index') }}" class="nav-link @yield('dashboard-active')">
                    <i class="me-2 bi bi-house-door-fill"></i> Dashboard
                </a>
            </li>

            <li class="nav-item mb-2">
                <form action="{{ route('support_stuff.logout') }}" method="POST">
                    @csrf
                    <button class="nav-link">
                        <i class="me-2 bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>

    </div>
</div>
