<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Barangay Administration Dashboard')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- SB Admin 2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/startbootstrap-sb-admin-2@4.1.3/css/sb-admin-2.min.css" rel="stylesheet">
    
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --primary: #5585ec;
            --primary-dark: #2655d5;
            --success: #059669;
            --warning: #d97706;
            --danger: #dc2626;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-600: #4b5563;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }

        body {
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #8ec0f3 0%, #376aac 100%);
            font-family: 'Segoe UI', 'Instrument Sans', sans-serif;
        }

        #wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        /* --- LOGO HEADER --- */
        .sidebar-header {
            padding: 20px 20px 15px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.2);
            text-align: center;
        }

        .sidebar-logo {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(255,255,255,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-size: 1.5rem;
            color: white;
            border: 2px solid rgba(255,255,255,0.3);
        }

        .sidebar-title {
            color: white;
            font-size: 1rem;
            font-weight: 600;
            margin: 0;
            opacity: 0.95;
        }

        /* --- SIDEBAR STYLES --- */
        .sidebar {
            position: fixed;
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary) 0%, var(--primary-dark) 100%);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            padding-top: 0;
            transition: all 0.3s ease;
            box-shadow: 4px 0 20px rgba(37, 99, 235, 0.3);
        }

        .sidebar .nav-item {
            width: 100%;
            margin-bottom: 4px;
            margin-top: 4px;
        }

        .sidebar .nav-item .nav-link {
            color: rgba(255,255,255,0.85);
            padding: 14px 20px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            width: 100%;
            height: 56px;
            border-radius: 12px;
            margin: 0 12px;
            position: relative;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .sidebar .nav-item .nav-link i {
            font-size: 1.3rem;
            margin-right: 16px;
            width: 28px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar .nav-item .nav-link span {
            display: inline;
            font-size: 0.95rem;
        }

        /* Hover Effect */
        .sidebar .nav-item .nav-link:hover {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
            transform: translateX(4px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }

        /* Active State */
        .sidebar .nav-item .nav-link.active {
            background: rgba(255,255,255,0.25);
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            border: 1px solid rgba(255,255,255,0.3);
        }

        .sidebar .nav-item .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: #ffffff;
            border-radius: 2px;
        }

        .sidebar-divider {
            width: 80%;
            margin: 25px auto;
            border: 0;
            border-top: 1px solid rgba(255,255,255,0.15);
        }

        /* --- TOPBAR --- */
        .topbar {
            position: fixed;
            top: 0;
            left: 220px;
            right: 0;
            height: 70px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(20px);
            color: var(--gray-800);
            padding: 0 2rem;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            z-index: 100;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        .topbar .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            color: var(--primary);
            display: flex;
            align-items: center;
        }

        .topbar .navbar-brand i {
            font-size: 1.6rem;
            margin-right: 8px;
            color: var(--primary);
        }

        .topbar .user-info {
            display: flex;
            align-items: center;
            padding: 8px 16px;
            background: var(--gray-50);
            border-radius: 12px;
            border: 1px solid var(--gray-200);
            margin-left: auto;
        }

        .topbar .user-name {
            font-weight: 600;
            font-size: 0.95rem;
            color: var(--gray-800);
            margin-right: 12px;
            white-space: nowrap;
        }

        .topbar .img-profile {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            border: 3px solid var(--primary);
            box-shadow: 0 2px 8px rgba(37,99,235,0.3);
        }

        /* --- CONTENT WRAPPER --- */
        #content-wrapper {
            margin-left: 180px;
            display: flex;
            flex-direction: column;
            flex: 1;
            width: calc(100% - 260px);
            min-height: 100vh;
            padding-top: 70px;
            transition: all 0.3s ease;
        }

        #content {
            padding: 0;
            flex: 1;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        #content .container-fluid {
            padding: 2rem;
            flex: 1;
        }

        /* Cards */
        .card {
            background: #ffffff;
            border-radius: 16px;
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 30px rgba(0,0,0,0.12);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                left: -260px;
            }
            
            .sidebar.active {
                left: 0;
            }
            
            .topbar {
                left: 0;
            }
            
            #content-wrapper {
                margin-left: 0;
                width: 100%;
            }
        }

        @media (max-width: 768px) {
            .topbar {
                padding: 0 1rem;
            }
            
            #content .container-fluid {
                padding: 1.5rem 1rem;
            }
        }

        .mini-actions{
        display:flex;
        gap:8px;
        margin-left:10px;
        }

.mini-btn{
width:34px;
height:34px;
border-radius:8px;
border:1px solid #e5e7eb;
background:#fff;
display:flex;
align-items:center;
justify-content:center;
cursor:pointer;
}

.mini-btn:hover{
background:#f3f4f6;
}

.filter-row{
display:flex;
gap:10px;
align-items:center;
flex-wrap:wrap;
}

.filter-control{
border-radius:8px;
border:1px solid #e5e7eb;
font-size:14px;
}

.filter-control:focus{
box-shadow:none;
border-color:#6366f1;
}

.form-floating label{
font-size:13px;
color:#6b7280;
}
    </style>

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Logo Header -->
            <div class="sidebar-header">
                <!-- CHANGE THIS LOGO -->
                <div class="sidebar-logo">
                    <i class="fas fa-shield-alt"></i>
                   <!-- <img src="{{ asset('images/mdrrmo-logo.png') }}" alt="Logo"> -->
                </div>
                <h5 class="sidebar-title">Barangay Admin</h5>
            </div>

            <!-- Nav Items -->
            <li class="nav-item {{ request()->routeIs('barangay.dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('barangay.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('households.*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('households.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Households</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('barangay.evacuations') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('evacuation.list') }}">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Evacuations</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('barangay.reports') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('barangay.reports') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Reports</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Logout at Bottom -->
            <li class="nav-item mt-auto">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand topbar mb-4 static-top">
                    <div class="navbar-brand">
                        <i class="fas fa-building"></i>
                        Barangay Management
                    </div>
                    
                    <!-- User Info -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <div class="user-info">
                                <span class="user-name">{{ Auth::user()->name ?? 'Admin' }}</span>
                                <img class="img-profile rounded-circle" 
                                     src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'Admin' }}&background=2563eb&color=fff">
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>