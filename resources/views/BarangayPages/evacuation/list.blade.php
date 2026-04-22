@extends('layouts.adminbarangay')

@section('title', 'Evacuee Dashboard')

@section('content')
<style>
/* Modern Dashboard Styles */
:root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --success: #10b981;
    --warning: #f59e0b;
    --danger: #ef4444;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-600: #4b5563;
    --gray-800: #1f2937;
    --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
}

.main-content {
    padding: 2rem;
    background: var(--gray-50);
    min-height: 100vh;
    margin-top: 1rem;
    padding: 0 0 2rem 2rem !important; /* ZERO top padding */
    margin: 0 !important;
}

.dashboard-header {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 0.1rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 1.75rem 1.5rem;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    border-top: 4px solid var(--primary);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    width: 200px;
    height: 120px;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1);
}

.stat-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 0.75rem;
    flex-wrap: nowrap; /* PREVENT WRAPPING */
}

.stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0; /* DON'T SHRINK */
}

.stat-number {
    font-size: 2.25rem;
    font-weight: 800;
    color: var(--gray-800);
    line-height: 1;
    margin: 0;
    min-width: 80px; /* FIXED WIDTH */
}

.stat-label {
    font-size: 0.85rem;
    color: var(--gray-600);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 600;
    margin: 0;
    line-height: 1.2;
}

