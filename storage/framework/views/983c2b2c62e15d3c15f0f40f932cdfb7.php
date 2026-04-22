

<?php $__env->startSection('content'); ?>
<style>
/* YOUR EXISTING STYLES - ALL KEPT */
.container-fluid { padding: 10px !important; margin: 0 !important; }
.page-header, .form-card { margin-left: 55px !important; margin-right: 10px !important; }

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
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1);
}

/* Page Header */
.page-header { background: transparent; padding: 0; margin-bottom: 20px; }
.page-title { font-size: 28px; font-weight: 700; color: var(--gray-800); }
.page-subtitle { font-size: 14px; color: #6b7280; margin-bottom: 1rem; }

/* Navigation Pills */
.nav-pills-custom {
    border-radius: 12px; background: var(--gray-50); padding: 4px; display: flex;
    gap: 4px; flex-wrap: wrap; margin-bottom: 2rem; margin-left: 60px !important;
}
.nav-pills-custom .nav-link {
    padding: 12px 20px; border-radius: 8px; font-weight: 600; font-size: 0.9rem;
    color: var(--gray-600); border: none; transition: all 0.2s ease; text-decoration: none;
}
.nav-pills-custom .nav-link:hover { color: var(--primary); background: white; transform: translateY(-1px); }
.nav-pills-custom .nav-link.active { background: var(--primary); color: white; box-shadow: var(--shadow-md); }

/* Main Form Card - FIXED WIDTH & PADDING */
.form-card { 
    border-radius: 12px; 
    box-shadow: 0 2px 6px rgba(0,0,0,0.05); 
    background: white; 
    overflow: hidden;
    margin-left: 50px !important;
    margin-right: 10px !important;
    max-width: calc(100vw - 100px);
    padding: 0 20px 30px 20px; /* Extra bottom padding */
}
.form-header { 
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%); 
    padding: 1.5rem 2rem; 
    border-bottom: 1px solid var(--gray-200); 
    margin: -20px -20px 30px -20px; /* Extra bottom margin for spacing */
}
.form-title { font-size: 1.25rem; font-weight: 700; color: var(--gray-800); margin: 0; }

/* Form Fields - WITH PROPER SPACING */
.form-group { 
    margin-bottom: 2rem !important; /* Increased vertical spacing */
    padding: 0 5px; /* Small horizontal padding for breathing room */
}
.form-label { 
    font-size: 0.9rem; 
    font-weight: 600; 
    color: var(--gray-800); 
    margin-bottom: 0.75rem; /* More space between label and input */
    display: block; 
}
.form-control, .form-select {
    padding: 12px 16px; 
    border: 2px solid var(--gray-200); 
    border-radius: 10px; 
    font-size: 0.95rem;
    transition: all 0.2s ease; 
    background: white; 
    height: 52px; 
    width: 100% !important;
    box-sizing: border-box;
    display: block;
}
.form-control:focus, .form-select:focus {
    border-color: var(--primary); 
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1); 
    outline: none; 
    background: white;
}

/* Row spacing */
.row {
    margin-bottom: 1.5rem; /* Space between row groups */
}

/* Ensure columns have proper spacing */
.col-lg-4, .col-lg-6, .col-md-4, .col-12 {
    padding-left: 12px;
    padding-right: 12px;
}

/* Family table alignment */
.family-table {
    margin: 0 5px 2rem 5px; /* Consistent spacing */
}

/* High priority checkboxes spacing */
#high_priority_options .row {
    margin-top: 1rem;
}
#high_priority_options .col-md-4 {
    margin-bottom: 1rem;
}

