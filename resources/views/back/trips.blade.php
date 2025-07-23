@extends('back.master')
@section('trips-active', 'active')
@section('content')
    @if (role('admin', 'admin'))
        @if (session('status'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
        @endif
        <div class="card bg-dark text-white mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Trips Management</h5>
                <button data-bs-toggle="modal" data-bs-target="#createTripModal" class="btn btn-success btn-sm">
                    <i class="bi bi-plus-lg"></i> Add New Trip
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-dark table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="50">#</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th width="120">Price</th>
                                <th width="100">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trips as $trip)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $trip->name }}</strong>
                                        <div class=" small mt-1 text-light">
                                            <i class="bi bi-geo-alt text-light"></i> {{ $trip->pickup }}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap gap-2">
                                            <span class="badge bg-primary" title="Routes">
                                                <i class="bi bi-signpost"></i> {{ Str::limit($trip->routes, 20) }}
                                            </span>
                                            <span class="badge bg-secondary" title="Transport">
                                                <i class="bi bi-bus-front"></i> {{ Str::limit($trip->transport, 50) }}
                                            </span>
                                            <span class="badge bg-info" title="Sites">
                                                <i class="bi bi-building"></i>
                                                {{ $trip->sites_count ?? count(explode(',', $trip->sites)) }}
                                            </span>
                                        </div>
                                    </td>
                                    <td class="text-light">
                                        {{ Laravel\Cashier\Cashier::formatAmount($trip->price, env('CASHIER_CURRENCY'), App::currentLocale()) }}
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#viewTripModal{{ $trip->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#editTripModal{{ $trip->id }}">
                                                <i class="bi bi-pencil"></i>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                                                data-bs-target="#deleteTripModal{{ $trip->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>


                                <!-- View Modal -->
                                <div class="modal fade" id="viewTripModal{{ $trip->id }}" tabindex="-1"
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
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editTripModal{{ $trip->id }}" tabindex="-1"
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
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteTripModal{{ $trip->id }}" tabindex="-1"
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
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($trips->hasPages())
                    <div class="card-footer">
                        {{ $trips->links() }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createTripModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">

                <form action="{{ route('admin.trips.create') }}" method="POST">
                    @csrf
                    <div class="modal-content bg-dark text-white">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Trip</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pickup Location</label>
                                <input type="text" class="form-control" name="pickup" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Routes</label>
                                <textarea class="form-control" name="routes" rows="2" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Transport</label>
                                <input type="text" class="form-control" name="transport" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Sites (comma separated)</label>
                                <textarea class="form-control" name="sites" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" step="1.00" class="form-control" name="price" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Create Trip</button>
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
