
<?php $__env->startSection('title', 'Dashboard - Evacuation Management'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<style>
:root {
    --success-rgb: 5, 150, 105;
    --danger-rgb: 220, 38, 38;
    --warning-rgb: 217, 119, 6;
    --primary-rgb: 30, 64, 175;
}
.dashboard-wrapper {
    max-width: 100%;
    overflow-x: hidden; /* Prevent horizontal scroll */
}
/* Dashboard Specific Styles */
.dashboard-metrics {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 1.15rem;
    margin-bottom: 2rem;
    padding: 0;
    width: 100%;
    overflow-x: hidden;
}

.metric-card {
    background: linear-gradient(135deg, white 0%, #f8fafc 100%);
    border-radius: var(--radius-2xl);
    padding: 1.75rem 1.5rem;
    text-align: center;
    position: relative;
    overflow: hidden;
    transition: var(--transition);
    border: 1px solid var(--slate-100);
}

.metric-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, var(--primary), var(--primary-600));
    opacity: 0;
    transform: scaleX(0);
    transition: var(--transition);
}

.metric-card:hover {
    transform: translateY(-8px);
    box-shadow: var(--shadow-2xl);
}

.metric-card:hover::before {
    opacity: 1;
    transform: scaleX(1);
}

/* Metric Content Layout */
.metric-content {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.metric-icon {
    width: 3rem;
    height: 3rem;
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    flex-shrink: 0;
    box-shadow: var(--shadow-lg);
    position: relative;
    z-index: 2;
}

.metric-primary .metric-icon { 
    background: linear-gradient(135deg, var(--primary), var(--primary-600));
    color: white;
}

.metric-success .metric-icon { 
    background: linear-gradient(135deg, var(--success), #10b981);
    color: white;
}

.metric-warning .metric-icon { 
    background: linear-gradient(135deg, var(--warning), #f59e0b);
    color: white;
}

.metric-danger .metric-icon { 
    background: linear-gradient(135deg, var(--danger), #dc2626);
    color: white;
}

.metric-number {
    font-size: 2.25rem;
    font-weight: 800;
    line-height: 1;
    margin: 0;
}

.metric-primary .metric-number { color: var(--primary); }
.metric-success .metric-number { color: var(--success); }
.metric-warning .metric-number { color: var(--warning); }
.metric-danger .metric-number { color: var(--danger); }

.metric-label {
    font-size: 0.8rem;
    color: var(--slate-600);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    margin: 0;
    line-height: 1.2;
}

/* Responsive */
@media (max-width: 768px) {
    .dashboard-metrics {
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 1rem;
    }
    
    .metric-content {
        gap: 0.75rem;
    }
    
    .metric-icon {
        width: 2.5rem;
        height: 2.5rem;
        font-size: 1.125rem;
    }
    
    .metric-number {
        font-size: 1.875rem;
    }
    .card .table thead th,
    .card .table tbody td {
        padding: 0.75rem 0.5rem;
        font-size: 0.8rem;
    }
}

.dashboard-grid {
    display: grid;
    grid-template-columns: 1fr 380px; /* Narrower right sidebar */
    gap: 1rem;
    margin-bottom: 1rem;
    overflow-x: hidden;
}

.dashboard-grid > div:first-child {
    min-width: 0; /* Allow shrinking */
}
.dashboard-grid > div:last-child {
    min-width: 380px;
    max-width: 380px;
}
.table-container,
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.table {
    min-width: 600px; /* Minimum table width */
    width: 100%;
}

@media (max-width: 992px) {
    .dashboard-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }
}

.filters-row {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    align-items: center;
    margin-bottom: 1.5rem;
}

.table-progress {
    height: 0.5rem;
    background: var(--slate-200);
    border-radius: 9999px;
    overflow: hidden;
}

.table-progress-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--success), var(--success));
    transition: width 0.3s ease;
}

.status-badge {
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
}