.stat-primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
.stat-success { background: linear-gradient(135deg, var(--success), #059669); color: white; }
.stat-warning { background: linear-gradient(135deg, var(--warning), #d97706); color: white; }
.stat-danger { background: linear-gradient(135deg, var(--danger), #dc2626); color: white; }

/* Navigation Pills */
.nav-pills-modern {
    background: white;
    border-radius: 16px;
    padding: 8px;
    box-shadow: var(--shadow);
    margin-bottom: 1rem;
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.nav-pills-modern .nav-link {
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    color: var(--gray-600);
}

.nav-pills-modern .nav-link:hover {
    color: var(--primary);
    background: var(--gray-50);
    transform: translateY(-2px);
}

.nav-pills-modern .nav-link.active {
    background: var(--primary);
    color: white;
    box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
}

/* Main Table Card */
.table-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow);
}

.table-card-header {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.search-input {
    max-width: 300px;
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 12px 20px;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    outline: none;
}

/* Enhanced Table */
.table-modern {
    margin: 0;
    font-size: 0.9rem;
}

.table-modern th {
    background: var(--gray-50);
    font-weight: 600;
    color: var(--gray-800);
    padding: 1.25rem 1rem;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border: none;
    white-space: nowrap;
}

.table-modern td {
    padding: 1.25rem 1rem;
    vertical-align: middle;
    border-color: var(--gray-200);
}

.name-cell { font-weight: 600; color: var(--gray-800); }

/* Status Badges */
.badge-modern {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.btn-modern:hover { transform: translateY(-1px); }
.btn-primary-modern { background: var(--primary); color: white; }
.btn-danger-modern { background: var(--danger); color: white; }
.btn-primary-modern:hover { background: var(--primary-dark); }
.btn-danger-modern:hover { background: #dc2626; }

/* Modal Enhancements */
.modal-modern .modal-content {
    border-radius: 20px;
    border: none;
    box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.25);
}

.modal-modern .modal-header {
    border-bottom: 1px solid var(--gray-200);
    padding: 1.5rem 2rem;
}

.modal-modern .modal-body {
    padding: 2rem;
}

/* ✅ SUPER VISIBLE TEXT - Replace existing info styles */
.info-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
    margin-bottom: 2rem;
}

.info-item {
    background: white !important;           /* ✅ WHITE background */
    padding: 1.5rem;
    border-radius: 12px;
    border: 2px solid #e5e7eb;             /* ✅ Visible border */
    box-shadow: 0 4px 12px rgba(0,0,0,0.08); /* ✅ Subtle shadow */
}

.info-item h6 {
    color: var(--gray-800) !important;     /* ✅ DARK title */
    font-weight: 700 !important;
}

.family-card {
    background: white !important;          /* ✅ WHITE background */
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 1rem;
    border: 2px solid #d1d5db;             /* ✅ Visible border */
    border-left: 4px solid var(--success);
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

.family-card:hover {
    background: #fefefe !important;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    border-color: var(--success);
}

.family-card h6 {
    color: var(--gray-800) !important;     /* ✅ DARK names */
    font-weight: 700 !important;
}

/* ✅ SUPER VISIBLE TEXT */
.info-item strong,
.name-cell,
.family-card strong {
    color: var(--gray-900) !important;     /* ✅ BLACK text */
    font-weight: 800 !important;
}

.info-item span,
.family-card .small {
    color: var(--gray-700) !important;     /* ✅ DARK gray */
}

/* ✅ BETTER BADGES */
.badge-modern {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.85rem;
    font-weight: 700 !important;           /* ✅ BOLDER */
    text-transform: uppercase;
    color: var(--gray-800) !important;     /* ✅ DARK text */
    border: 2px solid;                     /* ✅ THICKER border */
}
.badge-success { background: rgba(16, 185, 129, 0.1); color: var(--success); border: 2px solid rgba(16, 185, 129, 0.2); }
.badge-warning { background: rgba(245, 158, 11, 0.1); color: var(--warning); border: 2px solid rgba(245, 158, 11, 0.2); }
.badge-danger { background: rgba(239, 68, 68, 0.1); color: var(--danger); border: 2px solid rgba(239, 68, 68, 0.2); }
.badge-info { background: rgba(37, 99, 235, 0.1); color: var(--primary); border: 2px solid rgba(37, 99, 235, 0.2); }
.badge-secondary { background: rgba(75, 85, 99, 0.1); color: var(--gray-600); border: 2px solid rgba(75, 85, 99, 0.2); }


/* ✅ Modal header text */
.modal-title {
    color: var(--gray-900) !important;
}

/* Responsive */
@media (min-width: 1200px) {
    .stats-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

@media (max-width: 1199px) and (min-width: 768px) {
    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    .nav-pills-modern { flex-direction: column; }
    .info-grid { grid-template-columns: 1fr; }
    .search-input { max-width: 100%; margin-bottom: 1rem; }
}
@media (max-width: 767px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    .stat-content {
        gap: 0.75rem;
    }
    .stat-number {
        font-size: 2rem;
    }
}

/* Loading Animation */
.loading {
    opacity: 0.6;
    pointer-events: none;
}

.spinner-sm {
    width: 16px;
    height: 16px;
} 
/* Webkit Browsers (Chrome, Safari, Edge) */
::-webkit-scrollbar {
    width: 8px; /* Thin scrollbar */
}

::-webkit-scrollbar-track {
    background: var(--gray-100); /* Very subtle background */
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: var(--gray-400); /* Subtle gray */
    border-radius: 10px;
    transition: all 0.2s ease;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--gray-500); /* Slightly darker on hover */
}

/* Table-specific scrollbar */
.table-responsive::-webkit-scrollbar {
    width: 6px; /* Even thinner for tables */
}

.table-responsive::-webkit-scrollbar-track {
    background: transparent;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: rgba(156, 163, 175, 0.4); /* Very subtle */
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: rgba(156, 163, 175, 0.6);
}

/* Modal scrollbar */
.modal-body::-webkit-scrollbar {
    width: 6px;
}

.modal-body::-webkit-scrollbar-track {
    background: var(--gray-100);
}

.modal-body::-webkit-scrollbar-thumb {
    background: rgba(107, 114, 128, 0.3); /* Ultra subtle */
}

.modal-body::-webkit-scrollbar-thumb:hover {
    background: rgba(107, 114, 128, 0.5);
}

/* Firefox Custom Scrollbar */
* {
    scrollbar-width: thin;
    scrollbar-color: var(--gray-400) var(--gray-100);
}

/* Ensure it works on all scrollable elements */
.table-responsive,
.modal-body,
#viewEvacueeModalBody {
    scrollbar-width: thin;
    scrollbar-color: rgba(156, 163, 175, 0.4) transparent;
}
/* MODAL FIX - Critical overrides */
.modal-backdrop {
    z-index: 1040 !important;
}

.modal {
    z-index: 1055 !important;
}

.modal-modern.show {
    display: block !important;
    opacity: 1 !important;
}

/* ✅ FIXED - Correct ID */
#evacueeModalBody {
    max-height: 70vh;
    overflow-y: auto;
}
.btn-warning-modern { 
    background: var(--warning); 
    color: white; 
}
.btn-warning-modern:hover { 
    background: #d97706; 
}
/* ✅ STEP WIZARD STYLES */
.step-content {
    display: none;
}
.step-content.active {
    display: block !important;
}

.step-indicator {
    background: rgba(255,255,255,0.2);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
}

.family-member-item {
    background: white;
    border: 2px solid #e5e7eb;
    border-radius: 12px;
    padding: 1.25rem;
    margin-bottom: 1rem;
}

.family-remove-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: var(--danger);
    color: white;
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    font-size: 14px;
}
</style>

<div class="main-content">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <h1 class="h3 mb-1 fw-bold text-gray-800">
                    <i class="fas fa-home-heart text-primary me-2"></i>
                    Evacuation Center Dashboard
                </h1>
                <p class="mb-0 text-muted">Real-time management of evacuees and resources</p>
            </div>
            <div class="d-flex gap-2">
                <span class="badge bg-success fs-6 px-3 py-2">Live Data</span>
                <span class="badge bg-light text-dark fs-6 px-3 py-2">
                    <i class="fas fa-clock me-1"></i>Updated Now
                </span>
            </div>
        </div>
    </div>

        <!-- Stats Cards - HORIZONTAL ROW, PERFECT ALIGNMENT -->
        <div class="stats-grid">
            <!-- Total Evacuees -->
            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon stat-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <h1 class="stat-number" id="total-evacuees">{{ $evacueeCount ?? 0 }}</h1>
                </div>
                <p class="stat-label">Total Evacuees</p>
            </div>
            
            <!-- Pending -->
            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon stat-warning">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h1 class="stat-number" id="pending-evacuees">{{ $potentialCount ?? 0 }}</h1>
                </div>
                <p class="stat-label">Pending Registration</p>
            </div>
            
            <!-- Bed Occupancy -->
            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon stat-success">
                        <i class="fas fa-bed"></i>
                    </div>
                    <h1 class="stat-number">95%</h1>
                </div>
                <p class="stat-label">Bed Occupancy</p>
            </div>
            
            <!-- Medical Priority -->
            <div class="stat-card">
                <div class="stat-content">
                    <div class="stat-icon stat-danger">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h1 class="stat-number">3</h1>
                </div>
                <p class="stat-label">Medical Priority</p>
            </div>
        </div>

    <!-- Navigation Pills -->
    <div class="nav-pills-modern">
        <a href="{{ route('evacuation.list') }}" class="nav-link active">
            <i class="fas fa-list me-2"></i>Evacuee List
        </a>
        <a href="{{ route('evacuation.register') }}" class="nav-link">
            <i class="fas fa-plus me-2"></i>Register New
        </a>
       <a href="{{ route('evacuation.potential') }}" class="nav-link">
            <i class="fas fa-users-cog me-2"></i>Potential <span class="badge bg-warning text-dark ms-1">{{ $potentialCount ?? 0 }}</span>
        </a>
        <a href="{{ route('evacuation.inventory') }}" class="nav-link">
            <i class="fas fa-boxes me-2"></i>Inventory
        </a>
        <a href="{{ route('barangay.reports') }}" class="nav-link">
            <i class="fas fa-chart-bar me-2"></i>Reports
        </a>
    </div>

    <!-- Main Content Table -->
    <div class="table-card">
        <div class="table-card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold text-gray-800">
                    <i class="fas fa-table me-2 text-primary"></i>
                    Current Evacuees List
                </h5>
                <small class="text-muted">{{ $evacuees->count() ?? 0 }} registered</small>
            </div>
            <div class="d-flex align-items-center gap-2">
                <input type="text" class="form-control search-input" id="searchInput" 
                       placeholder="🔍 Search by name, purok..." autocomplete="off">
                <button class="btn btn-primary-modern px-4" onclick="exportData()">
                    <i class="fas fa-download me-1"></i>Export
                </button>
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-modern" id="evacueeTable">
                <thead>
                    <tr>
                        <th><i class="fas fa-user me-1"></i>Evacuee</th>
                        <th><i class="fas fa-calendar me-1"></i>Age</th>
                        <th><i class="fas fa-venus-mars me-1"></i>Gender</th>
                        <th><i class="fas fa-map-marker-alt me-1"></i>Purok</th>
                        <th><i class="fas fa-notes-medical me-1"></i>Medical</th>
                        <th><i class="fas fa-bed me-1"></i>Bed</th>
                        <th><i class="fas fa-users me-1"></i>Family</th>
                        <th><i class="fas fa-info-circle me-1"></i>Status</th>
                        <th><i class="fas fa-cogs me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Dynamic content -->
                </tbody>
            </table>
        </div>
        
        @if($evacuees->count() > 10)
        <div class="p-4 bg-light border-top">
            <small class="text-muted">
                Showing {{ $evacuees->count() }} of {{ $evacueeCount ?? 0 }} total evacuees
            </small>
        </div>
        @endif
    </div>
</div>

<!-- Enhanced Toasts -->
<div class="toast-container position-fixed p-3" style="top: 1.5rem; right: 1.5rem; z-index: 1080;">
    <div id="successToast" class="toast shadow-lg border-0" role="alert">
        <div class="toast-header bg-success text-white">
            <i class="fas fa-check-circle me-2"></i>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            Evacuee removed successfully!
        </div>
    </div>
    
    <div id="errorToast" class="toast shadow-lg border-0" role="alert">
        <div class="toast-header bg-danger text-white">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <span id="errorMessage">An error occurred</span>
        </div>
    </div>
</div>

    <!-- FIXED MODAL with WORKING CLOSE BUTTONS -->
    <div class="modal fade modal-modern" id="evacueeDetailsModal" tabindex="-1" aria-labelledby="evacueeDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold fs-4 text-dark" id="evacueeDetailsModalLabel">
                        <i class="fas fa-user-circle text-primary me-2"></i>
                        Evacuee Profile Details
                    </h5>
                    <!-- ✅ FIXED: Custom close handler -->
                    <button type="button" class="btn-close" onclick="closeModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0" id="evacueeModalBody">
                    <div class="p-4 pb-2">
                        <!-- Dynamic content -->
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <p class="mt-2 text-muted">Loading evacuee details...</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-0 pt-0">
                    <!-- ✅ FIXED: Custom close handler -->
                    <button type="button" class="btn btn-outline-primary px-4" onclick="closeModal()">
                        <i class="fas fa-times me-2"></i>Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- ✅ MULTI-STEP EDIT MODAL -->
<div class="modal fade modal-modern" id="editEvacueeModal" tabindex="-1" aria-labelledby="editEvacueeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0 bg-primary text-white">
                <h5 class="modal-title fw-bold fs-4" id="editEvacueeModalLabel">
                    <i class="fas fa-edit me-2"></i>
                    <span id="editStepTitle">Edit Personal Info</span>
                </h5>
                <div class="d-flex gap-2">
                    <small class="step-indicator" id="stepIndicator">Step 1 of 2</small>
                    <button type="button" class="btn-close btn-close-white" onclick="closeEditModal()" aria-label="Close"></button>
                </div>
            </div>
            
            <form id="editEvacueeForm">
                <input type="hidden" id="editEvacueeId" name="id">
                
                <!-- STEP 1: PERSONAL INFO -->
                <div class="modal-body p-4 step-content active" id="step1">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="editName" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Age</label>
                            <input type="number" class="form-control" id="editAge" name="age" min="0" max="120">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Gender</label>
                            <select class="form-select" id="editGender" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Purok</label>
                            <input type="text" class="form-control" id="editPurok" name="purok">
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold text-dark">Medical Condition</label>
                            <select class="form-select" id="editMedical" name="medical_condition">
                                <option value="None">None</option>
                                <option value="Diabetes">Diabetes</option>
                                <option value="Hypertension">Hypertension</option>
                                <option value="Asthma">Asthma</option>
                                <option value="Pregnant">Pregnant</option>
                                <option value="Elderly">Elderly (65+)</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-bold text-dark">Center Assignment</label>
                            <input type="text" class="form-control" id="editCenter" name="center_assignment" placeholder="e.g., Main Hall, Room 2">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold text-dark">Status</label>
                            <select class="form-select" id="editStatus" name="status">
                                <option value="Registered">Evacuated</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- STEP 2: FAMILY MEMBERS -->
                <div class="modal-body p-4 step-content" id="step2" style="display:none;">
                    <div id="familyMembersList">
                        <!-- Dynamic family members -->
                    </div>
                    
                    <!-- ADD NEW FAMILY MEMBER -->
                    <div class="family-member-form mt-4 p-3 border rounded bg-light">
                        <h6 class="fw-bold text-primary mb-3">
                            <i class="fas fa-plus-circle me-2"></i>Add New Family Member
                        </h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label fw-bold text-dark">Name</label>
                                <input type="text" class="form-control family-input" name="family_name[]" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label fw-bold text-dark">Age</label>
                                <input type="number" class="form-control family-input" name="family_age[]" min="0" max="120">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-dark">Relationship</label>
                                <select class="form-select family-input" name="family_relationship[]">
                                    <option value="Spouse">Spouse</option>
                                    <option value="Child">Child</option>
                                    <option value="Parent">Parent</option>
                                    <option value="Sibling">Sibling</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-bold text-dark">Medical</label>
                                <select class="form-select family-input" name="family_medical[]">
                                    <option value="None">None</option>
                                    <option value="Diabetes">Diabetes</option>
                                    <option value="Hypertension">Hypertension</option>
                                    <option value="Asthma">Asthma</option>
                                    <option value="Pregnant">Pregnant</option>
                                    <option value="Elderly">Elderly</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="btn btn-success btn-sm" onclick="addFamilyMember()">
                                <i class="fas fa-plus me-1"></i>Add Another
                            </button>
                        </div>
                    </div>
                </div>
            </form>
            
            <!-- STEP NAVIGATION -->
            <div class="modal-footer bg-light border-0 pt-3 pb-3">
                <button type="button" class="btn btn-outline-secondary px-4 d-none" id="prevStepBtn" onclick="prevStep()">
                    <i class="fas fa-arrow-left me-2"></i>Previous
                </button>
                <div class="ms-auto d-flex gap-2">
                    <button type="button" class="btn btn-outline-secondary px-4" onclick="closeEditModal()">
                        <i class="fas fa-times me-2"></i>Cancel
                    </button>
                    <button type="button" class="btn btn-primary px-4" id="nextStepBtn" onclick="nextStep()">
                        Next <i class="fas fa-arrow-right ms-1"></i>
                    </button>
                    <button type="submit" class="btn btn-success px-4 d-none" id="saveBtn" form="editEvacueeForm">
                        <span class="spinner-border spinner-border-sm me-2 d-none" id="editSpinner"></span>
                        <i class="fas fa-save me-2"></i>Save All Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
console.clear(); // Clear console for clean debug

let evacuees = @json($evacuees ?? []);
console.log('🔥 DEBUG: evacuees data:', evacuees);
console.log('🔥 DEBUG: evacuees length:', evacuees.length);

document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ DOM loaded');
    
    // DEBUG: Check if elements exist
    console.log('🔥 DEBUG: tableBody exists?', !!document.getElementById('tableBody'));
    console.log('🔥 DEBUG: modal exists?', !!document.getElementById('evacueeDetailsModal'));
    console.log('🔥 DEBUG: modalBody exists?', !!document.getElementById('evacueeModalBody'));
    
    renderTable();
    initSearch();
    updateStats();
});

// BULLETPROOF MODAL FUNCTION
function viewEvacuee(id) {
    console.log('🚨 VIEW CLICKED! ID:', id);
    
    // STEP 1: Find evacuee
    const evacuee = evacuees.find(e => e.id == id);
    console.log('🚨 Found evacuee:', evacuee);
    
    if (!evacuee) {
        alert('❌ NO EVACUEE FOUND FOR ID: ' + id);
        console.error('❌ Evacuees list:', evacuees);
        return;
    }
    
    // STEP 2: FORCE content load
    loadModalContent(evacuee);
    
    // STEP 3: BULLETPROOF MODAL SHOW
    setTimeout(() => {
        const modal = document.getElementById('evacueeDetailsModal');
        const modalBody = document.getElementById('evacueeModalBody');
        
        console.log('🚨 Modal element:', modal);
        console.log('🚨 ModalBody element:', modalBody);
        
        if (!modal) {
            alert('❌ MODAL ELEMENT NOT FOUND!');
            return;
        }
        
        // FORCE SHOW - NO BOOTSTRAP DEPENDENCY
        modal.style.display = 'block';
        modal.classList.add('show');
        modal.setAttribute('aria-modal', 'true');
        modal.setAttribute('role', 'dialog');
        document.body.classList.add('modal-open');
        document.body.style.overflow = 'hidden';
        document.body.style.paddingRight = '17px';
        
        // CREATE BETTER BACKDROP
        let backdrop = document.querySelector('.modal-backdrop');
        if (!backdrop) {
            backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade show';
            backdrop.style.cssText = `
                position: fixed;
                top: 0;
                left: 0;
                width: 100vw;
                height: 100vh;
                background: rgba(0,0,0,0.5);
                z-index: 1040;
                cursor: pointer;
            `;
            document.body.appendChild(backdrop);
        }
        
        console.log('✅ MODAL FORCED OPEN!');
        console.log('✅ Check screen - modal should be VISIBLE NOW');
        
    }, 100);
}

function loadModalContent(evacuee) {
    console.log('📱 LOADING FULL CONTENT:', evacuee.name);
    
    const modalBody = document.getElementById('evacueeModalBody');
    if (!modalBody) {
        console.error('❌ MODAL BODY NOT FOUND!');
        return;
    }

    // ✅ FULL FAMILY HTML
    const familyHTML = evacuee.family_members?.length ? 
        evacuee.family_members.map((member, idx) => `
            <div class="family-card mb-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <div>
                        <h6 class="mb-1 fw-bold text-gray-800">${member.name || 'Unknown'}</h6>
                        <span class="badge badge-modern badge-success">${member.relationship || 'N/A'}</span>
                    </div>
                    <div class="text-end">
                        <span class="badge badge-info fs-6">${member.age || '?'}</span>
                    </div>
                </div>
                <div class="small text-muted">
                    Medical: <strong>${member.medical_condition || 'None'}</strong> • 
                    Bed: <strong>${member.bed_assignment || 'TBD'}</strong>
                </div>
            </div>
        `).join('') : 
        '<div class="text-center py-4"><i class="fas fa-users-slash fa-2x text-muted mb-3"></i><p class="text-muted mb-0">No family members</p></div>';

    // ✅ FULL MODAL CONTENT - ALL YOUR BEAUTIFUL DESIGN
    modalBody.innerHTML = `
        <div class="p-4 pb-2">
            <div class="info-grid">
                <!-- PERSONAL INFO CARD -->
                <div class="info-item">
                    <h6 class="fw-bold mb-4 text-primary">
                        <i class="fas fa-id-card me-2"></i>Personal Info
                    </h6>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-user text-primary me-2 fs-5"></i>
                                <strong>${evacuee.name || 'N/A'}</strong>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-calendar text-warning me-2"></i>
                                <span>${evacuee.age || 'N/A'} years</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-venus-mars text-info me-2"></i>
                                <span>${evacuee.gender || 'N/A'}</span>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-map-marker-alt text-success me-2"></i>
                                <span class="badge badge-success">${evacuee.purok || 'N/A'}</span>
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col-6">
                            <span class="badge badge-modern badge-success fs-6 w-100 p-2">${evacuee.status || 'Active'}</span>
                        </div>
                        <div class="col-6">
                            <span class="badge badge-modern badge-danger fs-6 w-100 p-2">${evacuee.medical_condition || 'None'}</span>
                        </div>
                    </div>
                </div>
                
                <!-- CENTER ASSIGNMENT CARD -->
                <div class="info-item">
                    <h6 class="fw-bold mb-4 text-primary">
                        <i class="fas fa-building me-2"></i>Center Assignment
                    </h6>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-bed text-success me-2"></i>
                                <strong>${evacuee.center_assignment || 'Pending'}</strong>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-flex align-items-center text-muted">
                                <i class="fas fa-calendar-check me-2"></i>
                                ${evacuee.created_at ? new Date(evacuee.created_at).toLocaleString() : 'N/A'}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- FAMILY MEMBERS SECTION -->
            <div class="info-item mt-4">
                <h6 class="fw-bold mb-4 text-primary">
                    <i class="fas fa-users me-2"></i>Family Members 
                    <span class="badge bg-primary ms-2">${evacuee.family_members?.length || 0}</span>
                </h6>
                ${familyHTML}
            </div>
        </div>
    `;
    
    console.log('✅ FULL CONTENT LOADED - Check modal!');
}
function closeModal() {
    console.log('🔒 Closing modal...');
    
    const modal = document.getElementById('evacueeDetailsModal');
    if (modal) {
        modal.style.display = 'none';
        modal.classList.remove('show');
    }
    
    // Clean up body
    document.body.classList.remove('modal-open');
    document.body.style.overflow = '';
    document.body.style.paddingRight = '';
    
    // Remove ALL backdrops
    document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
        backdrop.remove();
    });
    
    console.log('✅ MODAL FULLY CLOSED');
}

