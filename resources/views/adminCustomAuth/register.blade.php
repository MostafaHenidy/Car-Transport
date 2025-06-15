@extends('adminCustomAuth.master')
@section('title', 'Register new account')
@section('content')
    <main class="mb-auto col-12">
        <h1>Register a new account</h1>

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf
            <div class="col-12">
                <div class="mb-3">
                    {{-- Name --}}
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control form-control-lg bg-gray-800 border-dark" id="name"
                        aria-describedby="emailHelp" name="name"required autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                {{-- Email --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control form-control-lg bg-gray-800 border-dark" id="email"
                        aria-describedby="emailHelp" name="email" :value="old('email')" required autocomplete="username">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                {{-- Password --}}
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" required autocomplete="new-password"
                        class="form-control form-control-lg bg-gray-800 border-dark" id="exampleInputPassword1">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                {{-- Password Confirmation --}}
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" required autocomplete="new-password"
                        class="form-control form-control-lg bg-gray-800 border-dark" id="exampleInputPassword1">
                </div>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-white btn-xl mb-4">Submit</button>
                    <a id="loginLink" href="{{ route('admin.login') }}" class="form-text ms-5 mb-4">Already have
                        an account ?</a>
                </div>
            </div>
        </form>

    </main>
@endsection
