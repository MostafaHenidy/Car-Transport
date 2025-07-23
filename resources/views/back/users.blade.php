@extends('back.master')
@section('users-active', 'active')
@section('content')
    @if (role('admin', 'admin'))
        @if (count($users) > 0)
            <div class="card bg-dark text-white mb-4">
                <div class="card-header">
                    Deleted users
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Recover</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                @if ($user && $user->deleted_at !== null)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td><span
                                                class="badge text-bg-{{ $user->deleted_at === null ? 'success' : 'danger' }}">{{ $user->deleted_at === null ? 'Active' : 'Deleted' }}</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn bg-transparent text-light single-recover-btn"
                                                data-id="{{ $user->id }}">
                                                @if ($user->deleted_at === null)
                                                    <i class="bi bi-check-all"></i>
                                                @else
                                                    <i class="bi bi-check2"></i>
                                                @endif
                                            </button>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        @else
        <div class="card-header">
                    <h3>Deleted users</h3>
                </div>
            <div class="row d-flex justify-content-center py-5 mt-5">
                <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                    style="min-height: 200px;">
                    <strong class="fs-5 text-light">There is no deleted users</strong>
                </div>
            </div>
        @endif
    @else
        <div class="row d-flex justify-content-center py-5 mt-5">
            <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                style="min-height: 200px;">
                <strong class="fs-5 text-light">you have not the right privileges to see this page contents</strong>
            </div>
        </div>
    @endif

@endsection
