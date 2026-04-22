@extends('layouts.superlayout')

@section('title', 'Evacuation Centers')

@section('content')
<style>
/* Evacuation Center - Perfect Match with Users Blade */
.evac-center-wrapper {
    width: 100%;
    overflow-x: hidden;
}

.evac-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    flex-wrap: wrap;
    gap: 1rem;
}

/* PROFESSIONAL STATS - Premium Design */
.evac-stats {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2.5rem;
}

.stat-card {
    background: white;
    padding: 1.75rem 2rem;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-lg);
    border: 1px solid var(--slate-100);
    display: flex;
    align-items: center;
    gap: 1.25rem;
    font-weight: 600;
    color: var(--slate-700);
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    height: 100px;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-2xl);
}

.stat-card:hover::before {
    opacity: 1;
}

.stat-available::before { background: linear-gradient(90deg, var(--success), #10b981); }
.stat-full::before { background: linear-gradient(90deg, var(--warning), #f59e0b); }
.stat-maintenance::before { background: linear-gradient(90deg, #8b5cf6, #a78bfa); }
.stat-total::before { background: linear-gradient(90deg, var(--primary), var(--primary-600)); }

.stat-icon {
    width: 3rem;
    height: 3rem;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.125rem;
    color: white;
    flex-shrink: 0;
    box-shadow: var(--shadow-md);
    position: relative;
    z-index: 2;
}

.stat-available .stat-icon { 
    background: linear-gradient(135deg, var(--success), #10b981);
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
}

.stat-full .stat-icon { 
    background: linear-gradient(135deg, var(--warning), #f59e0b);
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
}

.stat-maintenance .stat-icon { 
    background: linear-gradient(135deg, #8b5cf6, #a78bfa);
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
}

.stat-total .stat-icon { 
    background: linear-gradient(135deg, var(--primary), var(--primary-600));
    box-shadow: 0 4px 12px rgba(30, 64, 175, 0.3);
}

.stat-content {
    flex: 1;
    min-width: 0;
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: var(--slate-900);
    line-height: 1;
    margin-bottom: 0.25rem;
    font-feature-settings: 'tnum' 1;
}

.stat-label {
    font-size: 0.875rem;
    color: var(--slate-600);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.stat-subtext {
    font-size: 0.75rem;
    color: var(--slate-500);
    margin-top: 0.125rem;
}

/* Animation for numbers */
@keyframes countUp {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.stat-card.animate .stat-number {
    animation: countUp 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Responsive */
@media (max-width: 768px) {
    .evac-stats {
        grid-template-columns: 1fr;
        gap: 1rem;
    }
    
    .stat-card {
        padding: 1.5rem 1.25rem;
        height: auto;
    }
    
    .stat-number {
        font-size: 1.75rem;
    }
}

.evac-form-card, .evac-table-card {
    background: white;
    border-radius: var(--radius-2xl);
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    margin-bottom: 2rem;
}

.evac-form-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--slate-100);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.form-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
}

.evac-table-header {
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--slate-100);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
}

.evac-table {
    width: 100%;
    min-width: 900px;
    margin: 0;
    font-size: 0.9rem;
}

.evac-table thead th {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    color: var(--slate-800);
    font-weight: 700;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 1.25rem 1rem;
    border: none;
    border-bottom: 2px solid var(--slate-200);
    position: sticky;
    top: 0;
    z-index: 10;
    white-space: nowrap;
}

.evac-table tbody td {
    padding: 1.25rem 1rem;
    border-bottom: 1px solid var(--slate-100);
    vertical-align: middle;
    color: var(--slate-700);
}

.evac-table tbody tr:hover {
    background: var(--primary-50);
}

.action-buttons {
    display: flex;
    gap: 0.5rem;
}

.btn-table {
    padding: 0.5rem 1rem;
    border-radius: var(--radius-lg);
    font-size: 0.8rem;
    font-weight: 600;
    border: none;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    transition: var(--transition);
    text-decoration: none;
    white-space: nowrap;
}

.btn-edit {
    background: var(--warning);
    color: white;
}

.btn-edit:hover {
    background: #f59e0b;
    transform: translateY(-1px);
}

.btn-delete {
    background: var(--danger);
    color: white;
}

.btn-delete:hover {
    background: #dc2626;
    transform: translateY(-1px);
}

.btn-add-center {
    background: linear-gradient(135deg, var(--primary), var(--primary-600));
    color: white;
    box-shadow: var(--shadow-lg);
}

.btn-add-center:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-xl);
}

.capacity-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 700;
}

.capacity-full {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
    border: 1px solid rgba(239, 68, 68, 0.3);
}

.capacity-available {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
    border: 1px solid rgba(16, 185, 129, 0.3);
}

/* Responsive */
@media (max-width: 992px) {
    .evac-header, .evac-form-header, .evac-table-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="evac-center-wrapper">
    <!-- Page Header -->
    <div class="evac-header">
        <div class="page-title-group">
            <div class="page-icon">
                <i class="fas fa-building-shelter"></i>
            </div>
            <div>
                <h1 class="page-title">Evacuation Centers</h1>
                <p class="text-muted mb-0">Manage evacuation centers across barangays</p>
            </div>
        </div>
    </div>
<div class="evac-stats">
    <!-- Available -->
    <div class="stat-card stat-available">
        <div class="stat-icon"><i class="fas fa-building-check"></i></div>
        <div>
            <div class="stat-number" data-target="{{ $centers->where('status', 'Available')->count() ?? 0 }}">
                0
            </div>
            <div class="stat-label">Available Centers</div>
        </div>
    </div>
    
    <!-- Full -->
    <div class="stat-card stat-full">
        <div class="stat-icon"><i class="fas fa-building-exclamation"></i></div>
        <div>
            <div class="stat-number" data-target="{{ $centers->where('status', 'Full')->count() ?? 0 }}">
                0
            </div>
            <div class="stat-label">Full Centers</div>
        </div>
    </div>
    
    <!-- Maintenance -->
    <div class="stat-card stat-maintenance">
        <div class="stat-icon"><i class="fas fa-tools"></i></div>
        <div>
            <div class="stat-number" data-target="{{ $centers->where('status', 'Maintenance')->count() ?? 0 }}">
                0
            </div>
            <div class="stat-label">Maintenance</div>
        </div>
    </div>
    
    <!-- Total -->
    <div class="stat-card stat-total">
        <div class="stat-icon"><i class="fas fa-layer-group"></i></div>
        <div>
            <div class="stat-number" data-target="{{ $centers->count() }}">
                {{ $centers->count() }}
            </div>
            <div class="stat-label">Total Centers</div>
            <div class="stat-subtext">{{ number_format($centers->sum('capacity') ?? 0) }} seats</div>
        </div>
    </div>
</div>
    <!-- Add/Edit Form Card -->
    <div class="evac-form-card">
        <div class="evac-form-header">
            <h3 class="card-title mb-0">
                <i class="fas fa-plus-circle text-success me-2"></i>
                {{ isset($editCenter) ? 'Edit Center' : 'Add New Evacuation Center' }}
            </h3>
        </div>
        <form method="POST" class="form-row" 
              action="{{ isset($editCenter) ? route('evacuation_center.update', $editCenter->id) : route('evacuation_center.store') }}">
            @csrf
            @if(isset($editCenter)) @method('PUT') @endif
            
            <div class="form-group">
                <label class="form-label fw-bold">Center Name <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('center_name') is-invalid @enderror" 
                       name="center_name" required 
                       value="{{ old('center_name', $editCenter->name ?? '') }}"
                       placeholder="e.g., Camalaniugan Central School">
                @error('center_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label fw-bold">Address <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" 
                       name="address" required 
                       value="{{ old('address', $editCenter->address ?? '') }}"
                       placeholder="Complete address">
                @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label fw-bold">Capacity <span class="text-danger">*</span></label>
                <input type="number" class="form-control @error('capacity') is-invalid @enderror" 
                       name="capacity" required min="1" 
                       value="{{ old('capacity', $editCenter->capacity ?? '') }}"
                       placeholder="Maximum capacity">
                @error('capacity') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label fw-bold">Barangay <span class="text-danger">*</span></label>
                <select class="form-select @error('barangay_id') is-invalid @enderror" name="barangay_id" required>
                    <option value="">Select Barangay</option>
                    @foreach($barangays as $barangay)
                    <option value="{{ $barangay->id }}" 
                            {{ old('barangay_id', $editCenter->barangay_id ?? '') == $barangay->id ? 'selected' : '' }}>
                        {{ $barangay->name }}
                    </option>
                    @endforeach
                </select>
                @error('barangay_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group">
                <label class="form-label fw-bold">Status</label>
                <select class="form-select @error('status') is-invalid @enderror" name="status">
                    <option value="Available" {{ old('status', $editCenter->status ?? 'Available') == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="Full" {{ old('status', $editCenter->status ?? '') == 'Full' ? 'selected' : '' }}>Full</option>
                    <option value="Maintenance" {{ old('status', $editCenter->status ?? '') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
                @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-actions d-flex gap-2 flex-wrap">
                @if(isset($editCenter))
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Center
                    </button>
                    <a href="{{ route('evacuation_center.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                @else
                    <button type="submit" class="btn btn-primary btn-add-center">
                        <i class="fas fa-plus me-2"></i>Add Center
                    </button>
                    <button type="reset" class="btn btn-outline-secondary">
                        <i class="fas fa-undo me-2"></i>Reset
                    </button>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Card -->
    <div class="evac-table-card">
        <div class="evac-table-header">
            <h3 class="card-title mb-0">
                <i class="fas fa-list-ul text-primary me-2"></i>
                All Centers ({{ $centers->count() }})
            </h3>
        </div>
        
        <div class="table-container">
            <table class="evac-table table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Center Name</th>
                        <th>Address</th>
                        <th>Capacity</th>
                        <th>Barangay</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($centers as $index => $center)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <strong>{{ $center->name }}</strong>
                        </td>
                        <td>{{ Str::limit($center->address, 40) }}</td>
                        <td>
                            <span class="capacity-badge {{ ($center->status ?? 'Available') == 'Available' ? 'capacity-available' : 'capacity-full' }}">
                                {{ $center->capacity ?? 0 }} seats
                            </span>
                        </td>
                        <td>
                            <span class="status-badge {{ ($center->status ?? 'Available') == 'Available' ? 'status-active' : 'status-inactive' }}">
                                {{ $center->status ?? 'Available' }}
                            </span>
                        </td>
                        <td>
                            <span class="badge bg-info">{{ $center->barangay_name ?? 'Not Assigned' }}</span>
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="?edit={{ $center->id }}" class="btn-table btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('evacuation_center.destroy', $center->id) }}" method="POST" style="display:inline;" 
                                      onsubmit="return confirm('Delete {{ $center->name }}?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn-table btn-delete">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-8">
                            <i class="fas fa-building-shelter fa-3x text-muted mb-3"></i>
                            <p class="text-muted mb-0">No evacuation centers found</p>
                            <a href="#" class="btn btn-primary mt-2">Add First Center</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Edit mode detection
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('edit')) {
        const editId = urlParams.get('edit');
        // Auto-populate form for edit (handled by controller)
    }

    // Form validation enhancement
    const capacityInput = document.querySelector('input[name="capacity"]');
    capacityInput?.addEventListener('input', function() {
        if (this.value < 1) this.value = 1;
    });
});
document.addEventListener('DOMContentLoaded', function() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const statCard = entry.target;
                const numberEl = statCard.querySelector('.stat-number');
                const target = parseInt(numberEl.dataset.target);
                
                let current = 0;
                const increment = target / 60;
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= target) {
                        current = target;
                        clearInterval(timer);
                    }
                    numberEl.textContent = Math.floor(current).toLocaleString();
                }, 20);
                
                statCard.classList.add('animate');
                observer.unobserve(statCard);
            }
        });
    }, { threshold: 0.3 });

    document.querySelectorAll('.stat-card').forEach(card => {
        observer.observe(card);
    });
});
</script>
@endsection