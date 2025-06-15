@extends('front.master')
@section('content')
    <div class="container px-vw-5 py-vh-5">
        <h3>Your Support Tickets</h3>
        @if ($tickets)
            @foreach ($tickets as $ticket)
                <div class="card mb-3">
                    <div class="card-header bg-dark text-white">
                        <strong>{{ ucwords(str_replace('_', ' ', $ticket->subject)) }}</strong>
                        @php
                            $badgeColor = match ($ticket->status) {
                                'open' => 'primary',
                                'answered' => 'success',
                                'closed' => 'secondary',
                            };
                        @endphp
                        <span class="badge bg-{{ $badgeColor }} float-end">{{ ucfirst($ticket->status) }}</span>
                    </div>
                    <div class="card-body">
                        <p><Strong class="me-2">{{ Auth::user()->name }} :</Strong>{{ Str::limit($ticket->message, 100) }}
                        </p>
                        @if ($ticket->reply)
                            @php
                                $admin = App\models\Admin::findOrFail($ticket->admin_id);
                            @endphp
                            <p><Strong class="me-2">{{ $admin->name }} :</Strong>{{ Str::limit($ticket->reply, 100) }}</p>
                        @else
                            <p>Waiting for admin answer.</p>
                        @endif
                    </div>
                </div>
            @endforeach
        @else
            <p>You have not submitted any tickets yet.</p>
        @endif
    </div>
@endsection
