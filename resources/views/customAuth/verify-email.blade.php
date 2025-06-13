@extends('customAuth.master')
@section('title', 'Verify your email')
@section('content')
    <main class="mb-auto col-12">
        <h1>Thanks for signing up!</h1>
        <br>
        <p>Before getting started, could you verify your email address by clicking on the link we just emailed to you? If
            you didn't receive the email, we will gladly send you another.</p>
        @if (session('status') == 'verification-link-sent')
            <p>A new verification link has been sent to the email address you provided during registration.</p>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-white btn-xl mb-4">Submit</button>
                </div>
            </div>
        </form>

    </main>
@endsection
