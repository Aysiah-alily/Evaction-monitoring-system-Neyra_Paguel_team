

<?php $__env->startSection('content'); ?>
<!-- DAFAC Dashboard - PERFECT NON-STRETCHING STRUCTURE -->
<div class="container-fluid">
    <!-- ROW 1: Navigation + Stats (Equal Height) -->
    <div class="row equal-height g-4 mb-4">

        <!-- Stats Card 1: Total Forms -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="stat-card gradient-primary">
                <div class="stat-card-inner p-4">
                    <div class="stat-icon me-3">
                        <i class="fas fa-file-alt fs-2"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number fs-1 fw-bold"><?php echo e($submissions->count()); ?></div>
                        <div class="stat-label fw-semibold text-uppercase small">Total Forms</div>
                        <div class="stat-change mt-1">
                            <i class="fas fa-arrow-up me-1"></i>
                            <span class="small fw-bold">Today</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Card 2: Completed -->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="stat-card gradient-success">
                <div class="stat-card-inner p-4">
                    <div class="stat-icon me-3">
                        <i class="fas fa-check-circle fs-2"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number fs-1 fw-bold"><?php echo e($submissions->where('status', 'completed')->count()); ?></div>
                        <div class="stat-label fw-semibold text-uppercase small">Completed</div>
                        <div class="stat-change mt-1">
                            <i class="fas fa-check me-1"></i>
                            <span class="small fw-bold">Verified</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats Card 3: Pending -->
        <div class="col-xl-3 col-lg-6 col-md-6">
            <div class="stat-card gradient-warning">
                <div class="stat-card-inner p-4">
                    <div class="stat-icon me-3">
                        <i class="fas fa-clock fs-2"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number fs-1 fw-bold"><?php echo e($submissions->where('status', 'pending')->count()); ?></div>
                        <div class="stat-label fw-semibold text-uppercase small">Pending Review</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ROW 2: Full Width Table -->
    <div class="row g-4">
        <div class="col-12">
            <div class="report-card">
                <!-- Header -->
              <div class="report-card-header d-flex flex-column">
    <!-- Top row: title and filters -->
    <div class="d-flex justify-content-between align-items-start mb-2">
        <h5 class="report-title mb-0 fw-bold">
            <i class="fas fa-table me-2 text-primary"></i> Recent DAFAC Submissions
        </h5>
        <div class="d-flex gap-2">
            <select class="form-select form-select-sm" style="width: 140px;">
                <option>All</option>
                <option>Today</option>
                <option>This Week</option>
            </select>
            <button class="btn btn-outline-primary btn-sm px-3">
                <i class="fas fa-download me-1"></i>Export
            </button>
        </div>
    </div>

    <!-- Optional: subheader, small notes -->
    <small class="text-muted">Showing latest submissions</small>
</div>

                <!-- Table Content -->
                <div class="table-responsive flex-grow-1">
                    <?php if($submissions->isEmpty()): ?>
                        <!-- Empty State -->
                        <div class="empty-state">
                            <div class="text-center">
                                <i class="fas fa-file-alt fa-4x text-muted mb-4 opacity-50"></i>
                                <h4 class="fw-bold text-muted mb-2">No forms submitted yet</h4>
                                <p class="text-muted mb-4">Get started by filling out your first DAFAC form</p>
                                <a href="<?php echo e(route('EvacAdmin.DAFACForm')); ?>" class="btn btn-primary btn-lg px-4">
                                    <i class="fas fa-plus me-2"></i>Create First Form
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- Data Table -->
                        <table class="table table-hover mb-0">
                            <thead class="table-light sticky-top">
                                <tr>
                                    <th class="border-0 py-3">#</th>
                                    <th class="border-0 py-3">Family Head</th>
                                    <th class="border-0 py-3">Date Registered</th>
                                    <th class="border-0 py-3">Status</th>
                                    <th class="border-0 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $submissions->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="align-middle">
                                        <td class="fw-bold"><?php echo e($index + 1); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0">
                                                    <i class="fas fa-user fs-6"></i>
                                                </div>
                                                <div>
                                                    <div class="fw-bold"><?php echo e($submission->surname); ?>, <?php echo e($submission->firstname); ?></div>
                                                    <small class="text-muted"><?php echo e($submission->contact_number ?? 'No contact'); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-light text-dark px-3 py-2 fw-semibold small">
                                                <?php echo e(\Carbon\Carbon::parse($submission->date_registered)->format('M d, Y')); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <?php if(isset($submission->status)): ?>
                                                <?php $status = $submission->status ?>
                                                <?php switch($status):
                                                    case ('completed'): ?>
                                                        <span class="badge bg-success px-3 py-2 fw-semibold">Completed</span>
                                                        <?php break; ?>
                                                    <?php case ('pending'): ?>
                                                        <span class="badge bg-warning px-3 py-2 fw-semibold text-dark">Pending</span>
                                                        <?php break; ?>
                                                    <?php default: ?>
                                                        <span class="badge bg-secondary px-3 py-2 fw-semibold">Draft</span>
                                                <?php endswitch; ?>
                                            <?php else: ?>
                                                <span class="badge bg-secondary px-3 py-2 fw-semibold">Draft</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm" role="group">
                                                <button class="btn btn-outline-primary view-form" data-id="<?php echo e($submission->id); ?>" title="View">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button class="btn btn-outline-success edit-form" data-id="<?php echo e($submission->id); ?>" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="btn btn-outline-danger remove-form" data-id="<?php echo e($submission->id); ?>" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>

                        <!-- Footer if more records -->
                        <?php if($submissions->count() > 10): ?>
                            <div class="card-footer bg-light border-0 p-3">
                                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                                    <small class="text-muted">
                                        <i class="fas fa-table me-1"></i>
                                        Showing 10 of <?php echo e($submissions->count()); ?> forms
                                    </small>
                                    <a href="#" class="btn btn-link btn-sm p-0 text-primary fw-semibold">
                                        View All <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
