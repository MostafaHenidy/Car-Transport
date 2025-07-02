<div class="sidebar p-3">
    @include('front.partials.logo')
    <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="{{ route('admin.index') }}" class="nav-link @yield('dashboard-active')"><i
                    class="bi bi-clipboard-data"></i> Dashboard</a></li>
        <li class="nav-item mb-2"><a href="{{ route('admin.orders.listAllOrders') }}" class="nav-link @yield('orders-active')"><i
                    class="bi bi-bag-check"></i> Orders</a></li>
        <li class="nav-item mb-2"><a href="{{ route('admin.trips.listAllTrips') }}"
                class="nav-link @yield('trips-active')"><i class="bi bi-car-front-fill"></i> Trips</a></li>
        <li class="nav-item mb-2"><a href="{{ route('admin.reviews.listAllReviews') }}" class="nav-link @yield('review-active')"><i
                    class="bi bi-hand-thumbs-up-fill"></i> Reviews</a></li>
    </ul>
</div>