/* STEPPER - ENHANCED */
.stepper { display: flex; align-items: center; justify-content: center; margin: 2rem 0; gap: 10px; padding: 0 20px; }
.step { text-align: center; font-size: 10px; color: #6b7280; min-width: 120px; }
.circle {
    width: 40px; height: 40px; border-radius: 50%; background: #e5e7eb; display: flex;
    align-items: center; justify-content: center; font-weight: 700; margin: 0 auto 8px; font-size: 14px;
}
.step.active .circle { background: var(--primary); color: white; }
.step.active p, .step.completed p { color: var(--primary); font-weight: 600; }
.step.completed .circle { background: var(--success); color: white; }
.line { width: 80px; height: 3px; background: #e5e7eb; }
.step.active .line { background: var(--primary); }

/* Radio/Checkboxes */
.form-check { margin-bottom: 0.75rem; }
.form-check-input:checked { background-color: var(--primary); border-color: var(--primary); }
.form-check-label { font-weight: 500; color: var(--gray-800); cursor: pointer; }

/* Buttons - CENTERED */
.btn-custom { border-radius: 10px; font-weight: 600; padding: 12px 24px; border: none; transition: all 0.2s ease; font-size: 0.95rem; }
.btn-primary-custom { background: var(--primary); color: white; }
.btn-primary-custom:hover:not(:disabled), .btn-primary-custom:disabled:hover { background: var(--primary-dark); transform: translateY(-1px); box-shadow: var(--shadow-md); }
.btn-primary-custom:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }
.btn-secondary-custom { background: var(--gray-100); color: var(--gray-800); border: 2px solid var(--gray-200); }
.btn-secondary-custom:hover { background: var(--gray-200); transform: translateY(-1px); }
.btn-group-center { display: flex; justify-content: center; gap: 20px; margin-top: 2rem; }

/* Family Table */
.family-table { border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); margin-bottom: 1rem; margin: 0 10px; }
.family-table thead th {
    background: var(--gray-50); font-weight: 600; color: var(--gray-800); border: none; padding: 1rem;
    font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;
}
.family-table tbody td { padding: 1rem; border-bottom: 1px solid var(--gray-200); vertical-align: middle; }

