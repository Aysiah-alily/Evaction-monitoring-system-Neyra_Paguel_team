@extends('layouts.adminbarangay')

@section('content')
<!-- SAME EXACT STYLES AS CREATE/EDIT -->
<style>
.page-header, .form-card { margin-left: 55px !important; margin-right: 10px !important; }
.container-fluid { padding: 10px !important; margin: 0 !important; }

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

/* Page Header - EXACT MATCH */
.page-header {
    background: transparent;
    padding: 0;
    margin-bottom: 20px;
}

.page-title {
    font-size: 28px;
    font-weight: 700;
    color: var(--gray-800);
}

.page-subtitle {
    font-size: 14px;
    color: #6b7280;
    margin-bottom: 1rem;
}

/* Navigation Pills - EXACT MATCH */
.nav-pills-custom {
    border-radius: 12px;
    background: var(--gray-50);
    padding: 4px;
    display: flex;
    gap: 4px;
    flex-wrap: wrap;
    margin-bottom: 2rem;
    margin-left: 60px !important;
}

.nav-pills-custom .nav-link {
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 0.9rem;
    color: var(--gray-600);
    border: none;
    transition: all 0.2s ease;
    text-decoration: none;
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

/* Main Form Card - EXACT MATCH */
.form-card {
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    background: white;
    overflow: hidden;
}

.form-header {
    background: linear-gradient(135deg, var(--gray-50) 0%, white 100%);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--gray-200);
}

.form-title {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--gray-800);
    margin: 0;
}

/* Form Fields */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--gray-800);
    margin-bottom: 0.5rem;
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
}

.form-control:focus, .form-select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
    outline: none;
    background: white;
}

.form-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
}

.form-row .form-group {
    flex: 1;
    min-width: 250px;
}

/* Radio/Checkboxes */
.form-check {
    margin-bottom: 0.75rem;
}

.form-check-input:checked {
    background-color: var(--primary);
    border-color: var(--primary);
}

.form-check-label {
    font-weight: 500;
    color: var(--gray-800);
    cursor: pointer;
}

/* Buttons */
.btn-custom {
    border-radius: 10px;
    font-weight: 600;
    padding: 12px 24px;
    border: none;
    transition: all 0.2s ease;
    font-size: 0.95rem;
}

.btn-primary-custom {
    background: var(--primary);
    color: white;
}

.btn-primary-custom:hover {
    background: var(--primary-dark);
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.btn-secondary-custom {
    background: var(--gray-100);
    color: var(--gray-800);
    border: 2px solid var(--gray-200);
}

.btn-secondary-custom:hover {
    background: var(--gray-200);
    transform: translateY(-1px);
}

/* Family Members Table */
.family-table {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.family-table thead th {
    background: var(--gray-50);
    font-weight: 600;
    color: var(--gray-800);
    border: none;
    padding: 1rem;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.family-table tbody td {
    padding: 1rem;
    border-color: var(--gray-200);
    vertical-align: middle;
}

.family-table tbody tr:hover {
    background: var(--gray-50);
}

/* Alerts - EXACT MATCH */
.alert-custom {
    border: none;
    border-radius: 12px;
    padding: 1rem 1.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-sm);
}

.alert-success-custom { 
    background: #f0fdf4; 
    border-left: 4px solid var(--success); 
    color: var(--success); 
}

.alert-danger-custom { 
    background: #fef2f2; 
    border-left: 4px solid var(--danger); 
    color: var(--danger); 
}

/* Responsive */
@media (max-width: 768px) {
    .form-row { flex-direction: column; }
    .form-group { min-width: 100%; }
}
</style>

<div style="width: 100%; padding: 0;">
    <!-- Success Alert -->
    @if(session('success'))
        <div class="alert alert-custom alert-success-custom">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    <!-- Page Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 p-0">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-eye text-primary"></i>
                    Household Details: {{ $household->household_name }}
                </h1>
                <p class="page-subtitle">View household information and family members</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('households.edit', $household->id) }}" class="btn btn-primary-custom btn-custom">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
                <a href="{{ route('households.index') }}" class="btn btn-secondary-custom btn-custom">
                    <i class="fas fa-arrow-left me-2"></i>Back to List
                </a>
            </div>
        </div>
    </div>

    <!-- Navigation Pills -->
    <div class="nav-pills-custom">
        <a href="{{ route('households.index') }}" class="nav-link active">
            <i class="fas fa-list me-2"></i>All Households
        </a>
        <a href="{{ route('households.create') }}" class="nav-link">
            <i class="fas fa-plus me-2"></i>New Household
        </a>
        <a href="{{ route('households.edit', $household->id) }}" class="nav-link">
            <i class="fas fa-edit me-2"></i>Edit Household
        </a>
    </div>

    <!-- Main Info Card -->
    <div class="form-card mb-4">
        <div class="form-header">
            <h3 class="form-title">
                <i class="fas fa-info-circle me-2 text-primary"></i>
                Household Information
            </h3>
        </div>
        <div class="p-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="info-item mb-3">
                        <label class="form-label">Household Name</label>
                        <h5 class="fw-bold">{{ $household->household_name }}</h5>
                    </div>
                    <div class="info-item mb-3">
                        <label class="form-label">Purok</label>
                        <h5><span class="badge bg-primary">{{ $household->purok }}</span></h5>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-item mb-3">
                        <label class="form-label">Head of Household</label>
                        <h5>{{ $household->head_surname }}, {{ $household->head_firstname }} {{ $household->head_middlename }}</h5>
                    </div>
                    <div class="info-item mb-3">
                        <label class="form-label">Priority</label>
                        <span class="status-badge priority-{{ strtolower($household->priority_status) }}">
                            {{ $household->priority_status }}
                        </span>
                    </div>
                </div>
                <div class="col-12">
                    <div class="info-item">
                        <label class="form-label">Address</label>
                        <h6>{{ $household->house_number }}, {{ $household->street_name }}, {{ $household->barangay_name }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Family Members Table -->
    <div class="form-card">
        <div class="form-header">
            <h3 class="form-title">
                <i class="fas fa-users me-2 text-primary"></i>
                Family Members ({{ $household->familyMembers->count() ?? 0 }})
            </h3>
        </div>
        <div class="p-4">
            @if($household->familyMembers && $household->familyMembers->count() > 0)
                <div class="table-responsive">
                    <table class="table family-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Relationship</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($household->familyMembers as $member)
                                <tr>
                                    <td><strong>{{ $member->name }}</strong></td>
                                    <td>{{ $member->relationship }}</td>
                                    <td>{{ $member->age }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-users-slash text-muted" style="font-size: 3rem;"></i>
                    <h5 class="text-muted mt-3">No family members registered</h5>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- SAME SCRIPTS AS CREATE PAGE -->
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Print functionality
    window.printHousehold = function() {
        window.print();
    };
});
</script>
@endpush
@endsection