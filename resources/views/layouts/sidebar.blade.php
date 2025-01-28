<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion position-fixed" id="accordionSidebar" style="width: 250px; height: 100vh;">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('guru.index') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-school"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Penggajian Guru</div>
        </a>

        <hr class="sidebar-divider my-0">

        <!-- Data Guru -->
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

        <!-- Data Absen -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('absen.index') }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Data Absen</span>
            </a>
        </li>

        <!-- Gaji -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('gaji.index') }}">
                <i class="fas fa-money-bill-wave"></i>
                <span>Gaji</span>
            </a>
        </li>

        <hr class="sidebar-divider">
    </ul>

    <!-- Page Content Wrapper -->
    <div id="page-content-wrapper" class="flex-grow-1">
        <!-- Main Content -->
        <div class="container-fluid">
            <!-- Konten lainnya di sini -->
        </div>
    </div>
</div>
