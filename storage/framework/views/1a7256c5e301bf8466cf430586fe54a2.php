

<?php $__env->startSection('title', 'Potential Evacuees'); ?>

<?php $__env->startSection('content'); ?>
<style>
/* ✅ SAME CSS AS DASHBOARD - PERFECT MATCH */
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
    padding: 0 0 2rem 2rem !important;
    margin: 0 !important;
}

/* ✅ IDENTICAL DASHBOARD ELEMENTS */
.dashboard-header, .stats-grid, .stat-card, .stat-icon, .stat-number, .stat-label,
.stat-primary, .stat-success, .stat-warning, .stat-danger,
.nav-pills-modern {
    /* Copy ALL styles from dashboard - identical */
    /* ... (same exact CSS as dashboard) ... */
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
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 1.75rem 1.5rem;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    border-top: 4px solid var(--warning);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 120px;
}

.stat-card:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1); }

.stat-content { display: flex; align-items: center; justify-content: center; gap: 1rem; margin-bottom: 0.75rem; }
.stat-icon { width: 52px; height: 52px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
.stat-number { font-size: 2.25rem; font-weight: 800; color: var(--gray-800); line-height: 1; }
.stat-label { font-size: 0.85rem; color: var(--gray-600); text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600; }

.stat-primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
.stat-warning { background: linear-gradient(135deg, var(--warning), #d97706); color: white; }
.stat-danger { background: linear-gradient(135deg, var(--danger), #dc2626); color: white; }

.nav-pills-modern {
    background: white;
    border-radius: 16px;
    padding: 8px;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
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

.nav-pills-modern .nav-link:hover { color: var(--primary); background: var(--gray-50); transform: translateY(-2px); }
.nav-pills-modern .nav-link.active { background: var(--primary); color: white; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3); }

/* ✅ POTENTIAL TABLE CARD */
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

/* ✅ MODERN TABLE */
.table-modern {
    margin: 0;
    font-size: 0.9rem;
}

.table-modern th {
    background: var(--gray-50);
    font-weight: 700;
    color: var(--gray-800);
    padding: 1.25rem 1rem;
    font-size: 0.85rem;
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

/* ✅ PRIORITY BADGES - SUBTLE COLORS */
.priority-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 700;
    text-transform: uppercase;
    border: 2px solid;
}

.priority-high { 
    background: rgba(239, 68, 68, 0.1); 
    color: var(--danger); 
    border-color: rgba(239, 68, 68, 0.3); 
}

.priority-moderate { 
    background: rgba(245, 158, 11, 0.1); 
    color: var(--warning); 
    border-color: rgba(245, 158, 11, 0.3); 
}

.priority-low { 
    background: rgba(75, 85, 99, 0.1); 
    color: var(--gray-600); 
    border-color: rgba(75, 85, 99, 0.3); 
}

/* ✅ ACTION BUTTONS */
.btn-modern { 
    padding: 8px 12px; 
    border-radius: 8px; 
    font-weight: 600; 
    border: none; 
    transition: all 0.3s ease; 
}

.btn-primary-modern { background: var(--primary); color: white; }
.btn-success-modern { background: var(--success); color: white; }
.btn-danger-modern { background: var(--danger); color: white; }

.btn-modern:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(0,0,0,0.15); }

/* ✅ TOASTS - IDENTICAL */
.toast-container { position: fixed; top: 1.5rem; right: 1.5rem; z-index: 1080; }
/* ✅ MODAL FIXES */
.modal-modern .modal-content {
    border-radius: 20px !important;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
}

.modal-modern .modal-dialog {
    margin: 1.75rem auto !important;
}

.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.75) !important;
}

/* Ensure modals show above everything */
.modal {
    z-index: 1060 !important;
}

.modal-backdrop {
    z-index: 1050 !important;
}
</style>

<div class="main-content">
    <!-- ✅ DASHBOARD HEADER -->
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <h1 class="h3 mb-1 fw-bold text-gray-800">
                    <i class="fas fa-users-cog text-warning me-2"></i>
                    Potential Evacuees
                </h1>
                <p class="mb-0 text-muted">High & moderate priority households awaiting registration</p>
            </div>
            <div class="d-flex gap-2">
                <span class="badge bg-warning fs-6 px-3 py-2 text-dark">Pending Review</span>
                <span class="badge bg-light text-dark fs-6 px-3 py-2">
                    <i class="fas fa-clock me-1"></i>Live Data
                </span>
            </div>
        </div>
    </div>

    <!-- ✅ STATS CARDS -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-icon stat-primary">
                    <i class="fas fa-users"></i>
                </div>
                <h1 class="stat-number" id="total-evacuees"><?php echo e($evacueeCount ?? 0); ?></h1>
            </div>
            <p class="stat-label">Registered</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-icon stat-warning">
                    <i class="fas fa-clock"></i>
                </div>
                <h1 class="stat-number" id="pending-evacuees"><?php echo e($potentialCount ?? 0); ?></h1>
            </div>
            <p class="stat-label">High Priority</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-icon stat-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h1 class="stat-number"><?php echo e(count($highPriority ?? [])); ?></h1>
            </div>
            <p class="stat-label">Moderate Priority</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-icon stat-success">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h1 class="stat-number">0%</h1>
            </div>
            <p class="stat-label">Conversion Rate</p>
        </div>
    </div>

    <!-- ✅ NAV PILLS -->
    <div class="nav-pills-modern">
         <a href="<?php echo e(route('evacuation.list')); ?>" class="nav-link">
            <i class="fas fa-list me-2"></i>Evacuee List
        </a>
        <a href="<?php echo e(route('evacuation.register')); ?>" class="nav-link">
            <i class="fas fa-user-plus me-2"></i>New Registration
        </a>
        <a href="<?php echo e(route('evacuation.potential')); ?>" class="nav-link active">
            <i class="fas fa-users-cog me-2"></i>Potential <span class="badge bg-warning text-dark ms-1"><?php echo e($potentialCount ?? 0); ?></span>
        </a>
        <a href="<?php echo e(route('evacuation.inventory')); ?>" class="nav-link">
            <i class="fas fa-boxes me-2"></i>Inventory
        </a>
        <a href="<?php echo e(route('barangay.reports')); ?>" class="nav-link">
            <i class="fas fa-chart-bar me-2"></i>Reports
        </a>
    </div>

    <!-- ✅ MAIN TABLE -->
    <div class="table-card">
        <div class="table-card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold text-gray-800">
                    <i class="fas fa-table me-2 text-warning"></i>
                    Potential Households
                </h5>
                <small class="text-muted"><?php echo e(count($potentialEvacuees ?? [])); ?> pending review</small>
            </div>
            <div class="d-flex align-items-center gap-2">
                <input type="text" class="form-control search-input" id="searchInput" 
                       placeholder="🔍 Search name, purok, address..." autocomplete="off">
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-modern" id="potentialTable">
                <thead>
                    <tr>
                        <th><i class="fas fa-user me-1"></i>Household</th>
                        <th><i class="fas fa-map-marker-alt me-1"></i>Purok</th>
                        <th><i class="fas fa-home me-1"></i>Address</th>
                        <th><i class="fas fa-exclamation-triangle me-1"></i>Priority</th>
                        <th><i class="fas fa-users me-1"></i>Family</th>
                        <th><i class="fas fa-clock me-1"></i>Status</th>
                        <th><i class="fas fa-cogs me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Dynamic content -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ✅ TOASTS - IDENTICAL -->
<div class="toast-container">
    <div id="successToast" class="toast shadow-lg border-0" role="alert">
        <div class="toast-header bg-success text-white">
            <i class="fas fa-check-circle me-2"></i>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <span id="successMessage">Household registered successfully!</span>
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
<!-- ✅ FIXED VIEW MODAL -->
<div class="modal fade" id="viewPotentialModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-0 bg-light">
                <h5 class="modal-title fw-bold fs-4 text-gray-800">
                    <i class="fas fa-home text-warning me-2"></i>Household Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="viewPotentialModalBody" style="max-height: 70vh; overflow-y: auto;">
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ✅ FIXED REGISTRATION MODAL -->
<div class="modal fade" id="registerPotentialModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header border-0 bg-primary text-white">
                <h5 class="modal-title fw-bold fs-4">
                    <i class="fas fa-user-plus me-2"></i>Register Potential Household
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" id="registerModalClose"></button>
            </div>
            <form id="registerPotentialForm">
                <input type="hidden" id="potentialHouseholdId" name="household_id">
                
                <div class="modal-body p-4" style="max-height: 70vh; overflow-y: auto;">
                    <!-- HOUSEHOLD INFO -->
                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm bg-light">
                                <div class="card-body p-4">
                                    <h6 class="fw-bold mb-3 text-primary">
                                        <i class="fas fa-home me-2"></i>Household Information
                                    </h6>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Head of Household <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="headName" name="head_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Purok <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="purok" name="purok" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Full Address <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="fullAddress" name="full_address" rows="2" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Contact Number</label>
                                        <input type="tel" class="form-control" id="contactNumber" name="contact_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border-0 shadow-sm bg-light">
                                <div class="card-body p-4">
                                    <h6 class="fw-bold mb-3 text-success">
                                        <i class="fas fa-users me-2"></i>Family Members
                                        <span class="badge bg-success ms-2" id="familyCount">0</span>
                                    </h6>
                                    <div id="familyMembersList" class="mb-3">
                                        <p class="text-muted small mb-0">No family members added yet</p>
                                    </div>
                                    <button type="button" class="btn btn-outline-primary btn-sm" onclick="addFamilyMember()">
                                        <i class="fas fa-plus me-1"></i>Add Member
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- MEDICAL NEEDS -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h6 class="fw-bold mb-3 text-warning">
                                <i class="fas fa-medkit me-2"></i>Medical Needs & Special Requirements
                            </h6>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Pregnant Women</label>
                                    <input type="number" class="form-control" name="pregnant_count" min="0" max="10" value="0">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Elderly (60+)</label>
                                    <input type="number" class="form-control" name="elderly_count" min="0" max="10" value="0">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">PWD</label>
                                    <input type="number" class="form-control" name="pwd_count" min="0" max="10" value="0">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Special Medical Needs</label>
                                    <textarea class="form-control" name="special_medical_needs" rows="2" placeholder="e.g., dialysis, oxygen, wheelchair..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- EVACUEE FIELDS -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Evacuation Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" name="evacuation_date" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Arrival Time</label>
                            <input type="time" class="form-control" name="arrival_time">
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer border-0 bg-light px-4 py-3">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success px-4 fw-bold" id="submitBtn">
                        <i class="fas fa-check me-2"></i>Register as Evacuee
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
let potentialEvacuees = <?php echo json_encode($potentialEvacuees ?? [], 15, 512) ?>;
let familyMembers = [];
let currentModal = null;

console.log('Potential evacuees:', potentialEvacuees);

document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM loaded, initializing...');
    renderTable();
    initSearch();
    
    // ✅ MODAL EVENT LISTENERS
    document.getElementById('registerModalClose').addEventListener('click', function() {
        resetRegistrationForm();
    });
    
    // Reset form when modal is hidden
    document.getElementById('registerPotentialModal').addEventListener('hidden.bs.modal', function() {
        resetRegistrationForm();
    });
});

