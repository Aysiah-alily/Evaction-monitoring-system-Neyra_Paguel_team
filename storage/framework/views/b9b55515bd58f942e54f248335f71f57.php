

<?php $__env->startSection('content'); ?>
<!-- YOUR STYLES HERE (same as before) -->
<style>
/* ADD THIS TO REMOVE ALL EXTRA SPACE */
.container-fluid { padding: 10px !important; margin:  !important; }
.page-header, .nav-pills-custom, .filter-card, .table-card { 
    margin-left: 45px !important; 
    margin-right: 10px !important; 
}
html, body {
    overflow-x: hidden;
}
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
.page-header {
    background: transparent;
    box-shadow: none;
    border: none;
    padding: 0;
    margin-bottom: 20px;
}
/* Quick Access Dropdown Buttons */
.page-header .dropdown-toggle {
    border-radius: 8px;
    padding: 8px 14px;
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 6px;
}

.dropdown-menu {
    min-width: 180px;
    border-radius: 8px;
    padding: 0.25rem 0;
    box-shadow: var(--shadow-md);
}

.dropdown-item i {
    width: 20px;
    text-align: center;
}

.page-title {
    font-size: 28px;
    font-weight: 700;
    color: #1f2937;
}

.page-header p {
    font-size: 14px;
    color: #6b7280;
}

.page-header .btn {
    border-radius: 10px;
    font-weight: 600;
    padding: 10px 18px;
}

.btn-primary {
    background: #6366f1;
    border: none;
}

.btn-primary:hover {
    background: #4f46e5;
}

.btn-light {
    background: #f3f4f6;
    border: 1px solid #e5e7eb;
}

/* Navigation Pills */
.nav-pills-custom {
    border-radius: 12px;
    background: var(--gray-50);
    padding: 4px;
    display: flex;
    gap: 4px;
    flex-wrap: wrap;
    margin-bottom: 2rem;
}

.nav-pills-custom .nav-link {
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--gray-600);
    border: none;
    transition: all 0.2s ease;
    white-space: nowrap;
}

.nav-pills-custom .nav-link:hover {
    color: var(--primary);
    background: white;
    transform: translateY(-1px);
}

.nav-pills-custom .nav-link.active {
    background: var(--primary);
    color: white;
    box-shadow: var(--shadow-md);
}

/* Filter Card */
.filter-card {
    background: transparent;
    border: none;
    padding: 0;
    box-shadow: none;
}
/* Slim, inline filters */
.filter-row {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    align-items: center;
    margin-bottom: 1rem;
}

.filter-control {
    padding: 4px 8px;
    border-radius: 6px;
    border: 1px solid #d1d5db; /* light gray */
    font-size: 0.85rem;
    min-width: 120px;
    background: #f9fafb;
    transition: all 0.2s;
}

.filter-control:focus {
    outline: none;
    border-color: #6366f1; /* primary color on focus */
    background: #fff;
}

.filter-btn {
    display: none; /* we won’t need the button anymore */
}
.mini-actions .mini-btn:hover {
    transform: translateY(-2px) !important;
    box-shadow: var(--shadow-md) !important;
}

.mini-actions .mini-btn:active {
    transform: translateY(0) !important;
}

.mini-actions {
    display: flex;
    gap: 6px;
    flex-shrink: 0; /* prevents shrinking on small screens */
}

.mini-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    background: var(--gray-100);
    color: var(--gray-800);
}
/* Main Table Card */
.table-card {
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}

.table-custom {
    width: 100%;
    border-collapse: collapse;
}

/* ✅ PERFECT STICKY CHECKBOX HEADER */
.table-custom thead th.select-col {
    background: white !important;
    z-index: 20 !important; /* Higher than other headers */
    border-right: 2px solid var(--gray-200) !important;
    position: sticky !important;
    left: 0 !important;
    width: 60px !important;
    min-width: 60px !important;
    max-width: 60px !important;
    padding: 1rem 0.5rem !important;
    text-align: center !important;
}

/* Match exact header styling */
.table-custom thead th.select-col {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%) !important;
    box-shadow: 2px 0 4px rgba(0,0,0,0.05) !important;
}

.table-custom tbody td {
    font-size: 14px;
    color: #374151;
}

