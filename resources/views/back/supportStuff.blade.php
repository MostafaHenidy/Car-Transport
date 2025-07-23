@extends('back.master')
@section('supportStuff-active', 'active')
@section('content')
    @if (role('admin', 'admin'))
        @if (session('status'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
        @endif
        @if (count($stuff) > 0)
            <div class="card bg-dark text-white mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Support Stuff</h5>
                    <button data-bs-toggle="modal" data-bs-target="#AddAgent" class="btn btn-outline-light btn-sm">
                        <i class="bi bi-plus-lg"></i> Add Agent
                    </button>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-dark table-hover table-striped align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="50">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Last Seen</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stuff as $agent)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <p>{{ $agent->name }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $agent->email }}</p>
                                        </td>
                                        <td>
                                            <p>{{ $agent->phone }}</p>
                                        </td>
                                        <td>
                                            <span
                                                class="badge rounded-pill text-bg-{{ $agent->status = 'acitve' ? 'success' : 'dark' }}">{{ $agent->status }}</span>
                                        </td>
                                        <td>
                                            <span>{{ $agent->last_login_at->diffForHumans() }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#viewTripModal{{ $agent->id }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editTripModal{{ $agent->id }}">
                                                    <i class="bi bi-pencil"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteTripModal{{ $agent->id }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- View Modal -->
                                    {{-- <div class="modal fade" id="viewTripModal{{ $trip->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content bg-dark text-white">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Trip Details</h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h4>{{ $trip->name }}</h4>
                                                        <p class="text-muted">{{ $trip->pickup }}</p>

                                                        <div class="mb-3">
                                                            <h6>Routes:</h6>
                                                            <p>{{ $trip->routes }}</p>
                                                        </div>

                                                        <div class="mb-3">
                                                            <h6>Transport:</h6>
                                                            <p>{{ $trip->transport }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <h6>Price:</h6>
                                                            <p class="text-light">
                                                                {{ Laravel\Cashier\Cashier::formatAmount($trip->price, env('CASHIER_CURRENCY'), App::currentLocale()) }}
                                                            </p>
                                                        </div>

                                                        <div class="mb-3">
                                                            <h6>Sites:</h6>
                                                            <ul>
                                                                @foreach (explode(',', $trip->sites) as $site)
                                                                    <li>{{ trim($site) }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                    <!-- Edit Modal -->
                                    {{-- <div class="modal fade" id="editTripModal{{ $trip->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.trips.update', $trip->id) }}" method="POST">
                                            @csrf
                                            @method('Patch')
                                            <div class="modal-content bg-dark text-white">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Trip</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $trip->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Pickup Location</label>
                                                        <input type="text" class="form-control" name="pickup"
                                                            value="{{ $trip->pickup }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Routes</label>
                                                        <textarea class="form-control" name="routes" rows="2">{{ $trip->routes }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Transport</label>
                                                        <input type="text" class="form-control" name="transport"
                                                            value="{{ $trip->transport }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Sites (comma separated)</label>
                                                        <textarea class="form-control" name="sites" rows="3">{{ $trip->sites }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Price</label>
                                                        <input type="text" step="0.01" class="form-control"
                                                            name="price" value="{{ $trip->price / 100 }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Update Trip</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}

                                    <!-- Delete Modal -->
                                    {{-- <div class="modal fade" id="deleteTripModal{{ $trip->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('admin.trips.delete', $trip->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content bg-dark text-white">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-danger">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete this trip?</p>
                                                    <p><strong>{{ $trip->name }}</strong></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete Trip</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div> --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    @if ($stuff->hasPages())
                        <div class="card-footer">
                            {{ $stuff->links() }}
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="">
                <h5 class="mb-0">Support Stuff</h5>
                <button data-bs-toggle="modal" data-bs-target="#AddAgent"
                    class="btn btn-outline-light btn-sm d-flex mb-4 float-end">
                    <i class="bi bi-plus-lg"></i> Add Agent
                </button>
            </div>

            <div class="row d-flex justify-content-center py-5 mt-5">
                <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                    style="min-height: 200px;">
                    <strong class="fs-5 text-light">you do not have any customer support agents</strong>
                </div>
            </div>
        @endif

        <!-- Create Modal -->
        <div class="modal fade" id="AddAgent" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">

                <form action="{{ route('admin.support_stuff.AddAgent') }}" method="POST">
                    @csrf
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Customer Support Agent</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" required></input>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Phone</label>
                                <input type="phone" class="form-control" name="phone" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add Agent</button>
                        </div>
                    </div>
                </form>
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
