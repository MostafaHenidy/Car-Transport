<nav id="navScroll" class="navbar navbar-expand-lg navbar-dark bg-black fixed-top px-vw-5 mb-4" tabindex="0">
    <div class="container">
        <!-- Brand -->
        @include('front.partials.logo')
        <!-- Toggler (hamburger) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarRightContent"
            aria-controls="navbarRightContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarRightContent">
            <div class="d-flex align-items-center gap-2 flex-column flex-lg-row mt-3 mt-lg-0">
                <!-- Notification Button -->
                <button id="notificationsIcon" type="button" class="btn bg-transparent text-light position-relative"
                    data-bs-toggle="modal" data-bs-target="#modalScrollable">
                    <span class="position-relative">
                        @if (Auth::check() && Auth::user()->unreadNotifications->count() > 0)
                            <i class="bi bi-bell-fill"></i>
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-secondary"
                                style="font-size: 0.6rem;">
                                {{ Auth::user()->unreadNotifications->count() }}
                            </span>
                        @else
                            <i class="bi bi-bell"></i>
                        @endif
                    </span>
                </button>

                <!-- Cart Button -->
                <a class="btn btn-dark" href="{{ route('front.cart.index') }}" aria-label="Cart">
                    Cart ({{ $cart ? count($cart->trips) : 0 }})
                </a>

                <!-- Language Selector -->
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

                <!-- Login/Logout -->
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
    </div>
</nav>