// ✅ Add backdrop click to close
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal-backdrop')) {
        closeModal();
    }
});

function renderTable(filteredEvacuees = evacuees) {
    const tbody = document.getElementById('tableBody');
    
    if (!tbody) {
        console.error('❌ tableBody not found');
        return;
    }
    
    if (filteredEvacuees.length === 0) {
        tbody.innerHTML = `
            <tr class="text-center">
                <td colspan="9" class="py-5">
                    <i class="fas fa-users fa-3x text-muted mb-3 d-block"></i>
                    <h5 class="text-muted mb-1">No evacuees found</h5>
                    <p class="text-muted mb-0">Try adjusting your search terms</p>
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = filteredEvacuees.map(person => {
        const familyCount = person.family_members?.length || 0;
        const medicalBadge = person.medical_condition === 'None' ? 
            '<span class="badge badge-modern badge-secondary">Normal</span>' : 
            `<span class="badge badge-modern badge-danger">${person.medical_condition}</span>`;
        
        // In renderTable function, statusBadge:
        const statusBadge = person.status === 'Registered' ? 
            '<span class="badge badge-modern badge-success">Evacuated</span>' :
            '<span class="badge badge-modern badge-warning">Pending</span>';

        return `
            <tr>
                <td class="name-cell">${person.name || 'N/A'}</td>
                <td>${person.age || 'N/A'}</td>
                <td>
                    <i class="fas ${person.gender === 'Male' ? 'fa-mars' : 'fa-venus'} text-${person.gender === 'Male' ? 'primary' : 'danger'} me-1"></i>
                    ${person.gender || 'N/A'}
                </td>
                <td><span class="badge badge-modern badge-info">${person.purok || 'N/A'}</span></td>
                <td>${medicalBadge}</td>
                <td><span class="badge badge-modern badge-info">${person.center_assignment || 'Pending'}</span></td>
                <td>
                    ${familyCount > 0 ? 
                        `<span class="badge badge-modern badge-success">${familyCount} members</span>` : 
                        '<span class="badge badge-modern badge-secondary">Solo</span>'
                    }
                </td>
                <td>${statusBadge}</td>
                <td>
                    <div class="d-flex gap-1">
                        <button class="btn btn-modern btn-primary-modern" 
                                onclick="viewEvacuee(${person.id})" title="View Profile">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-modern btn-warning" 
                                onclick="editEvacuee(${person.id})" title="Edit">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-modern btn-danger-modern" onclick="removeEvacuee(${person.id})" title="Remove">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;
    }).join('');
}

