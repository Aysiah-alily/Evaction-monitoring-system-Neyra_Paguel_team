

<?php $__env->startSection('title', 'Comprehensive Reports'); ?>

<?php $__env->startSection('content'); ?>
<link href="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>

<style>
/* Modern dashboard styling matching your registration page */
.report-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; }
.report-card { background: white; border-radius: 16px; padding: 1.5rem; box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1); border-top: 4px solid var(--primary); 
    transition: all 0.3s ease;
    border: none;
}
.chart-container { height: 300px; position: relative; }
.card-title { font-size: 1.1rem; font-weight: 700; margin-bottom: 1rem; color: #1f2937; }
.metric {
    font-size: 1.8rem !important;  /* Smaller than original 2.5rem */
    line-height: 1.2;
    margin-bottom: 0.25rem;
}
.progress {
    background-color: #f1f5f9;
    border-radius: 10px;
    overflow: hidden;
}
.priority-high { color: #ef4444; }
.priority-moderate { color: #f59e0b; }
.priority-low { color: #10b981; }
/* ✅ COMPLETE FIX - Add to your existing <style> */
.progress-wrapper {
    flex-shrink: 0;
    width: 120px;
}

.progress-bar {
    height: 8px;
    background: linear-gradient(90deg, #e5e7eb 0%, #f1f5f9 100%) !important;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.progress-fill {
    height: 100%;
    border-radius: 10px;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
}

.progress-fill[style*="10b981"] {
    box-shadow: 0 0 15px rgba(16, 185, 129, 0.6) !important;
}

.purok-item:hover .progress-fill {
    transform: scaleX(1.02);
}

/* ✅ Ensure inline styles take precedence */
.purok-item .progress-fill {
    background: inherit !important;
}

/* ✅ Responsive color overrides */
.progress-fill[style*="70"] {
    background: #10b981 !important; /* Green for >70% */
}

.progress-fill[style*="0.7"] {
    background: #10b981 !important; /* Green override */
}
.purok-item { display: flex; justify-content: space-between; align-items: center; padding: 0.75rem; background: #f8fafc; margin-bottom: 0.5rem; border-radius: 8px; }
.purok-name { font-weight: 600; }
.purok-stats { font-size: 0.9rem; color: #6b7280; }
.details-toggle { cursor: pointer; color: #2563eb; font-weight: 600; }
.details-panel { margin-top: 1rem; max-height: 0; overflow: hidden; transition: max-height 0.3s ease; }
.details-panel.show { max-height: 500px; }
.detail-row { display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid #f1f5f9; font-size: 0.9rem; }
.live-indicator { animation: pulse 2s infinite; }
.stat-total { color: #2563eb !important; }
.stat-evacuated { color: #10b981 !important; }
.priority-high { color: #ef4444 !important; }
.stat-warning { color: #f59e0b !important; }
.metric {
    font-size: 1.4rem !important;
    min-width: 70px;
}

small.text-muted {
    font-size: 0.75rem !important;
}

.progress {
    margin-top: 0.5rem !important;
}

.card-title {
    font-size: 0.85rem !important;
    line-height: 1.3;
}

@keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
@media (max-width: 992px) {
    .metric { font-size: 1.5rem !important; }
}

@media (max-width: 768px) {
    .row.align-items-stretch > div { margin-bottom: 1rem; }
    .d-flex.flex-column.gap-3 { gap: 0.75rem !important; }
}
</style>

<div class="container-fluid p-4" style="background: #f8fafc; min-height: 100vh;">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="fw-bold text-dark mb-0">
                    <i class="fas fa-chart-line me-2 text-primary"></i>
                    Comprehensive Reports Dashboard
                </h2>
                <div class="live-indicator badge bg-success">
                    <i class="fas fa-circle me-1"></i>Live Data
                </div>
            </div>
        </div>
    </div>

    <!-- Priority Households -->
   <div class="row mb-4 align-items-stretch">
    <!-- LEFT: Barangay Information -->
    <div class="col-lg-6 mb-3 mb-lg-0">
        <div class="report-card h-100">
            <div class="card-title">
                <i class="fas fa-home me-2 text-primary"></i>
                Barangay Information
            </div>
            <div class="row g-3">
                <div class="col-6">
                    <div class="metric text-primary"><?php echo e($barangayInfo['name'] ?? 'N/A'); ?></div>
                    <small class="text-muted d-block mt-1">Barangay</small>
                </div>
                <div class="col-6">
                    <div class="metric text-success"><?php echo e(number_format($barangayInfo['population'] ?? 0)); ?></div>
                    <small class="text-muted d-block mt-1">Population</small>
                </div>
                <div class="col-6">
                    <div class="text-muted"><?php echo e(number_format($barangayInfo['area'] ?? 0)); ?> ha</div>
                    <small class="text-muted d-block mt-1">Area</small>
                </div>
                <div class="col-6">
                    <div class="text-primary"><?php echo e($barangayInfo['registered_date'] ?? 'N/A'); ?></div>
                    <small class="text-muted d-block mt-1">Active Since</small>
                </div>
            </div>
            <!-- ✅ SAFE - Uses YOUR existing evacueeBreakdown data -->
            <div class="mt-3 pt-3 border-top">
                <small class="text-success fw-bold">
                    <i class="fas fa-check-circle me-1"></i>
                    <?php echo e(array_sum(array_slice($evacueeBreakdown['data'] ?? [0], 0, 1)) ?? 0); ?> Families Tracked
                </small>
            </div>
        </div>
    </div>
    <!-- RIGHT: 4 Custom Progress Stats -->
<div class="col-lg-6">
    <div class="d-flex flex-column h-100 gap-3">
        <!-- Stat 1: Total Households vs Registered Evacuees -->
        <div class="report-card flex-grow-1 p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="card-title fw-semibold">Total Households</span>
                <div class="metric stat-total fs-4"><?php echo e(number_format($totalHouseholds)); ?></div>
            </div>
            <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-primary" 
                     style="width: <?php echo e($totalHouseholds > 0 ? round((count($evacueeDetails ?? []) / $totalHouseholds) * 100) : 0); ?>%">
                </div>
            </div>
            <small class="text-muted mt-1"><?php echo e(count($evacueeDetails ?? [])); ?> registered</small>
        </div>

                <!-- Stat 2: High Priority vs High Priority Evacuated -->
        <div class="report-card flex-grow-1 p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="card-title fw-semibold">
                    High Priority <i class="fas fa-exclamation-triangle ms-1 text-danger fs-6"></i>
                </span>
                <div class="metric priority-high fs-4"><?php echo e(number_format($highPriorityHouseholds)); ?></div>
            </div>
            <div class="progress" style="height: 6px;">
                <?php
                    $highPriorityEvacuated = collect($evacueeDetails ?? [])->filter(function($details) {
                        return collect($details)->some(fn($d) => str_contains(strtolower($d['remarks'] ?? ''), 'high') || $d['category'] === 'Medical');
                    })->count();
                ?>
                <div class="progress-bar bg-danger" 
                     style="width: <?php echo e($highPriorityHouseholds > 0 ? round(($highPriorityEvacuated / $highPriorityHouseholds) * 100) : 0); ?>%">
                </div>
            </div>
            <small class="text-muted mt-1"><?php echo e($highPriorityEvacuated); ?> evacuated</small>
        </div>

        <!-- Stat 3: Evacuee Families vs Total Households -->
        <div class="report-card flex-grow-1 p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="card-title fw-semibold">Evacuee Families</span>
                <div class="metric stat-evacuated fs-4"><?php echo e(count($evacueeDetails ?? [])); ?></div>
            </div>
                        <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-success" 
                     style="width: <?php echo e($totalHouseholds > 0 ? round((count($evacueeDetails ?? []) / $totalHouseholds) * 100) : 0); ?>%">
                </div>
            </div>
            <small class="text-muted mt-1"><?php echo e(round((count($evacueeDetails ?? []) / $totalHouseholds) * 100, 1)); ?>% of total</small>
        </div>

        <!-- Stat 4: Medical Priority Evacuated vs Total Medical Priority Households -->
        <div class="report-card flex-grow-1 p-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="card-title fw-semibold">Medical Priority</span>
                <div class="metric stat-warning fs-4">
                    <?php
                        $totalMedicalHouseholds = collect($evacueeDetails ?? [])->filter(fn($details) => 
                            collect($details)->some(fn($d) => $d['category'] === 'Medical')
                        )->count();
                        $medicalEvacuated = collect($evacueeDetails ?? [])->filter(fn($details) => 
                            collect($details)->some(fn($d) => $d['category'] === 'Medical' && $d['status'] === 'Registered')
                        )->count();
                    ?>
                    <?php echo e($totalMedicalHouseholds); ?>

                </div>
            </div>
                        <div class="progress" style="height: 6px;">
                <div class="progress-bar bg-warning" 
                     style="width: <?php echo e($totalMedicalHouseholds > 0 ? round(($medicalEvacuated / $totalMedicalHouseholds) * 100) : 0); ?>%">
                </div>
            </div>
            <small class="text-muted mt-1"><?php echo e($medicalEvacuated); ?> / <?php echo e($totalMedicalHouseholds); ?> evacuated</small>
        </div>
    </div>
</div>
</div>

    <div class="row mb-4">
        <!-- Purok Distribution Chart -->
        <div class="col-lg-6 mb-4">
            <div class="report-card">
                <div class="card-title">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Purok Distribution
                </div>
                <div class="chart-container">
                    <canvas id="purokChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Family Demographics -->
        <div class="col-lg-6 mb-4">
            <div class="report-card">
                <div class="card-title">
                    <i class="fas fa-users me-2"></i>
                    Family Demographics
                </div>
                <div class="chart-container">
                    <canvas id="demographicsChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <!-- Evacuee Status -->
        <div class="col-lg-6 mb-4">
            <div class="report-card">
                <div class="card-title">
                    <i class="fas fa-user-check me-2"></i>
                    Evacuee Status Breakdown
                </div>
                <div class="chart-container">
                    <canvas id="evacueeChart"></canvas>
                </div>
            </div>
        </div>

<!-- Evacuation Progress - FIXED VERSION -->
<div class="col-lg-6 mb-4">
    <div class="report-card">
        <div class="card-title">
            <i class="fas fa-chart-line me-2"></i>
            Evacuation Progress by Purok
        </div>
        <div id="progressContainer">
            <?php $__currentLoopData = $evacuationProgress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $percentage = $purok['total'] > 0 ? ($purok['evacuated'] / $purok['total']) * 100 : 0;
                $color = $percentage > 70 ? '#10b981' : ($percentage > 30 ? '#f59e0b' : '#ef4444');
            ?>
            <div class="purok-item">
                <div>
                    <div class="purok-name"><?php echo e($purok['purok']); ?></div>
                    <div class="purok-stats"><?php echo e($purok['evacuated']); ?> / <?php echo e($purok['total']); ?> evacuated 
                        <span class="badge bg-success ms-1"><?php echo e(round($percentage)); ?>%</span>
                    </div>
                </div>
                <div class="progress-wrapper">
                    <div class="progress-bar">
                        <div class="progress-fill" 
                             style="width: <?php echo e($percentage); ?>%; background: <?php echo e($color); ?> !important;">
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
    </div>

    <!-- Purok Details (Expandable) -->
    <div class="row">
        <div class="col-12">
            <div class="report-card">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-list me-2"></i>Detailed Evacuee Information</span>
                    <button class="btn btn-sm btn-outline-primary" onclick="toggleAllDetails()">Toggle All</button>
                </div>
                
                <?php $__currentLoopData = $evacueeDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purokName => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="border-bottom pb-3 mb-3">
                    <div class="d-flex justify-content-between align-items-center p-3 bg-light rounded" onclick="toggleDetails('<?php echo e($purokName); ?>')">
                        <div>
                            <h6 class="mb-1"><?php echo e($purokName); ?></h6>
                            <small class="text-muted"><?php echo e(count($details)); ?> households</small>
                        </div>
                        <i class="fas fa-chevron-down details-toggle" id="toggle-<?php echo e($purokName); ?>"></i>
                    </div>
                    <div class="details-panel" id="details-<?php echo e($purokName); ?>">
                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="detail-row">
                            <span><strong><?php echo e($detail['head_of_family']); ?></strong> (<?php echo e($detail['category']); ?>)</span>
                            <span><?php echo e($detail['status']); ?> • <?php echo e($detail['remarks']); ?></span>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
// ✅ WORKING VERSION - NO ROUTE DEPENDENCY
const purokData = <?php echo json_encode($purokDistribution, 15, 512) ?>;
const demographicsData = <?php echo json_encode($familyDemographics, 15, 512) ?>;
const evacueeData = <?php echo json_encode($evacueeBreakdown, 15, 512) ?>;

document.addEventListener('DOMContentLoaded', function() {
    initCharts();
    console.log('✅ Reports dashboard loaded!');
});

// Charts ONLY (no live refresh)
function initCharts() {
    // Purok Chart
    const purokCtx = document.getElementById('purokChart')?.getContext('2d');
    if (purokCtx && purokData.labels.length) {
        new Chart(purokCtx, {
            type: 'bar',
            data: {
                labels: purokData.labels.slice(0, 8), // Top 8 puroks
                datasets: [{
                    label: 'Households',
                    data: purokData.data.slice(0, 8),
                    backgroundColor: 'rgba(37, 99, 235, 0.8)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: { y: { beginAtZero: true } }
            }
        });
    }

    // Demographics Chart
    const demoCtx = document.getElementById('demographicsChart')?.getContext('2d');
    if (demoCtx && demographicsData.labels.length) {
        new Chart(demoCtx, {
            type: 'doughnut',
            data: {
                labels: demographicsData.labels,
                datasets: [{
                    data: demographicsData.data,
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444', '#8b5cf6']
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    // Evacuee Status
    const evacCtx = document.getElementById('evacueeChart')?.getContext('2d');
    if (evacCtx && evacueeData.labels.length) {
        new Chart(evacCtx, {
                        type: 'pie',
            data: {
                labels: evacueeData.labels,
                datasets: [{ 
                    data: evacueeData.data, 
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'] 
                }]
            },
            options: { 
                responsive: true, 
                maintainAspectRatio: false 
            }
        });
    }
}

// ✅ Toggle purok details (WORKS)
function toggleDetails(purokName) {
    const panel = document.getElementById(`details-${purokName}`);
    const icon = document.getElementById(`toggle-${purokName}`);
    if (panel) {
        panel.classList.toggle('show');
        if (icon) icon.classList.toggle('rotate-180');
    }
}

// ✅ Toggle all details
function toggleAllDetails() {
    const panels = document.querySelectorAll('.details-panel');
    const icons = document.querySelectorAll('.details-toggle');
    const isAnyOpen = Array.from(panels).some(p => p.classList.contains('show'));
    
    panels.forEach((panel, index) => {
        if (isAnyOpen) {
            panel.classList.remove('show');
            icons[index]?.classList.remove('rotate-180');
        } else {
            panel.classList.add('show');
            icons[index]?.classList.add('rotate-180');
        }
    });
}

// ✅ Manual refresh button (optional)
function manualRefresh() {
    if (confirm('Refresh reports data?')) {
        location.reload();
    }
}

// ✅ Export functions
function exportPDF() {
    window.print();
}

function exportExcel() {
    // Simple CSV export
    let csv = 'Purok,Households\n';
    if (purokData.labels) {
        purokData.labels.forEach((label, i) => {
            csv += `${label},${purokData.data[i] || 0}\n`;
        });
    }
    const blob = new Blob([csv], { type: 'text/csv' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'purok-report.csv';
    a.click();
    URL.revokeObjectURL(url);
}

// ✅ Add refresh button to page (optional)
document.addEventListener('DOMContentLoaded', function() {
    // Add floating refresh button
    const refreshBtn = document.createElement('button');
    refreshBtn.innerHTML = '<i class="fas fa-sync-alt"></i> Refresh';
    refreshBtn.className = 'btn btn-outline-primary position-fixed';
    refreshBtn.style.cssText = `
        bottom: 20px; right: 20px; z-index: 9999; 
        border-radius: 50px; padding: 12px 20px; 
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;
    refreshBtn.onclick = manualRefresh;
    document.body.appendChild(refreshBtn);
});
</script>

<style>
/* ✅ Essential CSS for functionality */
.rotate-180 {
    transform: rotate(180deg) !important;
    transition: transform 0.3s ease;
}

.details-panel {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease;
}

.details-panel.show {
    max-height: 600px;
}

.progress-fill {
    transition: width 0.5s ease;
}

.report-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.report-card { animation: fadeInUp 0.6s ease forwards; }
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.adminbarangay', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\Prototype_compy - Copy - Copy\resources\views/BarangayPages/reports/index.blade.php ENDPATH**/ ?>