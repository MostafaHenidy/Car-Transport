<nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5 mb-4" tabindex="0">
    <div class="container">
        <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="{{ route('front.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stack"
                viewBox="0 0 16 16">
                <path
                    d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                <path
                    d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
            </svg>
            <span class="mt-1 fw-bolder ">Capodanno</span>
        </a>

        <div class="d-flex align-items-center gap-2 flex-wrap">

            <!-- Button trigger modal -->
            <button id="notificationsIcon" type="button" class="btn bg-transparent text-light" data-bs-toggle="modal"
                data-bs-target="#modalScrollable">
                @if (Auth::check() && Auth::user()->unreadNotifications->count() > 0)
                    <i class="bi bi-bell-fill"></i>
                    <small class="text-secondary">{{ Auth::user()->unreadNotifications->count() }}</small>
                @else
                    <i class="bi bi-bell"></i>
                @endif
            </button>
            {{-- Cart Button --}}
            <a class="btn btn-dark" href="{{ route('front.cart.index') }}" aria-label="Cart">
                Cart ({{ $cart ? count($cart->trips) : 0 }})
            </a>
            <div class="btn-group">
                <button type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-flag-fill"></i>
                </button>
                <ul class="dropdown-menu">
                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a class="dropdown-item me-2" hreflang="{{ $localeCode }}"
                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, route('front.index')) }}">
                                {{ strtoupper($localeCode) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            {{-- Login/Logout Button --}}
            @if (Route::has('login'))
                @auth
                    <form id="logoutForm" action="{{ url('/logout') }}" method="POST" class="m-0">
                        @csrf
                        <button class="btn btn-light" type="submit">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                @endauth
            @endif

        </div>
    </div>
</nav>
