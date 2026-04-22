@extends('layouts.adminbarangay')

@section('content')
<!-- EXACT SAME STYLES AS HOUSEHOLD PAGES -->
<style>
/* ALL SAME STYLES - COPIED FROM PREVIOUS */
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

/* Page Header, Nav Pills, Cards - EXACT SAME */
.page-header { background: transparent; padding: 0; margin-bottom: 20px; }
.page-title { font-size: 28px; font-weight: 700; color: var(--gray-800); }
.page-subtitle { font-size: 14px; color: #6b7280; margin-bottom: 1rem; }
.nav-pills-custom {
    border-radius: 12px; background: var(--gray-50); padding: 4px;
    display: flex; gap: 4px; flex-wrap: wrap; margin-bottom: 2rem; margin-left: 60px !important;
}
.nav-pills-custom .nav-link {
    padding: 12px 20px; border-radius: 8px; font-weight: 600; font-size: 0.9rem;
    color: var(--gray-600); border: none; transition: all 0.2s ease; text-decoration: none;
}
.nav-pills-custom .nav-link:hover { color: var(--primary); background: white; transform: translateY(-1px); }
.nav-pills-custom .nav-link.active { background: var(--primary); color: white; box-shadow: var(--shadow-md); }

.table-card {
    border-radius: 12px; box-shadow: 0 2px 6px rgba(0,0,0,0.05); background: white; overflow: hidden;
    margin-left: 55px !important;
    margin-right: 10px !important;
    margin-bottom: 4rem !important;
}
.table-header {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
    padding: 1.5rem 2rem; border-bottom: 1px solid var(--gray-200);
}
.table-title { font-size: 1.25rem; font-weight: 700; color: var(--gray-800); margin: 0; }

/* Purok Table */
.purok-table { border-radius: 10px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.08); }
.purok-table thead th {
    background: var(--gray-50); font-weight: 600; color: var(--gray-800); border: none;
    padding: 1rem; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.05em;
}
.purok-table tbody td { padding: 1rem; border-color: var(--gray-200); vertical-align: middle; }
.purok-table tbody tr:hover { background: var(--gray-50); }

/* Action Buttons */
.action-buttons { display: flex; gap: 6px; }
.action-btn {
    width: 36px; height: 36px; border-radius: 8px; border: none;
    display: flex; align-items: center; justify-content: center; font-size: 0.85rem;
    transition: all 0.2s ease;
}
.btn-edit { background: var(--success); color: white; }
.btn-edit:hover { background: #059669; transform: translateY(-2px); }
.btn-delete { background: #fee2e2; color: var(--danger); }
.btn-delete:hover { background: var(--danger); color: white; transform: translateY(-2px); }

/* SUPERCHARGED MODAL DESIGN */
.modal-content {
    border-radius: 20px !important;
    border: none;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    overflow: hidden;
    backdrop-filter: blur(10px);
}

.modal-header {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    color: white !important;
    border: none !important;
    padding: 2rem 2.5rem !important;
    position: relative;
    overflow: hidden;
}

.modal-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--success), var(--warning), var(--success));
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
}

@keyframes shimmer {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

.modal-title {
    font-size: 1.5rem !important;
    font-weight: 800 !important;
    color: white !important;
    margin: 0;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.modal-title i {
    background: rgba(255,255,255,0.2);
    padding: 0.5rem;
    border-radius: 12px;
    margin-right: 1rem;
    backdrop-filter: blur(10px);
}

.modal-body {
    padding: 2.5rem !important;
    background: linear-gradient(135deg, #fdfdfd 0%, white 100%);
}

.modal-body .form-group {
    margin-bottom: 2rem !important;
    position: relative;
}

.modal-body .form-label {
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    font-size: 1rem !important;
    font-weight: 700 !important;
    margin-bottom: 0.75rem !important;
}

.modal .form-control {
    border: 2px solid transparent !important;
    border-radius: 16px !important;
    padding: 16px 20px !important;
    font-size: 1rem !important;
    height: 60px !important;
    background: linear-gradient(white, white) padding-box,
                linear-gradient(135deg, var(--primary), var(--primary-dark)) border-box;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.modal .form-control:focus {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15),
                0 12px 24px rgba(37, 99, 235, 0.2) !important;
    transform: translateY(-2px) !important;
}

.modal .form-control::placeholder {
    color: #9ca3af;
    font-weight: 500;
}

.modal-footer {
    padding: 2rem 2.5rem !important;
    border-top: 1px solid rgba(0,0,0,0.05) !important;
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%) !important;
    gap: 1rem !important;
}

/* ENHANCED BUTTONS */
.modal .btn-custom {
    border-radius: 16px !important;
    font-weight: 700 !important;
    padding: 14px 32px !important;
    font-size: 1rem !important;
    position: relative;
    overflow: hidden;
    min-width: 140px;
    justify-content: center;
}

.modal .btn-primary-custom {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%) !important;
    box-shadow: 0 8px 24px rgba(37, 99, 235, 0.3);
}

.modal .btn-primary-custom:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 16px 32px rgba(37, 99, 235, 0.4) !important;
}

