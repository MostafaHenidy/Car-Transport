@extends('back.master')
@section('trips-active', 'active')
@section('content')
    <div class="container mt-5">
        <h3>Support Ticket from {{ $ticket->user->name }}</h3>

        {{-- Main Ticket --}}
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">
                <strong>Subject:</strong> {{ ucwords(str_replace('_', ' ', $ticket->subject)) }}
            </div>
            <div class="card-body">
                <p>{{ $ticket->message }}</p>
                <small class="text-muted">Created at: {{ $ticket->created_at->diffForHumans() }}</small>
            </div>
        </div>

        {{-- Replies --}}
        <h5>Replies</h5>
        @if ($ticket->reply)
            @php
                $admin = App\models\Admin::findOrFail($ticket->admin_id);
            @endphp
            <div class="card mb-3 {{ $ticket->admin_id ? 'bg-light' : '' }}">
                <div class="card-body">
                    <strong>{{ $ticket->admin_id ? $admin->name : $reply->user->name }}:</strong>
                    <p>{{ $ticket->reply }}</p>
                </div>
            </div>
        @else
            <p>No replies yet.</p>
        @endif

        {{-- Reply Form --}}
        <form action="{{ route('admin.tickets.reply', $ticket->id) }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="reply" class="form-label">Reply:</label>
                <textarea name="reply" id="reply" rows="4" class="form-control" required></textarea>
            </div>
            <button class="btn btn-secondary float-end" type="submit">Send Reply</button>
        </form>
    </div>
@endsection
