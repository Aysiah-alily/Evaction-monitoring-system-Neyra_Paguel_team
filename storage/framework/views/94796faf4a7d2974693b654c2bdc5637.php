

<?php $__env->startSection('content'); ?>
<!-- Enhanced Page Header - TIGHTENED -->
<div class="dashboard-header" style="padding: 1.75rem 0 2.5rem;">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="header-content">
                    <h1 class="dashboard-title">
                        <i class="fas fa-shelter me-3 text-primary"></i>
                        Evacuation Center Dashboard
                    </h1>
                    <p class="dashboard-subtitle text-muted">
                        Real-time monitoring of evacuation centers and evacuees
                    </p>
                </div>
            </div>
            <div class="col-md-4 text-md-end">
                <div class="header-actions">
                    <button class="btn btn-outline-primary me-2">
                        <i class="fas fa-sync-alt me-1"></i> Refresh
                    </button>
                    <button class="btn btn-primary">
                        <i class="fas fa-plus me-1"></i> New Entry
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Enhanced Stats Grid - COMPACT -->
<div class="container-fluid">
    <div class="stats-overview mb-5">
        <div class="row g-4">
            <!-- Total Evacuees -->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="stat-card gradient-primary">
                    <div class="stat-card-inner">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo e(number_format($totalEvacuees ?? 0)); ?></div>
                            <div class="stat-label">Total Evacuees</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> +12.5%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Active Centers -->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="stat-card gradient-success">
                    <div class="stat-card-inner">
                        <div class="stat-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo e($activeCenters ?? 12); ?></div>
                            <div class="stat-label">Active Centers</div>
                            <div class="stat-change positive">
                                <i class="fas fa-check"></i> All Operational
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Families -->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="stat-card gradient-warning">
                    <div class="stat-card-inner">
                        <div class="stat-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number"><?php echo e(number_format($totalFamilies ?? 0)); ?></div>
                            <div class="stat-label">Total Families</div>
                            <div class="stat-change">
                                <i class="fas fa-arrow-down"></i> -2.3%
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Occupancy Rate -->
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="stat-card gradient-danger">
                    <div class="stat-card-inner">
                        <div class="stat-icon">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <div class="stat-content">
                            <div class="stat-number">78<small>%</small></div>
                            <div class="stat-label">Occupancy Rate</div>
                            <div class="stat-change warning">
                                <i class="fas fa-exclamation-triangle"></i> Near Capacity
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section - PERFECTLY ALIGNED -->
    <div class="charts-section mb-5">
        <div class="row g-4">
            <!-- Evacuees by Center -->
           <div class="col-xl-8 col-lg-8 col-md-12">
    <div class="report-card">
        <div class="report-card-header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h5 class="report-title mb-0">
                    <i class="fas fa-chart-bar me-2 text-primary"></i>
                    Evacuees by Center
                </h5>
                <select class="form-select form-select-sm" style="width: auto;">
                    <option>Last 24h</option>
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                </select>
            </div>
        </div>
        <div class="chart-container"> <!-- ← This now flexes properly -->
            <canvas id="evacueeChart"></canvas>
        </div>
    </div>
</div>

            <!-- Status Distribution -->
           <div class="col-xl-4 col-lg-4 col-md-12">
    <div class="report-card">
        <div class="report-card-header">
            <h5 class="report-title mb-0">
                <i class="fas fa-chart-pie me-2 text-info"></i>
                Status Distribution
            </h5>
        </div>
        <div class="chart-container">
            <canvas id="statusChart"></canvas>
        </div>
      <div class="status-legend">
                        <div class="legend-item">
                            <span class="legend-color bg-success"></span>
                            <span>Safe (67%)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color bg-warning"></span>
                            <span>In Transit (15%)</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-color bg-danger"></span>
                            <span>Needs Attention (18%)</span>
                        </div>
                    </div>
    </div>