.modal .btn-primary-custom:active {
    transform: translateY(-1px) !important;
}

.modal .btn-secondary-custom {
    background: rgba(255,255,255,0.9) !important;
    border: 2px solid var(--gray-200) !important;
    color: var(--gray-800) !important;
    backdrop-filter: blur(10px);
}

.modal .btn-secondary-custom:hover {
    background: white !important;
    border-color: var(--primary) !important;
    color: var(--primary) !important;
    transform: translateY(-1px) !important;
}

/* Loading Animation */
@keyframes spin {
    to { transform: rotate(360deg); }
}
.modal .spinner-border {
    animation: spin 0.75s linear infinite !important;
}

/* Table Enhancements */
.table-card {
    margin-left: 55px !important;
    margin-right: 10px !important;
    margin-bottom: 4rem !important;
}

/* Responsive */
@media (max-width: 768px) {
    .stats-section { margin: 0 1rem 2rem 1rem !important; padding: 1.5rem !important; }
    .modal-dialog { margin: 1rem !important; }
    .modal-body { padding: 1.5rem !important; }
}
/* Stats Cards */
.stats-section {
    margin-left: 30px !important;
}
.stat-card {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
    border-radius: 12px; padding: 1.5rem; border: 1px solid var(--gray-200);
    text-align: center; transition: all 0.2s ease; cursor: pointer;
}
.stat-card:hover { transform: translateY(-2px); box-shadow: var(--shadow-md); }
.stat-number { font-size: 2rem; font-weight: 700; color: var(--primary); }

