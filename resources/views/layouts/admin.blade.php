<html lang="zh-TW">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Snoopy 後台管理</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif+TC:wght@400;600&family=Lato:wght@300;400;700&display=swap"
        rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
    :root {
        --cream: #fdf6ee;
        --warm-brown: #7a5c44;
        --dark-brown: #3e2c1e;
        --light-brown: #c9a882;
        --accent: #d4886a;
        --border: #e8d8c8;
    }

    body {
        font-family: 'Lato', sans-serif;
        background-color: #f5f0eb;
    }

    /* ── Sidebar ── */
    .sidebar {
        background: linear-gradient(180deg, var(--dark-brown) 0%, #2a1d12 100%) !important;
    }

    .sidebar .sidebar-brand {
        background: rgba(0, 0, 0, 0.15);
        padding: 20px;
    }

    .sidebar-brand-text {
        font-family: 'Noto Serif TC', serif;
        font-size: 16px;
        letter-spacing: 2px;
        color: #f0e4d4 !important;
    }

    .sidebar .nav-item .nav-link {
        color: #c9a882 !important;
        font-size: 13px;
        letter-spacing: 1px;
        padding: 12px 16px;
        transition: all 0.2s;
    }

    .sidebar .nav-item .nav-link:hover,
    .sidebar .nav-item.active .nav-link {
        color: #fff !important;
        background: rgba(212, 136, 106, 0.2);
        border-left: 3px solid var(--accent);
    }

    .sidebar .nav-item .nav-link i {
        color: var(--accent) !important;
    }

    /* ── Topbar ── */
    .topbar {
        background-color: #fff !important;
        border-bottom: 1px solid var(--border);
        box-shadow: 0 2px 12px rgba(62, 44, 30, 0.06) !important;
    }

    .topbar input.form-control {
        background: #fdf6ee;
        border-color: var(--border);
        border-radius: 20px;
        font-size: 13px;
    }

    .topbar .btn-primary {
        background-color: var(--warm-brown);
        border: none;
        border-radius: 0 20px 20px 0;
    }

    .topbar .btn-primary:hover {
        background-color: var(--accent);
    }

    /* ── 回到首頁 ── */
    .btn-back-front {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        border: 1.5px solid var(--border);
        border-radius: 20px;
        background: var(--cream);
        color: var(--warm-brown);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
        padding: 6px 16px;
        text-decoration: none;
        transition: background-color 0.2s, border-color 0.2s, color 0.2s;
        white-space: nowrap;
    }

    .btn-back-front:hover {
        background-color: var(--warm-brown);
        border-color: var(--warm-brown);
        color: #fff;
        text-decoration: none;
    }

    .btn-back-front i {
        font-size: 11px;
    }

    .img-profile {
        width: 36px;
        height: 36px;
        object-fit: cover;
        border: 2px solid var(--border);
    }

    .dropdown-menu {
        border: 1px solid var(--border);
        border-radius: 10px;
        box-shadow: 0 8px 24px rgba(62, 44, 30, 0.12);
    }

    .dropdown-item:hover {
        background-color: var(--cream);
        color: var(--accent);
    }

    #content-wrapper {
        background-color: #f5f0eb;
    }

    .container-fluid {
        padding: 28px;
    }

    .sticky-footer {
        background-color: #fff !important;
        border-top: 1px solid var(--border);
    }

    .sticky-footer .copyright {
        font-size: 12px;
        color: var(--light-brown);
        letter-spacing: 1px;
    }

    .scroll-to-top {
        background-color: var(--accent) !important;
    }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.index') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img class="img-profile rounded-circle" src="{{ asset('image/head.png') }}"
                        style="width:40px;height:40px;object-fit:cover;">
                </div>
                <div class="sidebar-brand-text mx-3">Snoopy 後台</div>
            </a>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fa-fw fa-box"></i>
                    <span>商品管理</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>會員資料管理</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <ul class="navbar-nav ml-auto align-items-center">

                        <!-- ★ 回到首頁 按鈕 -->
                        <li class="nav-item mr-3">
                            <a href="{{ route('home') }}" class="btn-back-front">
                                <i class="fas fa-store"></i> 回到首頁
                            </a>
                        </li>

                        <!-- 管理員 dropdown -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">管理員</span>
                                <img class="img-profile rounded-circle" src="{{ asset('image/head.png') }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> 登出
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>
                </nav>

                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>© 2026 Snoopy Official Store · Admin Panel</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>