.table-custom tbody tr:hover {
    background: #f9fafb;
}

.table-header {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.table-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gray-800);
    margin: 0;
}

.table-container {
    max-height: 600px;
    overflow-y: auto;
    overflow-x: hidden;
    position: relative; /* ✅ Add this */
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: var(--gray-200) var(--gray-50);

}
.table-custom {
    margin: 0;
    font-size: 0.9rem;
}

.table-custom thead th {
    background: white;
    border: none;
    border-bottom: 2px solid var(--gray-200);
    padding: 1.25rem 1rem;
    font-weight: 600;
    color: var(--gray-800);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    position: sticky;
    top: 0;
    z-index: 10;
}

.table-custom tbody td {
    padding: 1.25rem 1rem;
    border-color: var(--gray-100);
    vertical-align: middle;
}

.table-custom tbody tr {
    transition: all 0.2s ease;
    border-bottom: 1px solid var(--gray-100);
}

.table-custom tbody tr:hover {
    background: var(--gray-50);
    transform: scale(1.01);
}

/* Status Badges */
.status-badge {
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.priority-high { background: #fef2f2; color: var(--danger); border: 1px solid #fecaca; }
.priority-moderate { background: #fefce8; color: var(--warning); border: 1px solid #fef08a; }
.priority-low { background: #f0fdf4; color: var(--success); border: 1px solid #bbf7d0; }

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 6px;
}

.action-btn {
    width: 36px;
    height: 36px;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.85rem;
    transition: all 0.2s ease;
}

.btn-view { background: var(--gray-100); color: var(--gray-800); }
.btn-view:hover { background: var(--primary); color: white; transform: translateY(-2px); }

.btn-edit { background: var(--success); color: white; }
.btn-edit:hover { background: #059669; transform: translateY(-2px); }

.btn-delete { background: #fee2e2; color: var(--danger); }
.btn-delete:hover { background: var(--danger); color: white; transform: translateY(-2px); }

/* Alerts */
.alert-custom {
    border: none;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-sm);
    margin-left: 45px !important; 
}

.alert-success { background: #f0fdf4; border-left: 4px solid var(--success); color: var(--success); }
.alert-danger { background: #fef2f2; border-left: 4px solid var(--danger); color: var(--danger); }

/* Pagination */
.pagination-custom .page-link {
    border-radius: 8px;
    margin: 0 2px;
    border: 1px solid var(--gray-200);
    color: var(--gray-600);
}

.pagination-custom .page-item.active .page-link {
    background: var(--primary);
    border-color: var(--primary);
}
.select-col {
    width: 45px !important;
    background: inherit !important;
}
.household-checkbox,
#selectAll {
    width: 20px !important;
    height: 20px !important;
    margin: 0 !important;
    accent-color: var(--primary) !important;
    border-radius: 4px !important;
    cursor: pointer !important;
    transition: all 0.2s ease !important;
}

#selectAll:checked,
.household-checkbox:checked {
    background-color: var(--primary) !important;
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15) !important;
}

#selectAll:hover,
.household-checkbox:hover {
    transform: scale(1.1) !important;
}
.household-checkbox:checked {
    background-color: var(--primary) !important;
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1) !important;
}

tr:hover .select-col {
    background: var(--gray-50) !important;
}

/* Responsive */
@media (max-width: 768px) {
    .page-title { font-size: 1.5rem; }
    .filter-row { flex-direction: column; gap: 1rem; }
    .nav-pills-custom { justify-content: center; }
    .table-custom thead th,
    .table-custom tbody td { padding: 0.75rem 0.5rem; font-size: 0.8rem; }
     .mini-actions {
        order: -1; /* Move buttons to top on mobile */
        width: 100%;
        justify-content: center;
        margin-bottom: 1rem;
    }
    
    .mini-btn {
        width: 44px;
        height: 44px; /* Larger touch targets */
    }
}

</style>

<!-- FULL WIDTH - NO EXTRA SPACE -->
<div style="width: 100%; padding: 0;">
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 p-0">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-home text-primary"></i>
                    Manage Households
                </h1>
                <p class="text-muted mb-0 mt-1">View, edit, and manage all registered households</p>
            </div>
            <div class="d-flex gap-2 align-items-center">

                <!-- Export Button -->
                <button class="btn btn-light">
                    <i class="fas fa-download me-2"></i>Export Data
                </button>

                <!-- Add Quick Access Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="addQuickAccess" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-plus me-1"></i> Add
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="addQuickAccess">
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('households.create')); ?>">
                                <i class="fas fa-home me-2"></i> Household
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(url('/puroks')); ?>" class="dropdown-item">
                                <i class="fas fa-map-marker-alt me-2"></i>Manage Puroks
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Display Quick Access Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="displayQuickAccess" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-eye me-1"></i> Display
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="displayQuickAccess">
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('households.index')); ?>">
                                <i class="fas fa-list me-2"></i> All Households
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?php echo e(route('households.index', ['purok' => ''])); ?>">
                                <i class="fas fa-map me-2"></i> Filter by Purok
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

 
        <!-- Success/Error Alerts -->
    <?php if(session('success')): ?>
        <div class="alert alert-custom alert-success">
            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-custom alert-danger">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Filter Card -->
   <div class="filter-card">
    <form method="GET" action="<?php echo e(route('households.index')); ?>">
        <div class="filter-row">
            <div class="filter-group">
                <input type="text" class="filter-control" name="search" placeholder="Search">
            </div>

            <div class="filter-group">
                <select class="filter-control" name="purok">
                    <option value="">All Puroks</option>
                    <?php $__currentLoopData = \App\Models\Purok::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($purok->purok_name); ?>" <?php echo e(request('purok') == $purok->purok_name ? 'selected' : ''); ?>>
                            <?php echo e($purok->purok_name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="filter-group">
                <select class="filter-control" name="priority_status">
                    <option value="">All</option>
                    <option value="High">High</option>
                    <option value="Moderate">Moderate</option>
                    <option value="Low">Low</option>
                </select>
            </div>

           <div class="mini-actions">
                <button class="mini-btn" onclick="bulkEdit()" title="Bulk Edit">
                    <i class="fas fa-edit"></i>
                </button>
                <button class="mini-btn" onclick="bulkAddMembers()" title="Add Members">
                    <i class="fas fa-user-plus"></i>
                </button>
                <button class="mini-btn" onclick="bulkDelete()" title="Bulk Delete" style="color: #ef4444;">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </div>
    </form>
</div>

    <!-- Main Table -->
    <div class="table-card">
         <div class="table-header d-flex justify-content-between align-items-center">
            <h3 class="table-title">
                <i class="fas fa-table me-2 text-primary"></i>
                Households List
                <span class="badge bg-primary ms-2"><?php echo e($households->total() ?? 0); ?> Total</span>
            </h3>
        </div>
        
        <div class="table-container">
            <table class="table-custom table-hover">
                <thead>
                    <tr>
                        <!-- ✅ NEW: Checkbox Header -->
                        <th class="select-col" style="width: 50px;">
                            <input type="checkbox" id="selectAll" class="form-check-input" style="width: 18px; height: 18px;">
                        </th>
                        <th>ID</th>
                        <th>Household</th>
                        <th>Head</th>
                        <th>Address</th>
                        <th>Purok</th>
                        <th>Priority</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $__env->make('BarangayPages.partials.household_rows', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </tbody>
            </table>
        </div>
        
        <?php if($households instanceof \Illuminate\Pagination\Paginator): ?>
            <div class="p-4 border-top" style="border-color: var(--gray-200);">
                <?php echo e($households->links('pagination::bootstrap-4')); ?>

            </div>
        <?php endif; ?>
    </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const filterForm = document.querySelector('form[action="<?php echo e(route('households.index')); ?>"]');
    const filterInputs = filterForm.querySelectorAll('input[name="search"], select[name="purok"], select[name="priority_status"]');

    filterInputs.forEach(input => {
        input.addEventListener('change', () => {
            filterForm.submit(); // submit form on change
        });

        // Optional: for text input, submit on typing (debounced)
        if (input.tagName.toLowerCase() === 'input') {
            let timeout;
            input.addEventListener('input', () => {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    filterForm.submit();
                }, 500); // wait 500ms after typing stops
            });
        }
    });
});
// Bulk Actions Functionality
function bulkEdit() {
    const checkedCount = document.querySelectorAll('input[name="household_ids[]"]:checked').length;
    if (checkedCount === 0) {
        alert('Please select households to edit');
        return;
    }
    if (confirm(`Edit ${checkedCount} selected household(s)?`)) {
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = '<?php echo e(route("households.bulk-edit")); ?>';
        
        document.querySelectorAll('input[name="household_ids[]"]:checked').forEach(checkbox => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'household_ids[]';
            input.value = checkbox.value;
            form.appendChild(input);
        });
        
        document.body.appendChild(form);
        form.submit();
    }
}

