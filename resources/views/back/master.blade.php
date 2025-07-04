<!DOCTYPE html>
<html lang="en">
@include('back.partials.head')

<body>

    <div id="layoutWrapper">
        <!-- Sidebar -->
        @include('back.partials.sidebar')

        <!-- Toggle Button -->
        <button id="toggleSidebar" class="btn btn-sm btn-outline-light toggle-btn">
            <i class="bi bi-chevron-left"></i>
        </button>

        <!-- Main Content -->
        <div id="mainContent">
            @yield('content')
        </div>
    </div>

    @include('back.partials.scripts')
</body>

</html>