/* Alerts */
.alert-custom { border: none; border-radius: 12px; padding: 1rem 1.5rem; margin-bottom: 2rem; box-shadow: var(--shadow-sm); margin-left: 20px; margin-right: 20px; }
.alert-success-custom { background: #f0fdf4; border-left: 4px solid var(--success); color: var(--success); }
.alert-danger-custom { background: #fef2f2; border-left: 4px solid var(--danger); color: var(--danger); }

/* Validation Warning */
.validation-warning {
    background: #fffbeb; border-left: 4px solid var(--warning); border-radius: 8px;
    padding: 1rem; margin-bottom: 1rem; color: var(--gray-800); margin: 0 10px;
}
.validation-warning i { color: var(--warning); }

/* Responsive */
@media (max-width: 768px) {
    .stepper { flex-direction: column; gap: 20px; }
    .line { width: 100%; height: 2px; }
    .form-row { flex-direction: column; }
    .btn-group-center { flex-direction: column; align-items: center; }
}
</style>

<div style="width: 100%; padding: 0;">
    <?php if(session('success')): ?>
        <div class="alert alert-custom alert-success-custom">
            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-custom alert-danger-custom">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 p-0">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-home text-primary"></i> Create New Household
                </h1>
                <p class="page-subtitle">Add a new household to your community records</p>
            </div>
        </div>
    </div>

    <!-- Navigation Pills -->
    <div class="nav-pills-custom">
        <a href="<?php echo e(route('households.index')); ?>" class="nav-link">
            <i class="fas fa-list me-2"></i>All Households
        </a>
        <a href="<?php echo e(route('households.create')); ?>" class="nav-link active">
            <i class="fas fa-plus me-2"></i>New Household
        </a>
        <a href="<?php echo e(url('/puroks')); ?>" class="nav-link">
            <i class="fas fa-map-marker-alt me-2"></i>New Purok
        </a>
    </div>

    <!-- Main Form Card -->
    <div class="form-card">
        <div class="form-header d-flex justify-content-between align-items-center">
            <h3 class="form-title">
                <i class="fas fa-user-plus me-2 text-primary"></i> Household Information
            </h3>
        </div>

        <!-- STEPPER -->
        <div class="stepper">
            <div class="step active" id="indicator1">
                <div class="circle">1</div>
                <p>Head Information</p>
            </div>
            <div class="line"></div>
            <div class="step" id="indicator2">
                <div class="circle">2</div>
                <p>Priority & Address</p>
            </div>
            <div class="line"></div>
            <div class="step" id="indicator3">
                <div class="circle">3</div>
                <p>Family Members</p>
            </div>
        </div>

        <form method="POST" action="<?php echo e(route('households.store')); ?>" id="householdForm">
            <?php echo csrf_field(); ?>

            <!-- STEP 1: HEAD INFORMATION -->
<div id="step1">
    <div class="row g-3">
        <!-- Household Name & Purok -->
        <div class="col-lg-6 form-group">
            <label class="form-label">Household Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="household_name" name="household_name" required maxlength="100" value="<?php echo e(old('household_name')); ?>">
        </div>
        <div class="col-lg-6 form-group">
            <label class="form-label">Purok <span class="text-danger">*</span></label>
            <select class="form-select" id="purok" name="purok" required>
                <option value="">Select Purok</option>
                <?php $__currentLoopData = $puroks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($purok->purok_name); ?>" <?php echo e(old('purok') == $purok->purok_name ? 'selected' : ''); ?>>
                        <?php echo e($purok->purok_name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Head of Family -->
        <div class="col-lg-4 form-group">
            <label class="form-label">Surname <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="head_surname" name="head_surname" required maxlength="50" value="<?php echo e(old('head_surname')); ?>">
        </div>
        <div class="col-lg-4 form-group">
            <label class="form-label">First Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="head_firstname" name="head_firstname" required maxlength="50" value="<?php echo e(old('head_firstname')); ?>">
        </div>
        <div class="col-lg-4 form-group">
            <label class="form-label">Middle Name</label>
            <input type="text" class="form-control" id="head_middlename" name="head_middlename" maxlength="50" value="<?php echo e(old('head_middlename')); ?>">
        </div>
        
        <!-- Gender -->
        <div class="col-lg-4 form-group">
            <label class="form-label">Gender <span class="text-danger">*</span></label>
            <div class="d-flex flex-column gap-2 mt-2">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Male" id="genderMale" <?php echo e(old('gender') == 'Male' ? 'checked' : ''); ?> required>
                    <label class="form-check-label" for="genderMale">Male</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female" id="genderFemale" <?php echo e(old('gender') == 'Female' ? 'checked' : ''); ?> required>
                    <label class="form-check-label" for="genderFemale">Female</label>
                </div>
            </div>
        </div>
        
        <!-- Civil Status -->
        <div class="col-lg-4 form-group">
            <label class="form-label">Civil Status <span class="text-danger">*</span></label>
            <div class="d-flex flex-column gap-2 mt-2">
                <?php $__currentLoopData = ['Single', 'Married', 'Widowed', 'Separated']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="civil_status" value="<?php echo e($status); ?>" id="civil<?php echo e(str_replace(' ', '', $status)); ?>" <?php echo e(old('civil_status') == $status ? 'checked' : ''); ?> required>
                        <label class="form-check-label" for="civil<?php echo e(str_replace(' ', '', $status)); ?>"><?php echo e($status); ?></label>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        
        <!-- Age -->
        <div class="col-lg-4 form-group">
            <label class="form-label">Age <span class="text-danger">*</span></label>
            <input type="number" class="form-control" id="age" name="age" min="0" max="120" required value="<?php echo e(old('age')); ?>">
        </div>
    </div>
    
    <!-- FIXED CONTINUE BUTTON -->
    <div class="btn-group-center" style="margin-top: 2rem;">
        <button type="button" class="btn btn-primary-custom" id="nextStep1" style="font-size: 1rem; padding: 15px 30px;">
            <i class="fas fa-arrow-right me-2"></i>Continue to Step 2
        </button>
    </div>
</div>

           <!-- STEP 2: PRIORITY & ADDRESS -->
<div id="step2" style="display: none;">
    <div class="row g-3">
        <!-- Address -->
        <div class="col-lg-4 form-group">
            <label class="form-label">Barangay <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="barangay_name" name="barangay_name" required maxlength="100" value="<?php echo e(old('barangay_name')); ?>">
        </div>
        <div class="col-lg-4 form-group">
            <label class="form-label">Street <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="street_name" name="street_name" required maxlength="100" value="<?php echo e(old('street_name')); ?>">
        </div>
        <div class="col-lg-4 form-group">
            <label class="form-label">House No. <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="house_number" name="house_number" required maxlength="20" value="<?php echo e(old('house_number')); ?>">
        </div>
    </div>

    <!-- Priority Status -->
    <div class="row">
        <div class="col-12 form-group">
            <label class="form-label">Priority Status <span class="text-danger">*</span></label>
            <select class="form-select" id="priority_status" name="priority_status" required>
                <option value="">Select Priority</option>
                <option value="High" <?php echo e(old('priority_status') == 'High' ? 'selected' : ''); ?>>High</option>
                <option value="Moderate" <?php echo e(old('priority_status') == 'Moderate' ? 'selected' : ''); ?>>Moderate</option>
                <option value="Low" <?php echo e(old('priority_status') == 'Low' ? 'selected' : ''); ?>>Low</option>
            </select>
        </div>
    </div>

    <!-- High Priority Indicators -->
    <div class="form-group" id="high_priority_options" style="display: none;">
        <label class="form-label">High Priority Indicators (Optional)</label>
        <div class="row g-3 mt-2">
            <?php $__currentLoopData = ['Older Person', 'Lactating Mother', 'PWD', 'Pregnant', 'Poor Housing Condition']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" 
                            type="checkbox" 
                            name="priority_indicator[]" 
                            value="<?php echo e($indicator); ?>" 
                            id="indicator<?php echo e(str_replace(' ', '', $indicator)); ?>"
                            <?php echo e(in_array($indicator, old('priority_indicator', [])) ? 'checked' : ''); ?>>
                        <label class="form-check-label" 
                            for="indicator<?php echo e(str_replace(' ', '', $indicator)); ?>">
                            <?php echo e($indicator); ?>

                        </label>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <!-- Date Registered -->
    <div class="col-12 form-group">
        <label class="form-label">Date Registered <span class="text-danger">*</span></label>
        <input type="date" class="form-control" id="date_registered" name="date_registered" value="<?php echo e(old('date_registered', date('Y-m-d'))); ?>" required>
    </div>

    <!-- FIXED STEP 2 BUTTONS -->
    <div class="btn-group-center" style="margin-top: 2rem;">
        <button type="button" class="btn btn-secondary-custom" id="prevStep2" style="font-size: 1rem; padding: 15px 30px;">
            <i class="fas fa-arrow-left me-2"></i>Back to Step 1
        </button>
        <button type="button" class="btn btn-primary-custom" id="nextStep2" style="font-size: 1rem; padding: 15px 30px;">
            <i class="fas fa-arrow-right me-2"></i>Continue to Family Members
        </button>
    </div>
</div>

<!-- STEP 3: FAMILY MEMBERS -->
<div id="step3" style="display: none;">
    <h5 class="form-title mb-4">
        <i class="fas fa-users me-2 text-primary"></i>Family Members
    </h5>
    
    <div id="familyMembersWarning" class="validation-warning d-none">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <strong>Warning:</strong> Please add at least one family member before saving.
    </div>
    
    <div class="family-table">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 40%;">Name <span class="text-danger">*</span></th>
                    <th style="width: 30%;">Relationship <span class="text-danger">*</span></th>
                    <th style="width: 20%;">Age <span class="text-danger">*</span></th>
                    <th style="width: 10%;">Action</th>
                </tr>
            </thead>
            <tbody id="familyMembersBody">
                <!-- Rows added dynamically -->
            </tbody>
        </table>
    </div>
    
    <div class="text-center mb-4">
        <button type="button" class="btn btn-outline-primary btn-custom" id="addFamilyMember" style="font-size: 1rem; padding: 12px 24px;">
            <i class="fas fa-plus me-2"></i>Add Family Member
        </button>
    </div>

    <div class="btn-group-center">
        <button type="button" class="btn btn-secondary-custom" id="prevStep3" style="font-size: 1rem; padding: 15px 30px;">
            <i class="fas fa-arrow-left me-2"></i>Back
        </button>
        <button type="submit" class="btn btn-primary-custom" id="submitBtn" disabled style="font-size: 1rem; padding: 15px 30px;">
            <i class="fas fa-save me-2"></i>Save Household
        </button>
    </div>
</div>
        </form>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<script>
let rowIndex = 0;
let currentStep = 1;

document.addEventListener('DOMContentLoaded', function() {
    console.log('🔥 FULL FORM INITIALIZED');
    setTimeout(completeInitialization, 400);
});

function completeInitialization() {
    // Step 1
    bindStep1();
    // Step 2  
    bindStep2();
    // Step 3
    bindStep3();
    
    // Load old data
    loadOldFamilyData();
    
    // Show step 1
    showStep(1);
    
    console.log('✅ COMPLETE INITIALIZATION DONE');
}

function bindStep1() {
    const nextStep1 = document.getElementById('nextStep1');
    if (nextStep1) {
        nextStep1.onclick = (e) => {
            e.preventDefault();
            if (validateStep1()) showStep(2);
        };
    }
}

function bindStep2() {
    const prevStep2 = document.getElementById('prevStep2');
    const nextStep2 = document.getElementById('nextStep2');
    const prioritySelect = document.getElementById('priority_status');
    
    if (prevStep2) {
        prevStep2.onclick = (e) => { e.preventDefault(); showStep(1); };
    }
    
    if (nextStep2) {
        nextStep2.onclick = (e) => {
            e.preventDefault();
            if (validateStep2()) showStep(3);
        };
    }
    
    if (prioritySelect) {
        prioritySelect.onchange = function() {
            document.getElementById('high_priority_options').style.display = 
                this.value === 'High' ? 'block' : 'none';
        };
    }
}

function bindStep3() {
    // Back button
    document.getElementById('prevStep3').onclick = (e) => {
        e.preventDefault();
        showStep(2);
    };
    
    // Add family member
    document.getElementById('addFamilyMember').onclick = addFamilyMemberRow;
    
    // Remove family member
    document.getElementById('familyMembersBody').onclick = function(e) {
        if (e.target.closest('.remove-row')) {
            const row = e.target.closest('tr');
            if (row && document.querySelectorAll('#familyMembersBody tr').length > 1) {
                row.remove();
                updateFamilyValidation();
            }
        }
    };
    
    // Form submit
    document.getElementById('submitBtn').onclick = function(e) {
        e.preventDefault();
        if (validateAllSteps()) {
            document.getElementById('householdForm').submit();
        }
    };
    
    // Auto-add first row when reaching step 3
    if (document.querySelectorAll('#familyMembersBody tr').length === 0) {
        addFamilyMemberRow();
    }
}

function validateStep1() {
    const required = ['household_name', 'purok', 'head_surname', 'head_firstname', 'age'];
    let missing = [];
    
    required.forEach(id => {
        const el = document.getElementById(id);
        if (!el?.value.trim()) missing.push(el?.previousElementSibling?.textContent?.trim() || id);
    });
    
    if (!document.querySelector('input[name="gender"]:checked')) missing.push('Gender');
    if (!document.querySelector('input[name="civil_status"]:checked')) missing.push('Civil Status');
    
    if (missing.length > 0) {
        showAlert('Step 1 missing: ' + missing.join(', '));
        return false;
    }
    return true;
}

function validateStep2() {
    const required = ['barangay_name', 'street_name', 'house_number', 'priority_status', 'date_registered'];
    let missing = [];
    
    required.forEach(id => {
        const el = document.getElementById(id);
        if (!el?.value.trim()) missing.push(el?.previousElementSibling?.textContent?.trim() || id);
    });
    
    if (missing.length > 0) {
        showAlert('Step 2 missing: ' + missing.join(', '));
        return false;
    }
    return true;
}

function validateStep3() {
    const rows = document.querySelectorAll('#familyMembersBody tr');
    return rows.length > 0;
}

function validateAllSteps() {
    return validateStep1() && validateStep2() && validateStep3();
}

function showStep(stepNum) {
    console.log(`📍 Step ${stepNum}`);
    
    document.querySelectorAll('[id^="step"]').forEach(s => s.style.display = 'none');
    document.getElementById(`step${stepNum}`).style.display = 'block';
    currentStep = stepNum;
    updateStepper(stepNum);
    
    if (stepNum === 3) updateFamilyValidation();
    
    window.scrollTo(0, 0);
}

function updateStepper(activeStep) {
    ['indicator1', 'indicator2', 'indicator3'].forEach((id, index) => {
        const step = document.getElementById(id);
        if (step) {
            step.className = activeStep > index + 1 ? 'step completed' : 
                           activeStep === index + 1 ? 'step active' : 'step';
        }
    });
}

// 🔥 FAMILY MEMBERS - CORE FUNCTIONALITY
function addFamilyMemberRow(name = '', relationship = '', age = '') {
    rowIndex++;
    const tbody = document.getElementById('familyMembersBody');
    const row = document.createElement('tr');
    
    row.innerHTML = `
        <td>
            <input type="text" class="form-control" name="family_member_name[]" 
                   value="${name}" placeholder="Enter name" required maxlength="100">
        </td>
        <td>
            <select class="form-select" name="family_member_relationship[]" required>
                <option value="">Select...</option>
                <option value="Spouse" ${relationship === 'Spouse' ? 'selected' : ''}>Spouse</option>
                <option value="Child" ${relationship === 'Child' ? 'selected' : ''}>Child</option>
                <option value="Parent" ${relationship === 'Parent' ? 'selected' : ''}>Parent</option>
                <option value="Sibling" ${relationship === 'Sibling' ? 'selected' : ''}>Sibling</option>
                <option value="Grandchild" ${relationship === 'Grandchild' ? 'selected' : ''}>Grandchild</option>
                <option value="Other" ${relationship === 'Other' ? 'selected' : ''}>Other</option>
            </select>
        </td>
        <td>
            <input type="number" class="form-control" name="family_member_age[]" 
                   value="${age}" min="0" max="120" placeholder="0" required>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row" title="Remove">
                <i class="fas fa-trash"></i>
            </button>
        </td>
    `;
    
    tbody.appendChild(row);
    updateFamilyValidation();
    console.log(`✅ Added family member #${rowIndex}`);
}

function updateFamilyValidation() {
    const rows = document.querySelectorAll('#familyMembersBody tr');
    const warning = document.getElementById('familyMembersWarning');
    const submitBtn = document.getElementById('submitBtn');
    
    console.log(`👨‍👩‍👧‍👦 ${rows.length} family members`);
    
    if (rows.length === 0) {
        warning.classList.remove('d-none');
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Add family members first';
    } else {
        warning.classList.add('d-none');
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="fas fa-save me-2"></i>Save Household';
    }
}

function loadOldFamilyData() {
    <?php if(old('family_member_name')): ?>
        <?php $__currentLoopData = old('family_member_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            setTimeout(() => {
                addFamilyMemberRow(
                    '<?php echo e(addslashes($name)); ?>',
                    '<?php echo e(addslashes(old("family_member_relationship.$index"))); ?>',
                    '<?php echo e(old("family_member_age.$index")); ?>'
                );
            }, 100);
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
}

function showAlert(message) {
    alert(message);
}
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminbarangay', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/BarangayPages/households/create.blade.php ENDPATH**/ ?>