.status-full { background: rgba(239, 68, 68, 0.1); color: var(--danger); }
.status-warning { background: rgba(245, 158, 11, 0.1); color: var(--warning); }
.status-good { background: rgba(16, 185, 129, 0.1); color: var(--success); }

.activity-item, .alert-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 1rem;
    border-radius: var(--radius-lg);
    margin-bottom: 0.5rem;
    transition: var(--transition);
}

.activity-item:hover, .alert-item:hover {
    background: var(--slate-50);
    transform: translateX(4px);
}

.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    flex-shrink: 0;
}
.chart-container {
    position: relative;
    height: 280px;
    width: 100%;
}
.full-width-map-section {
    grid-column: 1 / -1; /* Span full width */
    margin-top: 1.5rem;
}

.full-width-map-section .card {
    margin-bottom: 0;
}
/* FULL WIDTH MAP */
.map-container {
    height: 300px; /* Taller map */
    width: 100%;
    border: none;
    overflow: hidden;
}

.map-legend {
    display: flex;
    gap: 1.5rem;
    justify-content: center;
    padding: 1.25rem;
    background: var(--slate-50);
    border-top: 1px solid var(--slate-200);
}

.legend-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.85rem;
    color: var(--slate-700);
    font-weight: 500;
}

.legend-color {
    width: 16px;
    height: 16px;
    border-radius: 4px;
    border: 2px solid white;
    box-shadow: var(--shadow-sm);
}
.card {
    width: 100%;
    overflow: hidden;
}
.main-content,
.dashboard-wrapper,
.dashboard-grid,
.dashboard-metrics {
    overflow-x: hidden !important;
    max-width: 100%;
}
/* COMPACT + GRID BORDER Table */
.table-compact {
    font-size: 0.8rem;
    border-collapse: collapse;
    width: 100%;
    min-width: 0;
}

.table-compact.table-bordered th,
.table-compact.table-bordered td {
    padding: 0.5rem 0.4rem; /* Ultra compact */
    border: 1px solid var(--slate-200);
    vertical-align: middle;
    white-space: nowrap; /* Prevent text wrap */
}

.table-compact thead th {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
    color: var(--slate-900);
    font-weight: 700;
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    position: sticky;
    top: 0;
    z-index: 10;
}

.table-compact tbody td {
    color: var(--slate-800);
    font-weight: 500;
}

.table-compact tbody tr:hover {
    background: var(--primary-50);
    transform: none; /* Remove scale for compact */
}

/* Column Widths - PERFECT FIT */
.col-center { width: 55%; max-width: 55%; }
.col-capacity { width: 15%; text-align: center; }
.col-current { width: 15%; text-align: center; }
.col-status { width: 15%; text-align: center; }

/* Compact Status Badges */
.status-badge {
    padding: 0.2rem 0.5rem;
    font-size: 0.65rem;
    font-weight: 700;
    border-radius: 12px;
    border: 1px solid;
    white-space: nowrap;
    display: inline-block;
}

.status-full { 
    background: rgba(239, 68, 68, 0.1); 
    color: #dc2626; 
    border-color: rgba(239, 68, 68, 0.3);
}

.status-warning { 
    background: rgba(245, 158, 11, 0.1); 
    color: #d97706; 
    border-color: rgba(245, 158, 11, 0.3);
}

.status-good { 
    background: rgba(16, 185, 129, 0.1); 
    color: #059669; 
    border-color: rgba(16, 185, 129, 0.3);
}

/* Table Container */
.table-container {
    border: 1px solid var(--slate-200);
    border-radius: var(--radius-lg);
    overflow: hidden;
    background: white;
    max-width: 100%;
}

/* Responsive */
@media (max-width: 768px) {
    .table-compact th,
    .table-compact td {
        padding: 0.4rem 0.3rem;
        font-size: 0.75rem;
    }
    
    .col-center { width: 50%; }
}
</style>

