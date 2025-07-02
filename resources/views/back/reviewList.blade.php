@extends('back.master')
@section('review-active', 'active')
@section('content')
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
                            <td>{{ $review->name }}</td>
                            <td>
                                @for ($i = 0; $i <= $review->rating; $i++)
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
@endsection