function initSearch() {
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase();
            const filtered = evacuees.filter(person => 
                person.name?.toLowerCase().includes(query) ||
                person.purok?.toLowerCase().includes(query) ||
                person.gender?.toLowerCase().includes(query) ||
                person.medical_condition?.toLowerCase().includes(query)
            );
            renderTable(filtered);
        });
    }
}

function showAlert(message) {
    console.warn('⚠️ Alert:', message);
    const toast = document.getElementById('errorToast');
    if (toast) {
        document.getElementById('errorMessage').textContent = message;
        const toastInstance = new bootstrap.Toast(toast);
        toastInstance.show();
    } else {
        alert(message); // Fallback
    }
}


function updateStats() {
    const totalEl = document.getElementById('total-evacuees');
    const pendingEl = document.getElementById('pending-evacuees');
    
    if (totalEl) totalEl.textContent = evacuees.length;
    if (pendingEl) pendingEl.textContent = evacuees.filter(e => e.status !== 'Registered').length;
}

function removeEvacuee(id) {
    if (!confirm('Remove this evacuee from the list?\nThis cannot be undone.')) return;

    const row = event.target.closest('tr');
    const btn = event.target.closest('button');
    const originalHTML = btn.innerHTML;
    
    btn.innerHTML = '<span class="spinner-sm spinner-border spinner-border-sm me-1"></span>Removing...';
    btn.disabled = true;
    row.classList.add('loading');

    fetch(`/evacuation/evacuee/${id}`, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            evacuees = evacuees.filter(e => e.id != id);
            renderTable();
            updateStats();
            showToast('successToast');
        } else {
            throw new Error(data.message || 'Failed to remove');
        }
    })
    .catch(err => {
        console.error(err);
        showToast('errorToast', err.message);
        btn.innerHTML = originalHTML;
        btn.disabled = false;
        row.classList.remove('loading');
    });
}

