@extends('customAuth.master')
@section('title', 'Forgot your password')
@section('content')
    <main class="mb-auto col-12">
        <h3>Forgot your password? </h3>
        <br>
        <p>No problem. Just let us know your email address and we will email you
            a password reset link that will allow you to choose a new one.</p>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="col-12">
                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control form-control-lg bg-gray-800 border-dark" id="email"
                        aria-describedby="emailHelp" name="email" :value="old('email')" required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="d-flex align-items-center mt-3">
                    <button type="submit" class="btn btn-white btn-xl mb-4">Submit</button>
                    <a id="registerLink" href="{{ route('register') }}" class="form-text ms-5 mb-4">Don't
                        have an account ?</a>
                </div>
            </div>
        </form>

    </main>
@endsection