<div class="dashboard-wrapper">
    <div class="page-header">
        <div class="page-title-group">
            <div class="page-icon">
                <i class="fas fa-tachometer-alt"></i>
            </div>
            <div>
                <h1 class="page-title">Super Admin Dashboard</h1>
                <p class="text-muted mb-0">Real-time evacuation monitoring & analytics</p>
            </div>
        </div>
        <div class="page-actions">
            <a href="#" class="btn btn-secondary">
                <i class="fas fa-download"></i>
                Export Report
            </a>
            <a href="#" class="btn btn-primary">
                <i class="fas fa-plus"></i>
                New Record
            </a>
        </div>
    </div>

    <!-- FIXED Metrics Grid - Database data -->
    <div class="dashboard-metrics">
        <div class="card metric-card metric-primary">
            <div class="metric-content">
                <div class="metric-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="metric-number"><?php echo e($totalUsers ?? 1,247); ?></div>
            </div>
            <p class="metric-label">Total Users</p>
        </div>
        
        <div class="card metric-card metric-success">
            <div class="metric-content">
                <div class="metric-icon">
                    <i class="fas fa-building-shelter"></i>
                </div>
                <div class="metric-number"><?php echo e($totalCenters ?? 23); ?></div>
            </div>
            <p class="metric-label">Evac Centers</p>
        </div>
        
        <div class="card metric-card metric-primary">
            <div class="metric-content">
                <div class="metric-icon">
                    <i class="fas fa-home"></i>
                </div>
                <div class="metric-number"><?php echo e($totalHouseholds ?? 5,892); ?></div>
            </div>
            <p class="metric-label">Households</p>
        </div>
        
        <div class="card metric-card metric-danger">
            <div class="metric-content">
                <div class="metric-icon">
                    <i class="fas fa-person-shelter"></i>
                </div>
                <div class="metric-number"><?php echo e($totalEvacuated ?? 2,847); ?></div>
            </div>
            <p class="metric-label">Evacuated</p>
        </div>
        
        <div class="card metric-card metric-warning">
            <div class="metric-content">
                <div class="metric-icon">
                    <i class="fas fa-house-user"></i>
                </div>
                <div class="metric-number"><?php echo e($notEvacuated ?? 1,234); ?></div>
            </div>
            <p class="metric-label">Not Evacuated</p>
        </div>
        
        <div class="card metric-card metric-warning">
            <div class="metric-content">
                <div class="metric-icon">
                    <i class="fas fa-users-slash"></i>
                </div>
                <div class="metric-number"><?php echo e($partialEvacuated ?? 456); ?></div>
            </div>
            <p class="metric-label">Partial Evac</p>
        </div>
    </div>

    <!-- Main Dashboard Grid -->
    <div class="dashboard-grid">
        <!-- Main Content -->
        <div>
            <!-- Charts Section -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie text-primary me-2"></i>
                        Evacuation Analytics
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="text-center mb-3">
                                <div class="fw-semibold text-slate-700 mb-1">Status Distribution</div>
                                <small class="text-slate-500">Current evacuation status</small>
                            </div>
                            <div class="chart-container">
                                <canvas id="pieChart"></canvas>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-center mb-3">
                                <div class="fw-semibold text-slate-700 mb-1">By Barangay</div>
                                <small class="text-slate-500">Households evacuated per barangay</small>
                            </div>
                            <div class="chart-container">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Household Tracker - ENHANCED -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-home text-primary me-2"></i>
                        Household Tracker
                    </h3>
                    <div class="filters-row">
                        <select id="barangayFilter" class="form-select form-select-sm" style="min-width: 180px;">
                            <option value="">All Barangays</option>
                            <option value="camalaniugan">Camalaniugan Centro</option>
                            <option value="lugod">Lugod</option>
                            <option value="dacal">Dacal</option>
                            <option value="poblacion">Poblacion</option>
                            <option value="san-agustin">San Agustin</option>
                        </select>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-container">
                        <table id="householdTable" class="table">
                            <thead>
                                <tr>
                                    <th>Barangay</th>
                                    <th>Total HH</th>
                                    <th>Evacuated</th>
                                    <th>Not Evac</th>
                                    <th>Partial</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Content -->
        <div>
            <!-- Evacuation Centers -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">
                    <i class="fas fa-building text-success me-2"></i>
                    Evacuation Centers
                </h3>
            </div>
            <div class="card-body p-0">
                <div class="table-container">
                    <table class="table table-compact table-bordered">
                        <thead>
                            <tr>
                                <th class="col-center">Center</th>
                                <th class="col-capacity">Cap.</th>
                                <th class="col-current">Curr.</th>
                                <th class="col-status">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Camalaniugan Central School</td>
                                <td>500</td>
                                <td>387</td>
                                <td><span class="status-badge status-full">77%</span></td>
                            </tr>
                            <tr>
                                <td>Lugod Barangay Hall</td>
                                <td>250</td>
                                <td>89</td>
                                <td><span class="status-badge status-good">36%</span></td>
                            </tr>
                            <tr>
                                <td>Dacal Church</td>
                                <td>300</td>
                                <td>245</td>
                                <td><span class="status-badge status-warning">82%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <!-- Recent Alerts -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-bell text-danger me-2"></i>
                        Recent Alerts
                    </h3>
                </div>
                <div class="card-body">
                    <div class="alert-item">
                        <div class="status-dot" style="background: var(--danger);"></div>
                        <div>Central School at 95% capacity</div>
                    </div>
                    <div class="alert-item">
                        <div class="status-dot" style="background: var(--warning);"></div>
                        <div>Low evacuation in Lugod (23%)</div>
                    </div>
                    <div class="alert-item">
                        <div class="status-dot" style="background: var(--danger);"></div>
                        <div>Dacal Church needs supplies</div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-clock text-primary me-2"></i>
                        Recent Activity
                    </h3>
                </div>
                <div class="card-body">
                    <div class="activity-item">
                        <div class="status-dot" style="background: var(--primary);"></div>
                        <div>Admin updated 127 records</div>
                    </div>
                    <div class="activity-item">
                        <div class="status-dot" style="background: var(--success);"></div>
                        <div>Added 34 new households</div>
                    </div>
                    <div class="activity-item">
                        <div class="status-dot" style="background: #8b5cf6;"></div>
                        <div>Barangay Centro report approved</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FULL WIDTH MAP (Bottom of both sides) -->
    <div class="full-width-map-section">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title mb-0">
                    <i class="fas fa-map-marker-alt text-secondary me-2"></i>
                    Evacuation Map - All Barangays
                </h3>
            </div>
            <div class="card-body p-0">
                <div id="map" class="map-container"></div>
                <div class="map-legend">
                    <div class="legend-item">
                        <div class="legend-color" style="background: var(--success);"></div>
                        <span>Safe Zone</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: var(--warning);"></div>
                        <span>Partial Evac</span>
                    </div>
                    <div class="legend-item">
                        <div class="legend-color" style="background: var(--danger);"></div>
                        <span>Critical Zone</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>
