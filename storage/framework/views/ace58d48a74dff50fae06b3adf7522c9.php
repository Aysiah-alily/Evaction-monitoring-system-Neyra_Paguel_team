<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Evacuation Monitoring System'); ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <!-- Alpine.js for Mobile Menu -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Styles -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    
    <style>
        /* Global Styles */
        body { font-family: 'Instrument Sans', system-ui, sans-serif; background: #FDFDFC; color: #1b1b18; margin: 0; padding: 0; }
        
        /* Header */
        header { border-bottom: 1px solid #e5e7eb; background: white; position: sticky; top: 0; z-index: 100; }
        nav { max-width: 1200px; margin: 0 auto; padding: 1rem 2rem; display: flex; align-items: center; justify-content: space-between; }
        
        /* Navigation Links - Desktop (Always Visible) */
        .nav-links { display: flex; gap: 1rem; }
        .nav-link { text-decoration: none; color: #111827; font-weight: 500; padding: 0.5rem 1rem; border-radius: 0.5rem; transition: all 0.2s; }
        .nav-link:hover { background: #f3f4f6; color: #dc2626; }
        .nav-link.active { background: #fee2e2; color: #dc2626; }
        
        /* Logo Container */
        .logo-container { display: flex; align-items: center; gap: 0.75rem; }
        .logo-img { width: 50px; height: 50px; object-fit: contain; }
        .logo-text { display: flex; flex-direction: column; }
        .logo-main { font-size: 1.125rem; font-weight: bold; color: #111827; line-height: 1.2; }
        .logo-sub { font-size: 0.65rem; color: #dc2626; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.875rem 2rem; font-weight: 600; border-radius: 0.5rem; text-decoration: none; transition: all 0.3s; border: none; cursor: pointer; }
        .btn-primary { background-color: #dc2626; color: white; box-shadow: 0 4px 6px rgba(220, 38, 38, 0.3); }
        .btn-primary:hover { background-color: #b91c1c; }
        .btn-outline { border: 2px solid #dc2626; color: #dc2626; background: transparent; }
        .btn-outline:hover { background: #fef2f2; }

        /* Sections */
        .section { max-width: 1200px; margin: 0 auto; padding: 4rem 2rem; }
        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
        
        /* Footer */
        footer { background: #1f2937; color: white; padding: 4rem 2rem 2rem; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; max-width: 1200px; margin: 0 auto; }
        .footer-links { list-style: none; padding: 0; }
        .footer-links li { margin-bottom: 0.75rem; }
        .footer-links a { color: #9ca3af; text-decoration: none; }
        .footer-links a:hover { color: white; }
        .footer-bottom { border-top: 1px solid #374151; margin-top: 3rem; padding-top: 2rem; display: flex; justify-content: space-between; max-width: 1200px; margin: 3rem auto 0; }
        
        /* Mobile Menu Button */
        .mobile-menu-btn { display: none; background: none; border: none; cursor: pointer; padding: 0.5rem; }
        .mobile-menu-btn svg { width: 24px; height: 24px; stroke: #111827; }
        
        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .grid-2 { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; }
            
            /* Show hamburger button on mobile */
            .mobile-menu-btn { display: block; }
            
            /* Hide desktop nav, show mobile nav */
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: white;
                flex-direction: column;
                padding: 1rem;
                border-bottom: 1px solid #e5e7eb;
                box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
                z-index: 99;
            }
            
            .nav-links[x-show] { display: flex !important; }
            
            .nav-link { width: 100%; text-align: left; }
        }
    </style>
</head>
<body>
    <header>
        <nav x-data="{ open: false }">
            <!-- Left Side: Logo -->
            <div class="logo-container">
                <?php if(file_exists(public_path('images/mdrrmo-logo.png'))): ?>
                    <img src="<?php echo e(asset('images/mdrrmo-logo.png')); ?>" alt="MDRRMO Logo" class="logo-img">
                <?php elseif(file_exists(public_path('images/logo.png'))): ?>
                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="MDRRMO Logo" class="logo-img">
                <?php else: ?>
                    <!-- Fallback SVG Logo -->
                    <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" style="width: 32px; height: 32px; fill: white;">
                            <path d="M50 5L95 25v50L5 75V25L50 5z" fill="none" stroke="white" stroke-width="3"/>
                            <path d="M50 25v50M25 50h50" stroke="white" stroke-width="3"/>
                        </svg>
                    </div>
                <?php endif; ?>
                <div class="logo-text">
                    <span class="logo-main">MDRRMO</span>
                    <span class="logo-sub">Camalaniugan</span>
                </div>
            </div>

            <!-- Right Side: Navigation Links -->
            <!-- Removed x-show from desktop view -->
            <div class="nav-links">
                <!-- additional button for landing page -->
                <a href="<?php echo e(route('welcome')); ?>" class="nav-link <?php echo e(request()->routeIs('welcome') ? 'active' : ''); ?>">Landing</a>
                <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>">Home</a>
                <a href="<?php echo e(route('news')); ?>" class="nav-link <?php echo e(request()->routeIs('news') ? 'active' : ''); ?>">News</a>
                <a href="<?php echo e(route('alerts')); ?>" class="nav-link <?php echo e(request()->routeIs('alerts') ? 'active' : ''); ?>">Alerts</a>
                <a href="<?php echo e(route('firstaid')); ?>" class="nav-link <?php echo e(request()->routeIs('firstaid') ? 'active' : ''); ?>">First Aid</a>
                <a href="<?php echo e(route('about')); ?>" class="nav-link <?php echo e(request()->routeIs('about') ? 'active' : ''); ?>">About</a>
                <a href="<?php echo e(route('contact')); ?>" class="nav-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>">Contact</a>

            </div>

            <!-- Mobile Menu Toggle (Alpine.js) -->
            <button 
                @click="open = !open" 
                class="mobile-menu-btn"
                aria-label="Toggle navigation menu"
            >
                <!-- Hamburger Icon -->
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
                <!-- Close Icon -->
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </nav>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <footer>
        <div class="footer-grid">
            <div>
                <div class="logo-container" style="margin-bottom: 1rem;">
                    <div style="width: 40px; height: 40px; background: #dc2626; border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: white;">
                            <path d="M50 5L95 25v50L5 75V25L50 5z" fill="none" stroke="white" stroke-width="3"/>
                        </svg>
                    </div>
                    <div class="logo-text">
                        <span class="logo-main" style="color: white;">MDRRMO</span>
                        <span class="logo-sub" style="color: #dc2626;">Camalaniugan</span>
                    </div>
                </div>
                <p style="color: #9ca3af; line-height: 1.6;">The Municipal Disaster Risk Reduction and Management Office of Camalaniugan is committed to protecting lives and property through proactive planning and community engagement.</p>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem; color: white;">Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li><a href="<?php echo e(route('about')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem; color: white;">Resources</h4>
                <ul class="footer-links">
                    <li><a href="#">Emergency Guidelines</a></li>
                    <li><a href="#">Evacuation Maps</a></li>
                    <li><a href="#">Training Materials</a></li>
                </ul>
            </div>
            <div>
                <h4 style="margin-bottom: 1rem; color: white;">Emergency</h4>
                <div style="background: #374151; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                    <p style="color: #fee2e2; font-size: 0.875rem; margin: 0;">For emergencies, call:</p>
                    <p style="color: white; font-size: 1.5rem; font-weight: bold; margin: 0.5rem 0 0;">911</p>
                </div>
                <p style="color: #9ca3af; font-size: 0.875rem;">MDRRMO Office: (078) 892-1234</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p style="color: #6b7280; font-size: 0.875rem;">&copy; 2025 MDRRMO Camalaniugan. All rights reserved.</p>
        </div>
    </footer>
    
    <!-- Scripts -->
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/js/app.js']); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/layouts/user.blade.php ENDPATH**/ ?>