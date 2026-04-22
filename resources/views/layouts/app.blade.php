<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Global Styles - EVAC_ADMIN LIGHTER CUSTOMIZED -->
    <style>
:root {
    /* LIGHTER EVAC_ADMIN Theme - Softer & More Subtle */
    --primary: #3b82f6;        /* Lighter Blue */
    --primary-light: #93c5fd;  /* Very light blue */
    --primary-dark: #2563eb;   /* Slightly darker blue */
    --secondary: #10b981;      /* Success Green */
    --success: #34d399;
    --warning: #f59e0b;
    --danger: #ef4444;
    --dark: #1e293b;
    --dark-light: #334155;
    --gray: #64748b;
    --gray-light: #94a3b8;
    --gray-lighter: #e2e8f0;
    --gray-lightest: #f8fafc;  /* Very light bg */
    --white: #ffffff;
    --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.08);
    --shadow-md: 0 10px 15px -3px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.08);
    --radius: 0.5rem;
    --radius-lg: 0.75rem;
    --radius-xl: 1rem;
    --transition: all 0.3s ease;
}
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: var(--gray-lightest);
            color: var(--dark);
        }

        .d-flex { display: flex; min-height: 100vh; }

        /* EVAC_ADMIN LIGHTER Top Bar */
        .top-bar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-lighter);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            box-shadow: var(--shadow);
        }
        .top-bar-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-md);
            border: 2px solid rgba(255,255,255,0.8);
        }
        .logo-icon svg { width: 24px; height: 24px; fill: white; }
        .logo-text {
            font-size: 1.25rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .logo-subtitle {
            font-size: 0.75rem;
            color: var(--gray);
            font-weight: 500;
        }

        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        .notification-btn {
            position: relative;
            width: 45px;
            height: 45px;
            background: rgba(59, 130, 246, 0.1);
            border: 2px solid rgba(59, 130, 246, 0.2);
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.1rem;
            cursor: pointer;
            transition: var(--transition);
        }
        .notification-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: var(--danger);
            color: white;
            border-radius: 50%;
            font-size: 0.7rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            cursor: pointer;
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-xl);
            background: rgba(59, 130, 246, 0.05);
            border: 2px solid rgba(59, 130, 246, 0.1);
            transition: var(--transition);
        }
        .user-profile:hover {
            background: rgba(59, 130, 246, 0.1);
            border-color: var(--primary);
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-light), var(--primary));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
        }
        .user-info h5 {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--dark);
        }
        .user-info p {
            margin: 0;
            font-size: 0.75rem;
            color: var(--gray);
        }
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 2rem;
            min-width: 220px;
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-lighter);
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: var(--transition);
            z-index: 1001;
        }
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .dropdown-item {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            color: var(--dark);
            text-decoration: none;
            transition: var(--transition);
            border-bottom: 1px solid var(--gray-lighter);
        }
        .dropdown-item:last-child { border-bottom: none; }
        .dropdown-item:hover {
            background: var(--gray-lightest);
            color: var(--primary);
        }

        /* EVAC_ADMIN Enhanced Sidebar - LIGHTER */
        .sidebar {
            width: 240px;
            background: linear-gradient(180deg, 
                #f8fafc 0%,     /* Very light top */
                #e2e8f0 30%,    /* Light gray */
                #dbeafe 70%,    /* Light blue */
                #bfdbfe 100%    /* Lighter blue bottom */
            );
            color: var(--dark);
            position: fixed;
            height: calc(100vh - 70px);
            top: 70px;
            left: 0;
            overflow-y: auto;
            z-index: 999;
            box-shadow: 4px 0 20px rgba(59, 130, 246, 0.08);
        }

        .sidebar-header { 
            padding: 2rem 1.5rem; 
            border-bottom: 1px solid var(--gray-lighter); 
            text-align: center;
            background: rgba(59, 130, 246, 0.05);
            position: relative;
        }
        .sidebar-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
        }
        .sidebar-logo { display: flex; align-items: center; justify-content: center; gap: 1rem; }
        .sidebar-logo-icon {
            width: 55px; height: 55px;
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            border-radius: var(--radius-xl);
            display: flex; align-items: center; justify-content: center;
            box-shadow: var(--shadow-md);
            border: 3px solid rgba(255,255,255,0.8);
        }
        .sidebar-logo-icon svg { width: 28px; height: 28px; fill: white; }
        .sidebar-logo-title { 
            font-size: 1.3rem; 
            font-weight: 800; 
            color: var(--dark); 
        }
        .sidebar-logo-subtitle { 
            font-size: 0.75rem; 
            color: var(--gray); 
            text-transform: uppercase; 
            letter-spacing: 0.15em;
            font-weight: 600;
        }
        .sidebar-nav { padding: 1.5rem 0; }
        .nav-section { margin-bottom: 1rem; }
        .nav-section-title { 
            padding: 1rem 2rem; 
            font-size: 0.75rem; 
            font-weight: 700; 
            text-transform: uppercase; 
            letter-spacing: 0.15em; 
            color: var(--gray); 
            background: rgba(226, 232, 240, 0.8);
        }
        .nav-item { margin: 0.5rem 1rem; }
        .nav-link {
            display: flex; align-items: center; gap: 1rem;
            padding: 1rem 1.5rem;
            color: var(--gray);
            text-decoration: none;
            border-radius: var(--radius-xl);
            transition: var(--transition);
            font-size: 0.95rem; font-weight: 600;
            position: relative;
            overflow: hidden;
        }
        .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: var(--primary);
            transform: scaleY(0);
            transition: var(--transition);
        }
        .nav-link:hover { 
            background: rgba(59, 130, 246, 0.1); 
            color: var(--primary); 
            transform: translateX(8px); 
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.15);
        }
        .nav-link:hover::before { transform: scaleY(1); }
        .nav-link.active { 
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%); 
            color: white; 
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.2);
        }
        .nav-link.active::before { 
            transform: scaleY(1); 
            background: var(--secondary); 
        }
        .nav-link-icon { width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; }
        .nav-link-icon svg { width: 20px; height: 20px; fill: currentColor; }
        .nav-link-arrow { margin-left: auto; font-size: 0.85rem; }
        .submenu { list-style: none; padding: 0; margin: 0.5rem 0 0.5rem 3rem; }
        .submenu .nav-link { 
            padding: 0.875rem 1.5rem; 
            font-size: 0.9rem; 
            background: rgba(226, 232, 240, 0.6); 
            border-left: 3px solid transparent;
        }
        .submenu .nav-link:hover { border-left-color: var(--secondary); }

        /* EVAC_ADMIN Main Content - Adjusted for Top Bar */
        .main-content { 
            flex: 1; 
            margin-left: 230px; 
            margin-top: 70px;
            padding: 2.5rem; 
            background: linear-gradient(to bottom, 
                #fafbfc 0%,    
                #f8fafc 100%   
            );
            min-height: calc(100vh - 70px);
        }

        /* Rest of your existing styles remain the same but with lighter shadows */
        .page-header { margin-bottom: 2.5rem; }
        .page-title { 
            font-size: 1.5rem; 
            font-weight: 800; 
            color: var(--dark); 
            display: flex; 
            align-items: center; 
            gap: 1rem;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .page-subtitle {
            font-size: 2rem; 
            text-align: center; 
            font-weight: 800; 
            color: var(--dark); 
            display: flex; 
            align-items: center; 
            gap: 1rem;
            margin-bottom: 2rem;
        }
        .stats-grid { 
            display: grid; 
            grid-template-columns: repeat(4, 1fr); 
            gap: 2rem; 
            margin-bottom: 3rem; 
        }        
        .stat-card {
            background: var(--white);
            border-radius: var(--radius-xl);
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.8);
        }
        .stat-card::before { 
            content: ''; 
            position: absolute; 
            top: 0; 
            left: 0; 
            width: 6px; 
            height: 100%; 
            background: linear-gradient(180deg, var(--primary), var(--secondary));
        }
        .stat-card:nth-child(2)::before { background: linear-gradient(180deg, var(--success), #059669); }
        .stat-card:nth-child(3)::before { background: linear-gradient(180deg, var(--warning), #d97706); }
        .stat-card:nth-child(4)::before { background: linear-gradient(180deg, var(--secondary), #0284c7); }
        .stat-card:hover { 
            transform: translateY(-8px) scale(1.02); 
            box-shadow: 0 20px 40px rgba(59, 130, 246, 0.12); 
        }
        /* ... rest of your existing styles remain the same ... */

        /* EVAC_ADMIN Responsive */
        @media (max-width: 1400px) { 
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .report-section { grid-template-columns: 1fr; }
         }
        @media (max-width: 1200px) { 
            .stats-grid { grid-template-columns: repeat(2, 1fr); }
            .sidebar { width: 240px; }
            .main-content { margin-left: 240px; }
        }
        @media (max-width: 992px) {
            .sidebar { width: 90px; }
            .sidebar-header { padding: 1.5rem; }
            .sidebar-logo-text { display: none; }
            .nav-section-title, .nav-link-text, .nav-link-arrow { display: none; }
            .nav-link { justify-content: center; padding: 1rem; }
            .main-content { margin-left: 90px; padding: 2rem; }
            .top-bar { padding: 0 1.5rem; }
        }
        @media (max-width: 768px) {
            .sidebar { 
                transform: translateX(-100%);
                transition: var(--transition);
            }
            .sidebar.active { transform: translateX(0); }
            .main-content { 
                margin-left: 0; 
                padding: 1.5rem; 
            }
            .top-bar {
                padding: 0 1rem;
                position: relative;
            }
            .top-bar-right { gap: 1rem; }
        }
        @media (max-width: 480px) { 
            .main-content { padding: 1rem; }
            .stats-grid { grid-template-columns: 1fr; }
            .page-title { font-size: 1.25rem; }
                }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 85px;
            left: 1rem;
            z-index: 1001;
            background: var(--primary);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow-lg);
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .mobile-menu-toggle { display: block; }
        }

        /* Overlay for mobile sidebar */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 998;
        }
        .sidebar-overlay.active { display: block; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="top-bar">
        <div class="top-bar-logo">
            <div class="logo-icon">
                <!-- Replace SVG with actual logo image -->
                <img src="{{ asset('images/mdrrmo-logo.png') }}" 
                    alt="EVAC ADMIN Logo" 
                    class="logo-image"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                
                <!-- Fallback SVG (shows if image fails to load) -->
                <div class="logo-fallback" style="display: none;">
                    <svg viewBox="0 0 24 24">
                        <path fill="currentColor" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                    </svg>
                </div>
            </div>
            <div class="logo-text-container">
                <div class="logo-text">EVAC ADMIN</div>
                <div class="logo-subtitle">MDRRMO Camalaniugan</div>
            </div>
        </div>

        <div class="top-bar-right">
            <!-- Notification Button -->
            <div class="notification-btn" onclick="toggleNotifications()" title="Notifications">
                <i class="fas fa-bell"></i>
                <span class="notification-badge" id="notificationCount">3</span>
            </div>

            <!-- Dynamic User Profile Dropdown -->
            <div class="user-profile" onclick="toggleUserDropdown()" id="userProfile">
                <div class="user-avatar" id="userAvatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'User', 0, 2)) }}
                </div>
                <div class="user-info">
                    <h5 id="userName">{{ auth()->user()->name ?? 'John Doe' }}</h5>
                    <p id="userRole">{{ auth()->user()->role ?? 'Administrator' }}</p>
                </div>
                <i class="fas fa-chevron-down ms-2"></i>
            </div>
            
            <!-- User Dropdown Menu -->
            <div class="dropdown-menu" id="userDropdown">

                <div class="dropdown-divider"></div>
                <form id="logoutForm" method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <a href="#" class="dropdown-item logout-link" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </form>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" onclick="toggleSidebar()">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Sidebar Overlay for Mobile -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white shadow" style="margin-top: 70px;">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- CUSTOM SIDEBAR & CONTENT WRAPPER - EVAC_ADMIN LIGHTER -->
    <div class="d-flex">
        <!-- EVAC_ADMIN Enhanced Sidebar -->
        <nav class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <div class="sidebar-logo-icon">
                        <svg viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                        </svg>
                    </div>
                    <div class="sidebar-logo-text">
                        <div class="sidebar-logo-title">EVAC ADMIN</div>
                        <div class="sidebar-logo-subtitle">MDRRMO Camalaniugan</div>
                    </div>
                </div>
            </div>
            <div class="sidebar-nav">
                <!-- EVAC_ADMIN Navigation -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('EvacAdmin.dashboard') }}">
                            <span class="nav-link-icon">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                                </svg>
                            </span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('EvacAdmin.Registration') }}">
                            <span class="nav-link-icon">
                                <svg viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                                </svg>
                            </span>
                            <span class="nav-link-text">Registration</span>
                        </a>
                    </li>
                    <!-- EVAC_ADMIN Enhanced Dropdown -->
                    <li class="nav-item" x-data="{ open: false }">
                        <a href="javascript:void(0);" 
                           class="nav-link flex items-center justify-between"
                           @click="open = !open">
                            <span class="flex items-center gap-3">
                                <span class="nav-link-icon">
                                    <svg viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10z"/>
                                    </svg>
                                </span>
                                <span class="nav-link-text">Evacuation Progress</span>
                            </span>
                            <svg :class="{'rotate-90': open}" 
                                 class="w-5 h-5 transition-transform duration-300" 
                                 viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9 6l6 6-6 6"></path>
                            </svg>
                        </a>

                        <!-- EVAC_ADMIN Submenu -->
                        <ul class="submenu" x-show="open" x-cloak x-transition>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('EvacAdmin.monitor-progress') }}">
                                    <span class="nav-link-icon">
                                        <svg viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Monitoring Progress</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('EvacAdmin.evacuation-tracking') }}">
                                    <span class="nav-link-icon">
                                        <svg viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                            <path d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58c.18-.14.23-.41.12-.61l-1.92-3.32c-.12-.22-.37-.29-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54c-.04-.24-.24-.41-.48-.41h-3.84c-.24 0-.43.17-.47.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96c-.22-.08-.47 0-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.09.63-.09 0.94s.02.64.07.94l-2.03 1.58c-.18.14-.23.41-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.48-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.03-1.58zM12 15.6c-1.98 0-3.6-1.62-3.6-3.6s1.62-3.6 3.6-3.6 3.6 1.62 3.6 3.6-1.62 3.6-3.6 3.6z"/>
                                        </svg>
                                    </span>
                                    <span class="nav-link-text">Evacuation Tracking</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- EVAC_ADMIN Main Content -->
        <div class="main-content">
            @yield('header')
            @yield('content')
        </div>
    </div>

    <!-- EVAC_ADMIN Scripts -->
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Alpine.js for EVAC_ADMIN interactions -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- EVAC_ADMIN Custom Scripts -->
    <script>
           document.querySelector('.logout-link').addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to logout?')) {
                document.getElementById('logoutForm').submit();
            }
        });

        // User dropdown toggle
        function toggleUserDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Dynamic user data initialization
        document.addEventListener('DOMContentLoaded', function() {
            // Update user avatar with first letters of name
            const userName = document.getElementById('userName').textContent;
            const avatar = document.getElementById('userAvatar');
            const initials = userName.split(' ').map(n => n[0]).join('').toUpperCase().substring(0, 2);
            avatar.textContent = initials;

            // Set dynamic user role (you can extend this based on your user model)
            const userRoleElement = document.getElementById('userRole');
            const roles = {
                'admin': 'Administrator',
                'manager': 'Evacuation Manager',
                'coordinator': 'Center Coordinator',
                'staff': 'Staff Member'
            };
            
            // Check for role in user data or localStorage/sessionStorage
            let userRole = '{{ auth()->user()->role ?? "Administrator" }}';
            userRoleElement.textContent = roles[userRole.toLowerCase()] || userRole;
        });

        // All your existing scripts remain the same...
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const profile = document.getElementById('userProfile');
            const dropdown = document.getElementById('userDropdown');
            
            if (!profile.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
        // Mobile sidebar toggle for EVAC_ADMIN
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // User dropdown toggle
        function toggleUserDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const profile = document.getElementById('userProfile');
            const dropdown = document.getElementById('userDropdown');
            
            if (!profile.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

        // Auto-hide sidebar on desktop click
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.mobile-menu-toggle');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (window.innerWidth > 768) return;
            
            if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            }
        });

        // EVAC_ADMIN Window resize handler
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').classList.remove('active');
                document.getElementById('sidebarOverlay').classList.remove('active');
                document.getElementById('userDropdown').classList.remove('show');
            }
        });

        // EVAC_ADMIN Active nav link highlighter
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath || link.href.includes(currentPath)) {
                    link.classList.add('active');
                }
            });
        });

        // Placeholder functions
        function toggleNotifications() {
            alert('Notifications feature coming soon!');
        }

        // EVAC_ADMIN Smooth scroll and animations
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close mobile sidebar when window resizes to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                document.getElementById('sidebar').style.transform = '';
                document.getElementById('sidebarOverlay').classList.remove('active');
            }
        });
    </script>

    @stack('scripts')
</body>
</html>