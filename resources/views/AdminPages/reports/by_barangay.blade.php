@extends('layouts.superlayout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Reports by Barangay') }}
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
        .report-container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .summary-cards {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }
        .summary-card {
            flex: 1;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        .summary-card h4 {
            margin: 0;
            font-size: 2rem;
            color: #1976d2;
        }
        .summary-card p {
            margin: 5px 0 0;
            color: #666;
        }
        .chart-container {
            margin-bottom: 30px;
            height: 300px; /* Explicitly set the height */
            position: relative; /* Good practice for Chart.js responsiveness */
            width: 100%;
        }
        .table th {
            background-color: #f5f5f5;
            border-top: none;
            font-weight: 600;
            color: #1b1b18;
        }
        .table td {
            vertical-align: middle;
        }
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .btn-custom {
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: 500;
        }
        @media print {
            .sidebar, .action-buttons, .summary-cards {
                display: none;
            }
            .main-content {
                margin-left: 0;
            }
            .report-container {
                box-shadow: none;
                border: 1px solid #ddd;
            }
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
            .summary-cards {
                flex-direction: column;
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
                        <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
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
                        <a class="nav-link" href="{{ url('evacuation_center') }}"><i class="fas fa-building me-2"></i>Evacuation Center</a>
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
                        <a class="nav-link" href="{{ route('users.index') }}"><i class="fas fa-user-cog me-2"></i>Users</a>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link btn btn-link text-start p-0 w-100" data-bs-toggle="collapse" data-bs-target="#reports-submenu" aria-expanded="true" aria-controls="reports-submenu">
                            <i class="fas fa-chart-bar me-2"></i>Reports <i class="fas fa-chevron-down float-end"></i>
                        </button>
                        <div class="collapse show" id="reports-submenu">
                            <ul class="nav flex-column submenu">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('reports.by_barangay') }}"><i class="fas fa-file-alt me-2"></i>Evacuees By Barangay</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('reports.evacuees_by_calamity') }}"><i class="fas fa-eye me-2"></i>Evacuees By Calamity</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content flex-grow-1">
            <div class="container-fluid">
                <h1 class="h3 text-dark mb-4"><i class="fas fa-chart-bar me-2"></i>Reports by Barangay</h1>

                <!-- Summary Cards -->
                <div class="summary-cards">
                    <div class="summary-card">
                        <h4>{{ $totalReports ?? 0 }}</h4>
                        <p>Total Reports</p>
                    </div>
                    <div class="summary-card">
                        <h4>{{ count($data) }}</h4>
                        <p>Barangays Reported</p>
                    </div>
                    <div class="summary-card">
                        <h4>{{ $highestBarangay ?? 'N/A' }}</h4>
                        <p>Highest Reported Barangay</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn btn-primary btn-custom" onclick="window.print()"><i class="fas fa-print me-1"></i>Print Report</button>
                    <a href="{{ route('reports.export_pdf', ['type' => 'barangay']) }}" class="btn btn-success btn-custom"><i class="fas fa-file-pdf me-1"></i>Export PDF</a>
                    <a href="{{ route('reports.export_csv', ['type' => 'barangay']) }}" class="btn btn-info btn-custom"><i class="fas fa-file-csv me-1"></i>Export CSV</a>
                    <a href="{{ route('reports.compile_folder', ['type' => 'barangay']) }}" class="btn btn-warning btn-custom"><i class="fas fa-folder me-1"></i>Compile Folder (ZIP)</a>
                </div>

                <!-- Chart and Table Container -->
                <div class="report-container">
                    <div class="chart-container">
                        <canvas id="barangayChart" width="400" height="200"></canvas>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-map-marker-alt me-1"></i>Barangay</th>
                                    <th><i class="fas fa-chart-line me-1"></i>Reports</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $row)
                                <tr>
                                    <td>{{ $row->barangay->name }}</td>
                                    <td>{{ $row->report_count }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Chart.js for the chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('barangayChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($labels),
                datasets: [{
                    label: 'Reports',
                    data: @json($counts),
                    backgroundColor: 'rgba(54, 162, 235, 0.7)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    </script>
@endsection