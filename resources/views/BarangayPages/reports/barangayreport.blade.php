@extends('layouts.adminbarangay')

@section('title', 'Evacuee Management')

@section('content')
<style>
    .main-content {
        margin-left: 10px;
        margin-top: 0%;
        padding: 20px;
    }
    .card {
        border: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }
    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 12px;
        color: #1b1b18;
    }
    .table td {
        vertical-align: middle;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
    }
    .priority-badge {
        font-size: 0.75rem;
        padding: 0.35rem 0.65rem;
    }
    .high-priority {
        background-color: #dc3545;
    }
    .moderate-priority {
        background-color: #ffc107;
        color: #000;
    }
    .low-priority {
        background-color: #6c757d;
    }
    .toggle-buttons {
        display: flex;
        gap: 10px;
        margin-bottom: 20px;
    }
    .toggle-btn {
        flex: 1;
        padding: 12px 20px;
        border: 2px solid #0d6efd;
        background: white;
        color: #0d6efd;
        border-radius: 8px;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .toggle-btn.active {
        background: #0d6efd;
        color: white;
    }
    .toggle-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .table-responsive {
        max-height: 600px;
        overflow-y: auto;
    }
    .table thead th {
        position: sticky;
        top: 0;
        background-color: #f8f9fa;
        z-index: 10;
    }
    .badge {
        font-size: 0.75rem;
        padding: 0.35rem 0.65rem;
    }
    .table tbody tr:hover {
        background-color: #f8f9fa;
    }
    .clickable-card {
        animation: pulse 2s infinite;
    }
    @keyframes pulse {
        0% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.4); }
        70% { box-shadow: 0 0 0 10px rgba(40, 167, 69, 0); }
        100% { box-shadow: 0 0 0 0 rgba(40, 167, 69, 0); }
    }
</style>

<div class="main-content flex-grow-1">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Evacuee Management</h1>
        <div class="d-flex gap-2">
            <button class="btn btn-outline-secondary" onclick="window.print()">
                <i class="fas fa-print me-1"></i> Print
            </button>
            <button class="btn btn-outline-success" onclick="exportToExcel()">
                <i class="fas fa-file-excel me-1"></i> Export Excel
            </button>
            <button class="btn btn-outline-primary" onclick="exportToCSV()">
                <i class="fas fa-file-csv me-1"></i> Export CSV
            </button>
            <a href="{{ route('reports.export_pdf', ['type' => 'barangay']) }}" class="btn btn-outline-danger">
                <i class="fas fa-file-pdf me-1"></i> Export PDF
            </a>
            <a href="{{ route('reports.compile_folder', ['type' => 'barangay']) }}" class="btn btn-outline-warning">
                <i class="fas fa-folder me-1"></i> Compile Folder
            </a>
        </div>
    </div>

    <!-- Toggle Buttons -->
    <div class="toggle-buttons">
        <button class="toggle-btn active" id="evacueeListBtn" onclick="switchView('evacuees')">
            <i class="fas fa-users me-2"></i> List of Evacuees
        </button>
        <button class="toggle-btn" id="potentialEvacueesBtn" onclick="switchView('potential')">
            <i class="fas fa-user-plus me-2"></i> Potential Evacuees
        </button>
    </div>

    <!-- Search -->
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="Search evacuees..." id="searchInput" onkeyup="filterTable()">
    </div>

    <!-- Data Table -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary" id="tableTitle">Current Evacuees</h6>
            <span class="badge bg-primary" id="totalCount">0</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="evacueeTable" width="100%" cellspacing="0">
                    <thead id="tableHead">
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Purok</th>
                            <th>Medical</th>
                            <th>Bed</th>
                            <th>Family</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- Data will be inserted here by JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div class="toast-container" style="position: fixed; top: 20px; right: 20px; z-index: 1050;">
    <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-check-circle me-2"></i> <span id="successToastMessage">Operation successful.</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div id="errorToast" class="toast align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                <i class="fas fa-exclamation-circle me-2"></i> <span id="errorToastMessage">An error occurred.</span>
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<!-- View Evacuee Modal -->
<div class="modal fade" id="viewEvacueeModal" tabindex="-1" aria-labelledby="viewEvacueeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewEvacueeModalLabel">
                    <i class="fas fa-user-circle me-2"></i> Evacuee Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewEvacueeModalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- View Potential Evacuee Modal -->
