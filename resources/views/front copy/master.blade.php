<!doctype html>
<html class="h-100" lang="en">
@include('front.partials.head')

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">
    @include('front.partials.nav')
    @yield('content')
    @include('front.partials.notificationModal')
    @include('front.partials.footer')
    <div class="sticky-bottom float-end">
        <a href="{{ route('front.ticket.index') }}" class="btn btn-outline-dark text-light rounded-circle mb-4 me-4">
            <i class="bi bi-headset fs-3"></i>
        </a>
    </div>
    @include('front.partials.scripts')
</body>

</html>
