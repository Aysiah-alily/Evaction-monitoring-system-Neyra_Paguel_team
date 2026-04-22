@extends('layouts.superlayout')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Evacuee List') }}
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
        .table-container {
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
        .table th {
            background-color: #f8f9fa;
            border-top: none;
            font-weight: 600;
            color: #1b1b18;
        }
        .table td {
            vertical-align: middle;
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .action-links .edit:hover {
            background-color: #d4edda;
            color: #155724;
        }
        .action-links .delete:hover {
            background-color: #f8d7da;
            color: #721c24;
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
                                    <a class="nav-link active" href="{{ route('evacuee.list') }}"><i class="fas fa-list me-2"></i>Manage Evacuees</a>
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
                <h1 class="h3 text-dark mb-4"><i class="fas fa-users me-2"></i>Evacuee List</h1>
                <a href="{{ route('evacuee.add') }}" class="btn btn-primary btn-custom mb-3"><i class="fas fa-plus me-1"></i>Add New Evacuee</a>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Table for Existing Evacuees -->
                <div class="table-container">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag me-1"></i>ID</th>
                                    <th><i class="fas fa-user me-1"></i>Full Name</th>
                                    <th><i class="fas fa-phone me-1"></i>Contact</th>
                                    <th><i class="fas fa-birthday-cake me-1"></i>Age</th>
                                    <th><i class="fas fa-venus-mars me-1"></i>Gender</th>
                                    <th><i class="fas fa-map-marker-alt me-1"></i>Barangay</th>
                                    <th><i class="fas fa-home me-1"></i>Address</th>
                                    <th><i class="fas fa-user-tie me-1"></i>Head of Family</th>
                                    <th><i class="fas fa-building me-1"></i>Evac Center</th>
                                    <th><i class="fas fa-cogs me-1"></i>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($evacuees as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->last_name }}, {{ $row->first_name }} {{ $row->middle_name }}</td>
                                        <td>{{ $row->contact }}</td>
                                        <td>{{ $row->age }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>{{ $row->barangay }}</td>
                                        <td>{{ $row->address }}</td>
                                        <td>{{ $row->head_of_family }}</td>
                                        <td>{{ $row->evac_center }}</td>
                                        <td class="action-links">
                                            <a class="edit" href="{{ route('evacuee.edit', $row->id) }}"><i class="fas fa-edit me-1"></i>Edit</a>
                                            <form method="POST" action="{{ route('evacuee.destroy', $row->id) }}" style="display:inline;">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="delete" onclick="return confirm('Are you sure you want to delete this evacuee?')"><i class="fas fa-trash me-1"></i>Delete</button>
                                            </form>
                                        </td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection