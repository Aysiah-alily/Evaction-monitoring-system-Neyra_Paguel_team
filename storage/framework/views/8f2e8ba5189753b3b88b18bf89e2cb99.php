<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'MDRRMO')); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        :root {
            /* Core Colors */
            --primary: #1e40af;
            --primary-50: #eff6ff;
            --primary-100: #dbeafe;
            --primary-500: #3b82f6;
            --primary-600: #2563eb;
            --primary-700: #1d4ed8;
            
            --secondary: #06b6d4;
            --success: #059669;
            --warning: #d97706;
            --danger: #dc2626;
            
            /* Neutrals */
            --slate-50: #f8fafc;
            --slate-100: #f1f5f9;
            --slate-200: #e2e8f0;
            --slate-300: #cbd5e1;
            --slate-400: #94a3b8;
            --slate-500: #64748b;
            --slate-600: #475569;
            --slate-700: #334155;
            --slate-800: #1e293b;
            --slate-900: #0f172a;
            --slate-950: #020617;
            
            /* Effects */
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            
            --border: 1px solid rgb(0 0 0 / 0.05);
            --radius-sm: 0.375rem;
            --radius: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --radius-2xl: 1.5rem;
            
            --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--slate-50);
            color: var(--slate-900);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Layout */
        .app-layout {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        /* PROFILE DROPDOWN - FIXED */
.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-menu {
    position: absolute;
    top: calc(100% + 0.5rem);
    right: 0;
    min-width: 180px;
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-2xl);
    border: 1px solid var(--slate-100);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-8px);
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    padding: 0.25rem 0;
    z-index: 1000;
    max-height: 0;
    overflow: hidden;
}

.dropdown-menu.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
    max-height: 200px;
}

.dropdown-item {
    display: block;
    padding: 0.75rem 1.25rem;
    color: var(--slate-700);
    text-decoration: none;
    font-weight: 500;
    transition: var(--transition);
    white-space: nowrap;
}

.dropdown-item:hover {
    background: var(--primary-50);
    color: var(--primary);
}

.dropdown-item i {
    width: 1rem;
    margin-right: 0.5rem;
    opacity: 0.7;
}

/* Notification Badge */
.notification-badge {
    position: absolute;
    top: -0.25rem;
    right: -0.25rem;
    background: var(--danger);
    color: white;
    border-radius: 50%;
    width: 1.125rem;
    height: 1.125rem;
    font-size: 0.625rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

        /* Topbar */
        .topbar {
            background: white;
            backdrop-filter: blur(20px);
            border-bottom: var(--border);
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: var(--shadow-sm);
        }

        .topbar-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4.5rem;
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary);
            text-decoration: none;
        }

        .topbar-brand-icon {
            width: 2.25rem;
            height: 2.25rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-600));
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 3rem;
        }

        .notification-btn, .profile-btn {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: var(--radius-xl);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--slate-600);
            transition: var(--transition);
            text-decoration: none;
        }

        .notification-btn:hover, .profile-btn:hover {
            background: var(--slate-100);
            color: var(--slate-900);
            transform: translateY(-1px);
        }

        .profile-img {
            width: 2.25rem;
            height: 2.25rem;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid white;
        }
.profile-dropdown-wrapper {
    position: relative;
    z-index: 30;
}

.profile-btn {
    position: relative;
    z-index: 40;
}
.notification-dropdown {
    position: absolute;
    top: calc(100% + 0.75rem);
    right: 0;
    min-width: 320px;
    max-width: 360px;
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-2xl);
    border: 1px solid var(--slate-100);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-8px);
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    padding: 0.5rem 0;
    z-index: 1000;
}

.notification-dropdown.show {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

/* Ensure dropdowns don't overlap */
.dropdown-menu {
    z-index: 1050 !important;
    right: 0 !important;
    left: auto !important;
}

/* Notification badge fix */
.notification-badge {
    position: absolute;
    top: -0.375rem;
    right: -0.375rem;
    background: var(--danger);
    color: white;
    border-radius: 50%;
    width: 1.25rem;
    height: 1.25rem;
    font-size: 0.7rem;
    font-weight: 700;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid white;
    box-shadow: var(--shadow-sm);
}
        /* Sidebar */
        .sidebar {
            width: 15rem;
            background: linear-gradient(180deg, var(--slate-950) 0%, var(--slate-900) 100%);
            position: fixed;
            height: calc(100vh - 4.5rem);
            top: 4.5rem;
            left: 0;
            z-index: 40;
            overflow-y: auto;
            box-shadow: var(--shadow-xl);
            scrollbar-width: thin;
            scrollbar-color: var(--slate-700) transparent;
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--slate-700);
            border-radius: 2px;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .sidebar-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--slate-400);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
        }

        .sidebar-nav {
            padding: 0 0.5rem;
        }

        .nav-item {
            margin-bottom: 0.25rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: var(--slate-400);
            text-decoration: none;
            border-radius: var(--radius-xl);
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav-link:hover {
            background: rgba(255,255,255,0.08);
            color: white;
            transform: translateX(4px);
        }

        .nav-link.active {
            background: linear-gradient(135deg, var(--primary), var(--primary-600));
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: rgba(255,255,255,0.3);
            border-radius: 0 var(--radius-xl) var(--radius-xl) 0;
        }

        .nav-icon {
            width: 1.25rem;
            height: 1.25rem;
            flex-shrink: 0;
        }

        /* Main Content */
        .main-content {
            margin-left: 15rem !important; /* Match sidebar width */
            margin-top: 1rem !important;
            padding: 2rem 1rem; /* Reduced padding */
            flex: 1;
            width: 100%;
            max-width: none; /* Remove max-width restriction */
            overflow-x: hidden !important; /* CRITICAL */
            min-height: calc(100vh - 4.5rem);
        }

        /* Page Header */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.875rem;
            font-weight: 800;
            color: var(--slate-900);
            margin: 0;
        }

        .page-icon {
            width: 3rem;
            height: 3rem;
            background: linear-gradient(135deg, var(--primary), var(--primary-600));
            border-radius: var(--radius-2xl);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: var(--shadow-xl);
        }

        .page-actions {
            display: flex;
            gap: 0.75rem;
        }

        /* Cards */
        .card {
            background: white;
            border-radius: var(--radius-2xl);
            box-shadow: var(--shadow-lg);
            border: none;
            overflow: hidden;
            transition: var(--transition);
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-2xl);
        }

        .card-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--slate-100);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--slate-900);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Buttons */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: var(--radius-xl);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 0.875rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-600));
            color: white;
            box-shadow: var(--shadow-lg);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-xl);
        }

        .btn-secondary {
            background: var(--slate-100);
            color: var(--slate-900);
        }

        .btn-secondary:hover {
            background: var(--slate-200);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
                transition: var(--transition);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                padding: 1rem;
            }
        }

        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
        }

        @media (max-width: 992px) {
            .mobile-menu-toggle {
                display: block;
                background: none;
                border: none;
                font-size: 1.25rem;
                color: var(--slate-600);
                padding: 0.5rem;
                border-radius: var(--radius-lg);
            }
        }

        /* Overlay for mobile sidebar */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 39;
            backdrop-filter: blur(4px);
        }

        .sidebar-overlay.active {
            display: block;
        }
        /* CUSTOM LOGO STYLES */
.topbar-brand-icon {
    width: 2.25rem;
    height: 2.25rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-600));
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    position: relative;
}

.topbar-logo {
    width: 100%;
    height: 100%;
    object-fit: contain; /* Keeps logo proportions */
    object-position: center;
    border-radius: var(--radius-sm); /* Slight rounding */
    background: rgba(255,255,255,0.1); /* Subtle backdrop */
}

.topbar-logo-fallback {
    width: 1.25rem;
    height: 1.25rem;
}

.topbar-logo-fallback svg {
    width: 100%;
    height: 100%;
}

/* Logo hover effect */
.topbar-brand:hover .topbar-brand-icon {
    transform: scale(1.05);
    box-shadow: var(--shadow-xl);
}

/* Responsive logo */
@media (max-width: 768px) {
    .topbar-brand-icon {
        width: 2rem;
        height: 2rem;
    }
}
    </style>