(function() {
    'use strict';
    
    // Wait for everything to load
    function initDashboard() {
        // Sample data - your database values
        const chartData = {
            evacuated: <?php echo e($totalEvacuated ?? 2847); ?>,
            notEvacuated: <?php echo e($notEvacuated ?? 1234); ?>,
            partial: <?php echo e($partialEvacuated ?? 456); ?>,
            barangayNames: ['Centro', 'Lugod', 'Dacal', 'Poblacion', 'S. Agustin'],
            evacuatedData: [847, 234, 678, 456, 632]
        };

        // Initialize Charts with FIXED colors
        function initCharts() {
            const pieCtx = document.getElementById('pieChart');
            const barCtx = document.getElementById('barChart');
            
            if (!pieCtx || !barCtx) {
                console.warn('Chart canvases not found');
                return;
            }

            // Pie Chart - FIXED COLORS
            new Chart(pieCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Evacuated', 'Not Evacuated', 'Partial'],
                    datasets: [{
                        data: [chartData.evacuated, chartData.notEvacuated, chartData.partial],
                        backgroundColor: [
                            'rgb(5, 150, 105)',  // success
                            'rgb(220, 38, 38)',  // danger  
                            'rgb(217, 119, 6)'   // warning
                        ],
                        borderColor: '#ffffff',
                        borderWidth: 3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                usePointStyle: true,
                                color: 'rgb(30, 64, 175)'
                            }
                        }
                    }
                }
            });

            // Bar Chart - FIXED COLORS
            new Chart(barCtx, {
                type: 'bar',
                data: {
                    labels: chartData.barangayNames,
                    datasets: [{
                        label: 'Evacuated Households',
                        data: chartData.evacuatedData,
                        backgroundColor: 'rgba(5, 150, 105, 0.8)',
                        borderColor: 'rgb(5, 150, 105)',
                        borderWidth: 1,
                        borderRadius: 8,
                        borderSkipped: false
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: 'rgba(0,0,0,0.05)' },
                            ticks: { color: 'rgb(100, 116, 139)' }
                        },
                        x: {
                            grid: { display: false },
                            ticks: { color: 'rgb(100, 116, 139)' }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: { color: 'rgb(30, 64, 175)' }
                        }
                    }
                }
            });
        }

        // Initialize Map - FIXED
        function initMap() {
            const mapElement = document.getElementById('map');
            if (!mapElement) {
                console.warn('Map element not found');
                return;
            }

            // Ensure map has height
            mapElement.style.height = '220px';
            mapElement.style.width = '100%';

            const map = L.map('map').setView([18.2928, 121.6861], 13);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors',
                maxZoom: 18
            }).addTo(map);

            // Evac centers with color coding
            const centers = [
                { name: 'Central School', lat: 18.2928, lng: 121.6861, capacity: 500, occupied: 387 },
                { name: 'Lugod Hall', lat: 18.2885, lng: 121.6823, capacity: 250, occupied: 89 },
                { name: 'Dacal Church', lat: 18.2952, lng: 121.6897, capacity: 300, occupied: 245 }
            ];

            centers.forEach(center => {
                const percentage = center.occupied / center.capacity;
                let fillColor = percentage > 0.8 ? '#ef4444' : 
                               percentage > 0.5 ? '#f59e0b' : '#10b981';
                
                const marker = L.circleMarker([center.lat, center.lng], {
                    radius: 10,
                    fillColor: fillColor,
                    color: '#ffffff',
                    weight: 3,
                    opacity: 1,
                    fillOpacity: 0.85
                }).addTo(map);
                
                marker.bindPopup(`
                    <div class="p-2">
                        <b>${center.name}</b><br>
                        <small>Capacity: ${center.capacity}</small><br>
                        <small>Current: ${center.occupied}</small><br>
                        <strong>${Math.round(percentage*100)}% Full</strong>
                    </div>
                `);
            });
        }

        // Household table population
        function populateHouseholdTable() {
            const tbody = document.querySelector('#householdTable tbody');
            if (!tbody) return;

            const householdData = [
                { barangay: 'Camalaniugan Centro', total: 1247, evac: 847, not: 234, partial: 166 },
                { barangay: 'Lugod', total: 892, evac: 234, not: 512, partial: 146 },
                { barangay: 'Dacal', total: 1567, evac: 678, not: 123, partial: 234 },
                { barangay: 'Poblacion', total: 987, evac: 456, not: 345, partial: 186 },
                { barangay: 'San Agustin', total: 1199, evac: 632, not: 20, partial: 89 }
            ];
            
            tbody.innerHTML = '';
            
            householdData.forEach(row => {
                const progress = Math.round((row.evac / row.total) * 100);
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td><div class="fw-semibold">${row.barangay}</div></td>
                    <td>${row.total.toLocaleString()}</td>
                    <td class="text-success fw-semibold">${row.evac.toLocaleString()}</td>
                    <td class="text-danger fw-semibold">${row.not.toLocaleString()}</td>
                    <td class="text-warning fw-semibold">${row.partial.toLocaleString()}</td>
                    <td>
                        <div class="table-progress">
                            <div class="table-progress-fill" style="width: ${progress}%"></div>
                        </div>
                        <small class="text-slate-600">${progress}%</small>
                    </td>
                `;
                tbody.appendChild(tr);
            });
        }

        // Initialize everything
        try {
            initCharts();
            initMap();
            populateHouseholdTable();
            console.log('✅ Dashboard initialized successfully');
        } catch (error) {
            console.error('❌ Dashboard init error:', error);
        }
    }

    // Run when DOM is fully loaded
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initDashboard);
    } else {
        initDashboard();
    }

    // Populate Household Table
    function populateHouseholdTable() {
        const tbody = document.querySelector('#householdTable tbody');
        if (!tbody) return;

        tbody.innerHTML = '';
        
        householdData.forEach(row => {
            const tr = document.createElement('tr');
            tr.dataset.status = row.status;
            tr.dataset.barangay = row.barangay.toLowerCase().replace(/\s+/g, '-');
            
            const progress = Math.round((row.evac / row.total) * 100);
            
            tr.innerHTML = `
                <td>
                    <div class="fw-semibold">${row.barangay}</div>
                </td>
                <td>${row.total.toLocaleString()}</td>
                <td class="text-success fw-semibold">${row.evac.toLocaleString()}</td>
                <td class="text-danger fw-semibold">${row.not.toLocaleString()}</td>
                <td class="text-warning fw-semibold">${row.partial.toLocaleString()}</td>
                <td>
                    <div class="table-progress">
                        <div class="table-progress-fill" style="width: ${progress}%"></div>
                    </div>
                    <small class="text-slate-600">${progress}%</small>
                </td>
            `;
            tbody.appendChild(tr);
        });
    }

    // Filter Table Function
    window.filterTable = function(status = 'all') {
        const rows = document.querySelectorAll('#householdTable tbody tr');
        const barangayFilter = document.getElementById('barangayFilter')?.value.toLowerCase() || '';
        
        rows.forEach(row => {
            const rowStatus = row.dataset.status;
            const rowBarangay = row.dataset.barangay;
            
            const statusMatch = status === 'all' || rowStatus === status;
            const barangayMatch = !barangayFilter || rowBarangay.includes(barangayFilter);
            
            row.style.display = (statusMatch && barangayMatch) ? '' : 'none';
        });
    };

    // Filter Buttons (if you add them)
    document.addEventListener('click', function(e) {
        if (e.target.matches('[data-filter-status]')) {
            filterTable(e.target.dataset.filterStatus);
        }
    });

    // Initialize everything when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        initCharts();
        initMap();
        populateHouseholdTable();
        
        // Barangay filter event
        const barangayFilter = document.getElementById('barangayFilter');
        if (barangayFilter) {
            barangayFilter.addEventListener('change', () => filterTable('all'));
        }

        // Animate metrics on scroll into view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateMetricNumbers(); // Use the new function
                    observer.unobserve(entry.target);
                }
            });
        });

        const metricsGrid = document.querySelector('.dashboard-metrics');
        if (metricsGrid) {
            observer.observe(metricsGrid);
        }
    });

    // Number animation function
    function animateMetricNumbers() {
        const metricNumbers = document.querySelectorAll('.metric-number[data-target]');
        
        metricNumbers.forEach(element => {
            const target = parseInt(element.dataset.target);
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current).toLocaleString();
            }, 16);
        });
    }

    // Add some interactive hover effects
    document.addEventListener('mouseenter', function(e) {
        if (e.target.closest('.activity-item, .alert-item')) {
            e.target.closest('.activity-item, .alert-item').style.transform = 'translateX(4px)';
        }
    }, true);

    document.addEventListener('mouseleave', function(e) {
        if (e.target.closest('.activity-item, .alert-item')) {
            e.target.closest('.activity-item, .alert-item').style.transform = 'translateX(0)';
        }
    }, true);

})();
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.superlayout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\proto\Prototype_compy - Copy - Copy\resources\views/AdminPages/adminDashboard.blade.php ENDPATH**/ ?>