<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Dashboard') | Inventory Pro</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    @notifyCss

    <style>
        :root {
            --navy: #101d35;
            --navy-light: #1a2b49;
            --teal: #16b8b0;
            --teal-dark: #087f91;
            --background: #f3f6fb;
            --text: #17243b;
            --muted: #8995a8;
            --sidebar-width: 255px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--background);
            color: var(--text);
        }

        a {
            text-decoration: none !important;
        }

        #wrapper {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: var(--navy);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 1000;
            padding: 25px 17px;
            transition: .3s;
            overflow-y: auto;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 5px 12px 30px;
            color: white;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            background: var(--teal);
            color: #092a36;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
        }

        .brand-name {
            font-size: 16px;
            font-weight: 800;
            letter-spacing: .5px;
        }

        .brand-name span {
            color: var(--teal);
        }

        .sidebar-label {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 2px;
            color: #687c9a;
            padding: 18px 13px 12px;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 7px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 14px 15px;
            border-radius: 11px;
            color: #aab8cc;
            font-size: 12px;
            font-weight: 600;
            transition: .25s;
        }

        .sidebar-menu a i {
            width: 19px;
            text-align: center;
            font-size: 15px;
        }

        .sidebar-menu a:hover {
            background: var(--navy-light);
            color: white;
        }

        .sidebar-menu li.active a {
            background: linear-gradient(110deg, #087f91, #16b8b0);
            color: white;
            box-shadow: 0 7px 20px rgba(22,184,176,.18);
        }

        .sidebar-bottom {
            margin-top: 35px;
            padding: 18px;
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.06);
            border-radius: 13px;
        }

        .sidebar-bottom p {
            color: #9cabc0;
            font-size: 10px;
            line-height: 1.8;
            margin: 0;
        }

        .sidebar-bottom strong {
            color: #43d4c9;
        }

        /* MAIN CONTENT */

        #content-wrapper {
            margin-left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: .3s;
        }

        #content {
            flex: 1;
        }

        /* TOPBAR */

        .topbar {
            height: 82px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
            border-bottom: 1px solid #edf0f5;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .toggle-sidebar {
            border: none;
            background: #f1f5f9;
            color: #334155;
            width: 39px;
            height: 39px;
            border-radius: 10px;
            cursor: pointer;
        }

        .topbar-title {
            font-size: 13px;
            font-weight: 700;
            color: #263650;
        }

        .topbar-subtitle {
            font-size: 10px;
            color: var(--muted);
            margin-top: 4px;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 9px 13px;
            background: #f7f9fc;
            border-radius: 12px;
        }

        .admin-avatar {
            width: 37px;
            height: 37px;
            background: #d9f5f2;
            color: #087f91;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
        }

        .admin-info strong {
            display: block;
            font-size: 11px;
            color: #263650;
        }

        .admin-info span {
            font-size: 9px;
            color: var(--muted);
        }

        /* PAGE CONTENT */

        .page-content {
            padding: 32px 35px;
        }

        .page-footer {
            padding: 20px;
            text-align: center;
            font-size: 10px;
            color: #9aa5b5;
            border-top: 1px solid #e9edf3;
            background: white;
        }

        /* SIDEBAR COLLAPSE */

        body.sidebar-collapsed .sidebar {
            transform: translateX(-100%);
        }

        body.sidebar-collapsed #content-wrapper {
            margin-left: 0;
            width: 100%;
        }

        /* MOBILE */

        @media(max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                box-shadow: 10px 0 30px rgba(0,0,0,.15);
            }

            body.mobile-sidebar-open .sidebar {
                transform: translateX(0);
            }

            #content-wrapper {
                margin-left: 0;
                width: 100%;
            }

            .topbar {
                padding: 0 17px;
                height: 70px;
            }

            .page-content {
                padding: 22px 16px;
            }

            .admin-info {
                display: none;
            }
        }

        /* SCROLLBAR */

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #344763;
            border-radius: 10px;
        }
    </style>

    @stack('styles')
</head>

<body>

<div id="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <a href="{{ url('/admin') }}" class="sidebar-brand">
            <div class="brand-icon">
                <i class="fas fa-boxes"></i>
            </div>

            <div class="brand-name">
                INVENTORY<span>.</span>
            </div>
        </a>

        <div class="sidebar-label">MENU UTAMA</div>

        <ul class="sidebar-menu">

            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <a href="{{ url('/admin') }}">
                    <i class="fas fa-th-large"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->is('admin/barang*') ? 'active' : '' }}">
                <a href="{{ url('/admin/barang') }}">
                    <i class="fas fa-box-open"></i>
                    <span>Data Barang</span>
                </a>
            </li>

            <li class="{{ request()->is('admin/laporan*') ? 'active' : '' }}">
                <a href="{{ url('/admin/laporan') }}">
                    <i class="fas fa-file-alt"></i>
                    <span>Laporan</span>
                </a>
            </li>

        </ul>

        <div class="sidebar-label">INFORMASI</div>

        <div class="sidebar-bottom">
            <p>
                <strong>INVENTORY PRO</strong><br>
                Sistem manajemen inventaris modern untuk pengelolaan barang yang lebih efisien.
            </p>
        </div>

    </aside>


    <!-- CONTENT WRAPPER -->
    <div id="content-wrapper">

        <div id="content">

            <!-- TOPBAR -->
            <nav class="topbar">

                <div class="topbar-left">

                    <button class="toggle-sidebar" id="sidebarToggle" type="button">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div>
                        <div class="topbar-title">
                            Inventory Management
                        </div>

                        <div class="topbar-subtitle">
                            Sistem Informasi Inventaris
                        </div>
                    </div>

                </div>

                <div class="admin-profile">

                    <div class="admin-avatar">
                        <i class="fas fa-user-shield"></i>
                    </div>

                    <div class="admin-info">
                        <strong>Administrator</strong>
                        <span>System Admin</span>
                    </div>

                </div>

            </nav>


            <!-- MAIN PAGE -->
            <main class="page-content">

                @yield('content')

            </main>

        </div>


        <!-- FOOTER -->
        <footer class="page-footer">
            © {{ date('Y') }} Inventory Pro. All Rights Reserved.
        </footer>

    </div>

</div>


<!-- JAVASCRIPT -->
<script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>

<script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<script>
    document.getElementById('sidebarToggle').addEventListener('click', function () {

        if (window.innerWidth <= 768) {
            document.body.classList.toggle('mobile-sidebar-open');
        } else {
            document.body.classList.toggle('sidebar-collapsed');
        }

    });

    document.addEventListener('click', function(event) {

        if (window.innerWidth <= 768) {

            const sidebar = document.querySelector('.sidebar');
            const toggle = document.getElementById('sidebarToggle');

            if (
                document.body.classList.contains('mobile-sidebar-open') &&
                !sidebar.contains(event.target) &&
                !toggle.contains(event.target)
            ) {
                document.body.classList.remove('mobile-sidebar-open');
            }
        }

    });
</script>

@notifyJs

@stack('scripts')

</body>
</html>