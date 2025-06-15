<!DOCTYPE html>
<html lang="en">
@include('back.partials.head')

<body>

    <div class="d-flex">
        <!-- Sidebar -->
        @include('back.partials.sidebar')
        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            @yield('content')
        </div>
    </div>
    @include('back.partials.scripts')
</body>

</html>