function resetRegistrationForm() {
    familyMembers = [];
    document.getElementById('registerPotentialForm').reset();
    document.getElementById('familyMembersList').innerHTML = '<p class="text-muted small mb-0">No family members added yet</p>';
    document.getElementById('familyCount').textContent = '0';
}

// ✅ RENDER TABLE (UNCHANGED)
function renderTable(filtered = potentialEvacuees) {
    const tbody = document.getElementById('tableBody');
    
    if (filtered.length === 0) {
        tbody.innerHTML = `
            <tr class="text-center">
                <td colspan="7" class="py-5">
                    <i class="fas fa-users-slash fa-3x text-muted mb-3"></i>
                    <h5 class="text-muted">No potential evacuees</h5>
                    <p class="text-muted">All households processed</p>
                </td>
            </tr>
        `;
        return;
    }

    tbody.innerHTML = filtered.map(household => {
        const priorityClass = household.priority_status === 'High' ? 'priority-high' : 
                             household.priority_status === 'Moderate' ? 'priority-moderate' : 'priority-low';
        const familyCount = household.family_members?.length || 0;
        
        return `
            <tr>
                <td class="fw-bold">${household.full_name || household.household_name || 'N/A'}</td>
                <td><span class="badge bg-info">${household.purok || 'N/A'}</span></td>
                <td class="text-muted">${household.full_address || 'N/A'}</td>
                <td><span class="priority-badge ${priorityClass}">${household.priority_status || 'Pending'}</span></td>
                <td><span class="badge bg-success">${familyCount} members</span></td>
                <td><span class="badge bg-warning text-dark">Pending Review</span></td>
                <td>
                    <div class="d-flex gap-1">
                        <button class="btn btn-modern btn-primary-modern btn-sm" onclick="viewPotential(${household.id})">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button class="btn btn-modern btn-success-modern btn-sm" onclick="registerPotential(${household.id})">
                            <i class="fas fa-check"></i>
                        </button>
                        <button class="btn btn-modern btn-danger-modern btn-sm" onclick="removePotential(${household.id})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        `;
    }).join('');
}