function bulkAddMembers() {
    const checkedCount = document.querySelectorAll('input[name="household_ids[]"]:checked').length;
    if (checkedCount === 0) {
        alert('Please select households to add members');
        return;
    }
    if (confirm(`Add members to ${checkedCount} selected household(s)?`)) {
        const form = document.createElement('form');
        form.method = 'GET';
        form.action = '<?php echo e(route("households.members.bulk-create")); ?>';
        
        document.querySelectorAll('input[name="household_ids[]"]:checked').forEach(checkbox => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'household_ids[]';
            input.value = checkbox.value;
            form.appendChild(input);
        });
        
        document.body.appendChild(form);
        form.submit();
    }
}

function bulkDelete() {
    const checkedCount = document.querySelectorAll('input[name="household_ids[]"]:checked').length;
    if (checkedCount === 0) {
        alert('Please select households to delete');
        return;
    }
    if (confirm(`Delete ${checkedCount} household(s)? This cannot be undone!`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '<?php echo e(route("households.bulk-destroy")); ?>';
        
        // CSRF Token
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        form.appendChild(csrfInput);
        
        document.querySelectorAll('input[name="household_ids[]"]:checked').forEach(checkbox => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'household_ids[]';
            input.value = checkbox.value;
            form.appendChild(input);
        });
        
        document.body.appendChild(form);
        form.submit();
    }
}

