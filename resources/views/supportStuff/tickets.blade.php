@extends('supportStuff.master')
@section('tickets-active', 'active')
@section('content')
    <div class="container mt-4">
        <!-- Back button -->
        <h3 class="mb-3">Support Ticket :</h3>

        <!-- Main Ticket -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <div>
                    <strong>Subject:</strong> {{ ucwords(str_replace('_', ' ', $ticket->subject)) }}
                </div>
                <div class="btn-group">
                    <form id="statusUpdateForm" method="POST"
                        action="{{ route('support_stuff.tickets.updateTicketStatus', $ticket) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" id="statusInput">

                        <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <span>{{ ucfirst($ticket->status) }}</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><button type="button" class="dropdown-item" data-status="open">Open</button></li>
                            <li><button type="button" class="dropdown-item" data-status="answered">Answered</button></li>
                            <li><button type="button" class="dropdown-item" data-status="closed">Closed</button></li>
                        </ul>
                    </form>
                </div>
            </div>

            <div class="card-body bg-light">
                <div class="d-flex align-items-center mb-3">
                    @php
                        $user = $ticket->user;
                        $avatar = optional($user)->avatar;
                    @endphp
                    @if ($avatar)
                        @if (Str::startsWith($avatar, ['http://', 'https://']))
                            <img src="{{ $avatar }}" width="40" height="40" class="rounded-circle me-3"
                                alt="User avatar">
                        @else
                            <img src="{{ asset('storage/' . $avatar) }}" width="40" height="40"
                                class="rounded-circle me-3" alt="User avatar">
                        @endif
                    @elseif ($user)
                        {{-- Laravolt fallback if user exists but no avatar --}}
                        <img src="{{ Avatar::create($user->name)->toBase64() }}" width="96" height="96"
                            class="rounded-circle me-3" alt="Reviewer avatar" data-aos="fade" loading="lazy">
                    @else
                        {{-- Guest reviewer fallback --}}
                        @if ($user && $user->deleted_at === null)
                            <img src="{{ Avatar::create($user->name)->toBase64() }}" width="96" height="96"
                                class="rounded-circle me-3" alt="Guest avatar" data-aos="fade" loading="lazy">
                        @else
                            <img src="{{ Avatar::create('Deleted user')->toBase64() }}" width="96" height="96"
                                class="rounded-circle me-3" alt="Guest avatar" data-aos="fade" loading="lazy">
                        @endif
                    @endif
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
                                @php
                                    $agent = $reply->agent;
                                    $avatar = optional($agent)->avatar;
                                @endphp
                                @if ($avatar)
                                    @if (Str::startsWith($avatar, ['http://', 'https://']))
                                        <img src="{{ $avatar }}" width="40" height="40"
                                            class="rounded-circle me-3" alt="User avatar">
                                    @else
                                        <img src="{{ asset('storage/' . $avatar) }}" width="40" height="40"
                                            class="rounded-circle me-3" alt="User avatar">
                                    @endif
                                @elseif ($agent)
                                    {{-- Laravolt fallback if user exists but no avatar --}}
                                    <img src="{{ Avatar::create($agent->name)->toBase64() }}" width="40" height="40"
                                        class="rounded-circle me-3" alt="Reviewer avatar" data-aos="fade" loading="lazy">
                                @else
                                    {{-- Guest reviewer fallback --}}
                                    @if ($agent && $agent->deleted_at === null)
                                        <img src="{{ Avatar::create($agent->name)->toBase64() }}" width="40"
                                            height="40" class="rounded-circle me-3" alt="Guest avatar" data-aos="fade"
                                            loading="lazy">
                                    @else
                                        <img src="{{ Avatar::create('Deleted Agent')->toBase64() }}" width="40"
                                            height="40" class="rounded-circle me-3" alt="Guest avatar" data-aos="fade"
                                            loading="lazy">
                                    @endif
                                @endif
                                <div>
                                    @if ($agent && $agent->deleted_at === null)
                                        <strong class="text-dark">{{ $reply->agent->name }}</strong>
                                    @else
                                        <strong class="text-dark">Deleted Agent</strong>
                                    @endif
                                    
                                    <div class="text-muted">Support Agent</div>
                                </div>
                            @else
                                @php
                                    $user = $ticket->user;
                                    $avatar = optional($user)->avatar;
                                @endphp
                                @if ($avatar)
                                    @if (Str::startsWith($avatar, ['http://', 'https://']))
                                        <img src="{{ $avatar }}" width="40" height="40"
                                            class="rounded-circle me-3" alt="User avatar">
                                    @else
                                        <img src="{{ asset('storage/' . $avatar) }}" width="40" height="40"
                                            class="rounded-circle me-3" alt="User avatar">
                                    @endif
                                @elseif ($user)
                                    {{-- Laravolt fallback if user exists but no avatar --}}
                                    <img src="{{ Avatar::create($user->name)->toBase64() }}" width="96"
                                        height="96" class="rounded-circle me-3" alt="Reviewer avatar" data-aos="fade"
                                        loading="lazy">
                                @else
                                    {{-- Guest reviewer fallback --}}
                                    @if ($user && $user->deleted_at === null)
                                        <img src="{{ Avatar::create($user->name)->toBase64() }}" width="96"
                                            height="96" class="rounded-circle me-3" alt="Guest avatar"
                                            data-aos="fade" loading="lazy">
                                    @else
                                        <img src="{{ Avatar::create('Deleted user')->toBase64() }}" width="96"
                                            height="96" class="rounded-circle me-3" alt="Guest avatar"
                                            data-aos="fade" loading="lazy">
                                    @endif
                                @endif
                                <div>
                                    <strong class="text-dark">{{ $reply->user->name }}</strong>
                                    <div class="text-muted">Customer</div>
                                </div>
                            @endif
                            <div class="ms-auto text-muted">
                                <i class="fas fa-clock me-1"></i> {{ $reply->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <p class="text-dark">{{ $reply->message }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-warning">
                <i class="fas fa-comment-slash me-2"></i>No replies yet.
            </div>
        @endif

        <!-- Reply Form -->
        <form action="{{ route('support_stuff.tickets.replyToTicket', $ticket->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="card">
                <div class="card-header bg-primary">
                    <strong><i class="bi bi-reply me-2"></i>Reply to Ticket</strong>
                </div>
                <div class="card-body bg-light text-dark">
                    <div class="mb-3">
                        <label for="reply" class="form-label">Your message:</label>
                        <textarea name="message" id="reply" rows="4" class="form-control"
                            placeholder="Type your response here..." required></textarea>
                    </div>
                </div>
                <div class="card-footer text-end bg-white">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-send me-1"></i>Send Reply
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
