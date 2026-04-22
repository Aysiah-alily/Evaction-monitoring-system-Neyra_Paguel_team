

<?php $__env->startSection('title', 'Create New User'); ?>

<?php $__env->startSection('content'); ?>
<style>
/* Create User Page Styles */
.create-user-wrapper {
    max-width: 700px;
    margin: 0 auto;
}

.create-user-header {
    text-align: center;
    margin-bottom: 3rem;
}

.create-user-icon {
    width: 5rem;
    height: 5rem;
    background: linear-gradient(135deg, var(--primary), var(--primary-600));
    border-radius: var(--radius-2xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin: 0 auto 1.5rem;
    box-shadow: var(--shadow-2xl);
    font-size: 1.75rem;
}

.form-floating-custom .form-control {
    border-radius: var(--radius-xl);
    border: 1px solid var(--slate-200);
    padding: 1rem 0.75rem 0.5rem;
    transition: var(--transition);
}

.form-floating-custom .form-control:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 0.2rem rgba(30, 64, 175, 0.25);
}

.form-floating-custom label {
    padding: 1rem 0.75rem;
}

.form-section {
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-lg);
    padding: 2.5rem;
    margin-bottom: 2rem;
}

.form-section-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--slate-900);
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.required-field::after {
    content: ' *';
    color: var(--danger);
}

.btn-back {
    background: var(--slate-100);
    color: var(--slate-900);
    border: 1px solid var(--slate-200);
}

.btn-back:hover {
    background: var(--slate-200);
    color: var(--slate-900);
}

@media (max-width: 768px) {
    .form-section {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }
}
</style>

<div class="create-user-wrapper">
    <!-- Header -->
    <div class="create-user-header">
        <div class="create-user-icon">
            <i class="fas fa-user-plus"></i>
        </div>
        <h1 class="page-title mb-2">Create New User</h1>
        <p class="text-muted mb-0">Add a new administrator or barangay official to the system</p>
    </div>

    <!-- Create User Form -->
    <form action="<?php echo e(route('users.store')); ?>" method="POST" id="createUserForm" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        
        <!-- Personal Information -->
        <div class="form-section">
            <h3 class="form-section-title">
                <i class="fas fa-user text-primary"></i>
                Personal Information
            </h3>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold required-field">Full Name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="name" value="<?php echo e(old('name')); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Designation</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="designation" value="<?php echo e(old('designation')); ?>">
                    <?php $__errorArgs = ['designation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold required-field">Email</label>
                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="email" value="<?php echo e(old('email')); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Contact Number</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                           name="contact_number" value="<?php echo e(old('contact_number')); ?>">
                    <?php $__errorArgs = ['contact_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>

        <!-- Account Settings -->
        <div class="form-section">
            <h3 class="form-section-title">
                <i class="fas fa-cog text-success"></i>
                Account Settings
            </h3>
            
            <div class="row">
                <!-- Role (for authorization) -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold required-field">Role</label>
                    <select class="form-select <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role" required>
                        <option value="">Select Role</option>
                        <option value="admin" <?php echo e(old('role') == 'admin' ? 'selected' : ''); ?>>Admin</option>
                        <option value="evacuation_admin" <?php echo e(old('role') == 'evacuation_admin' ? 'selected' : ''); ?>>Evacuation Admin</option>
                        <option value="barangay_admin" <?php echo e(old('role') == 'barangay_admin' ? 'selected' : ''); ?>>Barangay Admin</option>
                    </select>
                </div>

                <!-- Account Category (for display) -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold required-field">Account Category</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['account_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        name="account_category" value="<?php echo e(old('account_category')); ?>" required 
                        placeholder="e.g., System Administrator, Barangay Captain">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Account Status</label>
                    <select class="form-select <?php $__errorArgs = ['account_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="account_status">
                        <option value="Active" <?php echo e(old('account_status', 'Active') == 'Active' ? 'selected' : ''); ?>>Active</option>
                        <option value="Inactive" <?php echo e(old('account_status') == 'Inactive' ? 'selected' : ''); ?>>Inactive</option>
                    </select>
                    <?php $__errorArgs = ['account_status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Barangay Assignment</label>
                <select class="form-select <?php $__errorArgs = ['barangay_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="barangay_id">
                    <option value="">-- Select Barangay (Optional) --</option>
                    <?php $__currentLoopData = \App\Models\Barangay::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barangay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($barangay->id); ?>" <?php echo e(old('barangay_id') == $barangay->id ? 'selected' : ''); ?>>
                        <?php echo e($barangay->name); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['barangay_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold required-field">Password</label>
                <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       name="password" required minlength="8">
                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <div class="form-text">Minimum 8 characters</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold required-field">Confirm Password</label>
                <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                       name="password_confirmation" required minlength="8">
                <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback"><?php echo e($message); ?></div>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex gap-2 justify-content-between flex-wrap">
            <a href="<?php echo e(route('users.index')); ?>" class="btn btn-back">
                <i class="fas fa-arrow-left me-1"></i>Back to Users
            </a>
            <button type="submit" class="btn btn-primary px-4">
                <i class="fas fa-user-plus me-2"></i>Create User
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation enhancement
    const form = document.getElementById('createUserForm');
    const password = document.querySelector('input[name="password"]');
    const confirmPassword = document.querySelector('input[name="password_confirmation"]');
    
    // Real-time password match validation
    confirmPassword.addEventListener('input', function() {
        if (this.value !== password.value) {
            this.setCustomValidity('Passwords do not match');
        } else {
            this.setCustomValidity('');
        }
    });
    
    // Phone number formatting
    const phoneInput = document.querySelector('input[name="contact_number"]');
    phoneInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
        if (this.value.length > 11) {
            this.value = this.value.slice(0, 11);
        }
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.superlayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/AdminPages/create-user.blade.php ENDPATH**/ ?>