// ✅ FIXED VIEW MODAL
function viewPotential(id) {
    console.log('View potential:', id);
    const household = potentialEvacuees.find(h => h.id == id);
    if (!household) {
        alert('Household not found!');
        return;
    }
    
    const familyHTML = household.family_members?.length ? 
        household.family_members.map(m => `
            <div class="family-card mb-3 p-3 border rounded" style="border-left: 4px solid var(--success);">
                <div class="d-flex justify-content-between">
                    <h6 class="mb-1 fw-bold">${m.name}</h6>
                    <span class="badge bg-info">${m.age} yrs</span>
                </div>
                <small>Relationship: <strong>${m.relationship}</strong> | Medical: <strong>${m.medical_condition || 'None'}</strong></small>
            </div>
        `).join('') : 
        '<p class="text-muted text-center py-4">No family members listed</p>';
    
    document.getElementById('viewPotentialModalBody').innerHTML = `
        <div class="row g-4">
            <div class="col-md-6">
                <div class="info-card p-4 border rounded">
                    <h6 class="fw-bold mb-3 text-primary"><i class="fas fa-user me-2"></i>Head of Household</h6>
                    <p class="mb-2"><strong>${household.full_name || household.household_name || 'N/A'}</strong></p>
                    <p class="text-muted mb-1">Purok: <strong>${household.purok}</strong></p>
                    <p class="text-muted mb-2">Address: <strong>${household.full_address}</strong></p>
                    <span class="priority-badge ${household.priority_status === 'High' ? 'priority-high' : 'priority-moderate'} fs-6">
                        ${household.priority_status}
                    </span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="info-card p-4 border rounded">
                    <h6 class="fw-bold mb-3 text-primary"><i class="fas fa-info-circle me-2"></i>Household Info</h6>
                    <p class="text-muted mb-1">Family Size: <strong>${household.family_members?.length || 0}</strong></p>
                    <p class="text-muted mb-1">Status: <span class="badge bg-warning text-dark">Pending Review</span></p>
                    <p class="text-muted">Registered: <strong>${household.created_at ? new Date(household.created_at).toLocaleDateString() : 'N/A'}</strong></p>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <h6 class="fw-bold mb-3 text-primary">
            <i class="fas fa-users me-2"></i>Family Members 
            <span class="badge bg-primary">${household.family_members?.length || 0}</span>
        </h6>
        ${familyHTML}
    `;
    
    // ✅ FIXED MODAL SHOW
    const viewModal = new bootstrap.Modal(document.getElementById('viewPotentialModal'), {
        backdrop: 'static',
        keyboard: false
    });
    viewModal.show();
}

