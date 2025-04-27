<!doctype html>
<html class="h-100" lang="en">
@include('front.partials.head')

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">
    @include('front.partials.nav')
    @yield('content')
    
    @include('front.partials.footer')

    @include('front.partials.scripts')
</body>

</html>
