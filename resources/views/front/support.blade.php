@extends('front.master')
@section('content')
    @if (session('status') === 'ticketSubmitted')
        <!-- Success message remains the same -->
    @elseif ($tickets->where('status', 'open')->isNotEmpty())
        <!-- Open ticket message remains the same -->
    @else
        <div class="container px-vw-5 py-vh-5">
            <!-- Progress Bar and Heading Wrapper -->
            <div class="text-center mb-5 mt-2">
                <div class="progress mx-auto" style="width: 60%;">
                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated text-light"
                        role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                        style="width: 0%; background-color: #6c757d;">
                        <span id="progressText">Start</span>
                    </div>
                </div>
                <h1 class="text-light mt-4">Hi {{ Auth::user()->name }}, what do you need help with?</h1>
            </div>

            <!-- Ticket Form -->
            <div class="d-flex justify-content-center align-items-center">
                <form action="{{ route('front.ticket.store') }}" method="POST" class="w-100" style="max-width: 600px;"
                    id="ticketForm">
                    @csrf
                    <div class="mb-3">
                        <label for="subject" class="form-label text-light">Select A Category</label>
                        <select name="subject" id="subject"
                            class="form-control form-control-lg bg-gray-800 border-dark text-secondary" required>
                            <option value="" disabled selected>Select a category</option>
                            <option value="booking_issue">❗ Problem with Booking</option>
                            <option value="vehicle_request">🚗 Request a Specific Vehicle</option>
                            <option value="driver_issue">🧑 Issue with Driver</option>
                            <option value="payment_problem">💳 Payment/Billing Problem</option>
                            <option value="cancel_ride">❌ Cancel or Reschedule a Ride</option>
                            <option value="lost_item">👜 Lost Item in Vehicle</option>
                            <option value="general_inquiry">❓ General Inquiry</option>
                            <option value="suggestion_feedback">💬 Suggestion / Feedback</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label text-light">Explain the problem</label>
                        <textarea name="message" id="message" class="form-control" style="height: 100px" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('front.ticket.myTickets') }}" class="btn btn-outline-light btn-xl rounded-pill">My
                            tickets</a>
                        <button type="submit" class="btn btn-light btn-xl rounded-pill">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