</div>
        </div>
    </div>

    <!-- Recent Activity & Quick Actions -->
    <div class="row g-4">
        <!-- Recent Activity -->
        <div class="col-xl-8">
            <div class="report-card">
                <div class="report-card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="report-title mb-0">
                            <i class="fas fa-clock me-2 text-warning"></i>
                            Recent Activity
                        </h5>
                        <a href="#" class="text-muted text-decoration-none">View All <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon bg-primary">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">New Evacuee Registered</div>
                            <div class="activity-meta">
                                <span class="center-name">Barangay Hall - Zone 1</span>
                                <span class="time-ago">2 min ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-success">
                            <i class="fas fa-medkit"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Medical supplies delivered</div>
                            <div class="activity-meta">
                                <span class="center-name">School Gymnasium</span>
                                <span class="time-ago">15 min ago</span>
                            </div>
                        </div>
                    </div>
                    <div class="activity-item">
                        <div class="activity-icon bg-warning">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="activity-content">
                            <div class="activity-title">Capacity warning issued</div>
                            <div class="activity-meta">
                                <span class="center-name">Church Hall</span>
                                <span class="time-ago">1 hr ago</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="col-xl-4">
            <div class="report-card">
                <div class="report-card-header">
                    <h5 class="report-title mb-0">
                        <i class="fas fa-bolt me-2 text-success"></i>
                        Quick Actions
                    </h5>
                </div>
                <div class="quick-actions">
                    <a href="#" class="action-item">
                        <i class="fas fa-user-plus text-primary"></i>
                        <span>Register Evacuee</span>
                    </a>
                    <a href="#" class="action-item">
                        <i class="fas fa-truck text-success"></i>
                        <span>Log Supplies</span>
                    </a>
                    <a href="#" class="action-item">
                        <i class="fas fa-file-medical text-warning"></i>
                        <span>Medical Report</span>
                    </a>
                    <a href="#" class="action-item">
                        <i class="fas fa-sign-out-alt text-info"></i>
                        <span>Discharge</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --success-gradient: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    --warning-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
}

/* Dashboard Header */
.dashboard-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-bottom: 1px solid #e2e8f0;
}

.dashboard-title {
    font-size: 2.2rem;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 0.5rem;
}

.dashboard-subtitle {
    font-size: 1.1rem;
}

