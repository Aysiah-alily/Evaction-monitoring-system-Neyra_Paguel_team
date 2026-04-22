@extends('layouts.adminbarangay')

@section('title', 'Inventory Management')

@section('content')
<style>
/* ✅ IDENTICAL DASHBOARD STYLES */
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
    --shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1);
}

.main-content {
    padding: 2rem;
    background: var(--gray-50);
    min-height: 100vh;
    margin-top: 1rem;
    padding: 0 0 2rem 2rem !important;
    margin: 0 !important;
}

/* ✅ DASHBOARD ELEMENTS - IDENTICAL */
.dashboard-header, .stats-grid, .stat-card, .nav-pills-modern {
    /* Same exact styles as dashboard */
}

.dashboard-header {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 1.75rem 1.5rem;
    box-shadow: var(--shadow);
    transition: all 0.3s ease;
    border-top: 4px solid var(--success);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    height: 120px;
}

.stat-card:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1); }
.stat-content { display: flex; align-items: center; justify-content: center; gap: 1rem; margin-bottom: 0.75rem; }
.stat-icon { width: 52px; height: 52px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
.stat-number { font-size: 2.25rem; font-weight: 800; color: var(--gray-800); line-height: 1; }
.stat-label { font-size: 0.85rem; color: var(--gray-600); text-transform: uppercase; letter-spacing: 0.08em; font-weight: 600; }

.stat-success { background: linear-gradient(135deg, var(--success), #059669); color: white; }
.stat-warning { background: linear-gradient(135deg, var(--warning), #d97706); color: white; }
.stat-danger { background: linear-gradient(135deg, var(--danger), #dc2626); color: white; }

.nav-pills-modern {
    background: white;
    border-radius: 16px;
    padding: 8px;
    box-shadow: var(--shadow);
    margin-bottom: 2rem;
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.nav-pills-modern .nav-link {
    padding: 12px 24px;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    color: var(--gray-600);
}

.nav-pills-modern .nav-link:hover { color: var(--primary); background: var(--gray-50); transform: translateY(-2px); }
.nav-pills-modern .nav-link.active { background: var(--primary); color: white; box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3); }

/* ✅ INVENTORY SECTIONS */
.inventory-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
    gap: 2rem;
    margin-bottom: 2rem;
}

.inventory-card {
    background: white;
    border-radius: 16px;
    box-shadow: var(--shadow);
    overflow: hidden;
}

.inventory-header {
    background: linear-gradient(135deg, var(--success), #059669);
    color: white;
    padding: 1.5rem 2rem;
}

.add-supply-form {
    padding: 2rem;
    background: var(--gray-50);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr auto 120px;
    gap: 1rem;
    align-items: end;
}

.form-control-inv {
    border: 2px solid var(--gray-200);
    border-radius: 12px;
    padding: 14px 16px;
    transition: all 0.3s ease;
}

.form-control-inv:focus {
    border-color: var(--success);
    box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
}

.add-supply-btn {
    background: var(--primary);
    border: none;
    color: white;
    padding: 14px 24px;
    border-radius: 12px;
    font-weight: 600;
    height: 56px;
}

.add-supply-btn:hover {
    background: var(--primary-dark);
    transform: translateY(-2px);
}

/* ✅ INVENTORY TABLE */
.inventory-table-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow);
}

.table-modern th {
    background: var(--gray-50);
    font-weight: 700;
    color: var(--gray-800);
    padding: 1.25rem 1rem;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.table-modern td {
    padding: 1.25rem 1rem;
    vertical-align: middle;
}

/* ✅ STOCK STATUS BADGES */
.stock-badge {
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    border: 2px solid;
}

.stock-good { background: rgba(16, 185, 129, 0.1); color: var(--success); border-color: rgba(16, 185, 129, 0.3); }
.stock-low { background: rgba(245, 158, 11, 0.1); color: var(--warning); border-color: rgba(245, 158, 11, 0.3); }
.stock-critical { background: rgba(239, 68, 68, 0.1); color: var(--danger); border-color: rgba(239, 68, 68, 0.3); }

/* ✅ QUANTITY CONTROLS */
.qty-controls {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.qty-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    border: none;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.qty-plus { background: var(--success); color: white; }
.qty-minus { background: var(--danger); color: white; }
.qty-btn:hover { transform: scale(1.1); box-shadow: 0 4px 12px rgba(0,0,0,0.2); }

/* Responsive */
@media (max-width: 768px) {
    .form-row { grid-template-columns: 1fr; gap: 1rem; }
    .inventory-grid { grid-template-columns: 1fr; }
}
</style>

<div class="main-content">
    <!-- ✅ DASHBOARD HEADER -->
    <div class="dashboard-header">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <h1 class="h3 mb-1 fw-bold text-gray-800">
                    <i class="fas fa-boxes text-success me-2"></i>
                    Supplies & Inventory
                </h1>
                <p class="mb-0 text-muted">Real-time tracking of evacuation center resources</p>
            </div>
            <div class="d-flex gap-2">
                <span class="badge bg-success fs-6 px-3 py-2">Live Stock</span>
                <span class="badge bg-light text-dark fs-6 px-3 py-2">
                    <i class="fas fa-sync-alt me-1"></i>Auto Sync
                </span>
            </div>
        </div>
    </div>

    <div class="stats-grid">
    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-icon stat-success">
                <i class="fas fa-boxes"></i>
            </div>
            <h1 class="stat-number">{{ $supplies->count() ?? 0 }}</h1>
        </div>
        <p class="stat-label">Total Items</p>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-icon stat-success">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="stat-number">{{ $supplies->where('status', 'Good')->count() ?? 0 }}</h1>
        </div>
        <p class="stat-label">Good Stock</p>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-icon stat-warning">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h1 class="stat-number">{{ $supplies->where('status', 'Low')->count() ?? 0 }}</h1>
        </div>
        <p class="stat-label">Low Stock</p>
    </div>
    <div class="stat-card">
        <div class="stat-content">
            <div class="stat-icon stat-danger">
                <i class="fas fa-times-circle"></i>
            </div>
            <h1 class="stat-number">{{ $supplies->where('status', 'Critical')->count() ?? 0 }}</h1>
        </div>
        <p class="stat-label">Critical</p>
    </div>
</div>

    <!-- ✅ NAVIGATION -->
    <div class="nav-pills-modern">
        <a href="{{ route('evacuation.register') }}" class="nav-link"><i class="fas fa-user-plus me-2"></i>New Registration</a>
        <a href="{{ route('evacuation.list') }}" class="nav-link"><i class="fas fa-list me-2"></i>Evacuee List</a>
        <a href="{{ route('evacuation.potential') }}" class="nav-link"><i class="fas fa-users-cog me-2"></i>Potential</a>
        <a href="{{ route('evacuation.inventory') }}" class="nav-link active"><i class="fas fa-boxes me-2"></i>Inventory</a>
        <a href="{{ route('barangay.reports') }}" class="nav-link"><i class="fas fa-chart-bar me-2"></i>Reports</a>
    </div>

    <!-- ✅ INVENTORY SECTIONS -->
    <div class="inventory-grid">
        <!-- ADD SUPPLY FORM -->
        <div class="inventory-card">
            <div class="inventory-header">
                <h5 class="mb-0 fw-bold">
                    <i class="fas fa-plus-circle me-2"></i>Add New Supply
                </h5>
            </div>
            <div class="add-supply-form">
                <form action="{{ route('evacuation.inventory.store') }}" method="POST">
                    @csrf

                    <input type="text" name="item_name" placeholder="Item Name" required>

                    <input type="number" name="quantity" placeholder="Quantity" required>

                    <input type="text" name="unit" placeholder="Unit (e.g. pcs, boxes)">

                    <select name="status" required>
                        <option value="Good">Good</option>
                        <option value="Low">Low</option>
                        <option value="Critical">Critical</option>
                    </select>

                    <textarea name="notes" placeholder="Notes"></textarea>

                    <button type="submit">Add Inventory</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ✅ INVENTORY TABLE -->
    <div class="inventory-table-card">
        <div class="table-card-header d-flex justify-content-between align-items-center p-3">
            <h6 class="mb-0 fw-bold text-gray-800">
                <i class="fas fa-list me-2 text-success"></i>Current Inventory
            </h6>
            <button class="btn btn-outline-danger btn-sm" onclick="exportInventory()">
                <i class="fas fa-download me-1"></i>Export CSV
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-modern" id="inventoryTable">
                <thead>
                    <tr>
                        <th><i class="fas fa-box me-1"></i>Item</th>
                        <th><i class="fas fa-hashtag me-1"></i>Quantity</th>
                        <th><i class="fas fa-ruler me-1"></i>Unit</th>
                        <th><i class="fas fa-info-circle me-1"></i>Status</th>
                        <th><i class="fas fa-cogs me-1"></i>Actions</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    <!-- Dynamic -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ✅ TOASTS -->
<div class="toast-container position-fixed p-3" style="top: 1.5rem; right: 1.5rem; z-index: 1080;">
    <div id="successToast" class="toast shadow-lg border-0" role="alert">
        <div class="toast-header bg-success text-white">
            <i class="fas fa-check-circle me-2"></i>
            <strong class="me-auto">Success</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <span id="successMessage">Item added successfully!</span>
        </div>
    </div>
    <div id="errorToast" class="toast shadow-lg border-0" role="alert">
        <div class="toast-header bg-danger text-white">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong class="me-auto">Error</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <span id="errorMessage">An error occurred</span>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
let inventory = @json($supplies ?? []);

document.addEventListener('DOMContentLoaded', function() {
    renderInventoryTable();
    initAddForm();
});

// ✅ RENDER TABLE
function renderInventoryTable() {
    const tbody = document.getElementById('tableBody');
    tbody.innerHTML = inventory.map((item, index) => {
        const statusClass = item.status === 'Critical' ? 'stock-critical' : 
                           item.status === 'Low' ? 'stock-low' : 'stock-good';
        
        return `
            <tr>
                <td class="fw-bold">${item.item_name || item.item}</td>
                <td>
                    <div class="d-flex align-items-center">
                        <strong class="fs-5 me-3">${item.quantity}</strong>
                        <div class="qty-controls">
                            <button class="qty-btn qty-minus" onclick="updateQuantity(${index}, -1)" title="Remove 1">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button class="qty-btn qty-plus" onclick="updateQuantity(${index}, 1)" title="Add 1">
                                <i class="fas fa-plus"></i>
                                                        </button>
                        </div>
                    </div>
                </td>
                <td><span class="badge bg-info">${item.unit || 'pcs'}</span></td>
                <td><span class="stock-badge ${statusClass}">${item.status}</span></td>
                <td>
                    <button class="btn btn-outline-danger btn-sm" onclick="deleteItem(${index})" title="Delete">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>
            </tr>
        `;
    }).join('') || `
        <tr class="text-center">
            <td colspan="5" class="py-5">
                <i class="fas fa-box-open fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No inventory items</h5>
                <p class="text-muted">Add your first supply item above</p>
            </td>
        </tr>
    `;
}

// ✅ ADD FORM
function initAddForm() {
    document.getElementById('addSupplyForm').addEventListener('submit', function(e) {
        e.preventDefault();
        addSupplyItem();
    });
}

function addSupplyItem() {
    const itemName = document.getElementById('invItem').value.trim();
    const qty = parseInt(document.getElementById('invQty').value);
    const unit = document.getElementById('invUnit').value.trim() || 'pcs';
    
    if (!itemName || !qty || qty < 0) {
        showToast('errorToast', 'Please enter valid item name and quantity');
        return;
    }
    
    // Optimistic UI update
    const newItem = {
        id: Date.now(),
        item_name: itemName,
        quantity: qty,
        unit: unit,
        status: qty <= 5 ? 'Critical' : qty <= 20 ? 'Low' : 'Good'
    };
    
    inventory.unshift(newItem);
    renderInventoryTable();
    document.getElementById('addSupplyForm').reset();
    
    // Save to backend
    fetch('{{ route("evacuation.inventory.store") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(newItem)
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            showToast('successToast', `Added ${qty} ${unit} of ${itemName}`);
            // Update with real ID
            inventory[0].id = data.id;
        } else {
            // Revert on error
            inventory.shift();
            renderInventoryTable();
            showToast('errorToast', data.message || 'Failed to save');
        }
    })
    .catch(() => {
        inventory.shift();
        renderInventoryTable();
        showToast('errorToast', 'Network error');
    });
}

// ✅ UPDATE QUANTITY
function updateQuantity(index, change) {
    inventory[index].quantity += change;
    inventory[index].status = inventory[index].quantity <= 5 ? 'Critical' : 
                             inventory[index].quantity <= 20 ? 'Low' : 'Good';
    renderInventoryTable();
    
    // Save to backend
    fetch(`{{ route("evacuation.inventory.update", ":id") }}`.replace(':id', inventory[index].id), {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ quantity: inventory[index].quantity })
    }).catch(console.error);
}

// ✅ DELETE ITEM
function deleteItem(index) {
    if (!confirm('Delete this inventory item?')) return;
    
    const item = inventory[index];
    inventory.splice(index, 1);
    renderInventoryTable();
    
    fetch(`{{ route("evacuation.inventory.destroy", ":id") }}`.replace(':id', item.id), {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(res => res.json())
    .then(data => data.success ? showToast('successToast', 'Item deleted') : showToast('errorToast', 'Delete failed'))
    .catch(() => showToast('errorToast', 'Delete failed'));
}

// ✅ EXPORT CSV
function exportInventory() {
    const csv = [
        ['Item', 'Quantity', 'Unit', 'Status'],
        ...inventory.map(item => [item.item_name, item.quantity, item.unit, item.status])
    ].map(row => row.map(cell => `"${cell}"`).join(',')).join('\n');
    
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = `inventory_${new Date().toISOString().split('T')[0]}.csv`;
    a.click();
    URL.revokeObjectURL(url);
}

// ✅ TOASTS
function showToast(toastId, message) {
    const toastEl = document.getElementById(toastId);
    if (message) document.getElementById(toastId === 'successToast' ? 'successMessage' : 'errorMessage').textContent = message;
    new bootstrap.Toast(toastEl).show();
}

// ✅ KEYBOARD SHORTCUTS
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'Enter') {
        addSupplyItem();
    }
});
</script>
@endpush