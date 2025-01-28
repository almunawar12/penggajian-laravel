<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Penggajian Guru</title>
    
    {{-- sb admin --}}
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- CDN FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <!-- Page Wrapper -->
    <div id="wrapper" class="d-flex flex-column" style="min-height: 100vh;">

        <!-- Sidebar -->
        @include('layouts.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 250px; width: calc(100% - 250px);">
            
            <!-- Main Content -->
            <div id="content" class="flex-grow-1">
                @include('layouts.navbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- End Page Content -->
            </div>
        </div>

    <!-- Footer -->
    @include('layouts.footer')
</div>

    <!-- CDN jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- SB Admin --}}
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    {{-- import sweet alert --}}
    <script src="{{ asset('js/sweetalert.js') }}"></script>

    @stack('scripts')
</body>
</html>