// ✅ FIXED REGISTER MODAL
function registerPotential(id) {
    console.log('Register potential:', id);
    const household = potentialEvacuees.find(h => h.id == id);
    if (!household) {
        alert('Household not found!');
        return;
    }
    
    // Pre-fill form
    document.getElementById('potentialHouseholdId').value = household.id;
    document.getElementById('headName').value = household.full_name || household.household_name || '';
    document.getElementById('purok').value = household.purok || '';
    document.getElementById('fullAddress').value = household.full_address || '';
    document.getElementById('contactNumber').value = household.contact_number || '';
    
    // Load family members
    familyMembers = household.family_members || [];
    renderFamilyMembers();
    updateFamilyCount();
    
    // Pre-fill medical data
    const medicalData = household.medical_data || {};
    document.querySelector('[name="pregnant_count"]').value = medicalData.pregnant_count || 0;
    document.querySelector('[name="elderly_count"]').value = medicalData.elderly_count || 0;
    document.querySelector('[name="pwd_count"]').value = medicalData.pwd_count || 0;
    document.querySelector('[name="special_medical_needs"]').value = medicalData.special_medical_needs || '';
    
    // Set today's date
    document.querySelector('[name="evacuation_date"]').value = new Date().toISOString().split('T')[0];
    
    // ✅ FIXED MODAL SHOW
    const registerModal = new bootstrap.Modal(document.getElementById('registerPotentialModal'), {
        backdrop: 'static',
        keyboard: false
    });
    registerModal.show();
}

