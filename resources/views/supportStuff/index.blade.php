@extends('supportStuff.master')
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
        {{-- @if (role('admin', 'admin')) --}}
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
                            @if ($ticket->user && $ticket->user->deleted_at === null)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ticket->user->name }}</td>
                                    <td>{{ ucfirst(str_replace('_', ' ', $ticket->subject)) }}</td>
                                    <td>{{ $ticket->created_at->diffForHumans() }}</td>
                                    <td><span
                                            class="badge bg-{{ $ticket->status === 'open' ? 'warning' : 'success' }}">{{ ucfirst($ticket->status) }}</span>
                                    </td>
                                    <td><a href="{{ route('support_stuff.tickets.showTickets', $ticket->id) }}"
                                            class="btn bg-ransparent text-light"><i
                                                class="bi bi-arrow-right-circle"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- @else
            <div class="row d-flex justify-content-center py-5 mt-5">
                <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                    style="min-height: 200px;">
                    <strong class="fs-5 text-light">you have not the right privileges to see this page contents</strong>
                </div>
            </div>
        @endif --}}

    </div>
@endsection
