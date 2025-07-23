@extends('front.master')
@section('content')
    @if (role('web', 'user'))
        <div class="container px-vw-5 py-vh-5">
            <h3>Your Support Tickets</h3>
            @if ($tickets)
                @foreach ($tickets as $ticket)
                    <div class="container mt-4">
                        <!-- Main Ticket -->
                        <div class="card mb-4">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>Subject:</strong> {{ ucwords(str_replace('_', ' ', $ticket->subject)) }}
                                </div>
                                <div class="btn-group">
                                    @php
                                        $badgeColor = match ($ticket->status) {
                                            'open' => 'primary',
                                            'answered' => 'success',
                                            'closed' => 'secondary',
                                        };
                                    @endphp
                                    <span
                                        class="badge rounded-pill text-bg-{{ $badgeColor }}">{{ ucwords($ticket->status) }}</span>
                                </div>
                            </div>

                            <div class="card-body bg-light">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ Avatar::create($ticket->user->name)->toBase64() }}" width="40"
                                        height="40" class="rounded-circle me-3" alt="User avatar">
                                    <div>
                                        <div class="fw-bold text-dark">{{ $ticket->user->name }}</div>
                                        <div class="text-muted">{{ $ticket->user->email }}</div>
                                    </div>
                                </div>
                                <p class="text-dark">{{ $ticket->message }}</p>
                                <small class="text-muted"><i class="fas fa-clock me-1"></i>Created:
                                    {{ $ticket->created_at->format('F j, Y \a\t g:i A') }}</small>
                            </div>
                        </div>

                        <!-- Replies Section -->

                        <h5 class="mb-3"><i class="bi bi-chat me-2"></i></i>Replies</h5>

                        @if ($ticket->replies->count() > 0)
                            @foreach ($ticket->replies as $reply)
                                <div class="card mb-3 {{ $reply->support_stuff_id ? 'bg-white' : 'bg-light' }}">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center mb-2">
                                            @if ($reply->support_stuff_id)
                                                <img src="{{ Avatar::create($reply->agent->name)->toBase64() }}"
                                                    width="40" height="40" class="rounded-circle me-3">
                                                <div>
                                                    <strong class="text-dark">{{ $reply->agent->name }}</strong>
                                                    <div class="text-muted">Support Agent</div>
                                                </div>
                                            @else
                                                <img src="{{ Avatar::create($reply->user->name)->toBase64() }}"
                                                    width="40" height="40" class="rounded-circle me-3">
                                                <div>
                                                    <strong class="text-dark">{{ $reply->user->name }}</strong>
                                                    <div class="text-muted">Customer</div>
                                                </div>
                                            @endif
                                            <div class="ms-auto text-muted">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $reply->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                        <p class="text-dark">{{ $reply->message }}</p>

                                        @if ($reply->attachments && count($reply->attachments) > 0)
                                            <div class="attachments mt-3">
                                                <div class="d-flex gap-2">
                                                    @foreach ($reply->attachments as $attachment)
                                                        <span class="badge bg-secondary text-white">
                                                            <i class="fas fa-file me-1 text-light"></i>
                                                            {{ $attachment->name }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning">
                                <i class="fas fa-comment-slash me-2"></i>No replies yet.
                            </div>
                        @endif

                        @if ($ticket->status !== 'closed')
                            <!-- Reply Form -->
                            <form action="{{ route('front.ticket.replyToTicket', $ticket->id) }}" method="POST"
                                class="mt-4">
                                @csrf
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <strong><i class="bi bi-reply me-2"></i>Reply to Ticket</strong>
                                    </div>
                                    <div class="card-body bg-light text-dark">
                                        <div class="mb-3">
                                            <label for="reply" class="form-label">Your message:</label>
                                            <textarea name="message" id="reply" rows="4" class="form-control" placeholder="Type your response here..."
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end bg-white">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-send me-1"></i>Send Reply
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                        @endif
                    </div>
                @endforeach
            @else
                <p>You have not submitted any tickets yet.</p>
            @endif
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
