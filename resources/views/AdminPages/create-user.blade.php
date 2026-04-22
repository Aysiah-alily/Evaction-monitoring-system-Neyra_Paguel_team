@extends('layouts.superlayout')

@section('title', 'Create New User')

@section('content')
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
    <form action="{{ route('users.store') }}" method="POST" id="createUserForm" enctype="multipart/form-data">
        @csrf
        
        <!-- Personal Information -->
        <div class="form-section">
            <h3 class="form-section-title">
                <i class="fas fa-user text-primary"></i>
                Personal Information
            </h3>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold required-field">Full Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                           name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Designation</label>
                    <input type="text" class="form-control @error('designation') is-invalid @enderror" 
                           name="designation" value="{{ old('designation') }}">
                    @error('designation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold required-field">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Contact Number</label>
                    <input type="text" class="form-control @error('contact_number') is-invalid @enderror" 
                           name="contact_number" value="{{ old('contact_number') }}">
                    @error('contact_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    <select class="form-select @error('role') is-invalid @enderror" name="role" required>
                        <option value="">Select Role</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="evacuation_admin" {{ old('role') == 'evacuation_admin' ? 'selected' : '' }}>Evacuation Admin</option>
                        <option value="barangay_admin" {{ old('role') == 'barangay_admin' ? 'selected' : '' }}>Barangay Admin</option>
                    </select>
                </div>

                <!-- Account Category (for display) -->
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold required-field">Account Category</label>
                    <input type="text" class="form-control @error('account_category') is-invalid @enderror" 
                        name="account_category" value="{{ old('account_category') }}" required 
                        placeholder="e.g., System Administrator, Barangay Captain">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Account Status</label>
                    <select class="form-select @error('account_status') is-invalid @enderror" name="account_status">
                        <option value="Active" {{ old('account_status', 'Active') == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ old('account_status') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @error('account_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Barangay Assignment</label>
                <select class="form-select @error('barangay_id') is-invalid @enderror" name="barangay_id">
                    <option value="">-- Select Barangay (Optional) --</option>
                    @foreach(\App\Models\Barangay::all() as $barangay)
                    <option value="{{ $barangay->id }}" {{ old('barangay_id') == $barangay->id ? 'selected' : '' }}>
                        {{ $barangay->name }}
                    </option>
                    @endforeach
                </select>
                @error('barangay_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold required-field">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" 
                       name="password" required minlength="8">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div class="form-text">Minimum 8 characters</div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold required-field">Confirm Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" 
                       name="password_confirmation" required minlength="8">
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex gap-2 justify-content-between flex-wrap">
            <a href="{{ route('users.index') }}" class="btn btn-back">
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
@endsection