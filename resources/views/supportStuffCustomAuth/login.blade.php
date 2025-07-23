@extends('supportStuffCustomAuth.master')
@section('title', 'Login your account')
@section('content')
    <main class="mb-auto col-12">
        <h1>Login to <br>your account</h1>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('support_stuff.login') }}">
            @csrf
            <div class="col-12">
                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control form-control-lg bg-gray-800 border-dark" id="email"
                        aria-describedby="emailHelp" name="email" :value="old('email')" required autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" required autocomplete="new-password"
                        class="form-control form-control-lg bg-gray-800 border-dark" id="exampleInputPassword1">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <div class="d-flex align-items-center mt-3">
                    <button type="submit" class="btn btn-white btn-xl mb-4">Submit</button>
                </div>
            </div>
        </form>

    </main>
@endsection
