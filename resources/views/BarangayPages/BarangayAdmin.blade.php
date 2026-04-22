@extends('layouts.adminbarangay')

@section('title', 'Dashboard - Barangay Evacuation Management')

@section('topbar')
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name ?? 'Admin' }}</span>
                <img class="img-profile rounded-circle" src="https://ui-avatars.com/api/?name={{ Auth::user()->name ?? 'Admin' }}&background=4e73df&color=fff" style="width:35px;height:35px;">
            </a>
        </li>
    </ul>
@endsection

@section('content')
@php
use App\Models\Household;
use App\Models\Purok;
use App\Models\BarangayEvacuee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

$totalHouseholds = Household::count();
$totalPuroks = Purok::count();
$totalEvacuees = BarangayEvacuee::count();
$highRiskCount = Household::where('priority_status','High')->count();

$purokDistributionQuery = Purok::select(
        DB::raw('CONCAT("Purok ", puroks.purok_name) as purok_name'),
        DB::raw('count(*) as household_count')
    )
    ->leftJoin('households','households.purok','=','puroks.purok_name')
    ->groupBy('puroks.purok_name')
    ->pluck('household_count','purok_name');
$purokDistribution = [
    'labels' => $purokDistributionQuery->keys(),
    'data' => $purokDistributionQuery->values(),
];

$potentialEvacueesList = Household::whereIn('priority_status', ['High','Moderate'])
    ->orderByRaw("FIELD(priority_status,'High','Moderate')")
    ->limit(10)
    ->get(['id','household_name','purok','priority_status']);

$recentHouseholds = Household::latest()->limit(10)->get();
@endphp

<style>
 .container-fluid { padding: 10px 30px !important; margin-top: 0 !important;  
}
:root {
    --primary: #2563eb;
    --success: #059669;
    --warning: #d97706;
    --danger: #dc2626;
    --gray-50: #f9fafb;
    --gray-100: #f3f4f6;
    --gray-200: #e5e7eb;
    --gray-800: #1f2937;
    --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
    --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
    --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
}

