<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="MDRRMO Camalaniugan - Official Evacuation Monitoring and Emergency Response System">
        <title>MDRRMO Camalaniugan - Emergency Evacuation System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        <style>
            * { box-sizing: border-box; }
            body { font-family: 'Instrument Sans', system-ui, sans-serif; line-height: 1.6; background: linear-gradient(to bottom, #fef2f2, #ffffff); color: #1f2937; margin: 0; padding: 0; }
            
            /* Header */
            header { border-bottom: 1px solid #e5e7eb; background: white; position: sticky; top: 0; z-index: 100; }
            nav { max-width: 72rem; margin: 0 auto; padding: 0.75rem 1.5rem; display: flex; align-items: center; justify-content: space-between; }
            .logo { display: flex; align-items: center; gap: 0.75rem; }
            .logo-text { font-size: 1.125rem; font-weight: bold; color: #111827; }
            .logo-subtext { font-size: 0.65rem; color: #dc2626; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase; }
            
            /* Hero */
            .hero { max-width: 72rem; margin: 0 auto; padding: 4rem 1.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
            .hero-badge { display: inline-flex; align-items: center; gap: 0.5rem; background: #fef2f2; color: #dc2626; padding: 0.375rem 1rem; border-radius: 9999px; font-size: 0.875rem; font-weight: 600; margin-bottom: 1.5rem; border: 1px solid #fecaca; }
            .hero-title { font-size: 3.25rem; font-weight: 800; color: #111827; margin: 0 0 1.25rem 0; line-height: 1.1; }
            .hero-title span { color: #dc2626; }
            .hero-description { font-size: 1.125rem; color: #4b5563; margin-bottom: 1.75rem; line-height: 1.7; }
            
            /* Buttons */
            .btn { display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.875rem 2rem; font-weight: 600; border-radius: 0.5rem; text-decoration: none; transition: all 0.3s; border: none; cursor: pointer; }
            .btn-primary { background-color: #dc2626; color: white; box-shadow: 0 4px 6px rgba(220, 38, 38, 0.3); }
            .btn-primary:hover { background-color: #b91c1c; }
            .btn-outline { border: 2px solid #dc2626; color: #dc2626; }
            .btn-outline:hover { background: #fef2f2; }
            
            /* Visual Card */
            .visual-card { background: linear-gradient(135deg, #091236 0%, rgba(4, 12, 53, 0.67) 100%); border-radius: 1.5rem; padding: 2.5rem; box-shadow: 0 25px 50px -12px rgba(220, 38, 38, 0.35); text-align: center; color: white; min-height: 28rem; display: flex; flex-direction: column; align-items: center; justify-content: center; }
            .visual-logo { margin-bottom: 1.5rem; }
            .visual-logo svg { width: 100px; height: 100px; }
            .visual-title { font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem; }
            .visual-description { color: #fee2e2; margin-bottom: 1.5rem; font-size: 0.95rem; }
            .feature-list { text-align: left; width: 100%; max-width: 280px; }
            .feature-item { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; padding: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem; }
            
            /* Modal Styles */
            .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6); z-index: 9999; justify-content: center; align-items: center; }
            .modal-overlay.active { display: flex; }
            .modal-card { background: white; border-radius: 1.5rem; padding: 2.5rem; max-width: 550px; width: 90%; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); position: relative; text-align: center; }
            .modal-close { position: absolute; top: 1rem; right: 1rem; background: #f3f4f6; border: none; width: 36px; height: 36px; border-radius: 50%; cursor: pointer; font-size: 1.25rem; color: #6b7280; }
            .modal-close:hover { background: #e5e7eb; }
            .modal-header h2 { font-size: 1.75rem; font-weight: 800; color: #111827; margin-bottom: 0.5rem; }
            .modal-header p { color: #6b7280; margin-bottom: 2rem; }
            .role-buttons { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem; }
            .role-btn { display: flex; flex-direction: column; align-items: center; padding: 1.5rem 1rem; border: 2px solid #e5e7eb; border-radius: 1rem; background: white; cursor: pointer; transition: all 0.3s; text-decoration: none; }
            .role-btn:hover { border-color: #dc2626; background: #fef2f2; transform: translateY(-3px); }
            .role-btn .icon { width: 56px; height: 56px; background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 0.75rem; }
            .role-btn:hover .icon { background: #dc2626; }
            .role-btn .icon svg { width: 28px; height: 28px; color: #dc2626; }
            .role-btn:hover .icon svg { color: white; }
            .role-btn .label { font-weight: 700; color: #111827; font-size: 1rem; }
            .role-btn .description { font-size: 0.75rem; color: #6b7280; }
            
            /* About */
            .about { background: #f9fafb; padding: 4rem 1.5rem; }
            .about-container { max-width: 72rem; margin: 0 auto; display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }
            .about-title { font-size: 1.75rem; font-weight: bold; color: #111827; margin-bottom: 1.5rem; }
            .about-section-title { font-size: 1.125rem; font-weight: bold; color: #dc2626; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 0.5rem; }
            .about-section p { color: #4b5563; line-height: 1.7; }
            .contact-card { background: white; border-radius: 1rem; padding: 2rem; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1); }
            .contact-title { font-size: 1.25rem; font-weight: bold; color: #111827; margin-bottom: 1.5rem; }
            .contact-item { display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1rem; }
            .contact-icon { background: #fef2f2; padding: 0.75rem; border-radius: 0.5rem; }
            .contact-label { font-size: 0.75rem; color: #6b7280; font-weight: 600; text-transform: uppercase; }
            .contact-value { color: #1f2937; font-weight: 500; }
            .contact-value.emergency { color: #dc2626; font-weight: 700; }
            
            /* Features */
            .features { max-width: 72rem; margin: 0 auto; padding: 5rem 1.5rem; }
            .features-header { text-align: center; margin-bottom: 3rem; }
            .features-title { font-size: 2.25rem; font-weight: bold; color: #111827; margin-bottom: 0.75rem; }
            .features-subtitle { font-size: 1.125rem; color: #4b5563; }
            .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
            .feature-card { background: white; border-radius: 0.75rem; padding: 1.75rem; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); border: 1px solid #f3f4f6; transition: all 0.3s; }
            .feature-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); }
            .feature-icon { width: 3.5rem; height: 3.5rem; background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%); border-radius: 0.75rem; display: flex; align-items: center; justify-content: center; margin-bottom: 1.25rem; }
            .feature-icon svg { width: 1.75rem; height: 1.75rem; color: #dc2626; }
            .feature-title { font-size: 1.125rem; font-weight: bold; color: #111827; margin-bottom: 0.75rem; }
            .feature-description { color: #4b5563; font-size: 0.9rem; line-height: 1.6; }
            
            /* Footer */
            footer { background: #1f2937; border-top: 1px solid #374151; }
            .footer-container { max-width: 72rem; margin: 0 auto; padding: 3rem 1.5rem; }
            .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 3rem; margin-bottom: 2rem; }
            .footer-logo { display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem; }
            .footer-logo-img { width: 40px; height: 40px; background: #dc2626; border-radius: 8px; display: flex; align-items: center; justify-content: center; }
            .footer-logo-text { font-size: 1.125rem; font-weight: bold; color: white; }
            .footer-logo-subtext { font-size: 0.65rem; color: #dc2626; font-weight: 700; letter-spacing: 0.1em; display: block; }
            .footer-description { color: #9ca3af; font-size: 0.875rem; line-height: 1.7; margin-bottom: 1rem; }
            .social-links { display: flex; gap: 1rem; }
            .social-link { width: 2.5rem; height: 2.5rem; background: #374151; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #9ca3af; transition: all 0.3s; }
            .social-link:hover { background: #dc2626; color: white; }
            .footer-title { font-size: 1rem; font-weight: bold; color: white; margin-bottom: 1.25rem; }
            .footer-links { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem; }
            .footer-link { color: #9ca3af; text-decoration: none; font-size: 0.875rem; transition: color 0.3s; }
            .footer-link:hover { color: white; }
            .footer-emergency { background: #374151; border-radius: 0.5rem; padding: 1rem; margin-bottom: 1rem; }
            .footer-emergency-label { color: #fee2e2; font-size: 0.875rem; margin-bottom: 0.5rem; }
            .footer-emergency-number { color: white; font-size: 1.25rem; font-weight: bold; }
            .footer-bottom { border-top: 1px solid #374151; padding-top: 2rem; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 1rem; }
            .footer-copyright { display: flex; align-items: center; gap: 1rem; }
            .footer-municipal { width: 32px; height: 32px; background: #374151; border-radius: 50%; display: flex; align-items: center; justify-content: center; }
            .footer-copyright-text { color: #9ca3af; font-size: 0.875rem; }
            .footer-copyright-sub { color: #6b7280; font-size: 0.75rem; }
            .footer-legal { display: flex; gap: 1.5rem; }
            .footer-legal-link { color: #6b7280; font-size: 0.875rem; text-decoration: none; }
            
            @media (max-width: 768px) {
                .hero { grid-template-columns: 1fr; text-align: center; }
                .about-container { grid-template-columns: 1fr; }
                .features-grid { grid-template-columns: 1fr; }
                .footer-grid { grid-template-columns: 1fr; }
                .role-buttons { grid-template-columns: 1fr; }
            }
        </style>
    </head>
    <body>
         <!-- Header Navigation -->
        <header style="border-bottom: 1px solid #e5e7eb; background: white;">
            <nav style="max-width: 72rem; margin: 0 auto; padding: 0.75rem 1.5rem; display: flex; align-items: center; justify-content: space-between;">
                <!-- Logo Area with MDRRMO Camalaniugan Branding -->
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <!-- MDRRMO Logo -->
                    <div style="position: relative; width: 50px; height: 50px; flex-shrink: 0;">
                        <?php if(file_exists(public_path('images/mdrrmo-logo.png'))): ?>
                            <img src="<?php echo e(asset('images/mdrrmo-logo.png')); ?>" alt="MDRRMO Camalaniugan Logo" style="width: 100%; height: 100%; object-fit: contain;">
                        <?php elseif(file_exists(public_path('images/logo.png'))): ?>
                            <img src="<?php echo e(asset('images/logo.png')); ?>" alt="MDRRMO Camalaniugan Logo" style="width: 100%; height: 100%; object-fit: contain;">
                        <?php else: ?>
                            <!-- Fallback Logo Display -->
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); border-radius: 8px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(220, 38, 38, 0.3);">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" style="width: 32px; height: 32px; fill: white;">
                                    <path d="M50 5L95 25v50L5 75V25L50 5z" fill="none" stroke="white" stroke-width="3"/>
                                    <path d="M50 25v50M25 50h50" stroke="white" stroke-width="3"/>
                                    <circle cx="50" cy="50" r="15" fill="white"/>
                                    <path d="M44 50l5 5 12-12" stroke="#dc2626" stroke-width="3" fill="none"/>
                                </svg>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Office Name -->
                    <div style="display: flex; flex-direction: column;">
                        <span style="font-size: 1.125rem; font-weight: bold; color: #111827; line-height: 1.2;">MDRRMO</span>
                        <span style="font-size: 0.65rem; color: #dc2626; font-weight: 700; letter-spacing: 0.1em; text-transform: uppercase;">Camalaniugan</span>
                    </div>
                </div>

                
            </nav>
        </header>

        <!-- Main Content -->
        <main>
            <!-- Hero Section -->
            <section class="hero">
                <div>
                    <div class="hero-badge">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1rem; height: 1rem;">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                        </svg>
                        Municipal Disaster Risk Reduction & Management Office
                    </div>
                    <h1 class="hero-title">Rescue <span>Three</span> Five Ten</h1>
                    <p class="hero-description">The official evacuation monitoring and emergency response system of the Municipality of Camalaniugan. Real-time coordination for disaster risk reduction across all 20 barangays.</p>
                    
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        <button type="button" onclick="document.getElementById('roleModal').classList.add('active')" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem;">
                                <path fill-rule="evenodd" d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            Access System
                        </button>
                        <a href="#features" class="btn btn-outline">Learn More</a>
                    </div>
                </div>

               <!-- Right Column - Visual with Logo -->
                    <div style="position: relative;">
                        <!-- Main Visual Card -->
                        <div style="background: linear-gradient(135deg, #091236 0%, rgba(4, 12, 53, 0.67) 100%); border-radius: 1.5rem; padding: 2.5rem; box-shadow: 0 25px 50px -12px rgba(220, 38, 38, 0.35); text-align: center; color: white; min-height: 28rem; display: flex; flex-direction: column; align-items: center; justify-content: center;">
                            
                            <!-- Large Logo Display -->
                            <div style="margin-bottom: 1.5rem;">
                                <?php if(file_exists(public_path('images/mdrrmo-logo.png'))): ?>
                                    <img src="<?php echo e(asset('images/mdrrmo-logo.png')); ?>" alt="MDRRMO Camalaniugan Logo" style="width: 100px; height: 100px; object-fit: contain; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));">
                                <?php elseif(file_exists(public_path('images/logo.png'))): ?>
                                    <img src="<?php echo e(asset('images/logo.png')); ?>" alt="MDRRMO Camalaniugan Logo" style="width: 100px; height: 100px; object-fit: contain; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));">
                                <?php else: ?>
                                    <!-- SVG Logo Display -->
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" style="width: 100px; height: 100px; filter: drop-shadow(0 4px 6px rgba(0,0,0,0.2));">
                                        <!-- Shield Background -->
                                        <defs>
                                            <linearGradient id="shieldGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#ffffff;stop-opacity:0.3" />
                                                <stop offset="100%" style="stop-color:#ffffff;stop-opacity:0.1" />
                                            </linearGradient>
                                        </defs>
                                        <!-- Shield Shape -->
                                        <path d="M100 10L180 35v70c0 40-35 75-80 85-45-10-80-45-80-85V35L100 10z" fill="url(#shieldGrad)" stroke="white" stroke-width="3"/>
                                        <!-- Inner Shield -->
                                        <path d="M100 25L165 45v55c0 30-28 58-65 65-37-7-65-35-65-65V45L100 25z" fill="none" stroke="white" stroke-width="2"/>
                                        <!-- Cross -->
                                        <path d="M100 45v65M75 75h50" stroke="white" stroke-width="8" stroke-linecap="round"/>
                                        <!-- Checkmark -->
                                        <path d="M88 75l8 8 16-16" stroke="#dc2626" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                                    </svg>
                                <?php endif; ?>
                            </div>

                            <h3 style="font-size: 1.5rem; font-weight: bold; margin-bottom: 0.5rem;">Camalaniugan</h3>
                            <p style="color: #fee2e2; margin-bottom: 1.5rem; font-size: 0.95rem;">Ensuring safety through technology, preparedness, and community cooperation</p>
                            
                            <!-- Feature List -->
                            <div style="text-align: left; width: 100%; max-width: 280px;">
                                <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; padding: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; flex-shrink: 0;">
                                        <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z">
                                        <path d="M10 11a2 2 0 100-4 2 2 0 000 4z" fill="white"/>
                                </svg>
                                <span style="font-size: 0.9rem;">Barangay-level GPS tracking</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 0.75rem; padding: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; flex-shrink: 0;">
                                    <path fill-rule="evenodd" d="M5 7a5 5 0 1110 0A5 5 0 015 7zm3 0a3 3 0 11-6 0 3 3 0 016 0zM3 14a7 7 0 0114 0H3z" clip-rule="evenodd" fill="white"/>
                                </svg>
                                <span style="font-size: 0.9rem;">Evacuation Center Management</span>
                            </div>
                            <div style="display: flex; align-items: center; gap: 0.75rem; padding: 0.5rem; background: rgba(255,255,255,0.1); border-radius: 0.5rem;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; flex-shrink: 0;">
                                    <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" fill="white"/>
                                </svg>
                                <span style="font-size: 0.9rem;">Instant Municipal Alerts</span>
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div style="position: absolute; top: -1rem; right: -1rem; width: 3rem; height: 3rem; background: #fee2e2; border-radius: 50%; opacity: 0.5;"></div>
                        <div style="position: absolute; bottom: -2rem; left: -2rem; width: 5rem; height: 5rem; background: #fef2f2; border-radius: 50%; opacity: 0.5;"></div>
                    </div>
            </section>

            <!-- About Section -->
            <section class="about">
                <div class="about-container">
                    <div>
                        <h2 class="about-title">About MDRRMO Camalaniugan</h2>
                        <div style="margin-bottom: 1.5rem;">
                            <h3 class="about-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v3.586L7.707 9.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 10.586V7z"/></svg>
                                Our Mission
                            </h3>
                            <p>To strengthen the disaster risk reduction and management capabilities of Camalaniugan through integrated planning, coordination, and technology-driven solutions that protect lives and property.</p>
                        </div>
                        <div>
                            <h3 class="about-section-title">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 100-12 6 6 0 000 12zm-1-5a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                                Our Vision
                            </h3>
                            <p>A disaster-resilient Camalaniugan where communities are prepared, responsive, and capable of recovering swiftly from any emergency situation.</p>
                        </div>
                    </div>
                    <div class="contact-card">
                        <h3 class="contact-title">Contact Information</h3>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"/></svg></div>
                            <div><p class="contact-label">Address</p><p class="contact-value">Municipal Hall, Camalaniugan, Cagayan</p></div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg></div>
                            <div><p class="contact-label">Rescue Hotline</p><p class="contact-value">0967-526-0473</p></div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"/></svg></div>
                            <div><p class="contact-label">Emergency Operation Center</p><p class="contact-value">Open 24/7</p></div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" style="width: 1.25rem; height: 1.25rem; color: #dc2626;"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"/></svg></div>
                            <div><p class="contact-label">Emergency Hotline</p><p class="contact-value emergency">911</p></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="features" id="features">
                <div class="features-header">
                    <h2 class="features-title">System Capabilities</h2>
                    <p class="features-subtitle">Advanced tools designed for effective municipal emergency management</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M5.25 9a6.75 6.75 0 1113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"/></svg></div>
                        <h3 class="feature-title">Emergency Broadcasting</h3>
                        <p class="feature-description">Send instant SMS and voice alerts to all personnel and residents during emergencies.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M12 2a8 8 0 00-8 8c0 1.498.334 2.927.92 4.196L4.396 17.5a.75.75 0 00.224 1.065l2.91 1.74a.75.75 0 001.18-.66l2.54-6.333A8 8 0 0012 10a8 8 0 000 16z"/></svg></div>
                        <h3 class="feature-title">Real-Time Evacuation Tracking</h3>
                        <p class="feature-description">Monitor locations of response teams and track evacuees moving to designated safe zones.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M8.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM2.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0z"/></svg></div>
                        <h3 class="feature-title">Personnel Management</h3>
                        <p class="feature-description">Track responder assignments, accountability, and status during evacuation operations.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c.016-.012.033-.024.05-.034a19.839 19.839 0 002.896-3.025 20.013 20.013 0 00-2.896-3.025 16.97 16.97 0 01-1.144-.742l-.071-.041a.76.76 0 00-.723 0l-.028.015-.071.041c-.378.153-.74.33-1.084.53l-.181.11a20.923 20.923 0 01-1.425 1.024.75.75 0 00-.215.534.75.75 0 00.215.534l.181.11c.385.22.75.43 1.084.53l.071.041a.76.76 0 00.723 0l.028-.015.071-.041c.378-.153.74-.33 1.084-.53l.181-.11a20.923 20.923 0 011.425-1.024.75.75 0 00.215-.534.75.75 0 00-.215-.534l-.181-.11c-.385-.22-.75-.43-1.084-.53l-.071-.041a.76.76 0 00-.723 0l-.028.015-.071.041z"/></svg></div>
                        <h3 class="feature-title">Evacuation Center Management</h3>
                        <p class="feature-description">Manage evacuation facilities, track capacity, and monitor resources at each center.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"/></svg></div>
                        <h3 class="feature-title">Incident Reporting</h3>
                        <p class="feature-description">Document and track all incidents, damages, and casualties with real-time reporting.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M2.25 6a3 3 0 013-3h13.5a3 3 0 013 3v12a3 3 0 01-3 3H5.25a3 3 0 01-3-3V6zm3.97.97a.75.75 0 011.06 0l2.25 2.25a.75.75 0 010 1.06l-2.25 2.25a.75.75 0 11-1.06-1.06l1.72-1.72-1.72-1.72a.75.75 0 010-1.06zm4.28 4.28a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z"/></svg></div>
                        <h3 class="feature-title">Analytics & Reports</h3>
                        <p class="feature-description">Generate comprehensive reports and analytics to improve disaster response strategies.</p>
                    </div>
                </div>
            </section>
        </main>

        <!-- Role Selection Modal -->
        <div class="modal-overlay" id="roleModal">
            <div class="modal-card">
                <button class="modal-close" onclick="document.getElementById('roleModal').classList.remove('active')">&times;</button>
                <div class="modal-header">
                    <h2>Select Your Role</h2>
                    <p>Choose your account type to proceed</p>
                </div>
                <div class="role-buttons">
                    <a href="<?php echo e(route('login.admin')); ?>" class="role-btn">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0z"/></svg></div>
                        <span class="label">Administrator</span>
                        <span class="description">MDRRMO Staff</span>
                    </a>
                    <a href="<?php echo e(route('login.evacuation')); ?>" class="role-btn">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M11.493 2.842a.75.75 0 011.06 0l5.25 5.25a.75.75 0 010 1.06l-5.25 5.25a.75.75 0 01-1.06-1.06l4.97-4.97-4.97-4.97a.75.75 0 010-1.06z"/></svg></div>
                        <span class="label">Evacuation Admin</span>
                        <span class="description">Emergency Teams</span>
                    </a>
                    <a href="<?php echo e(route('login.barangay')); ?>" class="role-btn">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75z"/></svg></div>
                        <span class="label">Barangay Admin</span>
                        <span class="description">Barangay Officials</span>
                    </a>
                    <a href="<?php echo e(route('home')); ?>" class="role-btn">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"/></svg></div>
                        <span class="label">Public</span>
                        <span class="description">Residents & Guests</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <div class="footer-container">
                <div class="footer-grid">
                    <div>
                        <div class="footer-logo">
                            <div class="footer-logo-img"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" style="width: 24px; height: 24px; fill: white;"><path d="M50 5L95 25v50L5 75V25L50 5z" fill="none" stroke="white" stroke-width="3"/><path d="M50 25v50M25 50h50" stroke="white" stroke-width="3"/></svg></div>
                            <div><span class="footer-logo-text">MDRRMO</span><span class="footer-logo-subtext">CAMALANIUGAN</span></div>
                        </div>
                        <p class="footer-description">The Municipal Disaster Risk Reduction and Management Office of Camalaniugan is committed to protecting lives and property through proactive planning, coordination, and community engagement.</p>
                        <div class="social-links">
                            <a href="#" class="social-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg></a>
                            <a href="#" class="social-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"/></svg></a>
                            <a href="#" class="social-link"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 1.25rem; height: 1.25rem;"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.153-1.772 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.468 2.37c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63z"/></svg></a>
                        </div>
                    </div>
                    <div>
                        <h4 class="footer-title">Quick Links</h4>
                        <ul class="footer-links">
                            <li><a href="#" class="footer-link">Home</a></li>
                            <li><a href="#features" class="footer-link">Features</a></li>
                            <li><a href="#" class="footer-link">About Us</a></li>
                            <li><a href="#" class="footer-link">Contact</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="footer-title">Resources</h4>
                        <ul class="footer-links">
                            <li><a href="#" class="footer-link">Emergency Guidelines</a></li>
                            <li><a href="#" class="footer-link">Evacuation Maps</a></li>
                            <li><a href="#" class="footer-link">Training Materials</a></li>
                            <li><a href="#" class="footer-link">Reports & Documents</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="footer-title">Emergency Hotline</h4>
                        <div class="footer-emergency">
                            <p class="footer-emergency-label">For emergencies, call:</p>
                            <p class="footer-emergency-number">911</p>
                        </div>
                        <p style="color: #9ca3af; font-size: 0.875rem; margin: 0;">MDRRMO Office:</p>
                        <p style="color: white; font-size: 0.875rem; margin: 0;">(078) 892-1234</p>
                    </div>
                </div>
                <div class="footer-bottom">
                    <div class="footer-copyright">
                        <div class="footer-municipal"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px; color: #9ca3af;"><path d="M11.584 2.376a.75.75 0 01.832 0l9 6a.75.75 0 11-.832 1.248L12 3.901 3.416 9.624a.75.75 0 01-.832-1.248l9-6z" /><path fill-rule="evenodd" d="M20.25 10.332v9.918H21a.75.75 0 010 1.5H3a.75.75 0 010-1.5h.75v-9.918a.75.75 0 01.634-.74A49.109 49.109 0 0112 9c2.59 0 5.134.202 7.616.592a.75.75 0 01.634.74z"/></svg></div>
                        <div><p class="footer-copyright-text">&copy; 2025 MDRRMO Camalaniugan. All rights reserved.</p><p class="footer-copyright-sub">Municipal Government of Camalaniugan, Cagayan</p></div>
                    </div>
                    <div class="footer-legal">
                        <a href="#" class="footer-legal-link">Privacy Policy</a>
                        <a href="#" class="footer-legal-link">Terms of Service</a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html><?php /**PATH C:\xampp\htdocs\proto\Prototype_compy - Copy - Copy\resources\views/welcome.blade.php ENDPATH**/ ?>