@extends('back.master')
@section('orders-active', 'active')
@section('content')
    @if (role('admin', 'admin'))
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            @if ($order->user && $order->user->deleted_at === null)
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
                                    <td>
                                        @php
                                            $statuses = [
                                                'confirmed',
                                                'in_progress',
                                                'completed',
                                                'cancelled',
                                                'failed',
                                            ];
                                        @endphp
                                        <div class="dropdown">
                                            <button type="button"
                                                class="btn bg-transparent dropdown-toggle text-light rounded-circle"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical fs-6"></i>
                                            </button>
                                            <ul class="dropdown-menu bg-dark">

                                                @foreach ($statuses as $status)
                                                    @if ($status !== $order->status)
                                                        <li>
                                                            <form
                                                                action="{{ route('admin.orders.updateOrderStatus', $order->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="status"
                                                                    value="{{ $status }}">
                                                                <button type="submit"
                                                                    class="dropdown-item bg-dark text-light">
                                                                    {{ ucwords(str_replace('_', ' ', $status)) }}
                                                                </button>
                                                            </form>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="row d-flex justify-content-center py-5 mt-5">
            <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                style="min-height: 200px;">
                <strong class="fs-5 text-light">you have not the right privileges to see this page contents</strong>
            </div>
        </div>
    @endif
@endsection
