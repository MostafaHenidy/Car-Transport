@extends('back.master')
@section('reviews-active', 'active')
@section('content')
    @if (role('admin', 'admin'))
        <div class="card bg-dark text-white mb-4">
            <div class="card-header">
                Recent Reviews
            </div>
            <div class="card-body table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>Rating</th>
                            <th>Review</th>
                            <th>Status</th>
                            <th>Approve</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @php
                                        $user = App\Models\User::where('email', $review->email)->first();
                                    @endphp
                                    @if ($user && $user->deleted_at === null)
                                        {{ $user->name }}
                                    @else
                                        <p class="text-light">Deleted user</p>
                                    @endif
                                </td>
                                <td>
                                    @for ($i = 0; $i < $review->rating; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                </td>
                                <td>{{ $review->review }}</td>
                                <td><span class="badge bg-{{ $review->approved === 0 ? 'danger' : 'success' }} review-card">
                                        @if ($review->approved === 0)
                                            Unapproved
                                        @else
                                            Approved
                                        @endif
                                    </span>
                                </td>
                                <td>
                                    <button type="button" class="btn bg-transparent text-light single-approve-btn"
                                        data-id="{{ $review->id }}">
                                        @if ($review->approved === 1)
                                            <i class="bi bi-check-all"></i>
                                        @else
                                            <i class="bi bi-check2"></i>
                                        @endif
                                    </button>
                                </td>
                            </tr>
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
