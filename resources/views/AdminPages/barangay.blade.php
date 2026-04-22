@extends('layouts.superlayout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Barangay Information') }}
    </h2>
@endsection

@section('content')
    <style>
        :root {
            --primary: #dc2626;
            --primary-light: #f87171;
            --primary-dark: #991b1b;
            --secondary: #0ea5e9;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1e293b;
            --dark-light: #334155;
            --gray: #64748b;
            --gray-light: #94a3b8;
            --gray-lighter: #e2e8f0;
            --gray-lightest: #f1f5f9;
            --white: #ffffff;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px -1px rgba(0, 0, 0, 0.1);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -2px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -4px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
            --radius-sm: 0.375rem;
            --radius: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
            --transition: all 0.3s ease;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--gray-lightest);
            color: var(--dark);
            line-height: 1.6;
        }

        .d-flex { display: flex; min-height: 100vh; }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 280px;
            background: linear-gradient(180deg, #0f172a 0%, #1e293b 100%);
            color: var(--white);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: var(--shadow-xl);
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
        }

        .sidebar-logo-icon {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
        }

        .sidebar-logo-icon svg { width: 24px; height: 24px; fill: white; }

        .sidebar-logo-title { font-size: 1.1rem; font-weight: 700; color: var(--white); }
        .sidebar-logo-subtitle { font-size: 0.65rem; color: #fca5a5; text-transform: uppercase; letter-spacing: 0.1em; }

        .sidebar-nav { padding: 1rem 0; }

        .nav-section { margin-bottom: 0.5rem; }
        .nav-section-title { padding: 0.75rem 1.5rem; font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.1em; color: var(--gray-light); }

        .nav-item { margin: 0.25rem 0.75rem; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            color: var(--gray-light);
            text-decoration: none;
            border-radius: var(--radius-lg);
            transition: var(--transition);
            font-size: 0.9rem;
            font-weight: 500;
            background: none;
            border: none;
            width: calc(100% - 1.5rem);
            cursor: pointer;
            text-align: left;
        }

        .nav-link:hover { background: rgba(255, 255, 255, 0.1); color: var(--white); transform: translateX(4px); }
        .nav-link.active { background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); color: var(--white); box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4); }
        .nav-link-icon { width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; }
        .nav-link-icon svg { width: 18px; height: 18px; fill: currentColor; }
        .nav-link-arrow { margin-left: auto; font-size: 0.75rem; transition: var(--transition); }
        .nav-link[aria-expanded="true"] .nav-link-arrow { transform: rotate(180deg); }

        .submenu { list-style: none; padding: 0; margin: 0.25rem 0 0.25rem 2.5rem; }
        .submenu .nav-link { padding: 0.75rem 1rem; font-size: 0.85rem; background: rgba(255, 255, 255, 0.05); }
        .submenu .nav-link:hover { background: rgba(255, 255, 255, 0.1); }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
            margin-left: 280px;
            padding: 2rem;
            background: var(--gray-lightest);
        }

        .page-header { margin-bottom: 2rem; }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--radius-lg);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .page-subtitle { color: var(--gray); margin-top: 0.25rem; font-size: 0.95rem; margin-left: 52px; }

        /* ===== CARDS ===== */
        .card {
            background: var(--white);
            border-radius: var(--radius-xl);
            box-shadow: var(--shadow);
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-lighter);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .card-title-icon { color: var(--primary); }

        .card-body { padding: 1.5rem; }

        /* ===== FORM STYLES ===== */
               .form-row { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; }

        .form-group { margin-bottom: 1rem; }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            border: 1px solid var(--gray-lighter);
            border-radius: var(--radius-lg);
            background: var(--gray-lightest);
            transition: var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.1);
        }

        /* ===== BUTTONS ===== */
        .btn-group { display: flex; gap: 0.75rem; flex-wrap: wrap; }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 0.9rem;
            font-weight: 600;
            border-radius: var(--radius-lg);
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(220, 38, 38, 0.4);
            color: var(--white);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--success) 0%, #059669 100%);
            color: var(--white);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .btn-success:hover {
            background: #059669;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.4);
            color: var(--white);
        }

        .btn-secondary {
            background: var(--gray-lighter);
            color: var(--dark);
        }

        .btn-secondary:hover {
            background: var(--gray-light);
            color: var(--dark);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--gray-lighter);
            color: var(--gray);
        }

        .btn-outline:hover {
            border-color: var(--gray);
            background: var(--gray-lightest);
            color: var(--dark);
        }

        /* ===== TABLE ===== */
        .table-container { overflow-x: auto; }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: var(--gray-lightest);
            padding: 1rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--gray);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--gray-lighter);
        }

        .table td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-lighter);
            font-size: 0.9rem;
            color: var(--dark);
            vertical-align: middle;
        }

        .table tbody tr:hover { background: var(--gray-lightest); }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons { display: flex; gap: 0.5rem; }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.8rem;
            font-weight: 500;
            border-radius: var(--radius);
            text-decoration: none;
            transition: var(--transition);
            border: none;
            cursor: pointer;
        }

        .action-btn.edit {
            background: rgba(79, 70, 229, 0.1);
            color: #4f46e5;
        }

        .action-btn.edit:hover {
            background: #4f46e5;
            color: var(--white);
        }

        .action-btn.delete {
            background: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .action-btn.delete:hover {
            background: var(--danger);
            color: var(--white);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 3rem;
            color: var(--gray);
        }

        .empty-state-icon {
            width: 80px;
            height: 80px;
            background: var(--gray-lightest);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
        }

        .empty-state-icon svg { width: 40px; height: 40px; fill: var(--gray-light); }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 992px) {
            .sidebar { width: 80px; }
            .sidebar-header { padding: 1rem; }
            .sidebar-logo-text { display: none; }
            .nav-section-title, .nav-link-text, .nav-link-arrow { display: none; }
            .nav-link { justify-content: center; padding: 0.875rem; }
            .main-content { margin-left: 80px; }
        }

        @media (max-width: 768px) {
            .sidebar { position: relative; width: 100%; height: auto; }
            .main-content { margin-left: 0; padding: 1rem; }
            .form-row { grid-template-columns: 1fr; }
            .page-title { font-size: 1.5rem; }
        }
    </style>

    <div class="d-flex">

        <!-- Main Content -->
        <div class="main-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1 class="page-title">
                    <span class="page-title-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                    </span>
                    Barangay Information
                </h1>
                <p class="page-subtitle">Manage and organize barangay data for the evacuation system</p>
            </div>

            <!-- Form Card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <span class="card-title-icon">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                        </span>
                        {{ isset($barangay) ? 'Edit Barangay' : 'Add New Barangay' }}
                    </h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ isset($barangay) ? route('barangay.update', $barangay->id) : route('barangay.store') }}">
                        @csrf
                        @if(isset($barangay)) @method('PUT') @endif
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="barangay_name" class="form-label">Barangay Name <span style="color: var(--danger);">*</span></label>
                                <input type="text" class="form-control" id="barangay_name" name="barangay_name" placeholder="Enter barangay name" required value="{{ isset($barangay) ? $barangay->name : old('barangay_name') }}">
                            </div>
                            <div class="form-group">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control" id="district" name="district" placeholder="Enter district (optional)" value="{{ isset($barangay) ? $barangay->district : old('district') }}">
                            </div>
                            <div class="form-group">
                                <label for="population" class="form-label">Population <span style="color: var(--danger);">*</span></label>
                                <input type="number" class="form-control" id="population" name="population" placeholder="Enter population" min="0" required value="{{ isset($barangay) ? $barangay->population : old('population') }}">
                            </div>
                        </div>
                        
                        <div class="btn-group" style="margin-top: 1rem;">
                            @if(isset($barangay))
                                <button type="submit" class="btn btn-success">
                                                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M17 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V7l-4-4zm-5 16c-1.66 0-3-1.34-3-3s1.34-3 3-3 3 1.34 3 3-1.34 3-3 3zm3-10H5V5h10v4z"/></svg>
                                    Update
                                </button>
                                <a href="{{ route('barangay.index') }}" class="btn btn-secondary">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
                                    Cancel
                                </a>
                            @else
                                <button type="submit" class="btn btn-primary">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                                    Save Barangay
                                </button>
                                <button type="reset" class="btn btn-outline">
                                    <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor"><path d="M12 5V1L7 6l5 5V7c3.31 0 6 2.69 6 6s-2.69 6-6 6-6-2.69-6-6H4c0 4.42 3.58 8 8 8s8-3.58 8-8-3.58-8-8-8z"/></svg>
                                    Reset
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <!-- Table Card -->
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        <span class="card-title-icon">
                            <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor"><path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"/></svg>
                        </span>
                        Existing Barangays
                        <span style="margin-left: auto; font-size: 0.85rem; font-weight: 500; color: var(--gray);">
                            Total: {{ count($barangays) }} barangays
                        </span>
                    </h2>
                </div>
                <div class="card-body" style="padding: 0;">
                    @if(count($barangays) > 0)
                        <div class="table-container">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 80px;">ID</th>
                                        <th>Barangay Name</th>
                                        <th>District</th>
                                        <th>Population</th>
                                        <th style="text-align: center; width: 150px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($barangays as $row)
                                        <tr>
                                            <td>
                                                <span style="display: inline-block; width: 32px; height: 32px; background: var(--gray-lightest); border-radius: var(--radius); text-align: center; line-height: 32px; font-weight: 600; font-size: 0.85rem; color: var(--gray);">
                                                    {{ $row->id }}
                                                </span>
                                            </td>
                                            <td>
                                                <div style="display: flex; align-items: center; gap: 0.75rem;">
                                                    <div style="width: 36px; height: 36px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%); border-radius: var(--radius); display: flex; align-items: center; justify-content: center;">
                                                        <svg viewBox="0 0 24 24" width="18" height="18" fill="white"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
                                                    </div>
                                                    <span style="font-weight: 600;">{{ $row->name }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                @if($row->district)
                                                    <span style="display: inline-block; padding: 0.375rem 0.75rem; background: var(--gray-lightest); border-radius: var(--radius); font-size: 0.85rem; color: var(--dark);">
                                                        {{ $row->district }}
                                                    </span>
                                                @else
                                                    <span style="color: var(--gray-light); font-style: italic;">Not specified</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div style="display: flex; align-items: center; gap: 0.5rem;">
                                                    <svg viewBox="0 0 24 24" width="16" height="16" fill="var(--secondary)"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3z"/></svg>
                                                    <span style="font-weight: 600; color: var(--secondary);">{{ number_format($row->population) }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="action-buttons" style="justify-content: center;">
                                                    <a href="{{ route('barangay.edit', $row->id) }}" class="action-btn edit">
                                                        <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                                                        Edit
                                                    </a>
                                                    <form method="POST" action="{{ route('barangay.destroy', $row->id) }}" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn delete" onclick="return confirm('Are you sure you want to delete this barangay? This action cannot be undone.')">
                                                            <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon">
                                <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </div>
                            <h3 style="font-size: 1.1rem; font-weight: 600; color: var(--dark); margin-bottom: 0.5rem;">No Barangays Found</h3>
                            <p style="font-size: 0.9rem; color: var(--gray);">Start by adding your first barangay to the system.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ===== SIDEBAR ACTIVE STATE =====
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.href;
            const navLinks = document.querySelectorAll('.nav-link');

            navLinks.forEach(link => {
                if (link.href && (link.href === currentUrl || currentUrl.includes(link.getAttribute('href')))) {
                    link.classList.add('active');
                }
            });

            // Auto-expand current submenu
            const activeSubmenu = document.querySelector('.nav-link.active');
            if (activeSubmenu) {
                const collapseElement = activeSubmenu.closest('.collapse');
                if (collapseElement) {
                    collapseElement.classList.add('show');
                    const parentLink = document.querySelector(`[data-bs-target="#${collapseElement.id}"]`);
                    if (parentLink) {
                        parentLink.setAttribute('aria-expanded', 'true');
                    }
                }
            }
        });

        // ===== FORM VALIDATION =====
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function(e) {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.style.borderColor = 'var(--danger)';
                    } else {
                        field.style.borderColor = 'var(--gray-lighter)';
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                }
            });
        }

        // ===== INPUT AUTO-FORMATTING =====
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = 'var(--gray-lighter)';
            });
        });
    </script>
@endsection