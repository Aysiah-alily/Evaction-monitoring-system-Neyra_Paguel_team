

<?php $__env->startSection('title', 'Manage Users'); ?>

<?php $__env->startSection('content'); ?>
<!-- Dashboard Specific Styles -->
<style>
/* Users Page - Perfect Match */
.users-page-wrapper {
    width: 100%;
    overflow-x: hidden;
}

.users-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

.users-stats {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.stat-card {
    background: white;
    padding: 1rem 1.5rem;
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 600;
    color: var(--slate-700);
    white-space: nowrap;
}

.stat-icon {
    width: 2rem;
    height: 2rem;
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    color: white;
}

.stat-active { background: linear-gradient(135deg, var(--success), #10b981); }
.stat-inactive { background: linear-gradient(135deg, var(--danger), #dc2626); }
.stat-pending { background: linear-gradient(135deg, var(--warning), #f59e0b); }

.users-table-card {
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    margin-bottom: 2rem;
}

.users-table-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--slate-100);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.table-container {
    overflow-x: auto;
    max-height: 600px;
}

.users-table {
    width: 100%;
    min-width: 800px;
    margin: 0;
    font-size: 0.9rem;
}

.users-table thead th {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    color: var(--slate-800);
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 1.25rem 1rem;
    border: none;
    border-bottom: 2px solid var(--slate-200);
    position: sticky;
    top: 0;
    z-index: 10;
    white-space: nowrap;
}

.users-table tbody td {
    padding: 1.25rem 1rem;
    border-bottom: 1px solid var(--slate-100);
    vertical-align: middle;
    color: var(--slate-700);
}

.users-table tbody tr:hover {
    background: var(--primary-50);
}

.user-avatar {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid var(--slate-100);
}

.status-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    border: 1px solid;
}

.status-active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
    border-color: rgba(16, 185, 129, 0.3);
}

.status-inactive {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
    border-color: rgba(239, 68, 68, 0.3);
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-table {
    padding: 0.5rem 1rem;
    border-radius: var(--radius-lg);
    font-size: 0.8rem;
    font-weight: 600;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    transition: var(--transition);
    text-decoration: none;
    white-space: nowrap;
}

.btn-edit {
    background: var(--warning);
    color: white;
}

.btn-edit:hover {
    background: #f59e0b;
    transform: translateY(-1px);
}

.btn-delete {
    background: var(--danger);
    color: white;
}

.btn-delete:hover {
    background: #dc2626;
    transform: translateY(-1px);
}

.btn-add-user {
    background: linear-gradient(135deg, var(--primary), var(--primary-600));
    color: white;
    box-shadow: var(--shadow-lg);
}

.btn-add-user:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
}

/* Pagination */
.users-pagination {
    padding: 1.5rem 2rem;
    border-top: 1px solid var(--slate-100);
    background: var(--slate-50);
}

/* Responsive */
@media (max-width: 992px) {
    .users-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .users-stats {
        justify-content: center;
    }
    
    .users-table-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .users-table {
        min-width: 700px;
    }
    
    .action-buttons {
        flex-direction: column;
    }
}
</style>

<div class="users-page-wrapper">
    <!-- Header with Stats -->
    <div class="users-header">
        <div class="page-title-group">
            <div class="page-icon">
                <i class="fas fa-users-cog"></i>
            </div>
            <div>
                <h1 class="page-title">Manage Users</h1>
                <p class="text-muted mb-0">System administrators and barangay officials</p>
            </div>
        </div>
        
        <div class="page-actions">
            <a href="<?php echo e(route('admin.users.create')); ?>" class="btn btn-primary btn-add-user">
                <i class="fas fa-plus"></i> Add User
            </a>
        </div>
    </div>

    <!-- Users Stats -->
    <div class="users-stats">
        <div class="stat-card stat-active">
            <div class="stat-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <span><?php echo e($users->where('account_status', 'Active')->count()); ?> Active</span>
        </div>
        <div class="stat-card stat-inactive">
            <div class="stat-icon">
                <i class="fas fa-times-circle"></i>
            </div>
            <span><?php echo e($users->where('account_status', 'Inactive')->count()); ?> Inactive</span>
        </div>
        <div class="stat-card stat-pending">
            <div class="stat-icon">
                <i class="fas fa-clock"></i>
            </div>
            <span>Total: <?php echo e($users->count()); ?></span>
        </div>
    </div>

    <!-- Users Table -->
    <div class="users-table-card">
        <div class="users-table-header">
            <h3 class="card-title mb-0">
                <i class="fas fa-list text-primary me-2"></i>
                All Users (<?php echo e($users->count()); ?>)
            </h3>
            <div class="users-search">
                <div class="input-group input-group-sm" style="max-width: 250px;">
                    <span class="input-group-text">
                        <i class="fas fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Search users..." id="usersSearch">
                </div>
            </div>
        </div>
        
        <div class="table-container">
            <table class="users-table table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Role</th>
                        <th>Account Category</th>
                        <th>Status</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="usersTableBody">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-user-name="<?php echo e(strtolower($user->name)); ?>" data-user-role="<?php echo e(strtolower($user->account_category)); ?>">
                        <td><?php echo e($index + 1); ?></td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=<?php echo e(urlencode($user->name)); ?>&background=2563eb&color=fff&size=40" 
                                     alt="<?php echo e($user->name); ?>" class="user-avatar">
                                <div>
                                    <strong><?php echo e($user->name); ?></strong>
                                    <br><small class="text-muted"><?php echo e($user->designation); ?></small>
                                </div>
                            </div>
                        </td>
                        <!-- Role Badge -->
                        <td>
                            <?php switch($user->role):
                                case ('admin'): ?> <span class="badge bg-danger"><i class="fas fa-crown"></i> Admin</span> <?php break; ?>
                                <?php case ('evacuation_admin'): ?> <span class="badge bg-primary"><i class="fas fa-building-shelter"></i> Evacuation Admin</span> <?php break; ?>
                                <?php case ('barangay_admin'): ?> <span class="badge bg-success"><i class="fas fa-map-marker-alt"></i> Barangay Admin</span> <?php break; ?>
                            <?php endswitch; ?>
                        </td>

                        <!-- Account Category -->
                        <td><?php echo e($user->account_category); ?></td>
                        <td>
                            <span class="status-badge <?php echo e($user->account_status == 'Active' ? 'status-active' : 'status-inactive'); ?>">
                                <?php echo e($user->account_status); ?>

                            </span>
                        </td>
                        <td>
                            <i class="fas fa-phone me-1"></i><?php echo e($user->contact_number); ?>

                            <br><small class="text-muted"><?php echo e($user->email); ?></small>
                        </td>
                        <td>
                            <div class="action-buttons">
                               <a href="#" class="btn btn-warning btn-sm btn-table edit-user-btn" 
                                data-id="<?php echo e($user->id); ?>"
                                data-name="<?php echo e($user->name); ?>"
                                data-designation="<?php echo e($user->designation); ?>"
                                data-email="<?php echo e($user->email); ?>"
                                data-contact="<?php echo e($user->contact_number); ?>"
                                data-category="<?php echo e($user->account_category); ?>"
                                data-status="<?php echo e($user->account_status); ?>"
                                data-barangay="<?php echo e($user->barangay_id ?? ''); ?>">
                                <i class="fas fa-edit"></i> Edit
                                </a>
                              <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn-table btn-delete"
                                            onclick="return confirm('Delete <?php echo e($user->name); ?>?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="users-pagination">
            <?php echo e($users->links()); ?>

        </div>
    </div>
    <!-- Edit User Modal -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">
                    <i class="fas fa-user-edit text-primary me-2"></i>Edit User
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editUserForm" method="POST">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <input type="hidden" name="user_id" id="edit_user_id">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="edit_name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Designation</label>
                            <input type="text" class="form-control" name="designation" id="edit_designation">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" name="email" id="edit_email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number" id="edit_contact_number">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Account Category <span class="text-danger">*</span></label>
                            <select class="form-select" name="account_category" id="edit_account_category" required>
                                <option value="">Select Category</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Super Administrator">Super Administrator</option>
                                <option value="Barangay Captain">Barangay Captain</option>
                                <option value="Barangay Secretary">Barangay Secretary</option>
                                <option value="Staff">Staff</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold">Account Status</label>
                            <select class="form-select" name="account_status" id="edit_account_status">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Barangay Assignment</label>
                        <select class="form-select" name="barangay_id" id="edit_barangay_id">
                            <option value="">-- Select Barangay --</option>
                            <?php $__currentLoopData = \App\Models\Barangay::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barangay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($barangay->id); ?>"><?php echo e($barangay->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Edit buttons
    document.querySelectorAll('.edit-user-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Populate modal fields
            document.getElementById('edit_user_id').value = this.dataset.id;
            document.getElementById('edit_name').value = this.dataset.name;
            document.getElementById('edit_designation').value = this.dataset.designation;
            document.getElementById('edit_email').value = this.dataset.email;
            document.getElementById('edit_contact_number').value = this.dataset.contact;
            document.getElementById('edit_account_category').value = this.dataset.category;
            document.getElementById('edit_account_status').value = this.dataset.status;
            document.getElementById('edit_barangay_id').value = this.dataset.barangay;
            
            // Set form action
            const form = document.getElementById('editUserForm');
            form.action = `/admin/users/${this.dataset.id}`;
            
            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('editUserModal'));
            modal.show();
        });
    });

    // Form submission with AJAX (optional)
    document.getElementById('editUserForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Updating...';
        submitBtn.disabled = true;
        
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Reload to show updated data
            } else {
                alert('Error: ' + (data.message || 'Something went wrong'));
            }
        })
        .catch(error => {
            alert('Error: ' + error.message);
        })
        .finally(() => {
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
        });
    });
});
document.addEventListener('DOMContentLoaded', function() {
    // Live search functionality
    const searchInput = document.getElementById('usersSearch');
    const tableRows = document.querySelectorAll('#usersTableBody tr');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            tableRows.forEach(row => {
                const userName = row.dataset.userName;
                const userRole = row.dataset.userRole;
                const textContent = row.textContent.toLowerCase();
                
                if (userName.includes(searchTerm) || 
                    userRole.includes(searchTerm) || 
                    textContent.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
    
    // Animate stats on load
    const statCards = document.querySelectorAll('.stat-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.transform = 'translateY(0)';
                entry.target.style.opacity = '1';
            }
        });
    });
    
    statCards.forEach(card => {
        card.style.transform = 'translateY(20px)';
        card.style.opacity = '0';
        card.style.transition = 'all 0.4s ease';
        observer.observe(card);
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superlayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/AdminPages/users.blade.php ENDPATH**/ ?>