/* ==============================
   DAFAC Dashboard - FIXED & CLEAN
   ============================== */

/* -------- ROOT COLORS & GRADIENTS -------- */
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --card-bg: #ffffff;
    --card-border: #f1f5f9;
    --header-bg: #f8fafc;
}

/* -------- GLOBAL FLEX FIX -------- */
.d-flex {
    display: flex;
    min-height: 100vh;
}

/* -------- SIDEBAR & MAIN -------- */
.sidebar {
    width: 240px;
    height: calc(100vh - 70px);
    position: fixed;
    top: 70px;
    left: 0;
    overflow-y: auto;
    flex-shrink: 0;
}

.main-content {
    flex: 1;
    margin-left: 240px;
    margin-top: 70px;
    padding: 2rem;
    height: calc(100vh - 70px);
    overflow-y: auto;
}

/* -------- CARDS BASE STYLE -------- */
.report-card, 
.stat-card, 
.navigation-card {
    background: var(--card-bg);
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.08);
    border: 1px solid var(--card-border);
    display: flex;
    flex-direction: column;
    overflow: hidden;
}

/* -------- STATS CARDS -------- */
.stat-card {
    height: 160px;
    transition: all 0.3s ease;
    color: #fff;
}
.stat-card-inner {
    display: flex;
    align-items: center;
    height: 100%;
    padding: 1.75rem;
}
.gradient-primary { background: var(--primary-gradient); }
.gradient-success { background: var(--success-gradient); }
.gradient-warning { background: var(--warning-gradient); }

/* Hover animation */
.stat-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 50px rgba(0,0,0,0.1);
}

/* -------- NAVIGATION CARD -------- */
.navigation-card {
    min-height: 420px;
    max-height: 500px;
}
.navigation-card .card-body {
    flex: 0 1 auto; /* prevents stretch */
    display: flex;
    flex-direction: column;
}
.navigation-card .list-group {
    flex: 1 1 auto;
    overflow-y: auto; /* scroll if too long */
}
.list-group-item {
    flex: 0 1 auto;
    border: none;
    padding: 1.25rem 1.5rem;
}

/* -------- TABLE & REPORTS -------- */
.table-responsive {
    flex: 1 1 auto;
    max-height: 500px;
    overflow-y: auto;
}
.table-responsive::-webkit-scrollbar {
    width: 6px;
}
.table-responsive::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.15);
    border-radius: 3px;
}
.report-card-header {
    padding: 1rem 1.5rem;
    background: #f8fafc;
    border-bottom: 1px solid #e2e8f0;
}

.report-card-header .d-flex {
    align-items: flex-start; /* top-align items */
    justify-content: space-between;
    flex-wrap: nowrap;
}

.report-card-header select,
.report-card-header button {
    height: auto; /* prevents stretching */
}
/* -------- EMPTY STATE -------- */
.empty-state {
    min-height: 400px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

/* -------- ROWS EQUAL HEIGHT -------- */
.row.equal-height {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}
.row.equal-height > [class*="col-"] {
    display: flex;
    flex-direction: column;
    justify-content: flex-start; /* prevent stretching */
}

/* -------- LISTS & GRID -------- */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

/* -------- RESPONSIVE -------- */
@media (max-width: 1200px) {
    .sidebar { width: 220px; }
    .main-content { margin-left: 220px; }
}

@media (max-width: 992px) {
    .sidebar { 
        transform: translateX(-100%);
        width: 280px;
    }
    .sidebar.active { transform: translateX(0); }
    .main-content { margin-left: 0 !important; height: calc(100vh - 70px); }
}

@media (max-width: 768px) {
    .main-content { padding: 1.5rem; }
    .stats-grid { grid-template-columns: 1fr; }
    .stat-card { height: 140px; }
}

@media (max-width: 480px) {
    .main-content { padding: 1rem; }
    .report-card-header { padding: 1rem; }
}
</style>
<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // View form
    document.querySelectorAll('.view-form').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            // Replace with your view route
            window.location.href = `/evac-admin/dafac/${id}`;
        });
    });

    // Edit form
    document.querySelectorAll('.edit-form').forEach(btn => {
        btn.addEventListener('click', function() {
            const id = this.dataset.id;
            window.location.href = `/evac-admin/dafac-form/${id}/edit`;
        });
    });

    // Delete form
    document.querySelectorAll('.remove-form').forEach(btn => {
        btn.addEventListener('click', function() {
            if(confirm('Delete this DAFAC form? This cannot be undone.')) {
                const id = this.dataset.id;
                // AJAX delete here
                console.log('Deleting form:', id);
            }
        });
    });

    // Table row hover effect
    document.querySelectorAll('tbody tr').forEach(row => {
        row.addEventListener('mouseenter', () => row.style.backgroundColor = '#f8fafc');
        row.addEventListener('mouseleave', () => row.style.backgroundColor = '');
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/EvacPages/EvacRegistration.blade.php ENDPATH**/ ?>