/* Clean Professional Design */
body {
    background: linear-gradient(to bottom, #f8fafc 0%, #e2e8f0 100%);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

.card {
    border: none;
    border-radius: 16px;
    box-shadow: var(--shadow-lg);
    transition: all 0.2s ease;
    background: white;
}

.card:hover {
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04);
    transform: translateY(-2px);
}

/* KPI Cards - Clean Design */
.stats-card {
    height: 230px;
}

/* Icon + Number ON TOP, Label BELOW */
.kpi-item {
    height: 140px;
    padding: 24px 20px;
    border-radius: 16px;
    border: 1px solid #e5e7eb;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: all 0.2s ease;
}

.kpi-item:hover {
    border-color: #3b82f6;
    background: #f8fafc;
    transform: translateY(-2px);
}

.kpi-top {
    flex-shrink: 0;
}

.kpi-icon {
    width: 50px;
    height: 50px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    margin-right: 16px;
    margin-left: -10px;
    flex-shrink: 0;
}

.kpi-number {
    font-size: 2.5rem;
    font-weight: 650;
    line-height: 1;
    margin-left: 15px;
}

.kpi-primary .kpi-icon { background: #dbeafe; color: #3b82f6; }
.kpi-success .kpi-icon { background: #d1fae5; color: #10b981; }
.kpi-warning .kpi-icon { background: #fef3c7; color: #f59e0b; }
.kpi-danger .kpi-icon { background: #fecaca; color: #ef4444; }

/* User Card - Matching Height */
.user-card {
    height: 250px !important;
}

.user-card:hover .user-avatar {
    border-color: var(--primary);
    transform: scale(1.05);
}

/* Clean List Style - High Risk Households */
.high-risk-section {
    border-radius: 12px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    height: 900px !important;
}

.household-list-item {
    border-radius: 8px;
    padding: 8px 12px;
    margin-bottom: 4px;
    background: #ffffff;
    border: 1px solid #f1f5f9;
    transition: all 0.2s ease;
    cursor: default;
}

.household-list-item:hover {
    background: #f8fafc;
    border-color: #e2e8f0;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transform: translateY(-1px);
}

.household-avatar .avatar-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 2px solid #f1f5f9;
    background: #f8fafc;
    transition: all 0.2s ease;
}

.household-list-item:hover .avatar-circle {
    border-color: #4f46e5;
    background: #eff6ff;
}

.household-name {
    font-size: 0.9rem;
    font-weight: 600 !important;
    color: #1e293b !important;
    line-height: 1.3;
    margin-bottom: 1px !important;
}

.household-purok {
    font-size: 0.75rem !important;
    color: #64748b !important;
    margin-top: -1px !important;
}

.priority-badge {
    font-size: 0.7rem !important;
    padding: 4px 8px !important;
    border-radius: 12px;
    font-weight: 600;
    line-height: 1.2;
}

/* Dropdown styling */
.dropdown-menu {
    border: 1px solid #e2e8f0 !important;
    border-radius: 8px !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1) !important;
    margin-top: 4px;
}

.dropdown-item {
    font-size: 0.85rem;
    padding: 6px 12px !important;
    border-radius: 6px;
    transition: background 0.2s ease;
}

.dropdown-item:hover {
    background: #f1f5f9 !important;
    color: #1e293b !important;
}

/* Remove dropdown caret */
.dropdown-toggle::after,
.dropdown-toggle-no-caret::after {
    display: none !important;
}

.dropdown-toggle {
    padding: 4px 6px !important;
    line-height: 1 !important;
}

.dropdown-toggle:hover {
    background: #f1f5f9 !important;
    border-radius: 4px;
}

/* Responsive */
@media (max-width: 768px) {
    .household-list-item {
        padding: 10px;
    }
    
    .household-avatar .avatar-circle {
        width: 36px;
        height: 36px;
    }
    
    .household-name {
        font-size: 0.85rem;
    }
}

/* Purok Cards - Fixed Filtering */
.purok-filter {
    height: 50px;  /* Shorter buttons */
    padding: 12px 8px;
    border-radius: 12px;
    border: 2px solid var(--gray-200);
    background: white;
    cursor: pointer;
    transition: all 0.2s ease;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-weight: 600;
}

.purok-filter:hover {
    border-color: var(--primary);
    background: #eff6ff;
}

.purok-filter.active {
    border-color: var(--primary);
    background: var(--primary);
    color: white;
}

/* Enhanced Table Styling */
.table-container {
    max-height: 420px;
    overflow-y: auto;
    margin: 0 !important;        /* Remove all margins */
    padding-top: 5px !important; /* Only top padding */
    padding-left: 10px !important;
    padding-right: 0px !important;
    padding-bottom: 0 !important;
}
.table {
    margin: ;
    font-size: 0.9rem;
}

.table thead th {
    background: #f8fafc;
    border: none;
    font-weight: 600;
    color: #374151;
    position: sticky;
    top: 0;
    z-index: 10;
    border-bottom: 2px solid #e5e7eb;
    padding: 12px 8px;
    font-size: 0.85rem;
    white-space: nowrap;
}

.table thead th:first-child { border-top-left-radius: 8px; }
.table thead th:last-child { border-top-right-radius: 8px; }

.table tbody td {
    border-color: #f1f5f9;
    vertical-align: middle;
    padding: 12px 8px;
    border-bottom: 1px solid #f1f5f9;
}

.table tbody tr {
    transition: background-color 0.2s ease;
}

.table tbody tr:hover {
    background-color: #f8fafc;
}

.table tbody tr:last-child td {
    border-bottom: none;
}

/* Badge improvements */
.fs-sm { font-size: 0.7rem !important; }
.fs-xs { font-size: 0.65rem !important; }

.badge {
    padding: 4px 8px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.75rem;
    line-height: 1.3;
}

/* Responsive table */
@media (max-width: 768px) {
    .table thead th,
    .table tbody td {
        padding: 8px 6px;
        font-size: 0.8rem;
    }
    
    .table-container {
        font-size: 0.85rem;
    }
}

/* Chart */
#demographicChart {
    max-height: 240px !important;
}

/* Utilities */
.mb-4 { margin-bottom: 1.5rem !important; }
.text-primary { color: var(--primary) !important; }
.font-weight-bold { font-weight: 700 !important; }

/* Card Style */
.custom-card-style {
    background-color: #acd5ef; /* Light blue-green background for the card */
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
    border: none;
    width: 340px; /* Adjust width as needed */
    height: 230px !important;  /* Adjust height as needed */
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden; /* Ensures rounded corners clip content */
    
}

.user-card .card-body {
    padding: 25px; /* Adjusted padding */
    display: flex;
    align-items: center;
    justify-content: space-between; /* Space out sections */
    width: 100%;
}

/* Greeting Section */
.greeting-section {
    text-align: left; /* Align text to the left */
    flex-basis: 50%; /* Take up half the width */
  
}

.greeting-section h6 {
    color: #6c7a89; /* Muted text color */
    font-size: 14px;
    margin-bottom: 10px; /* Reduced margin */
     margin-left:-30px;
}

.greeting-section h5 {
    font-size: 24px; /* Larger name font */
    font-weight: 600;
    color: #2c3e50; /* Darker text for name */
    margin-bottom: 5px;
     margin-left:-30px;
}

.custom-badge-style {
    background-color: #4ec0b7; /* Teal color for badge */
    color: white;
    font-size: 12px;
    padding: 8px 15px;
    border-radius: 20px; /* Rounded badge */
    font-weight: 500;
     margin-left:-30px;
}

/* Patient Count Section */
.patient-count-section {
    text-align: center;
    flex-basis: 50%; /* Take up the other half */
    position: relative; /* For positioning the legend */
     margin-left:40px;
}

.circular-progress-container {
    position: relative;
    width: 150px; /* Size of the circle */
    height: 150px;
    margin: 0 auto; /* Center the container */
}

.circular-progress {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background: conic-gradient(
        #4ec0b7 var(--progress, 0.75) , /* Teal color for progress */
        #e0e0e0 var(--progress, 0.75) /* Light gray for the rest */
    );
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.1); /* Inner shadow for depth */
}

.circular-progress::before {
    content: "";
    position: absolute;
    top: 15px; /* Adjust to create the inner circle gap */
    left: 15px;
    right: 15px;
    bottom: 15px;
    background-color: #eaf2f7; /* Match card background */
    border-radius: 50%;
}

.progress-value {
    position: relative; /* To be above the ::before pseudo-element */
    z-index: 1;
}

.progress-value .h3 {
    font-size: 36px; /* Large font for the number */
    font-weight: bold;
    color: #2c3e50; /* Dark text color */
    margin-bottom: 0;
    line-height: 1;
}

.progress-value small {
    font-size: 14px;
    color: #6c7a89; /* Muted text color for label */
    display: block; /* Ensure it's on a new line */
}

/* Legend for Male/Female */
.legend {
    position: absolute;
    bottom: -25px; /* Position below the circle */
    left: 50%;
    transform: translateX(-50%);
    font-size: 12px;
    color: #6c7a89;
    display: flex;
    align-items: center;
    gap: 15px; /* Space between indicators */
}

.male-indicator, .female-indicator {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 5px;
}

.male-indicator {
    background-color: #4ec0b7; /* Teal for male */
}

.female-indicator {
    background-color: #bdc3c7; /* Light gray for female */
}

/* Responsive adjustments if needed */
@media (max-width: 768px) {
    .custom-card-style {
        width: 320px;
        height: auto; /* Allow height to adjust */
        flex-direction: column; /* Stack elements vertically on smaller screens */
    }
    .user-card .card-body {
        flex-direction: column;
        justify-content: center;
    }
    .greeting-section, .patient-count-section {
        flex-basis: 100%;
        margin-bottom: 20px;
    }
    .patient-count-section {
        margin-top: 20px;
    }
    .circular-progress-container {
        width: 120px;
        height: 120px;
    }
    .legend {
        bottom: -35px;
    }
}
@media (max-width: 768px) {
    .risk-item {
        padding: 12px;
    }
    
    .household-avatar img {
        width: 40px;
        height: 40px;
    }
}
.btn-smaller {
    padding: 6px 12px !important;     /* 👈 Smaller padding */
    font-size: 0.75rem !important;    /* 👈 Smaller text */
    line-height: 1.2 !important;
    height: 32px !important;          /* 👈 Fixed small height */
}

.btn-smaller i {
    font-size: 0.7rem !important;     /* 👈 Smaller icon */
    margin-right: 4px !important;
}
.dropdown-toggle::after {
    display: none !important;
}
</style>

<div class="container-fluid px-4 py-3">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="h3 mb-1 font-weight-bold text-gray-800">Evacuation Management Dashboard</h2>
            <p class="text-muted mb-0">Monitor households and coordinate responses</p>
        </div>
    </div>

    <!-- Row 1: Stats + User -->
    <div class="row mb-4">
        <!-- Stats Cards -->
        <div class="col-xl-8">
            <div class="card stats-card">
                <div class="card-header py-2">
                    <h6 class="m-0 font-weight-bold text-primary">Barangay Overview</h6>
                </div>
                 <!-- KPI SECTION - ICON LEFT, NUMBER RIGHT -->
                <div class="card-body p-4">
                    <div class="row g-3">
                        <div class="col-md-6 col-xl-3">
                            <div class="kpi-item kpi-primary">
                                <!-- Icon + Number TOGETHER -->
                                <div class="kpi-top d-flex align-items-center justify-content-center mb-4">
                                    <div class="kpi-icon mr-3">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="kpi-number text-primary">{{ $totalHouseholds }}</div>
                                </div>
                                <!-- Label BELOW -->
                                <div class="text-center">
                                    <div class="text-muted small font-weight-bold">Total Households</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="kpi-item kpi-success">
                                <div class="kpi-top d-flex align-items-center justify-content-center mb-4">
                                    <div class="kpi-icon mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div class="kpi-number text-success">{{ $totalPuroks }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-muted small font-weight-bold">Puroks</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="kpi-item kpi-warning">
                                <div class="kpi-top d-flex align-items-center justify-content-center mb-4">
                                    <div class="kpi-icon mr-3">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="kpi-number text-warning">{{ $totalEvacuees }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-muted small font-weight-bold">Evacuees</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-xl-3">
                            <div class="kpi-item kpi-danger">
                                <div class="kpi-top d-flex align-items-center justify-content-center mb-4">
                                    <div class="kpi-icon mr-3">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="kpi-number text-danger">{{ $highRiskCount }}</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-muted small font-weight-bold">High Risk</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- User Card -->
        <div class="col-xl-4">
            <div class="card user-card custom-card-style">
                <div class="card-body text-center p-5">
                    <div class="mb-4 greeting-section">
                        <h6 class="text-muted mb-3">Good Morning!</h6>
                        <h5 class="mb-2">{{ Auth::user()->name }}</h5>
                        <span class="badge custom-badge-style">{{ ucfirst(Auth::user()->role ?? 'Admin') }}</span>
                    </div>
                    <div class="patient-count-section">
                        <div class="circular-progress-container">
                            <div class="circular-progress" style="--progress: {{ $totalHouseholds / 1000 }};"> <!-- Assuming a max of 1000 for example, adjust as needed -->
                                <div class="progress-value">
                                    <div class="h3 font-weight-bold">{{ $totalHouseholds }}</div>
                                    <small class="text-muted">Households</small>
                                </div>
                            </div>
                        </div>
                        <div class="legend">
                            <span class="male-indicator"></span> Male
                            <span class="female-indicator"></span> Female
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Row 2: Chart + Table + High Risk -->
    <div class="row">
        <div class="col-lg-8">
            <!-- Chart -->
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">Households by Purok</h6>
                </div>
                <div class="card-body p-0">
                    <canvas id="demographicChart" class="p-4"></canvas>
                </div>
            </div>

            <!-- Purok Table -->
            <div class="card" style="height: 640px;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Resident Directory</h6>
                </div>
                <div class="card-body p-0">
                    <!-- Purok Filters -->
                    <div class="p-3 border-bottom" style="background: var(--gray-50);">
                        <div class="d-flex flex-nowrap overflow-auto mb-3" style="gap: 6px;">
                            @foreach($purokDistribution['labels'] as $index => $label)
                                <div class="purok-filter flex-fill px-3 py-2"
                                     style="min-width: 120px; max-width: 130px;"
                                     data-purok="{{ $label }}"
                                     onclick="filterByPurok('{{ $label }}', this)">
                                    <small class="d-block">{{ $label }}</small>
                                    <small class="font-weight-bold">{{ $purokDistribution['data'][$index] }}</small>
                                </div>
                            @endforeach
                        </div>
                        <div class="d-flex gap-2">
                            <!-- PERFECT SINGLE ROW ALIGNMENT -->
                            <button class="btn btn-outline-secondary btn-sm flex-fill d-inline-flex align-items-center justify-content-center px-3 py-1.5" onclick="resetFilter()">
                                <i class="fas fa-redo mr-2" style="font-size: 0.85rem;"></i>
                                <span style="font-size: 0.8rem;">All</span>
                            </button>
                            <input type="text" id="tableFilter" class="form-control form-control-sm flex-fill"
                                   placeholder="Search households...">
                        </div>
                    </div>

                   <!-- Table -->
                    <div class="table-container p-4" style="max-height: 400px;">
                        <table class="table table-hover mb-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 100px;">Date</th>
                                    <th style="width: 130px;">Household</th>
                                    <th style="width: 140px;">Address</th>
                                    <th style="width: 90px;">Purok</th>
                                    <th style="width: 100px;">Priority</th>
                                    <th style="width: 80px;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentHouseholds as $household)
                                    <tr data-purok="Purok {{ $household->purok }}"
                                        data-search="{{ strtolower($household->household_name . ' ' . ($household->address ?? '') . ' ' . $household->purok . ' ' . $household->priority_status . ' ' . $household->status) }}">
                                        <td>{{ $household->created_at->format('M d, Y') }}</td>
                                        <td class="fw-semibold">{{ Str::limit($household->household_name, 18) }}</td>
                                        <td class="text-muted small"> {{ $household->barangay_name ?? '' }} {{ $household->street_name ?? '' }} {{ $household->house_number ?? '' }}</td>
                                        <td>
                                            <span class="badge bg-info text-dark px-2 py-1 fs-sm fw-semibold">P{{ $household->purok }}</span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $household->priority_status == 'High' ? 'bg-danger' : 'bg-warning text-dark' }} px-2 py-1 fs-sm fw-semibold">
                                                {{ $household->priority_status }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge {{ $household->status == 'Active' ? 'bg-success' : ($household->status == 'Inactive' ? 'bg-secondary' : 'bg-info') }} px-2 py-1 fs-sm">
                                                {{ ucfirst($household->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- High Risk - Clean List Style -->
        <div class="col-lg-4">
            <div class="card high-risk-section" style="width: 340px;">
                <div class="card-header py-3 px-3" style="background: #f8fafc; border-bottom: 1px solid #e5e7eb;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="m-0 font-weight-bold text-gray-800 mb-0">
                            <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                            High Risk Households
                        </h6>
                        <span class="badge bg-warning text-dark px-3 py-1 fw-bold">{{ $highRiskCount }}</span>
                    </div>
                </div>
                <div class="card-body p-3" style="height: calc(100% - 70px); overflow-y: auto;">
                    @forelse($potentialEvacueesList as $item)
                        <div class="household-list-item py-2 px-0 mb-1" data-household-id="{{ $item->id }}">
                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Household Info - Left Side -->
                                <div class="d-flex align-items-center flex-grow-1">
                                    <div class="household-avatar me-2">
                                        <div class="avatar-circle bg-light border">
                                            <img src="https://ui-avatars.com/api/?name={{ $item->household_name }}&background=4f46e5&color=fff"
                                                class="rounded-circle" style="width: 36px; height: 36px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="household-info">
                                        <div class="household-name fw-semibold text-gray-800 mb-0">{{ Str::limit($item->household_name, 20) }}</div>
                                        <div class="household-purok text-muted fs-6 mt-npx1">Purok {{ $item->purok }}</div>
                                    </div>
                                </div>
                                
                                <!-- Priority & Actions - Right Side -->
                                <div class="d-flex align-items-center gap-2">
                                    <span class="priority-badge bg-warning text-dark px-2 py-px1 fs-sm fw-semibold">{{ $item->priority_status }}</span>
                                    <!-- Clean Dropdown -->
                                    <div class="dropdown">
                                        <button class="btn p-1 dropdown-toggle" 
                                                type="button" 
                                                data-bs-toggle="dropdown" 
                                                aria-expanded="false">
                                            <i class="fas fa-ellipsis-v text-muted fs-6"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" style="min-width: 140px;">
                                            <li><a class="dropdown-item py-2 px-3" href="{{ route('households.show', $item->id) }}"><i class="fas fa-eye me-2 text-primary"></i>View</a></li>
                                            <li><a class="dropdown-item py-2 px-3" href="{{ route('households.edit', $item->id) }}"><i class="fas fa-edit me-2 text-warning"></i>Edit</a></li>
                                            <li><hr class="dropdown-divider mx-3 my-1"></li>
                                            <li><button class="dropdown-item py-2 px-3 text-danger w-100 text-start" onclick="confirmDelete({{ $item->id }}, '{{ $item->household_name }}')"><i class="fas fa-trash me-2"></i>Delete</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-4 text-muted">
                            <i class="fas fa-inbox fa-2x mb-2 opacity-50"></i>
                            <p class="mb-0 fs-6">No high risk households</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// ORIGINAL WORKING FILTERING - EXACT SAME AS BEFORE
const purokData = @json($purokDistribution);

new Chart(document.getElementById('demographicChart'), {
    type: 'bar',
    data: {
        labels: purokData.labels,
        datasets: [{
            data: purokData.data,
            backgroundColor: '#3b82f6',
            borderRadius: 8,
            barThickness: 24
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            x: { grid: { display: false } },
            y: { grid: { color: "#e5e7eb" } }
        }
    }
});

// FIXED PUROK FILTERING - SAME AS ORIGINAL
function filterByPurok(purokName, el) {
    document.querySelectorAll('.purok-filter').forEach(card => {
        card.classList.remove('active');
    });
    el.classList.add('active');

    const rows = document.querySelectorAll('#dataTable tbody tr');
    rows.forEach(row => {
        if (row.getAttribute('data-purok') === purokName) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

function resetFilter() {
    document.querySelectorAll('#dataTable tbody tr').forEach(row => {
               row.style.display = '';
    });

    document.querySelectorAll('.purok-filter').forEach(card => {
        card.classList.remove('active');
    });
}

// ORIGINAL SEARCH FILTER - SAME AS BEFORE
document.getElementById('tableFilter').addEventListener('keyup', function () {
    const value = this.value.toLowerCase();
    document.querySelectorAll('#dataTable tbody tr').forEach(row => {
        const text = row.getAttribute('data-search');
        if (text.includes(value)) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
});

// Delete confirmation function
function confirmDelete(householdId, householdName) {
    if (confirm(`Are you sure you want to delete "${householdName}"? This action cannot be undone.`)) {
        const form = document.getElementById(`delete-form-${householdId}`);
        if (form) {
            form.submit();
        }
    }
}
</script>
@endpush