/* Alerts - EXACT MATCH */
.alert-custom { border: none; border-radius: 12px; padding: 1rem 1.5rem; margin-bottom: 2rem; box-shadow: var(--shadow-sm); }
.alert-success-custom { background: #f0fdf4; border-left: 4px solid var(--success); color: var(--success); }
.alert-danger-custom { background: #fef2f2; border-left: 4px solid var(--danger); color: var(--danger); }

/* Responsive */
@media (max-width: 768px) { .action-buttons { justify-content: center; } }
</style>

<!-- FULL WIDTH CONTENT -->
<div style="width: 100%; padding: 0;">

    <!-- Success/Error Alerts -->
    @if(session('success'))
        <div class="alert alert-custom alert-success-custom mx-4">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-custom alert-danger-custom mx-4">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">{{ $errors->all() }}</ul>
        </div>
    @endif

    <!-- Page Header - EXACT MATCH -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 p-0">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-map-marker-alt text-primary"></i>
                    Manage Puroks
                </h1>
                <p class="page-subtitle">View and manage all registered puroks</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-section">
        <div class="row g-4 mx-4 mb-4">
            <div class="col-md-6 col-lg-3">
                <div class="stat-card" onclick="openPurokModal()">
                    <div class="stat-number">{{ $puroks->count() ?? 0 }}</div>
                    <div class="text-muted fs-6">Total Puroks</div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="stat-card">
                    <div class="stat-number text-success">{{ $totalHouseholds ?? 0 }}</div>
                    <div class="text-muted fs-6">Total Households</div>
                </div>
            </div>
        </div>
    </div>
     <!-- Navigation Pills - EXACT MATCH -->
    <div class="nav-pills-custom">
        <a href="{{ route('households.index') }}" class="nav-link">
            <i class="fas fa-list me-2"></i>All Households
        </a>
        <a href="{{ route('households.create') }}" class="nav-link">
            <i class="fas fa-home me-2"></i>New Household
        </a>
        <button class="btn btn-primary-custom btn-custom" data-bs-toggle="modal" data-bs-target="#purokModal">
                <i class="fas fa-plus me-2"></i>Add New Purok
        </button>
    </div>
    <!-- Main Table Card -->
    <div class="table-card mx-4 mb-4">
        <div class="table-header d-flex justify-content-between align-items-center">
            <h3 class="table-title">
                <i class="fas fa-table me-2 text-primary"></i>
                Puroks List
                <span class="badge bg-primary ms-2">{{ $puroks->count() ?? 0 }} Total</span>
            </h3>
        </div>
        
        <div class="table-responsive">
            <table class="purok-table table-custom table-hover w-100 mx-4 mb-4">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Barangay</th>
                        <th>Purok</th>
                        <th>Captain</th>
                        <th>Households</th>
                        <th>Registered</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($puroks as $purok)
                        <tr>
                            <td class="fw-bold">{{ $purok->id }}</td>
                            <td>{{ $purok->barangay_name }}</td>
                            <td>
                                <span class="badge bg-primary fs-6 px-2 py-1">{{ $purok->purok_name }}</span>
                            </td>
                            <td>{{ Str::limit($purok->captain_name, 25) }}</td>
                            <td>
                                <span class="badge bg-success">{{ $purok->household_count }}</span>
                            </td>
                            <td>{{ $purok->created_at->format('M d, Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('households.index', ['purok' => $purok->purok_name]) }}" 
                                       class="action-btn btn-view" title="View Households">
                                        <i class="fas fa-users"></i>
                                    </a>
                                    <button class="action-btn btn-edit" onclick="editPurok({{ $purok->id }})" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="action-btn btn-delete" onclick="deletePurok({{ $purok->id }})" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-8 text-muted">
                                <i class="fas fa-map-marker-alt" style="font-size: 4rem;"></i>
                                <h4 class="mt-3 mb-1">No Puroks Found</h4>
                                <p class="mb-4">Click "Add New Purok" to get started</p>
                                <button class="btn btn-primary-custom btn-custom px-5" data-bs-toggle="modal" data-bs-target="#purokModal">
                                    <i class="fas fa-plus me-2"></i>Add First Purok
                                </button>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADD PUROK MODAL - PERFECT MATCH -->
    <div class="modal fade" id="purokModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">
                        <i class="fas fa-plus text-primary me-2"></i>Add New Purok
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form id="purokForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="purokId">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Barangay Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('barangay_name') is-invalid @enderror" 
                                       name="barangay_name" id="barangay_name" required value="{{ old('barangay_name') }}">
                                @error('barangay_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Purok Name / Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('purok_name') is-invalid @enderror" 
                                       name="purok_name" id="purok_name" required value="{{ old('purok_name') }}">
                                @error('purok_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Purok Captain <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('captain_name') is-invalid @enderror" 
                                       name="captain_name" id="captain_name" required value="{{ old('captain_name') }}">
                                @error('captain_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="form-label">Estimated Households <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('household_count') is-invalid @enderror" 
                                       name="household_count" id="household_count" min="1" required value="{{ old('household_count') }}">
                                @error('household_count') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary-custom btn-custom" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-primary-custom btn-custom" id="submitBtn">
                            <i class="fas fa-save me-2"></i><span id="submitText">Save Purok</span>
                            <span class="spinner-border spinner-border-sm d-none ms-2" id="loadingSpinner"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = new bootstrap.Modal(document.getElementById('purokModal'));
    const form = document.getElementById('purokForm');
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const loadingSpinner = document.getElementById('loadingSpinner');

// Fix all fetch URLs and form actions
window.openPurokModal = function() {
    document.getElementById('modalTitle').innerHTML = '<i class="fas fa-plus text-primary me-2"></i>Add New Purok';
    document.getElementById('purokId').value = '';
    form.action = '/puroks';  // ✅ Matches POST /puroks
    form.reset();
    modal.show();
};

window.editPurok = function(id) {
    fetch(`/puroks/${id}/edit`)  // ✅ Matches GET /puroks/{id}/edit
        .then(response => response.json())
        .then(data => {
            // ... rest of code
            form.action = `/puroks/${data.id}`;  // ✅ Matches PUT /puroks/{id}
            modal.show();
        });
};

window.deletePurok = function(id) {
    if (confirm('Delete this purok?')) {
        fetch(`/puroks/${id}`, {  // ✅ Matches DELETE /puroks/{id}
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) location.reload();
        });
    }
};

    // Form submission with loading state
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        submitBtn.disabled = true;
        submitText.textContent = 'Saving...';
        loadingSpinner.classList.remove('d-none');
        
        const formData = new FormData(form);
        const method = document.getElementById('purokId').value ? 'PUT' : 'POST';
        
        fetch(form.action, {
            method: method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload(); // Reload to show updated list
            } else {
                alert('Error: ' + (data.message || 'Something went wrong'));
                resetForm();
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to save purok');
            resetForm();
        });
    });

    function resetForm() {
        submitBtn.disabled = false;
        submitText.textContent = document.getElementById('purokId').value ? 'Update Purok' : 'Save Purok';
        loadingSpinner.classList.add('d-none');
    }

    // Close modal reset
    document.getElementById('purokModal').addEventListener('hidden.bs.modal', function() {
        resetForm();
        form.reset();
        document.getElementById('purokId').value = '';
        document.getElementById('modalTitle').innerHTML = '<i class="fas fa-plus text-primary me-2"></i>Add New Purok';
    });
});
</script>
@endpush
@endsection