function exportData() {
    const csv = [
        ['Name', 'Age', 'Gender', 'Purok', 'Medical', 'Bed', 'Status', 'Registered'],
        ...evacuees.map(e => [
            e.name, e.age, e.gender, e.purok, e.medical_condition, 
            e.center_assignment, e.status, e.created_at
        ])
    ].map(row => row.map(cell => `"${cell}"`).join(',')).join('\n');
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = window.URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `evacuees_${new Date().toISOString().split('T')[0]}.csv`;
    a.click();
    window.URL.revokeObjectURL(url);
}

function showToast(toastId, message = '') {
    const toast = document.getElementById(toastId);
    if (!toast) return;
    
    if (message) {
        document.getElementById('errorMessage').textContent = message;
    }
    const toastInstance = new bootstrap.Toast(toast);
    toastInstance.show();
}
// ✅ EDIT FUNCTIONS
let currentEditStep = 1;
let familyMembersCount = 0;
function editEvacuee(id) {
    console.log('✏️ Multi-step edit for ID:', id);
    
    const evacuee = evacuees.find(e => e.id == id);
    if (!evacuee) {
        alert('Evacuee not found!');
        return;
    }
    
    // Reset
    currentEditStep = 1;
    familyMembersCount = 0;
    document.getElementById('familyMembersList').innerHTML = '';
    
    // Populate personal info
    document.getElementById('editEvacueeId').value = evacuee.id;
    document.getElementById('editName').value = evacuee.name || '';
    document.getElementById('editAge').value = evacuee.age || '';
    document.getElementById('editGender').value = evacuee.gender || 'Male';
    document.getElementById('editPurok').value = evacuee.purok || '';
    document.getElementById('editMedical').value = evacuee.medical_condition || 'None';
    document.getElementById('editCenter').value = evacuee.center_assignment || '';
    document.getElementById('editStatus').value = evacuee.status || 'Registered';
    
    // Load existing family members
    if (evacuee.family_members && evacuee.family_members.length > 0) {
        evacuee.family_members.forEach((member, index) => {
            addFamilyMember(member, index);
        });
    }
    
    showEditModal();
}