// Select All Checkbox (add this to your table header)
document.addEventListener('DOMContentLoaded', function() {
    // Add select all checkbox to thead if it doesn't exist
    const thead = document.querySelector('.table-custom thead tr');
    if (!thead.querySelector('th.select-col')) {
        thead.insertCell(0).outerHTML = '<th class="select-col"><input type="checkbox" id="selectAll" class="form-check-input"></th>';
    }
    
    // Select all functionality
    document.getElementById('selectAll').addEventListener('change', function() {
        document.querySelectorAll('input[name="household_ids[]"]').forEach(cb => {
            cb.checked = this.checked;
        });
    });
});
// Row selection & bulk actions (enhanced)
document.addEventListener('DOMContentLoaded', function() {
    const selectAll = document.getElementById('selectAll');
    const checkboxes = document.querySelectorAll('.household-checkbox');
    
    // Select All functionality
    selectAll.addEventListener('change', function() {
        checkboxes.forEach(cb => cb.checked = this.checked);
        updateBulkButtons();
    });
    
    // Individual checkbox change
    checkboxes.forEach(cb => {
        cb.addEventListener('change', updateBulkButtons);
    });
    
    function updateBulkButtons() {
        const checkedCount = document.querySelectorAll('.household-checkbox:checked').length;
        const totalCount = checkboxes.length;
        
        // Visual feedback
        if (checkedCount > 0) {
            document.querySelector('.table-header .table-title').innerHTML = 
                `<i class="fas fa-table me-2 text-primary"></i> Households List 
                 <span class="badge bg-warning ms-2">${checkedCount} selected</span>`;
        } else {
            document.querySelector('.table-header .table-title').innerHTML = 
                `<i class="fas fa-table me-2 text-primary"></i> Households List 
                 <span class="badge bg-primary ms-2"><?php echo e($households->total() ?? 0); ?> Total</span>`;
        }
    }
});

// Quick action functions
function callHousehold(id) {
    alert(`Calling household ID: ${id}\n(Integrate with your telephony system)`);
}

function emailHousehold(id) {
    alert(`Emailing household ID: ${id}\n(Integrate with your email system)`);
}

function deleteHousehold(id) {
    if (confirm('Delete this household?')) {
        // Add your delete logic here
        window.location.href = `/households/${id}`;
    }
}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.adminbarangay', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/BarangayPages/households.blade.php ENDPATH**/ ?>