</head>
<body>
    <div class="app-layout">
        <!-- Topbar -->
        <header class="topbar">
            <div class="topbar-container">
                <div class="d-flex align-items-center gap-3">
                    <button class="mobile-menu-toggle d-lg-none" id="mobileMenuToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <a href="<?php echo e(route('admin.dashboard')); ?>" class="topbar-brand">
                        <div class="topbar-brand-icon">
                            <!-- REPLACE SVG with your logo -->
                            <img src="<?php echo e(asset('images/mdrrmo-logo.png')); ?>" 
                                alt="MDRRMO Logo" 
                                class="topbar-logo"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                            <!-- Fallback SVG (shows if image fails) -->
                            <div class="topbar-logo-fallback" style="display: none;">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
                                </svg>
                            </div>
                        </div>
                        <span>MDRRMO Camalaniugan</span>
                    </a>
                </div>
                
                <!-- Replace your profile dropdown -->
                <div class="topbar-actions">
                    <a href="#" class="notification-btn position-relative" title="Notifications">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">3</span>
                    </a>
                    
                    <!-- FIXED PROFILE DROPDOWN -->
                    <div class="dropdown">
                        <a href="#" class="profile-btn" id="profileDropdownToggle">
                            <img src="https://ui-avatars.com/api/?name=Admin&background=2563eb&color=fff&size=32" 
                                alt="Profile" class="profile-img">
                            <span class="profile-name d-none d-md-inline ms-2">Admin</span>
                        </a>
                        <div class="dropdown-menu" id="profileDropdownMenu">
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-user"></i> Profile
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-cog"></i> Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo e(route('logout')); ?>" 
                            class="dropdown-item text-danger logout-link"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>

                <!-- HIDDEN LOGOUT FORM (Laravel standard) -->
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>
            </div>
        </header>

        <div class="d-flex flex-1">
            <!-- Sidebar Overlay -->
            <div class="sidebar-overlay" id="sidebarOverlay"></div>

            <!-- Sidebar -->
            <nav class="sidebar" id="sidebar">
                <div class="sidebar-header">
                    <h3 class="sidebar-title">Navigation</h3>
                </div>
                <div class="sidebar-nav">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="fas fa-chart-line nav-icon"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('evacuation_center.index')); ?>">
                                <i class="fas fa-building-shelter nav-icon"></i>
                                <span>Evacuation Centers</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('users.index')); ?>">
                                <i class="fas fa-users nav-icon"></i>
                                <span>Users Management</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="main-content">
                <?php echo $__env->yieldContent('content'); ?>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
(function() {
    'use strict';
    
    // DOM Elements
    const elements = {
        mobileMenuToggle: document.getElementById('mobileMenuToggle'),
        sidebar: document.getElementById('sidebar'),
        sidebarOverlay: document.getElementById('sidebarOverlay'),
        profileBtn: document.getElementById('profileDropdown'),
        notificationBtn: document.querySelector('.notification-btn'),
        navLinks: document.querySelectorAll('.nav-link')
    };

    // Mobile Sidebar Toggle
    function initMobileSidebar() {
        if (!elements.mobileMenuToggle || !elements.sidebar || !elements.sidebarOverlay) return;

        const toggleSidebar = () => {
            elements.sidebar.classList.toggle('open');
            elements.sidebarOverlay.classList.toggle('active');
        };

        elements.mobileMenuToggle.addEventListener('click', toggleSidebar);
        elements.sidebarOverlay.addEventListener('click', () => {
            elements.sidebar.classList.remove('open');
            elements.sidebarOverlay.classList.remove('active');
        });

        // Close on nav link click (mobile only)
        elements.navLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 992) {
                    elements.sidebar.classList.remove('open');
                    elements.sidebarOverlay.classList.remove('active');
                }
            });
        });
    }

    // Profile Dropdown
// FIXED Notification Dropdown
function initNotificationDropdown() {
    const notificationBtn = document.getElementById('notificationToggle');
    if (!notificationBtn) return;

    const notificationDropdown = document.getElementById('notificationDropdown');
    
    notificationBtn.addEventListener('click', (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        // Close profile dropdown if open
        document.getElementById('profileDropdownMenu')?.classList.remove('show');
        
        if (notificationDropdown) {
            notificationDropdown.classList.toggle('show');
        }
    });
}

