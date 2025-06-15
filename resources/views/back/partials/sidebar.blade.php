<div class="sidebar p-3">
    @include('front.partials.logo')
    <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="{{ route('admin.index') }}" class="nav-link active"><i
                    class="bi bi-speedometer2"></i> Dashboard</a></li>
        <li class="nav-item mb-2"><a href="{{ route('admin.orders.listAllOrders') }}" class="nav-link"><i
                    class="bi bi-bag-check"></i> Orders</a></li>
        <li class="nav-item mb-2"><a href="{{ route('admin.trips.listAllTrips') }}" class="nav-link"><i
                    class="bi bi-car-front-fill"></i> Trips</a></li>
        <li class="nav-item mb-2"><a href="{{ route('admin.tickets.index') }}" class="nav-link"><i
                    class="bi bi-chat-left-dots"></i> Support Tickets</a></li>
    </ul>
</div>
