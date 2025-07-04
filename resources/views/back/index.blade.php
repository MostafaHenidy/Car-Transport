@extends('back.master')
@section('dashboard-active', 'active')
@section('content')
    <div class="container-fluid py-4">
        <!-- Dashboard Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Orders</h5>
                        <p class="card-text fs-3">{{ $ordersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">Trips Available</h5>
                        <p class="card-text fs-3">{{ $tripsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-dark text-white">
                    <div class="card-body">
                        <h5 class="card-title">Open Tickets</h5>
                        <p class="card-text fs-3">{{ $ticketsCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="card bg-dark text-white mb-4">
            <div class="card-header">
                Recent Orders
            </div>
            <div class="card-body table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>User Phone</th>
                            <th>Status</th>
                            <th>Trip</th>
                            <th>Placed At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentOrders as $order)
                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->phone }}</td>
                                @php
                                    $badgeColor = match ($order->status) {
                                        'confirmed' => 'primary',
                                        'in_progress' => 'light',
                                        'completed' => 'success',
                                        'cancelled' => 'warning',
                                        'failed' => 'danger',
                                    };
                                @endphp
                                <td><span class="badge text-bg-{{ $badgeColor }}">
                                        {{ ucwords(str_replace('_', ' ', $order->status)) }}</span></td>
                                <td>
                                    <ul>
                                        @foreach ($order->trips as $trip)
                                            <li>{{ $trip->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>{{ $order->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Recent Tickets -->
        <div class="card bg-dark text-white">
            <div class="card-header">
                Recent Support Tickets
            </div>
            <div class="card-body table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Subject</th>
                            <th>Submitted</th>
                            <th>Status</th>
                            <th>Reply</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ ucfirst(str_replace('_', ' ', $ticket->subject)) }}</td>
                                <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                <td><span
                                        class="badge bg-{{ $ticket->status === 'open' ? 'warning' : 'success' }}">{{ ucfirst($ticket->status) }}</span>
                                </td>
                                <td><a href="{{ route('admin.tickets.showTickets', $ticket->id) }}"
                                        class="btn bg-ransparent text-light"><i class="bi bi-arrow-right-circle"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