// Update initProfileDropdown to close notification
function initProfileDropdown() {
    const toggleBtn = document.getElementById('profileDropdownToggle');
    const dropdownMenu = document.getElementById('profileDropdownMenu');
    
    if (!toggleBtn || !dropdownMenu) return;

    const toggleDropdown = (e) => {
        e.preventDefault();
        e.stopPropagation();
        
        // Close notification dropdown if open
        const notificationDropdown = document.getElementById('notificationDropdown');
        if (notificationDropdown) {
            notificationDropdown.classList.remove('show');
        }
        
        dropdownMenu.classList.toggle('show');
    };

    toggleBtn.addEventListener('click', toggleDropdown);
    
    // Close both on outside click
    document.addEventListener('click', (e) => {
        const profileBtn = document.getElementById('profileDropdownToggle');
        const notificationBtn = document.getElementById('notificationToggle');
        
        if (!profileBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.remove('show');
        }
        
        if (notificationBtn && !notificationBtn.contains(e.target)) {
            const notificationDropdown = document.getElementById('notificationDropdown');
            if (notificationDropdown) notificationDropdown.classList.remove('show');
        }
    });
}

// Update init() function
function init() {
    initMobileSidebar();
    initProfileDropdown();
    initNotificationDropdown();  // NEW
    initNotificationEffects();
    initActiveNav();
    initKeyboardNav();
    initPerformanceOptimizations();
}

    // Notification Button Effects
    function initNotificationEffects() {
        if (!elements.notificationBtn) return;

        const hoverEffect = (scale) => {
            elements.notificationBtn.style.transform = `scale(${scale})`;
        };

        elements.notificationBtn.addEventListener('mouseenter', () => hoverEffect(1.05));
        elements.notificationBtn.addEventListener('mouseleave', () => hoverEffect(1));
        
        // Click ripple effect
        elements.notificationBtn.addEventListener('click', (e) => {
            const ripple = document.createElement('span');
            const rect = elements.notificationBtn.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255,255,255,0.6);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s linear;
                pointer-events: none;
            `;
            
            elements.notificationBtn.style.position = 'relative';
            elements.notificationBtn.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    }

    // Active Navigation Highlighting
    function initActiveNav() {
        const updateActiveLink = () => {
            const currentPath = window.location.pathname;
            elements.navLinks.forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href');
                if (href === currentPath || 
                    (href && currentPath.includes(href.split('/').pop()))) {
                    link.classList.add('active');
                }
            });
        };

        // Update on load and browser navigation
        updateActiveLink();
        window.addEventListener('popstate', updateActiveLink);

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }

    // Sidebar Scroll Effects
    function initSidebarScroll() {
        if (!elements.sidebar) return;

        let scrollTimeout;
        elements.sidebar.addEventListener('scroll', () => {
            // Subtle glow effect during scroll
            elements.sidebar.style.boxShadow = 'inset 0 0 20px rgba(255,255,255,0.05)';
            
            clearTimeout(scrollTimeout);
            scrollTimeout = setTimeout(() => {
                elements.sidebar.style.boxShadow = 'var(--shadow-xl)';
            }, 300);
        });
    }

    // Perfect Scrollbar Enhancement
    function initPerfectScrollbar() {
        if (!elements.sidebar) return;

        // Custom scrollbar width animation
        const resizeObserver = new ResizeObserver(() => {
            elements.sidebar.style.scrollbarWidth = window.innerWidth < 992 ? 'none' : 'thin';
        });
        resizeObserver.observe(document.body);
    }

    // Keyboard Navigation
    function initKeyboardNav() {
        document.addEventListener('keydown', (e) => {
            // Escape closes mobile sidebar and dropdowns
            if (e.key === 'Escape') {
                if (window.innerWidth < 992) {
                    elements.sidebar?.classList.remove('open');
                    elements.sidebarOverlay?.classList.remove('active');
                }
            }
        });
    }

    // Intersection Observer for Performance
    function initPerformanceOptimizations() {
        if ('IntersectionObserver' in window) {
            const sidebarObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Preload sidebar content
                        initSidebarScroll();
                        initPerfectScrollbar();
                    }
                });
            }, { threshold: 0.1 });

            if (elements.sidebar) {
                sidebarObserver.observe(elements.sidebar);
            }
        }
    }

    // Run when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        // Reset mobile sidebar state
        if (window.innerWidth < 992) {
            elements.sidebar?.classList.remove('open');
            elements.sidebarOverlay?.classList.remove('active');
        }
    });

    // Add CSS for ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

})();
</script>

<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>  <?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/layouts/superlayout.blade.php ENDPATH**/ ?>