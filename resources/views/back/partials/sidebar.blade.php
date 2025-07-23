<div class="sidebar glass-sidebar p-3 position-fixed top-0 start-0 z-3" id="sidebar" style="width: 260px;">
    <div class="glass-content d-flex flex-column h-100">

        <div class="sidebar-header mb-4">
            @include('front.partials.logo')
        </div>


        <ul class="nav flex-column sidebar-nav flex-grow-1">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.index') }}" class="nav-link @yield('dashboard-active')">
                    <i class="me-2 bi bi-house-door-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.orders.listAllOrders') }}" class="nav-link @yield('orders-active')">
                    <i class="me-2 bi bi-bag-check"></i> Orders
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.trips.listAllTrips') }}" class="nav-link @yield('trips-active')">
                    <i class="me-2 bi bi-car-front-fill"></i> Trips
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.reviews.listAllReviews') }}" class="nav-link @yield('reviews-active')">
                    <i class="me-2 bi bi-star-fill"></i> Reviews
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.users.listDeletedUsers') }}" class="nav-link @yield('users-active')">
                    @php
                        $deletedUsers = App\Models\User::onlyTrashed()->get();
                    @endphp
                    <span class="position-relative">
                        @if ($deletedUsers && $deletedUsers->count() > 0)
                            <i class="me-2 bi bi-people-fill"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger"
                                style="font-size: 0.6rem;">
                                {{ $deletedUsers->count() }}
                            </span>
                        @else
                            <i class="me-2 bi bi-people-fill"></i>
                        @endif
                    </span>
                    Users
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.support_stuff.ListAllSupportStuff') }}" class="nav-link @yield('supportStuff-active')">
                    <i class="me-2 bi bi-headset"></i> Customer Support
                </a>
            </li>
            <li class="nav-item mb-2">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="nav-link">
                        <i class="me-2 bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>

    </div>
</div>
