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
        @if (role('support_stuff', 'supportStuff'))
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
                                        <td>
                                            @php
                                                $badgeColor = match ($ticket->status) {
                                                    'open' => 'primary',
                                                    'answered' => 'success',
                                                    'closed' => 'secondary',
                                                };
                                            @endphp
                                            <span class="badge bg-{{ $badgeColor }}">{{ ucfirst($ticket->status) }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('support_stuff.tickets.showTickets', $ticket->id) }}"
                                                class="btn bg-transparent text-light">
                                                <i class="bi bi-arrow-right-circle"></i>
                                            </a>
                                            <button type="button" class="btn bg-transparent text-light"
                                                data-bs-toggle="modal"
                                                data-bs-target="#DeleteTicketModal{{ $ticket->id }}">
                                                <i class="bi bi-x-circle"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- card-body -->
            </div> <!-- card -->

            <!-- MODALS (outside table) -->
            @foreach ($tickets as $ticket)
                @if ($ticket->user && $ticket->user->deleted_at === null)
                    <div class="modal fade" id="DeleteTicketModal{{ $ticket->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('support_stuff.tickets.deleteTicket', $ticket->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content bg-dark text-white">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-danger">Confirm Deletion</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete this ticket?</p>
                                        <p><strong>{{ ucwords(str_replace('_', ' ', $ticket->subject)) }}</strong></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete ticket</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div class="row d-flex justify-content-center py-5 mt-5">
                <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                    style="min-height: 200px;">
                    <strong class="fs-5 text-light">you have not the right privileges to see this page contents</strong>
                </div>
            </div>
        @endif
    </div>


@endsection