<div class="modal fade" id="viewPotentialModal" tabindex="-1" aria-labelledby="viewPotentialModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPotentialModalLabel">
                    <i class="fas fa-home me-2"></i> Household Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="viewPotentialModalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    // --- DATA FROM DATABASE ---
    let evacuees = @json($evacuees ?? []);
    let potentialEvacuees = @json($potentialEvacuees ?? []);
    let currentView = 'evacuees';

    // --- SWITCH VIEW ---
    function switchView(view) {
        currentView = view;
        
        // Update toggle buttons
        document.getElementById('evacueeListBtn').classList.toggle('active', view === 'evacuees');
        document.getElementById('potentialEvacueesBtn').classList.toggle('active', view === 'potential');
        
        // Update table title
        document.getElementById('tableTitle').innerText = view === 'evacuees' ? 'Current Evacuees' : 'Potential Evacuees';
        
        // Update table headers
        updateTableHeaders(view);
        
        // Render table
        renderTable();
    }

    // --- UPDATE TABLE HEADERS ---
    function updateTableHeaders(view) {
        const thead = document.getElementById('tableHead');
        
        if (view === 'evacuees') {
            thead.innerHTML = `
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Purok</th>
                    <th>Medical</th>
                    <th>Bed</th>
                    <th>Family</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            `;
        } else {
            thead.innerHTML = `
                <tr>
                    <th>Household Head</th>
                    <th>Purok</th>
                    <th>Address</th>
                    <th>Priority</th>
                    <th>Family Size</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            `;
        }
    }

    // --- RENDER TABLE ---
    function renderTable() {
        const tbody = document.getElementById('tableBody');
        const totalCount = document.getElementById('totalCount');
        tbody.innerHTML = '';

        const data = currentView === 'evacuees' ? evacuees : potentialEvacuees;

        if (data.length === 0) {
            const colspan = currentView === 'evacuees' ? '9' : '7';
            tbody.innerHTML = `<tr><td colspan="${colspan}" class="text-center py-4"><i class="fas fa-inbox fa-3x text-muted mb-3"></i><br>No records found.</td></tr>`;
            totalCount.innerText = '0';
            return;
        }

        totalCount.innerText = data.length;

        if (currentView === 'evacuees') {
            // Render evacuees table
            data.forEach((person, index) => {
                let badgeClass = person.medical_condition === 'None' ? 'bg-secondary' : 'bg-danger';
                let statusBadge = person.status === 'Registered' ? 'bg-success' : (person.status === 'Evacuated' ? 'bg-primary' : 'bg-warning');

                // Build family member list string
                let familyList = '-';
                if (person.family_members && Array.isArray(person.family_members) && person.family_members.length > 0) {
                    familyList = person.family_members.map(m => m.name || 'Unknown').join(', ');
                    if (familyList.length > 30) {
                        familyList = familyList.substring(0, 30) + '...';
                    }
                }
                
                tbody.innerHTML += `
                    <tr>
                        <td><strong>${person.name || 'N/A'}</strong></td>
                        <td>${person.age || 'N/A'}</td>
                        <td>${person.gender || 'N/A'}</td>
                        <td><span class="badge bg-light text-dark">${person.purok || 'N/A'}</span></td>
                        <td><span class="badge ${badgeClass}">${person.medical_condition || 'None'}</span></td>
                        <td><span class="badge bg-info">${person.center_assignment || 'N/A'}</span></td>
                        <td>${familyList}</td>
                        <td><span class="badge ${statusBadge}">${person.status || 'Registered'}</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary me-1" onclick="viewEvacuee(${person.id})" title="View Details">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="removeEvacuee(${person.id})" title="Remove">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </td>
                    </tr>
                `;
            });
        } else {
            // Render potential evacuees table
            data.forEach((household, index) => {
                let priorityClass = 'bg-secondary';
                let priorityText = 'Pending';
                
                if (household.priority_status === 'High') {
                    priorityClass = 'bg-danger';
                    priorityText = 'High Priority';
                } else if (household.priority_status === 'Moderate') {
                    priorityClass = 'bg-warning';
                    priorityText = 'Moderate Priority';
                } else if (household.priority_status === 'Low') {
                    priorityClass = 'bg-secondary';
                    priorityText = 'Low Priority';
                }

                // Get full name from model accessor
                const fullName = household.full_name || 'N/A';

                // Get full address from model accessor
                const fullAddress = household.full_address || 'N/A';

                // Get family size
                const familySize = household.family_members ? household.family_members.length : 0;

                tbody.innerHTML += `
                    <tr>
                        <td>${fullName}</td>
                        <td><span class="badge bg-light text-dark">${household.purok || 'N/A'}</span></td>
                        <td>${fullAddress}</td>
                        <td><span class="badge priority-badge ${priorityClass}">${priorityText}</span></td>
                        <td>${familySize} members</td>
                        <td><span class="badge ${priorityClass}">${household.priority_status || 'Pending'}</span></td>
                        <td>
                            <button class="btn btn-sm btn-primary me-1" onclick="viewPotentialEvacuee(${index})" title="View Details">
                                <i class="fas fa-eye"></i> View
                            </button>
                            <button class="btn btn-sm btn-success me-1" onclick="registerPotentialEvacuee(${household.id})" title="Register">
                                <i class="fas fa-check"></i> Register
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="removePotentialEvacuee(${household.id})" title="Remove">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `;
            });
        }
    }

    // --- VIEW EVACUEE ---
    function viewEvacuee(id) {
        const data = currentView === 'evacuees' ? evacuees : potentialEvacuees;
        const evacuee = data.find(e => e.id === id);
        
        if (!evacuee) {
            showErrorToast('Evacuee not found!');
            return;
        }

        // Build family members HTML
        let familyMembersHTML = '<p class="text-muted">No family members registered.</p>';
        if (evacuee.family_members && Array.isArray(evacuee.family_members) && evacuee.family_members.length > 0) {
            familyMembersHTML = evacuee.family_members.map((member, index) => `
                <div class="family-member-card" style="background: #f8f9fa; border-left: 3px solid #0d6efd; padding: 10px; margin-bottom: 10px; border-radius: 4px;">
                    <h6 class="mb-2"><i class="fas fa-user me-2"></i> ${member.name || 'Unknown'}</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Relationship:</span> <span class="info-value" style="color: #333;">${member.relationship || 'N/A'}</span></p>
                            <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Age:</span> <span class="info-value" style="color: #333;">${member.age || 'N/A'}</span></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Medical Condition:</span> <span class="info-value" style="color: #333;">${member.medical_condition || 'None'}</span></p>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Build modal content
        const modalBody = document.getElementById('viewEvacueeModalBody');
        modalBody.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3"><i class="fas fa-user me-2"></i> Head of Family</h5>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Name:</span> <span class="info-value" style="color: #333;">${evacuee.name || 'N/A'}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Age:</span> <span class="info-value" style="color: #333;">${evacuee.age || 'N/A'}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Gender:</span> <span class="info-value" style="color: #333;">${evacuee.gender || 'N/A'}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Medical Condition:</span> <span class="info-value" style="color: #333;">${evacuee.medical_condition || 'None'}</span></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3"><i class="fas fa-bed me-2"></i> Center Information</h5>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Bed Assignment:</span> <span class="info-value" style="color: #333;">${evacuee.center_assignment || 'N/A'}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Purok:</span> <span class="info-value" style="color: #333;">${evacuee.purok || 'N/A'}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Status:</span> <span class="info-value: ${evacuee.status || 'Registered'}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Registered On:</span> <span class="info-value" style="color: #333;">${evacuee.created_at ? new Date(evacuee.created_at).toLocaleDateString() : 'N/A'}</span></p>
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="mb-3"><i class="fas fa-users me-2"></i> Family Members (${evacuee.family_members ? evacuee.family_members.length : 0})</h5>
            ${familyMembersHTML}
        `;

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('viewEvacueeModal'));
        modal.show();
    }

    // --- REMOVE EVACUEE (AJAX) ---
    function removeEvacuee(id) {
        if(!confirm('Are you sure you want to remove this evacuee? This action cannot be undone.')) {
            return;
        }

        const btn = event.target.closest('button');
        const originalContent = btn.innerHTML;
        
        // Show loading state
        btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Removing...';
        btn.disabled = true;

        fetch(`/evacuation/evacuee/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove from local array
                evacuees = evacuees.filter(e => e.id !== id);
                renderTable();
                
                // Show success toast
                const toast = document.getElementById('successToast');
                document.getElementById('successToastMessage').textContent = 'Evacuee removed successfully.';
                const toastEl = new bootstrap.Toast(toast);
                toastEl.show();
            } else {
                throw new Error(data.message || 'Failed to remove evacuee');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            
            // Show error toast
            document.getElementById('errorToastMessage').textContent = error.message;
            const toast = document.getElementById('errorToast');
            const toastEl = new bootstrap.Toast(toast);
            toastEl.show();
        })
        .finally(() => {
            // Restore button
            btn.innerHTML = originalContent;
            btn.disabled = false;
        });
    }

    // --- SEARCH FILTER ---
    function filterTable() {
        const input = document.getElementById("searchInput");
        const filter = input.value.toUpperCase();
        const table = document.getElementById("evacueeTable");
        const tr = table.getElementsByTagName("tr");

        for (let i = 1; i < tr.length; i++) {
            let td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                let txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // --- EXPORT TO EXCEL ---
    function exportToExcel() {
        const data = currentView === 'evacuees' ? evacuees : potentialEvacuees;
        
        if (data.length === 0) {
            showErrorToast('No data to export!');
            return;
        }

        // Create worksheet
        const ws = XLSX.utils.json_to_sheet(data);
        const wb = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(wb, ws, "Evacuees");

        // Generate filename
        const filename = `Evacuees_${currentView}_${new Date().toISOString().split('T')[0]}.xlsx`;

        // Save file
        XLSX.writeFile(wb, filename);
        
        showSuccessToast('Data exported to Excel successfully!');
    }

    // --- EXPORT TO CSV ---
    function exportToCSV() {
        const data = currentView === 'evacuees' ? evacuees : potentialEvacuees;
        
        if (data.length === 0) {
            showErrorToast('No data to export!');
            return;
        }

        // Convert to CSV
        const headers = Object.keys(data[0]);
        const csvRows = [
            headers.join(','),
            ...data.map(row => headers.map(fieldName => JSON.stringify(row[fieldName])).join(','))
        ];

        const csvContent = csvRows.join('\n');
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        const url = URL.createObjectURL(blob);
        const filename = `Evacuees_${currentView}_${new Date().toISOString().split('T')[0]}.csv`;
        
        link.setAttribute('href', url);
        link.setAttribute('download', filename);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);

        showSuccessToast('Data exported to CSV successfully!');
    }

    // --- SHOW SUCCESS TOAST ---
    function showSuccessToast(message) {
        const toast = document.getElementById('successToast');
        document.getElementById('successToastMessage').textContent = message;
        const toastEl = new bootstrap.Toast(toast);
        toastEl.show();
    }

    // --- SHOW ERROR TOAST ---
    function showErrorToast(message) {
        const toast = document.getElementById('errorToast');
        document.getElementById('errorToastMessage').textContent = message;
        const toastEl = new bootstrap.Toast(toast);
        toastEl.show();
    }

    // --- VIEW POTENTIAL EVACUEE ---
    function viewPotentialEvacuee(index) {
        const household = potentialEvacuees[index];
        
        if (!household) {
            showErrorToast('Household not found!');
            return;
        }

        // Get full name and address
        const fullName = household.full_name || 'N/A';
        const fullAddress = household.full_address || 'N/A';

        // Build family members HTML
        let familyMembersHTML = '<p class="text-muted">No family members registered.</p>';
        if (household.family_members && Array.isArray(household.family_members) && household.family_members.length > 0) {
            familyMembersHTML = household.family_members.map((member, idx) => `
                <div class="family-member-card" style="background: #f8f9fa; border-left: 3px solid #0d6efd; padding: 10px; margin-bottom: 10px; border-radius: 4px;">
                    <h6 class="mb-2"><i class="fas fa-user me-2"></i> ${member.name || 'Unknown'}</h6>
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Relationship:</span> <span class="info-value" style="color: #333;">${member.relationship || 'N/A'}</span></p>
                            <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Age:</span> <span class="info-value" style="color: #333;">${member.age || 'N/A'}</span></p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Medical Condition:</span> <span class="info-value" style="color: #333;">${member.medical_condition || 'None'}</span></p>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Build modal content
        const modalBody = document.getElementById('viewPotentialModalBody');
        modalBody.innerHTML = `
            <div class="row">
                <div class="col-md-6">
                    <h5 class="mb-3"><i class="fas fa-user me-2"></i> Household Head</h5>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Name:</span> <span class="info-value" style="color: #333;">${fullName}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Purok:</span> <span class="info-value" style="color: #333;">${household.purok || 'N/A'}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Address:</span> <span class="info-value" style="color: #333;">${fullAddress}</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Priority Status:</span> <span class="info-value" style="color: #333;">${household.priority_status || 'Pending'}</span></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3"><i class="fas fa-users me-2"></i> Household Information</h5>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Family Size:</span> <span class="info-value" style="color: #333;">${household.family_members ? household.family_members.length : 0} members</span></p>
                    </div>
                    <div class="mb-3">
                        <p class="mb-1"><span class="info-label" style="font-weight: 600; color: #555;">Registered On:</span> <span class="info-value" style="color: #333;">${household.created_at ? new Date(household.created_at).toLocaleDateString() : 'N/A'}</span></p>
                    </div>
                </div>
            </div>
            <hr>
            <h5 class="mb-3"><i class="fas fa-users me-2"></i> Family Members (${household.family_members ? household.family_members.length : 0})</h5>
            ${familyMembersHTML}
        `;

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('viewPotentialModal'));
        modal.show();
    }

    // --- REGISTER POTENTIAL EVACUEE (AJAX) ---
    function registerPotentialEvacuee(id) {
        const household = potentialEvacuees.find(h => h.id === id);
        
        if (!household) {
            showErrorToast('Household not found!');
            return;
        }

        if (!confirm(`Register ${household.household_name || 'Household'} as an evacuee?`)) {
            return;
        }

        // Show loading state
        const btn = event.target.closest('button');
        const originalContent = btn.innerHTML;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Registering...';
        btn.disabled = true;

        // Prepare data for registration
        const evacueeData = {
            name: household.household_name || 'Unknown',
            age: household.age || 0,
            gender: household.gender || 'Male',
            center_assignment: '',
            purok: household.purok || '',
            medical_condition: 'None',
            family_members: household.family_members || []
        };

        fetch('/evacuation/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(evacueeData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove from local array
                potentialEvacuees = potentialEvacuees.filter(h => h.id !== id);
                renderTable();
                
                // Show success toast
                showSuccessToast('Household registered as evacuee successfully!');
            } else {
                throw new Error(data.message || 'Failed to register evacuee');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorToast(error.message);
        })
        .finally(() => {
            // Restore button
            btn.innerHTML = originalContent;
            btn.disabled = false;
        });
    }

    // --- REMOVE POTENTIAL EVACUEE (AJAX) ---
    function removePotentialEvacuee(id) {
        const household = potentialEvacuees.find(h => h.id === id);
        
        if (!household) {
            showErrorToast('Household not found!');
            return;
        }

        if (!confirm(`Are you sure you want to remove ${household.household_name || 'Household'} from potential evacuees?`)) {
            return;
        }

        // Show loading state
        const btn = event.target.closest('button');
        const originalContent = btn.innerHTML;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Removing...';
        btn.disabled = true;

        fetch(`/evacuation/potential/${id}`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove from local array
                potentialEvacuees = potentialEvacuees.filter(h => h.id !== id);
                renderTable();
                
                // Show success toast
                showSuccessToast('Potential evacuee removed successfully!');
            } else {
                throw new Error(data.message || 'Failed to remove potential evacuee');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showErrorToast(error.message);
        })
        .finally(() => {
            // Restore button
            btn.innerHTML = originalContent;
            btn.disabled = false;
        });
    }

    // --- INITIALIZATION ---
    document.addEventListener('DOMContentLoaded', function() {
        updateTableHeaders('evacuees'); // Set initial headers
        renderTable();
    });
</script>
@endpush