<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion position-fixed" id="accordionSidebar" style="width: 250px; height: 100vh;">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('guru.index') }}">
            <div class="sidebar-brand-icon">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="width: 50px;">
            </div>
            <div class="sidebar-brand-text mx-3">Penggajian Guru</div>
        </a>

        <hr class="sidebar-divider my-0">

        @if(auth()->user()->role == 'admin')
            <!-- Data Guru -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('guru.index') }}">
                    <i class="fas fa-user-tie"></i>
                    <span>Data Guru</span>
                </a>
            </li>

            <!-- Jam Mengajar -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('jam-mengajar.index') }}">
                    <i class="fas fa-clock"></i>
                    <span>Jam Mengajar</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">
                    <i class="fas fa-user"></i>
                    <span>User</span>
                </a>
            </li>

            <!-- Data Absen -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('absen.index') }}">
                    <i class="fas fa-calendar-alt"></i>
                    <span>Data Absen</span>
                </a>
            </li>
        @endif

        <!-- Gaji (Admin dan Guru bisa akses) -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gaji.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Gaji</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Tombol Logout -->
        <li class="nav-item">
            <a href="#" class="nav-link text-white" onclick="confirmLogout(event)">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>

    <!-- Page Content Wrapper -->
    <div id="page-content-wrapper" class="flex-grow-1">
        <!-- Main Content -->
        <div class="container-fluid">
            <!-- Konten lainnya di sini -->
        </div>
    </div>
</div>