// ✅ FAMILY FUNCTIONS (unchanged from previous)
function renderFamilyMembers() {
    const container = document.getElementById('familyMembersList');
    if (familyMembers.length === 0) {
        container.innerHTML = '<p class="text-muted small mb-0">No family members added yet</p>';
        return;
    }
    
    container.innerHTML = familyMembers.map((member, index) => `
        <div class="family-member-card p-3 border rounded mb-2 bg-white" style="border-left: 4px solid var(--success);">
            <div class="d-flex justify-content-between align-items-start">
                <div style="flex: 1;">
                    <input type="text" class="form-control form-control-sm mb-1 fw-bold" 
                           value="${member.name || ''}" onchange="updateFamilyMember(${index}, 'name', this.value)">
                    <div class="row g-2">
                        <div class="col-6">
                            <input type="number" class="form-control form-control-sm" placeholder="Age" 
                                   value="${member.age || ''}" onchange="updateFamilyMember(${index}, 'age', this.value)">
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control form-control-sm" placeholder="Relationship" 
                                   value="${member.relationship || ''}" onchange="updateFamilyMember(${index}, 'relationship', this.value)">
                        </div>
                    </div>
                    <div class="mt-1">
                        <input type="text" class="form-control form-control-sm" placeholder="Medical Condition (optional)" 
                               value="${member.medical_condition || ''}" onchange="updateFamilyMember(${index}, 'medical_condition', this.value)">
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm ms-2" onclick="removeFamilyMember(${index})" title="Remove">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    `).join('');
}

function updateFamilyMember(index, field, value) {
    if (!familyMembers[index]) return;
    familyMembers[index][field] = value;
}

function addFamilyMember() {
    familyMembers.push({
        name: '',
        age: '',
        relationship: '',
        medical_condition: ''
    });
    renderFamilyMembers();
    updateFamilyCount();
}

function removeFamilyMember(index) {
    familyMembers.splice(index, 1);
    renderFamilyMembers();
    updateFamilyCount();
}

function updateFamilyCount() {
    document.getElementById('familyCount').textContent = familyMembers.length;
}

document.getElementById('registerPotentialForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const submitBtn = document.getElementById('submitBtn');
    const originalHTML = submitBtn.innerHTML;

    submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Registering...';
    submitBtn.disabled = true;

    const formData = new FormData(this);

    // ✅ FIX: Properly append family members as JSON
    formData.append('family_members', JSON.stringify(familyMembers));

    // ✅ CSRF (IMPORTANT for Laravel)
    formData.append('_token', '<?php echo e(csrf_token()); ?>');

    fetch("<?php echo e(route('evacuation.store')); ?>", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showToast('success', 'Household successfully registered!');

            // ✅ Remove from potential list
            potentialEvacuees = potentialEvacuees.filter(h => h.id != formData.get('household_id'));
            renderTable();

            // ✅ Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('registerPotentialModal'));
            modal.hide();

            resetRegistrationForm();
        } else {
            showToast('error', data.message || 'Registration failed');
        }
    })
    .catch(err => {
        console.error(err);
        showToast('error', 'Something went wrong');
    })
    .finally(() => {
        submitBtn.innerHTML = originalHTML;
        submitBtn.disabled = false;
    });
});

// ✅ SEARCH (UNCHANGED)
function initSearch() {
    document.getElementById('searchInput').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const filtered = potentialEvacuees.filter(h => 
            h.full_name?.toLowerCase().includes(query) ||
            h.household_name?.toLowerCase().includes(query) ||
            h.purok?.toLowerCase().includes(query) ||
            h.full_address?.toLowerCase().includes(query)
        );
        renderTable(filtered);
    });
}

// ✅ REMOVE POTENTIAL (UNCHANGED)
function removePotential(id) {
    if (!confirm('Remove this household from potential list?')) return;
    
    const btn = event.target.closest('button');
    const originalHTML = btn.innerHTML;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
    btn.disabled = true;
    
    fetch(`/evacuation/potential/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getContent()
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            potentialEvacuees = potentialEvacuees.filter(h => h.id != id);
            renderTable();
            showToast('successToast', 'Household removed successfully!');
        } else {
            throw new Error(data.message || 'Removal failed');
        }
    })
    .catch(err => showToast('errorToast', err.message))
    .finally(() => {
        btn.innerHTML = originalHTML;
        btn.disabled = false;
    });
}

// ✅ TOASTS (UNCHANGED)
function showToast(type, message) {
    if (type === 'success') {
        document.getElementById('successMessage').textContent = message;
        new bootstrap.Toast(document.getElementById('successToast')).show();
    } else {
        document.getElementById('errorMessage').textContent = message;
        new bootstrap.Toast(document.getElementById('errorToast')).show();
    }
}

// ✅ STATS UPDATE (UNCHANGED)
function updateStats() {
    fetch('<?php echo e(route("evacuation.stats")); ?>')
        .then(res => res.json())
        .then(data => {
            document.getElementById('total-evacuees').textContent = data.evacueeCount || 0;
            document.getElementById('pending-evacuees').textContent = data.potentialCount || 0;
        })
        .catch(() => {});
}

setInterval(updateStats, 30000);
updateStats();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.adminbarangay', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/BarangayPages/evacuation/potential.blade.php ENDPATH**/ ?>