/* Stats Cards - FIXED COMPACT HEIGHT */
.stat-card {
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    overflow: hidden;
    height: 140px; /* EXACT HEIGHT */
    display: flex;
    align-items: center;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.stat-card-inner {
    padding: 1.5rem;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
}

.gradient-primary { background: var(--primary-gradient); }
.gradient-success { background: var(--success-gradient); }
.gradient-warning { background: var(--warning-gradient); }
.gradient-danger { background: var(--danger-gradient); }

.stat-icon {
    width: 55px;
    height: 55px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: white;
    margin-right: 1rem;
    box-shadow: 0 6px 16px rgba(0,0,0,0.2);
    flex-shrink: 0;
}

.stat-number {
    font-size: 2rem;
    font-weight: 800;
    color: white;
    line-height: 1;
    margin-bottom: 0.2rem;
}

.stat-number small {
    font-size: 0.9rem;
}

.stat-label {
    color: rgba(255,255,255,0.9);
    font-size: 0.9rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.3rem;
}

.stat-change {
    font-size: 0.8rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.stat-change.positive { color: rgba(255,255,255,0.95); }
.stat-change.warning { color: rgba(255,193,7,0.95); }

/* ✅ NEW FLEXIBLE & WORKING SYSTEM */
.report-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    overflow: hidden;
    border: 1px solid #f1f5f9;
    /* height: 420px; ← DELETE THIS LINE */
    display: flex;
    flex-direction: column;
    min-height: 420px; /* Changed to min-height */
}

/* HEADERS - PERFECT ALIGNMENT */
.report-card-header {
    padding: 1.25rem 1.5rem 1rem !important;
    border-bottom: 1px solid #f1f5f9;
    flex-shrink: 0;
    display: flex !important;
    align-items: center !important;
    justify-content: space-between !important;
}

/* CHARTS - RESPONSIVE HEIGHT */
.chart-container {
    flex: 1; /* Changed from fixed height */
    min-height: 300px; /* Minimum height */
    width: 100%;
    position: relative;
    padding: 1.5rem !important;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* ACTIVITY LIST - FULL FLEX */
.activity-list {
    padding: 1.5rem !important;
    flex: 1; /* Takes remaining space */
    overflow-y: auto;
    display: flex;
    flex-direction: column;
}

/* STATUS LEGEND - FIXED */
.status-legend {
    padding: 1rem 1.5rem 1.25rem !important;
    flex-shrink: 0; /* Won't shrink */
    border-top: 1px solid #f1f5f9;
}

.activity-item {
    display: flex;
    padding: 1rem 0;
    border-bottom: 1px solid #f1f5f9;
    gap: 1rem;
}

.activity-item:last-child {
    border-bottom: none;
}

.activity-icon {
    width: 45px;
    height: 45px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1rem;
    flex-shrink: 0;
}

.activity-title {
    font-weight: 600;
    color: #1e293b;
    font-size: 0.95rem;
    margin-bottom: 0.2rem;
}

.activity-content {
    flex: 1;
}

.activity-meta {
    display: flex;
    gap: 0.75rem;
    font-size: 0.85rem;
    color: #64748b;
    flex-wrap: wrap;
}

.center-name {
    font-weight: 500;
}

/* Quick Actions */
.quick-actions {
    padding: 1.75rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.action-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 0.875rem 1rem;
    color: #1e293b;
    text-decoration: none;
    border-radius: 12px;
    transition: all 0.2s ease;
    margin-bottom: 0.5rem;
    font-size: 0.95rem;
}

.action-item:hover {
    background: #f8fafc;
    transform: translateX(5px);
}

.action-item i {
    width: 36px;
    height: 36px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
}


.legend-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.4rem 0;
    font-size: 0.9rem;
}

.legend-color {
    width: 12px;
    height: 12px;
    border-radius: 50%;
}

/* Row Alignment */
.charts-section .row,
.stats-overview .row {
    align-items: stretch;
}

/* Responsive */
@media (max-width: 992px) {
    .dashboard-title { font-size: 1.8rem; }
    .stat-card-inner { 
        flex-direction: column; 
        text-align: center; 
        padding: 1.25rem 1rem;
    }
    .stat-icon { 
        margin-right: 0; 
        margin-bottom: 0.75rem; 
    }
    .stat-card { height: 130px; }
    .report-card { height: 380px; }
    .chart-container { height: 260px !important; padding: 1.25rem !important; }
}

@media (max-width: 768px) {
    .chart-container { 
        height: 240px !important; 
        padding: 1rem !important; 
    }
    .stat-card { height: 120px; }
    .report-card { height: 360px; }
    .report-card-header { padding: 0.75rem 1.25rem 0.875rem !important; }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced Bar Chart
    const ctx1 = document.getElementById('evacueeChart');
    if (ctx1) {
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Center A', 'Center B', 'Center C', 'Center D', 'Center E'],
                datasets: [{
                    label: 'Evacuees',
                    data: [320, 285, 250, 215, 180],
                    backgroundColor: 'rgba(102, 126, 234, 0.8)',
                    borderColor: 'rgba(102, 126, 234, 1)',
                    borderRadius: 12,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { 
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0,0,0,0.05)' },
                        ticks: { font: { size: 12 } }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { font: { size: 12 } }
                    }
                }
            }
        });
    }

    // Enhanced Doughnut Chart
    const ctx2 = document.getElementById('statusChart');
    if (ctx2) {
        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Safe', 'In Transit', 'Needs Attention'],
                datasets: [{
                    data: [67, 15, 18],
                    backgroundColor: [
                        'rgba(17, 153, 142, 0.8)',
                        'rgba(255, 193, 7, 0.8)',
                        'rgba(220, 53, 69, 0.8)'
                    ],
                    borderColor: [
                        'rgba(17, 153, 142, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(220, 53, 69, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: { legend: { display: false } }
            }
        });
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/EvacPages/EvacAdmin.blade.php ENDPATH**/ ?>