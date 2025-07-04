@extends('front.master')
@section('content')
    @php use Illuminate\Support\Str; @endphp
    <div class="container pt-5 my-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="profile-card bg-dark">
                    <div class="profile-header"></div>
                    <div class="profile-body text-center px-4 position-relative">

                        <!-- User Avatar - using the 'avatar' field from database -->
                        @php
                            $avatar = Auth::user()->avatar;
                        @endphp
                        @if ($avatar !== null)
                            @if (Str::startsWith($avatar, ['http://', 'https://']))
                                <img src="{{ $avatar }}" alt="Profile" class="profile-img mb-3">
                            @else
                                <img src="{{ asset('storage/' . $avatar) }}" alt="Profile" class="profile-img mb-3">
                            @endif
                        @else
                            <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" alt="Profile"
                                class="profile-img mb-3">
                        @endif

                        <!-- User Name - using the 'name' field from database -->
                        <h3 class="mb-1">{{ Auth::user()->name }}</h3>

                        <!-- Email and verification status - using 'email' and 'email_verified_at' fields -->
                        <p class="text-light mb-2">
                            {{ Auth::user()->email }}
                            @if (Auth::user()->email_verified_at)
                                <span class="text-success ms-2" title="Verified">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                    </svg>
                                </span>
                            @else
                                <span class="text-warning ms-2" title="Not Verified">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                    </svg>
                                </span>
                            @endif
                        </p>

                        <!-- Authentication method - using 'provider_name' field -->
                        @if (Auth::user()->provider_name)
                            <p class="mb-3">
                                <span class="auth-method">
                                    {{ ucfirst(Auth::user()->provider_name) }} Login
                                </span>
                            </p>
                        @endif

                        <!-- Account creation date - using 'created_at' field -->
                        <p class="text-light mb-4">
                            Member since {{ Auth::user()->created_at->format('M Y') }}
                        </p>

                        <div class="row profile-stats">
                            <div class="col-6 stat-item">
                                <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit
                                    Profile</button>
                            </div>
                            <div class="col-6 stat-item">
                                <button class="btn-edit text-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteProfileModal">Delete Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('front.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('Patch')
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ Auth::user()->email }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="avatar" class="form-label">Profile photo</label>
                        <input class="form-control" type="file" id="avatar" name="avatar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Update profile</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="deleteProfileModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">

        <form action="{{ route('front.profile.destroy') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('delete')
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Profile</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <P>Are you sure you want to delete your Account!</P>
                    </div>
                    @if (Auth::user()->provider_id === null)
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete profile</button>
                </div>
            </div>
        </form>

    </div>
</div>
