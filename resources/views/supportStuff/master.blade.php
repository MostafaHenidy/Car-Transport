<!DOCTYPE html>
<html lang="en">
@include('supportStuff.partials.head')

<body>

    <div id="layoutWrapper">
        <!-- Sidebar -->
        @include('supportStuff.partials.sidebar')

        <!-- Toggle Button -->
        <button id="toggleSidebar" class="btn btn-sm btn-outline-light toggle-btn">
            <i class="bi bi-chevron-left"></i>
        </button>

        <!-- Main Content -->
        <div id="mainContent">
            @yield('content')
        </div>
    </div>

    @include('supportStuff.partials.scripts')
</body>

</html>
