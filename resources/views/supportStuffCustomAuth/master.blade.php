<!doctype html>
<html class="h-100" lang="en">
@include('admincustomAuth.partials.authHead')


<body class="d-flex h-100 w-100 bg-black text-white" data-bs-spy="scroll" data-bs-target="#navScroll">

    <div class="h-100 container-fluid">
        <div class="h-100 row d-flex align-items-stretch">

            <div class="col-12 col-md-7 col-lg-6 col-xl-5 d-flex align-items-start flex-column px-vw-5">

                @include('adminCustomAuth.partials.authHeader')
                @yield('content')
            </div>
            <div class="col-12 col-md-5 col-lg-6 col-xl-7 gradient"></div>
        </div>
    </div>
</body>

</html>
