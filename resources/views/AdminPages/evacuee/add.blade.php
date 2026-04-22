@extends('layouts.superlayout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add/Edit Evacuee') }}
    </h2>
@endsection

@section('content')
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            background: #FDFDFC;
            color: #1b1b18;
            min-height: 100vh;
        }
        .sidebar {
            background: linear-gradient(135deg, #1b1b18 0%, #2d2d2a 100%);
            color: #fff;
            min-height: 100vh;
            position: fixed;
            width: 250px;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: #fff;
            padding: 15px 20px;
            transition: background-color 0.3s ease;
        }
        .sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        .sidebar .nav-link.active {
            background-color: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
        .sidebar .submenu .nav-link {
            padding-left: 40px;
            font-size: 0.9rem;
        }
        .main-content {
            margin-left: 250px;
            padding: 30px;
        }
        .form-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .btn-custom {
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: 500;
        }
        .form-label {
            font-weight: 600;
            color: #1b1b18;
            margin-bottom: 8px;
        }
        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ddd;
            padding: 10px 12px;
        }
        .form-control:focus, .form-select:focus {
            border-color: #1976d2;
            box-shadow: 0 0 0 0.2rem rgba(25, 118, 210, 0.25);
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                min-height: auto;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>

    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="p-3">
                <h2 class="text-center mb-4"><i class="fas fa-shield-alt me-2"></i>Evacuation System</h2>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('barangay.index') }}"><i class="fas fa-map-marker-alt me-2"></i>Barangay Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('households.index') }}"><i class="fas fa-cogs me-2"></i>Households</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('calamity.index') }}"><i class="fas fa-exclamation-triangle me-2"></i>Type of Calamity</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('evacuation_center.index') }}"><i class="fas fa-building me-2"></i>Evacuation Center</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn btn-link text-start p-0 w-100" data-bs-toggle="collapse" data-bs-target="#evacuee-submenu" aria-expanded="false" aria-controls="evacuee-submenu">
                            <i class="fas fa-users me-2"></i>Evacuee Information <i class="fas fa-chevron-down float-end"></i>
                        </button>
                        <div class="collapse" id="evacuee-submenu">
                            <ul class="nav flex-column submenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('evacuee.add') }}"><i class="fas fa-plus me-2"></i>Add New Evacuee</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('evacuee.list') }}"><i class="fas fa-list me-2"></i>Manage Evacuees</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn btn-link text-start p-0 w-100" data-bs-toggle="collapse" data-bs-target="#reports-submenu" aria-expanded="false" aria-controls="reports-submenu">
                            <i class="fas fa-chart-bar me-2"></i>Reports <i class="fas fa-chevron-down float-end"></i>
                        </button>
                        <div class="collapse" id="reports-submenu">
                            <ul class="nav flex-column submenu">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('reports.by_barangay') }}"><i class="fas fa-file-alt me-2"></i>Evacuees By Barangay</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('reports.evacuees_by_calamity') }}"><i class="fas fa-eye me-2"></i>Evacuees By Calamity</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-cog me-2"></i>Users</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <div class="container-fluid">
                <h1 class="h3 text-dark mb-4"><i class="fas fa-users me-2"></i>{{ isset($evacuee) ? 'Edit Evacuee' : 'Add New Evacuee' }}</h1>
                <a href="{{ url('evacuee_list') }}" class="btn btn-secondary btn-custom mb-3"><i class="fas fa-arrow-left me-1"></i>Back to List</a>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Form for Add/Edit -->
                <div class="form-container">
                    <form method="POST" class="row g-3" action="{{ isset($evacuee) ? route('evacuee.update', $evacuee->id) : route('evacuee.add') }}">
                        @csrf
                        @if(isset($evacuee)) @method('PUT') @endif
                        <div class="col-md-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter last name" required
                                   value="{{ isset($evacuee) ? $evacuee->last_name : old('last_name') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter first name" required
                                   value="{{ isset($evacuee) ? $evacuee->first_name : old('first_name') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="middle_name" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="Enter middle name"
                                   value="{{ isset($evacuee) ? $evacuee->middle_name : old('middle_name') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter contact" required
                                   value="{{ isset($evacuee) ? $evacuee->contact : old('contact') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Age" min="1" required
                                   value="{{ isset($evacuee) ? $evacuee->age : old('age') }}">
                        </div>
                        <div class="col-md-2">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ isset($evacuee) && $evacuee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ isset($evacuee) && $evacuee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="household_id" class="form-label"><i class="fas fa-home me-2"></i>Select Household</label>
                            <select class="form-select" id="household_id" name="household_id">
                                <option value="">-- None (Manual Entry) --</option>
                                @foreach($households as $household)
                                    <option value="{{ $household->id }}" 
                                        data-head="{{ $household->head_of_family }}" 
                                        data-barangay="{{ $household->barangay }}"
                                        {{ isset($evacuee) && $evacuee->household_id == $household->id ? 'selected' : '' }}>
                                        {{ $household->household_name }} - {{ $household->head_of_family }}
                                    </option>
                                @endforeach
                            </select>
                            <small class="text-muted">Selecting a household will auto-fill Head of Family and Barangay</small>
                        </div>
                        <div class="col-md-3">
                            <label for="barangay" class="form-label">Barangay</label>
                            <input type="text" class="form-control" id="barangay" name="barangay" placeholder="Auto-filled from household" 
                                   value="{{ isset($evacuee) ? $evacuee->barangay : old('barangay') }}">
                        </div>
                        <div class="col-md-5">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required
                                   value="{{ isset($evacuee) ? $evacuee->address : old('address') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="head_of_family" class="form-label"><i class="fas fa-user-circle me-1"></i>Head of Family</label>
                            <input type="text" class="form-control" id="head_of_family" name="head_of_family" placeholder="Auto-filled from household" 
                                   value="{{ isset($evacuee) ? $evacuee->head_of_family : old('head_of_family') }}">
                            <small class="text-muted">Auto-filled when you select a household</small>
                        </div>
                        <div class="col-md-4">
                            <label for="evac_center" class="form-label">Evacuation Center</label>
                            <input type="text" class="form-control" id="evac_center" name="evac_center" placeholder="Enter evacuation center" required
                                   value="{{ isset($evacuee) ? $evacuee->evac_center : old('evac_center') }}">
                        </div>
                        <div class="col-12 d-flex">
                            @if(isset($evacuee))
                                <button type="submit" class="btn btn-success btn-custom me-2"><i class="fas fa-save me-1"></i>Update</button>
                                <a href="{{ url('evacuee_list') }}" class="btn btn-secondary btn-custom"><i class="fas fa-times me-1"></i>Cancel</a>
                            @else
                                <button type="submit" class="btn btn-primary btn-custom me-2"><i class="fas fa-plus me-1"></i>Save</button>
                                <button type="reset" class="btn btn-outline-secondary btn-custom"><i class="fas fa-undo me-1"></i>Reset</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-fill Head of Family and Barangay when Household is selected
        document.getElementById('household_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const headOfFamily = selectedOption.getAttribute('data-head');
            const barangay = selectedOption.getAttribute('data-barangay');
            
            if (this.value) {
                document.getElementById('head_of_family').value = headOfFamily || '';
                document.getElementById('barangay').value = barangay || '';
            } else {
                document.getElementById('head_of_family').value = '';
                document.getElementById('barangay').value = '';
            }
        });
    </script>
@endsection