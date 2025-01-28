<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Penggajian Guru</title>
    
    <!-- CDN Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CDN FontAwesome (jika masih diperlukan) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <!-- Page Wrapper -->
    <div id="wrapper" class="d-flex flex-column" style="min-height: 100vh;">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion position-fixed" id="accordionSidebar" style="width: 250px; height: 100vh; overflow-y: auto;">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('guru.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-school"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Penggajian Guru</div>
        </a>

        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('guru.index') }}">
                <i class="fas fa-user-tie"></i>
                <span>Data Guru</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('jam-mengajar.index') }}">
                <i class="fas fa-clock"></i>
                <span>Jam Mengajar</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('absen.index') }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Data Absen</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('gaji.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Gaji</span>
            </a>
        </li>

        <hr class="sidebar-divider">
    </ul>

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
    <footer class="sticky-footer bg-white mt-auto">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Penggajian Guru {{ date('Y') }}</span>
            </div>
        </div>
    </footer>
</div>



    <!-- CDN Bootstrap JS and other scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Optional JS for jQuery and other features -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery.easing@1.4.1/jquery.easing.min.js"></script>

    @stack('scripts')
</body>
</html>
