@extends('layouts.adminbarangay')

@section('content')
<!-- YOUR STYLES - MATCHING CREATE THEME EXACTLY -->
<style>
/* EXACT SAME STYLES AS CREATE PAGE */
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

/* Form Fields - EXACT MATCH */
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

/* Radio/Checkboxes - EXACT MATCH */
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

/* Buttons - EXACT MATCH */
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

/* Family Members Table - EXACT MATCH */
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

<!-- FULL WIDTH CONTENT -->
<div style="width: 100%; padding: 0;">

    <!-- Success/Error Alerts - MATCHING STYLE -->
    @if(session('success'))
        <div class="alert alert-custom alert-success-custom">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-custom alert-danger-custom">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Please fix the following errors:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Page Header - EXACT MATCH -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 p-0">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-edit text-primary"></i>
                    Edit Household: {{ $household->household_name }}
                </h1>
                <p class="page-subtitle">Update household information and family members</p>
            </div>
        </div>
    </div>

    <!-- Navigation Pills - EXACT MATCH -->
    <div class="nav-pills-custom">
        <a href="{{ route('households.index') }}" class="nav-link active">
            <i class="fas fa-list me-2"></i>All Households
        </a>
        <a href="{{ route('households.create') }}" class="nav-link">
            <i class="fas fa-plus me-2"></i>New Household
        </a>
        <a href="{{ route('households.show', $household->id) }}" class="nav-link">
            <i class="fas fa-eye me-2"></i>View Household
        </a>
        <a href="{{ url('/puroks') }}" class="nav-link">
            <i class="fas fa-map-marker-alt me-2"></i>New Purok
        </a>
    </div>

    <!-- Main Form Card - EXACT MATCH -->
    <div class="form-card">
        <div class="form-header d-flex justify-content-between align-items-center">
            <h3 class="form-title">
                <i class="fas fa-user-edit me-2 text-primary"></i>
                Update Household Information
            </h3>
        </div>
        
        <div class="p-4">
            <form method="POST" action="{{ route('households.update', $household->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Household Name & Purok -->
                    <div class="col-lg-6 form-group">
                        <label for="household_name" class="form-label">Household Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('household_name') is-invalid @enderror"
                               id="household_name" name="household_name" required value="{{ old('household_name', $household->household_name) }}">
                        @error('household_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="col-lg-6 form-group">
                        <label for="purok" class="form-label">Purok <span class="text-danger">*</span></label>
                        <select class="form-select @error('purok') is-invalid @enderror" id="purok" name="purok" required>
                            <option value="">Select Purok</option>
                            @foreach($puroks as $purok)
                                <option value="{{ $purok->purok_name }}" {{ old('purok', $household->purok) == $purok->purok_name ? 'selected' : '' }}>
                                    {{ $purok->purok_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('purok') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- Head of Family -->
                    <div class="col-lg-4 form-group">
                        <label for="head_surname" class="form-label">Surname <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('head_surname') is-invalid @enderror"
                               id="head_surname" name="head_surname" required value="{{ old('head_surname', $household->head_surname) }}">
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="head_firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('head_firstname') is-invalid @enderror"
                               id="head_firstname" name="head_firstname" required value="{{ old('head_firstname', $household->head_firstname) }}">
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="head_middlename" class="form-label">Middle Name</label>
                        <input type="text" class="form-control @error('head_middlename') is-invalid @enderror"
                               id="head_middlename" name="head_middlename" value="{{ old('head_middlename', $household->head_middlename) }}">
                    </div>

                    <!-- Address -->
                    <div class="col-lg-4 form-group">
                        <label for="barangay_name" class="form-label">Barangay <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('barangay_name') is-invalid @enderror"
                               id="barangay_name" name="barangay_name" required value="{{ old('barangay_name', $household->barangay_name) }}">
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="street_name" class="form-label">Street <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('street_name') is-invalid @enderror"
                               id="street_name" name="street_name" required value="{{ old('street_name', $household->street_name) }}">
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="house_number" class="form-label">House No. <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('house_number') is-invalid @enderror"
                               id="house_number" name="house_number" required value="{{ old('house_number', $household->house_number) }}">
                    </div>

                    <!-- Gender, Civil Status, Age -->
                    <div class="col-lg-4 form-group">
                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                        <div class="d-flex flex-column gap-2 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Male" id="genderMale" {{ old('gender', $household->gender) == 'Male' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" value="Female" id="genderFemale" {{ old('gender', $household->gender) == 'Female' ? 'checked' : '' }} required>
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 form-group">
                        <label class="form-label">Civil Status <span class="text-danger">*</span></label>
                        <div class="d-flex flex-column gap-2 mt-2">
                            @foreach(['Single', 'Married', 'Widowed', 'Separated'] as $status)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="civil_status" value="{{ $status }}" id="civil{{ $status }}" {{ old('civil_status', $household->civil_status) == $status ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="civil{{ $status }}">{{ $status }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4 form-group">
                        <label for="age" class="form-label">Age <span class="text-danger">*</span></label>
                        <input type="number" class="form-control @error('age') is-invalid @enderror"
                               id="age" name="age" min="0" max="120" required value="{{ old('age', $household->age) }}">
                    </div>

                    <!-- Priority -->
                    <div class="col-12 form-group">
                        <label for="priority_status" class="form-label">Priority Status <span class="text-danger">*</span></label>
                        <select class="form-select @error('priority_status') is-invalid @enderror" id="priority_status" name="priority_status" required>
                            <option value="">Select Priority</option>
                            <option value="High" {{ old('priority_status', $household->priority_status) == 'High' ? 'selected' : '' }}>High</option>
                            <option value="Moderate" {{ old('priority_status', $household->priority_status) == 'Moderate' ? 'selected' : '' }}>Moderate</option>
                            <option value="Low" {{ old('priority_status', $household->priority_status) == 'Low' ? 'selected' : '' }}>Low</option>
                        </select>
                        @error('priority_status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <!-- High Priority Indicators -->
                    <div class="col-12 form-group" id="high_priority_options" style="display: {{ old('priority_status', $household->priority_status) == 'High' ? 'block' : 'none' }};">
                        <label class="form-label">High Priority Indicators</label>
                        <div class="row g-3 mt-2">
                            @foreach(['Older Person', 'Lactating Mother', 'PWD', 'Pregnant', 'Poor Housing Condition'] as $indicator)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="priority_indicator[]" value="{{ $indicator }}" id="indicator{{ str_replace(' ', '', $indicator) }}" {{ in_array($indicator, old('priority_indicator', [])) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="indicator{{ str_replace(' ', '', $indicator) }}">{{ $indicator }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Date Registered -->
                    <div class="col-12 form-group">
                        <label for="date_registered" class="form-label">Date Registered <span class="text-danger">*</span></label>
                        <input type="date" class="form-control @error('date_registered') is-invalid @enderror"
                               id="date_registered" name="date_registered" value="{{ old('date_registered', $household->date_registered) }}" required>
                        @error('date_registered')                         <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <!-- Family Members Section - EXACT MATCH -->
                <div class="mt-5 pt-4 border-top" style="border-color: var(--gray-200);">
                    <h5 class="form-title mb-4">
                        <i class="fas fa-users me-2 text-primary"></i>Family Members
                    </h5>
                    
                    <div class="family-table mb-4">
                        <table class="family-table table-custom table-hover w-100" id="familyMembersTable">
                            <thead>
                                <tr>
                                    <th style="width: 40%;">Name</th>
                                    <th style="width: 30%;">Relationship</th>
                                    <th style="width: 20%;">Age</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="familyMembersBody">
                                @if(isset($household->familyMembers) && $household->familyMembers->count() > 0)
                                    @foreach($household->familyMembers as $member)
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="family_member_name[]" 
                                                       value="{{ old('family_member_name.*', $member->name) }}" required>
                                            </td>
                                            <td>
                                                <select class="form-select" name="family_member_relationship[]" required>
                                                    <option value="">Select relationship</option>
                                                    <option value="Spouse" {{ old('family_member_relationship.*', $member->relationship) == 'Spouse' ? 'selected' : '' }}>Spouse</option>
                                                    <option value="Child" {{ old('family_member_relationship.*', $member->relationship) == 'Child' ? 'selected' : '' }}>Child</option>
                                                    <option value="Parent" {{ old('family_member_relationship.*', $member->relationship) == 'Parent' ? 'selected' : '' }}>Parent</option>
                                                    <option value="Sibling" {{ old('family_member_relationship.*', $member->relationship) == 'Sibling' ? 'selected' : '' }}>Sibling</option>
                                                    <option value="Grandchild" {{ old('family_member_relationship.*', $member->relationship) == 'Grandchild' ? 'selected' : '' }}>Grandchild</option>
                                                    <option value="Other" {{ old('family_member_relationship.*', $member->relationship) == 'Other' ? 'selected' : '' }}>Other</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="family_member_age[]" 
                                                       value="{{ old('family_member_age.*', $member->age) }}" min="0" max="120" required>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row" style="width: 36px; height: 36px;">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <button type="button" class="btn btn-outline-primary btn-custom" id="addFamilyMember">
                        <i class="fas fa-plus me-2"></i>Add Family Member
                    </button>
                </div>

                <!-- Form Actions - EXACT MATCH -->
                <div class="d-flex gap-3 justify-content-end mt-5 pt-4 border-top" style="border-color: var(--gray-200);">
                    <a href="{{ route('households.index') }}" class="btn btn-secondary-custom btn-custom">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                    <a href="{{ route('households.show', $household->id) }}" class="btn btn-secondary-custom btn-custom">
                        <i class="fas fa-eye me-2"></i>View
                    </a>
                    <button type="submit" class="btn btn-primary-custom btn-custom">
                        <i class="fas fa-save me-2"></i>Update Household
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Priority conditional display - EXACT MATCH
    const prioritySelect = document.getElementById('priority_status');
    const highPriorityOptions = document.getElementById('high_priority_options');
    
    prioritySelect.addEventListener('change', function() {
        highPriorityOptions.style.display = this.value === 'High' ? 'block' : 'none';
    });

    // Family members dynamic table - EXACT MATCH
    let rowIndex = {{ isset($household->familyMembers) ? $household->familyMembers->count() : 0 }};
    const addBtn = document.getElementById('addFamilyMember');
    const tableBody = document.getElementById('familyMembersBody');

    addBtn.addEventListener('click', function() {
        rowIndex++;
        const row = document.createElement('tr');
        row.innerHTML = `
            <td><input type="text" class="form-control" name="family_member_name[]" placeholder="Family member name" required></td>
            <td>
                <select class="form-select" name="family_member_relationship[]" required>
                    <option value="">Select relationship</option>
                    <option value="Spouse">Spouse</option>
                    <option value="Child">Child</option>
                    <option value="Parent">Parent</option>
                    <option value="Sibling">Sibling</option>
                    <option value="Grandchild">Grandchild</option>
                    <option value="Other">Other</option>
                </select>
            </td>
            <td><input type="number" class="form-control" name="family_member_age[]" min="0" max="120" placeholder="Age" required></td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-row" style="width: 36px; height: 36px;">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tableBody.appendChild(row);
    });

    // Remove row - EXACT MATCH
    tableBody.addEventListener('click', function(e) {
        if (e.target.closest('.remove-row')) {
            if (tableBody.children.length > 0) { // Allow empty table on edit
                e.target.closest('tr').remove();
            }
        }
    });

    // Form validation feedback - EXACT MATCH
    const formControls = document.querySelectorAll('.form-control, .form-select');
    formControls.forEach(control => {
        control.addEventListener('blur', function() {
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid');
            }
        });
    });

    // Auto-add head of family row if no family members exist
    @if(!isset($household->familyMembers) || $household->familyMembers->count() === 0)
    const headSurname = document.getElementById('head_surname').value;
    const headFirstname = document.getElementById('head_firstname').value;
    const headAge = document.getElementById('age').value;
    if (headSurname && headFirstname && tableBody.children.length === 0) {
        const headRow = document.createElement('tr');
        headRow.innerHTML = `
            <td><input type="text" class="form-control" name="family_member_name[]" value="${headSurname}, ${headFirstname}" readonly style="background: var(--gray-50);"></td>
            <td>
                <select class="form-select" name="family_member_relationship[]" disabled>
                    <option value="Head">Head of Household</option>
                </select>
            </td>
            <td><input type="number" class="form-control" name="family_member_age[]" value="${headAge}" readonly style="background: var(--gray-50);"></td>
            <td><span class="badge bg-success">Head</span></td>
        `;
        tableBody.appendChild(headRow);
    }
    @endif
});
</script>
@endpush
@endsection