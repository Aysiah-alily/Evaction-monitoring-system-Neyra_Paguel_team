

<?php $__env->startSection('title', 'Register Evacuee'); ?>

<?php $__env->startSection('content'); ?>
<style>
/* ✅ PERFECT MATCH - SAME CSS VARIABLES AS DASHBOARD */
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

/* ✅ DASHBOARD HEADER - IDENTICAL */
.dashboard-header {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

/* ✅ STATS GRID - IDENTICAL */
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
    border-top: 4px solid var(--primary);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
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
}

.stat-icon {
    width: 52px;
    height: 52px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
}

.stat-number {
    font-size: 2.25rem;
    font-weight: 800;
    color: var(--gray-800);
    line-height: 1;
}

.stat-label {
    font-size: 0.85rem;
    color: var(--gray-600);
    text-transform: uppercase;
    letter-spacing: 0.08em;
    font-weight: 600;
}

.stat-primary { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; }
.stat-success { background: linear-gradient(135deg, var(--success), #059669); color: white; }
.stat-warning { background: linear-gradient(135deg, var(--warning), #d97706); color: white; }
.stat-danger { background: linear-gradient(135deg, var(--danger), #dc2626); color: white; }

/* ✅ NAV PILLS - IDENTICAL */
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

/* ✅ REGISTRATION FORM CARD */
.registration-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.registration-header {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: white;
    padding: 2rem;
    position: relative;
    overflow: hidden;
    height: 100px
}

.registration-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 20px 20px;
}

.registration-header h2 {
    font-size: 1.75rem;
    font-weight: 800;
    margin: 0;
    position: relative;
    z-index: 1;
}

.form-section {
    padding: 2.5rem;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.form-group {
    position: relative;
}

.form-label {
    font-weight: 700;
    color: var(--gray-800) !important;
    margin-bottom: 0.75rem;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.form-control, .form-select {
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 14px 20px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: white;
    height: 56px;
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    outline: none;
    transform: translateY(-1px);
}

.required::after {
    content: ' *';
    color: var(--danger);
}

/* ✅ FAMILY MEMBERS TABLE - MODERNIZED */
.family-section {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
    border-radius: 16px;
    padding: 2rem;
    margin: 2rem 0;
    border: 1px solid var(--gray-200);
}

.family-table {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.family-table th {
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

.family-table td {
    padding: 1.25rem 1rem;
    vertical-align: middle;
    border-color: var(--gray-200);
}

.family-table input, .family-table select {
    border: 2px solid var(--gray-200);
    border-radius: 8px;
    padding: 10px 12px;
    height: 44px;
}

.family-add-btn {
    background: linear-gradient(135deg, var(--success), #059669);
    border: none;
    color: white;
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.family-add-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(16, 185, 129, 0.3);
}

.family-remove-btn {
    background: var(--danger);
    border: none;
    color: white;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    font-size: 14px;
    transition: all 0.3s ease;
}

.family-remove-btn:hover {
    background: #dc2626;
    transform: scale(1.1);
}

/* ✅ SUBMIT BUTTON - HERO STYLE */
.submit-section {
    background: linear-gradient(135deg, var(--gray-50), white);
    border-top: 1px solid var(--gray-200);
    padding: 2rem;
    text-align: center;
}

.hero-submit {
    background: linear-gradient(135deg, var(--success), #059669);
    border: none;
    color: white;
    padding: 18px 48px;
    border-radius: 16px;
    font-size: 1.1rem;
    font-weight: 700;
    box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.hero-submit:hover {
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(16, 185, 129, 0.4);
}

.hero-submit:active {
    transform: translateY(-1px);
}

/* ✅ TOAST - IDENTICAL TO DASHBOARD */
.toast-container {
    position: fixed;
    top: 1.5rem;
    right: 1.5rem;
    z-index: 1080;
}

/* Responsive */
@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    .family-section {
        padding: 1.5rem;
    }
}
</style>

<div class="main-content">
    <!-- ✅ DASHBOARD HEADER - IDENTICAL -->
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <h1 class="h3 mb-1 fw-bold text-gray-800">
                    <i class="fas fa-user-plus text-success me-2"></i>
                    Register New Evacuee
                </h1>
                <p class="mb-0 text-muted">Complete family registration with medical priority tracking</p>
            </div>
            <div class="d-flex gap-2">
                <span class="badge bg-success fs-6 px-3 py-2">Live Registration</span>
                <span class="badge bg-light text-dark fs-6 px-3 py-2">
                    <i class="fas fa-clock me-1"></i>Real-time
                </span>
            </div>
        </div>
    </div>

    <!-- ✅ STATS CARDS - IDENTICAL -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-icon stat-primary">
                    <i class="fas fa-users"></i>
                </div>
                <h1 class="stat-number" id="total-evacuees"><?php echo e($evacueeCount ?? 0); ?></h1>
            </div>
            <p class="stat-label">Total Evacuees</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-icon stat-warning">
                    <i class="fas fa-clock"></i>
                </div>
                <h1 class="stat-number" id="pending-evacuees"><?php echo e($potentialCount ?? 0); ?></h1>
            </div>
            <p class="stat-label">Pending</p>
        </div>
        
        <div class="stat-card">
            <div class="stat-content">
                <div class="stat-icon stat-success">
                    <i class="fas fa-bed"></i>
                </div>
                <h1 class="stat-number">95%</h1>
            </div>
            <p class="stat-label">Occupancy</p>
        </div>
        
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

    <!-- ✅ NAVIGATION PILLS - IDENTICAL -->
    <div class="nav-pills-modern">
        <a href="<?php echo e(route('evacuation.list')); ?>" class="nav-link">
            <i class="fas fa-list me-2"></i>Evacuee List
        </a>
        <a href="<?php echo e(route('evacuation.register')); ?>" class="nav-link active">
            <i class="fas fa-user-plus me-2"></i>Register New
        </a>
        <a href="<?php echo e(route('evacuation.potential')); ?>" class="nav-link">
            <i class="fas fa-users-cog me-2"></i>Potential <span class="badge bg-warning text-dark ms-1"><?php echo e($potentialCount ?? 0); ?></span>
        </a>
        <a href="<?php echo e(route('evacuation.inventory')); ?>" class="nav-link">
            <i class="fas fa-boxes me-2"></i>Inventory
        </a>
        <a href="<?php echo e(route('barangay.reports')); ?>" class="nav-link">
            <i class="fas fa-chart-bar me-2"></i>Reports
        </a>
    </div>

    <!-- ✅ MODERN REGISTRATION FORM -->
    <div class="registration-card">
        <div class="registration-header">
            <h2>
                <i class="fas fa-clipboard-list me-3"></i>
                Family Registration Form
            </h2>
            <p class="mb-0 opacity-90 mt-2">All fields marked with * are required</p>
        </div>

        <form id="evacueeForm">
            <!-- ✅ PERSONAL INFO SECTION -->
            <div class="form-section">
                <h5 class="fw-bold text-primary mb-4">
                    <i class="fas fa-user-circle me-2"></i>Head of Family Information
                </h5>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label required">Full Name</label>
                        <input type="text" class="form-control" id="regName" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Age</label>
                        <input type="number" class="form-control" id="regAge" required min="0" max="120">
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Gender</label>
                        <select class="form-select" id="regGender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Purok</label>
                        <select class="form-select" id="regPurok" required>
                            <option value="">Select Purok</option>
                            <?php $__currentLoopData = $puroks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($purok->purok_name); ?>"><?php echo e($purok->purok_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label required">Center Assignment</label>
                        <input type="text" class="form-control" id="regBed" placeholder="e.g., Main Hall A-1" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Medical Condition</label>
                        <select class="form-select" id="regMedical">
                            <option value="None">None</option>
                            <option value="Diabetes">Diabetes</option>
                            <option value="Hypertension">Hypertension</option>
                            <option value="Asthma">Asthma</option>
                            <option value="Pregnant">Pregnant</option>
                            <option value="Elderly">Elderly (65+)</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- ✅ FAMILY MEMBERS SECTION -->
            <div class="family-section">
                <h5 class="fw-bold mb-4 text-primary">
                    <i class="fas fa-users me-2"></i>Family Members 
                    <span class="badge bg-primary ms-2" id="familyCount">0</span>
                </h5>
                
                <div class="table-responsive">
                    <table class="table family-table" id="familyMembersTable">
                        <thead>
                            <tr>
                                <th><i class="fas fa-user me-1"></i>Name</th>
                                <th><i class="fas fa-link me-1"></i>Relationship</th>
                                <th><i class="fas fa-notes-medical me-1"></i>Medical</th>
                                <th><i class="fas fa-calendar me-1"></i>Age</th>
                                <th><i class="fas fa-cogs me-1"></i>Action</th>
                            </tr>
                        </thead>
                        <tbody id="familyMembersBody">
                            <!-- Dynamic rows -->
                        </tbody>
                    </table>
                </div>
                
                <button type="button" class="family-add-btn mt-3" id="addFamilyMember">
                    <i class="fas fa-plus me-2"></i>Add Family Member
                </button>
            </div>

            <!-- ✅ HERO SUBMIT SECTION -->
            <div class="submit-section">
                <button type="submit" class="hero-submit" id="submitBtn">
                    <i class="fas fa-check-circle me-2"></i>
                    Register Complete Family
                </button>
            </div>
        </form>
    </div>
</div>

<!-- ✅ TOAST CONTAINER - IDENTICAL TO DASHBOARD -->
<div class="toast-container">
    <div id="successToast" class="toast shadow-lg border-0" role="alert">
        <div class="toast-header bg-success text-white">
            <i class="fas fa-check-circle me-2"></i>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            Family registered successfully! Redirecting to dashboard...
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
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    console.log('✅ Registration form loaded');
    
    const form = document.getElementById('evacueeForm');
    const addFamilyBtn = document.getElementById('addFamilyMember');
    const familyBody = document.getElementById('familyMembersBody');
    let familyRowCount = 0;
    
    // ✅ Auto-add first family row
    addFirstFamilyRow();
    
    // Event listeners
    if (addFamilyBtn) addFamilyBtn.addEventListener('click', addFamilyRow);
    if (form) form.addEventListener('submit', handleSubmit);
    
    // ✅ Dynamic family count
    familyBody.addEventListener('DOMNodeInserted', updateFamilyCount);
    familyBody.addEventListener('DOMNodeRemoved', updateFamilyCount);
    
    function addFirstFamilyRow() {
        const row = document.createElement('tr');
        row.innerHTML = getFamilyRowHTML(familyRowCount++);
        familyBody.appendChild(row);
        updateFamilyCount();
    }
    
    function addFamilyRow() {
        const row = document.createElement('tr');
        row.innerHTML = getFamilyRowHTML(familyRowCount++);
        familyBody.appendChild(row);
        updateFamilyCount();
    }
    
    function getFamilyRowHTML(index) {
        return `
            <tr>
                <td>
                    <input type="text" class="form-control" name="family_name[]" placeholder="Family member name" required>
                </td>
                <td>
                    <select class="form-select" name="family_relationship[]" required>
                        <option value="">Select</option>
                        <option value="Spouse">Spouse</option>
                        <option value="Child">Child</option>
                        <option value="Parent">Parent</option>
                        <option value="Sibling">Sibling</option>
                        <option value="Grandchild">Grandchild</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
                <td>
                    <select class="form-select" name="family_medical[]">
                        <option value="None">None</option>
                        <option value="Diabetes">Diabetes</option>
                        <option value="Hypertension">Hypertension</option>
                        <option value="Asthma">Asthma</option>
                        <option value="Pregnant">Pregnant</option>
                        <option value="Elderly">Elderly</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="family_age[]" min="0" max="120" placeholder="Age">
                </td>
                <td>
                    <button type="button" class="family-remove-btn" onclick="removeFamilyRow(this)" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </td>
            </tr>
        `;
    }
    
    function removeFamilyRow(button) {
        if (confirm('Remove this family member?')) {
            button.closest('tr').remove();
        }
    }
    
    function updateFamilyCount() {
        const count = document.querySelectorAll('#familyMembersBody tr').length;
        document.getElementById('familyCount').textContent = count;
    }
    
 // ✅ PERFECT FORM RESET + AUTO-REFRESH
function handleSubmit(e) {
    e.preventDefault();
    
    const submitBtn = document.getElementById('submitBtn');
    const originalText = submitBtn.innerHTML;
    
    // Loading state
    submitBtn.disabled = true;
    submitBtn.innerHTML = `
        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
        Registering Family...
    `;
    
    // Collect form data
    const formData = {
        name: document.getElementById('regName').value.trim(),
        age: parseInt(document.getElementById('regAge').value) || 0,
        gender: document.getElementById('regGender').value,
        purok: document.getElementById('regPurok').value,
        center_assignment: document.getElementById('regBed').value.trim(),
        medical_condition: document.getElementById('regMedical').value || 'None',
        family_members: []
    };
    
    // Family members
    const familyNames = document.querySelectorAll('input[name="family_name[]"]');
    const familyRelationships = document.querySelectorAll('select[name="family_relationship[]"]');
    const familyMedical = document.querySelectorAll('select[name="family_medical[]"]');
    const familyAges = document.querySelectorAll('input[name="family_age[]"]');
    
    for (let i = 0; i < familyNames.length; i++) {
        const name = familyNames[i].value.trim();
        if (name) {
            formData.family_members.push({
                name: name,
                relationship: familyRelationships[i].value,
                medical_condition: familyMedical[i].value || 'None',
                age: parseInt(familyAges[i].value) || 0
            });
        }
    }
    
    // Validation
    if (!formData.name || !formData.gender || !formData.purok || !formData.center_assignment) {
        showToast('errorToast', 'Please fill all required fields');
        resetSubmitBtn();
        return;
    }
    
    if (formData.family_members.length === 0) {
        showToast('errorToast', 'At least one family member is required');
        resetSubmitBtn();
        return;
    }
    
    // Submit
    fetch('<?php echo e(route("evacuation.store")); ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // ✅ INSTANT FORM RESET - IMMEDIATE!
            resetFormCompletely();
            
            // Show success toast
            showToast('successToast', data.message || 'Family registered successfully!');
            
            // Update stats
            updateStats();
            
            // ✅ AUTO-REFRESH TO DASHBOARD (3s delay)
            setTimeout(() => {
                showToast('successToast', 'Redirecting to dashboard...');
                setTimeout(() => {
                    window.location.href = '<?php echo e(route("evacuation.list")); ?>';
                }, 1000);
            }, 2000);
            
        } else {
            throw new Error(data.message || 'Registration failed');
        }
    })
    .catch(err => {
        console.error('Registration error:', err);
        showToast('errorToast', err.message || 'Registration failed');
    })
    .finally(() => {
        resetSubmitBtn();
    });
    
    // ✅ BULLETPROOF FORM RESET FUNCTION
    function resetFormCompletely() {
        // Reset main form fields
        document.getElementById('regName').value = '';
        document.getElementById('regAge').value = '';
        document.getElementById('regGender').value = '';
        document.getElementById('regPurok').value = '';
        document.getElementById('regBed').value = '';
        document.getElementById('regMedical').value = 'None';
        
        // Clear ALL family rows
        document.getElementById('familyMembersBody').innerHTML = '';
        
        // Add fresh first row
        addFirstFamilyRow();
        
        // Force blur all fields (removes focus states)
        document.querySelectorAll('.form-control, .form-select').forEach(field => {
            field.blur();
        });
        
        console.log('✅ Form completely reset!');
    }
    
    function resetSubmitBtn() {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
}
    
    // ✅ TOAST FUNCTIONS - IDENTICAL TO DASHBOARD
    function showToast(toastId, message = '') {
        const toast = document.getElementById(toastId);
        if (toast) {
            if (message) {
                document.getElementById('errorMessage').textContent = message;
            }
            const toastInstance = new bootstrap.Toast(toast);
            toastInstance.show();
        }
    }
    
   // ✅ COMPLETE STATS SYSTEM
    let statsInterval; // Prevent multiple intervals

function updateStats() {
    // Clear existing interval to prevent spam
    if (statsInterval) {
        clearInterval(statsInterval);
    }
    
    fetch('<?php echo e(route("evacuation.stats")); ?>', {
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
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.adminbarangay', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/BarangayPages/evacuation/register.blade.php ENDPATH**/ ?>