function showEditModal() {
    const modal = document.getElementById('editEvacueeModal');
    modal.style.display = 'block';
    modal.classList.add('show');
    document.body.classList.add('modal-open');
    document.body.style.overflow = 'hidden';
    
    updateStepUI();
    // Create backdrop...
}
function updateStepUI() {
    // Update title and indicator
    document.getElementById('stepIndicator').textContent = `Step ${currentEditStep} of 2`;
    document.getElementById('editStepTitle').textContent = 
        currentEditStep === 1 ? 'Edit Personal Info' : 'Edit Family Members';
    
    // Show/hide steps
    document.getElementById('step1').classList.toggle('active', currentEditStep === 1);
    document.getElementById('step2').classList.toggle('active', currentEditStep === 2);
    
    // Update buttons
    document.getElementById('prevStepBtn').classList.toggle('d-none', currentEditStep === 1);
    document.getElementById('nextStepBtn').classList.toggle('d-none', currentEditStep === 2);
    document.getElementById('saveBtn').classList.toggle('d-none', currentEditStep !== 2);
}
function nextStep() {
    if (currentEditStep === 1) {
        currentEditStep = 2;
        updateStepUI();
    }
}

function prevStep() {
    if (currentEditStep === 2) {
        currentEditStep = 1;
        updateStepUI();
    }
}
// ✅ FAMILY MEMBER FUNCTIONS
function addFamilyMember(memberData = null, index = null) {
    const container = document.getElementById('familyMembersList');
    const memberId = index !== null ? index : familyMembersCount++;
    
    const memberHTML = `
        <div class="family-member-item position-relative mb-3 p-3" data-member-id="${memberId}">
            <button type="button" class="family-remove-btn" onclick="removeFamilyMember(${memberId})" title="Remove">
                <i class="fas fa-times"></i>
            </button>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label fw-bold text-dark small">Name</label>
                    <input type="text" class="form-control" name="family_name[]" value="${memberData?.name || ''}" required>
                </div>
                <div class="col-md-2">
                    <label class="form-label fw-bold text-dark small">Age</label>
                    <input type="number" class="form-control" name="family_age[]" value="${memberData?.age || ''}" min="0" max="120">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold text-dark small">Relationship</label>
                    <select class="form-select" name="family_relationship[]">
                        <option value="Spouse" ${memberData?.relationship === 'Spouse' ? 'selected' : ''}>Spouse</option>
                        <option value="Child" ${memberData?.relationship === 'Child' ? 'selected' : ''}>Child</option>
                        <option value="Parent" ${memberData?.relationship === 'Parent' ? 'selected' : ''}>Parent</option>
                        <option value="Sibling" ${memberData?.relationship === 'Sibling' ? 'selected' : ''}>Sibling</option>
                        <option value="Other" ${memberData?.relationship === 'Other' ? 'selected' : ''}>Other</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold text-dark small">Medical</label>
                    <select class="form-select" name="family_medical[]">
                        <option value="None" ${memberData?.medical_condition === 'None' ? 'selected' : ''}>None</option>
                        <option value="Diabetes" ${memberData?.medical_condition === 'Diabetes' ? 'selected' : ''}>Diabetes</option>
                        <option value="Hypertension" ${memberData?.medical_condition === 'Hypertension' ? 'selected' : ''}>Hypertension</option>
                        <option value="Asthma" ${memberData?.medical_condition === 'Asthma' ? 'selected' : ''}>Asthma</option>
                        <option value="Pregnant" ${memberData?.medical_condition === 'Pregnant' ? 'selected' : ''}>Pregnant</option>
                        <option value="Elderly" ${memberData?.medical_condition === 'Elderly' ? 'selected' : ''}>Elderly</option>
                    </select>
                </div>
            </div>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', memberHTML);
}

function removeFamilyMember(memberId) {
    document.querySelector(`[data-member-id="${memberId}"]`).remove();
}
function closeEditModal() {
    const modal = document.getElementById('editEvacueeModal');
    modal.style.display = 'none';
    modal.classList.remove('show');
    document.body.classList.remove('modal-open');
    document.body.style.overflow = '';
    
    // Remove backdrop
    document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
    
    // Reset form
    document.getElementById('editEvacueeForm').reset();
}

// ✅ FIXED FORM SUBMIT - No FormData issues!
document.getElementById('editEvacueeForm')?.addEventListener('submit', function(e) {
    e.preventDefault();
    
    const id = document.getElementById('editEvacueeId').value;
    const formData = new FormData(this);
    
    // ✅ EXTRACT family_members properly
    const familyMembers = [];
    const familyNameInputs = document.querySelectorAll('[name="family_name[]"]');
    const familyAgeInputs = document.querySelectorAll('[name="family_age[]"]');
    const familyRelInputs = document.querySelectorAll('[name="family_relationship[]"]');
    const familyMedInputs = document.querySelectorAll('[name="family_medical[]"]');
    
    for (let i = 0; i < familyNameInputs.length; i++) {
        if (familyNameInputs[i].value.trim()) {
            familyMembers.push({
                name: familyNameInputs[i].value,
                age: familyAgeInputs[i].value || 0,
                relationship: familyRelInputs[i].value || 'Other',
                medical_condition: familyMedInputs[i].value || 'None'
            });
        }
    }
    
    // ✅ Convert to JSON string for FormData
    formData.set('family_members', JSON.stringify(familyMembers));
    
    // Show loading
    const saveBtn = document.getElementById('saveBtn');
    const spinner = document.getElementById('editSpinner');
    saveBtn.disabled = true;
    spinner.classList.remove('d-none');
    saveBtn.innerHTML = 'Saving...';
    
    fetch(`/evacuation/evacuee/${id}`, {
        method: 'PUT',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            // ✅ DON'T set Content-Type - let browser handle FormData
        },
        body: formData
    })
    .then(res => {
        if (!res.ok) throw new Error(`HTTP ${res.status}: ${res.statusText}`);
        return res.json();
    })
    .then(data => {
        if (data.success) {
            // Update local data
            const index = evacuees.findIndex(e => e.id == id);
            if (index !== -1) {
                evacuees[index] = data.data;
            }
            renderTable();
            closeEditModal();
            showToast('successToast', data.message || 'Updated successfully!');
        } else {
            throw new Error(data.message || 'Update failed');
        }
    })
    .catch(err => {
        console.error('Update error:', err);
        showToast('errorToast', err.message);
    })
    .finally(() => {
        saveBtn.disabled = false;
        spinner.classList.add('d-none');
        saveBtn.innerHTML = '<i class="fas fa-save me-2"></i>Save All Changes';
    });
});
function updateStats() {
    // Clear existing interval to prevent spam
    if (statsInterval) {
        clearInterval(statsInterval);
    }
    
    fetch('{{ route("evacuation.stats") }}', {
        method: 'GET',
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        // ✅ Set exact numbers - NO ANIMATION LOOP
        document.getElementById('total-evacuees').textContent = data.evacueeCount || 0;
        document.getElementById('pending-evacuees').textContent = data.potentialCount || 0;
        
        console.log('✅ Stats updated:', data);
    })
    .catch(err => {
        console.warn('Stats failed:', err);
    });
}

// ✅ SINGLE INTERVAL - 30 seconds only
function startStatsRefresh() {
    updateStats(); // Initial load
    
    // Refresh every 30 seconds ONLY
    statsInterval = setInterval(updateStats, 30000);
}

// ✅ Start when page loads
document.addEventListener('DOMContentLoaded', startStatsRefresh);
</script>
@endpush