<div class="sidebar" data-background-color="dark">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-warning">
                <li class="nav-item @yield('dashboard')">
                    <a href="/dashboard" class="collapsed">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">KALENDER</h4>
                </li>

                <li class="nav-item @yield('kalender')">
                    <a href="/kalender">
                        <i class="fas fa-calendar"></i>
                        <p>Kalender</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">MASTER</h4>
                </li>
                <li class="nav-item @yield('post')">
                    <a href="/post">
                        <i class="fas fa-book"></i>
                        <!-- <i class="far fa-file-excel"></i> -->
                        <p>POST Test</p>
                    </a>
                </li>
                <li class="nav-item @yield('pre')">
                    <a href="/pre">
                        <i class="fas fa-file-contract"></i>
                        <p>PRE Test</p>
                    </a>
                </li>
                @if (Auth::check())
                    @if (Auth::user()->rule == "admin")
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Management</h4>
                    </li>
                    <li class="nav-item @yield('kategori')">
                        <a href="/kategori">
                            <i class="fas fa-th-list"></i>
                            <p>Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item @yield('data')">
                        <a href="/data">
                            <i class="fas fa-database"></i>
                            <p>Data</p>
                        </a>
                    </li>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">admin</h4>
                    </li>
                    <li class="nav-item @yield('user')">
                        <a href="/user">
                            <i class="fas fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>
