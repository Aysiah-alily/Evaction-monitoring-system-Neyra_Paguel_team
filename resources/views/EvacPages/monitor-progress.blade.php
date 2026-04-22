@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="page-header mb-3">
        <h1 class="page-title">
            <span class="page-title-icon"></span>
        </h1>
    </div>

  <div class="row">
        <!-- Total Evacuees -->
        <div class="col-xl-4 col-md-7 mb-4">
            <div class="card border-left-primary h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Total Evacuees</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">{{ $barangayCounts->sum('total') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Household Status Card -->
<div class="col-xl-4 col-md-7 mb-4">
    <div id="household-toggle-card" class="card button-card h-100 py-2 text-center">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-md font-weight-bold text-uppercase mb-1">Household Status</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-home fa-3x"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.button-card {
    cursor: pointer;
    border-radius: 12px;
    transition: all 0.2s;
    background-color: #ffe6cc; /* soft light orange */
    border: 1px solid #ff9a4d;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.button-card:hover {
    background-color: #ffcc80; /* brighter orange on hover */
    transform: translateY(-3px);
    box-shadow: 0 8px 15px rgba(255,165,0,0.4);
}

.button-card:active {
    transform: translateY(1px);
    box-shadow: 0 4px 8px rgba(255,165,0,0.3);
}

/* Hide table by default */
#household-toggle-content {
    display: none;
    margin-top:10px;
}

#household-toggle-content table {
    border-radius: 12px;
    overflow: hidden;
}

#household-toggle-content thead {
    background-color: #222020;
    font-weight: bold;
    color: #fff;
}

#household-toggle-content tbody tr:hover {
    background-color: #ffd699; /* light orange hover effect */
    transition: background-color 0.2s;
}

#household-toggle-content td {
    vertical-align: middle;
}
</style>

<!-- Household Table (hidden by default) -->
<div id="household-toggle-content" class="mb-3">
    <div class="table-responsive p-2" style="background-color: #fff; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <table class="table table-sm table-bordered h-10 text-center mb-0">
            <thead class="bg-light">
                <tr>
                    <th>Barangay</th>
                    <th>Evacuated</th>
                    <th>Not Evacuated</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($barangayCounts as $barangay)
                    @php
                        $totalHouseholds = $evacuees->where('barangay', $barangay->barangay)->count();
                        $evacuatedHouseholds = $evacuees->where('barangay', $barangay->barangay)->where('is_evacuated', 1)->count();
                        $notEvacuatedHouseholds = $totalHouseholds - $evacuatedHouseholds;
                    @endphp
                    <tr>
                        <td>{{ $barangay->barangay }}</td>
                        <td>{{ $evacuatedHouseholds }}</td>
                        <td>{{ $notEvacuatedHouseholds }}</td>
                        <td>{{ $totalHouseholds }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleCard = document.getElementById('household-toggle-card');
    const toggleContent = document.getElementById('household-toggle-content');

    toggleCard.addEventListener('click', function() {
        toggleContent.style.display = toggleContent.style.display === 'none' ? 'block' : 'none';
    });
});
</script>
 
<div class="col-xl-11 mb-3">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h5 class="mb-0">Evacuees Count per Barangay</h5>
        </div>
        <div class="card-body">
            <canvas id="barangayChart" height="50"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
@if(!$barangayCounts->isEmpty())
const ctx = document.getElementById('barangayChart').getContext('2d');

const labels = {!! json_encode($barangayCounts->pluck('barangay')) !!};
const data = {!! json_encode($barangayCounts->pluck('total')) !!};

// Unique color per barangay
const backgroundColors = labels.map(() => `hsl(${Math.floor(Math.random() * 360)}, 60%, 70%)`);

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Evacuees',
            data: data,
            backgroundColor: backgroundColors,
            borderWidth: 0,
            barPercentage: 0.6,
            categoryPercentage: 0.6
        }]
    },
    options: {
        indexAxis: 'y', // horizontal bars
        responsive: true,
        plugins: {
            legend: { display: false },
            datalabels: { display: false } // hide labels completely
        },
        scales: {
            x: {
                beginAtZero: true,
                grid: { drawTicks: false, drawOnChartArea: false },
                ticks: { display: false } // remove x-axis numbers
            },
            y: {
                ticks: { color: '#000', font: { size: 10 } },
                grid: { drawTicks: false, drawOnChartArea: false }
            }
        }
    },
    plugins: [
        ChartDataLabels,
        {
            id: 'barShadow',
            beforeDraw: (chart) => {
                const ctx = chart.ctx;
                chart.data.datasets.forEach((dataset, i) => {
                    chart.getDatasetMeta(i).data.forEach((bar, index) => {
                        ctx.save();
                        ctx.shadowColor = 'rgba(0,0,0,0.3)';
                        ctx.shadowBlur = 5;
                        ctx.shadowOffsetX = 0;
                        ctx.shadowOffsetY = 0;
                        ctx.fillStyle = dataset.backgroundColor[index];
                        ctx.fillRect(bar.x - bar.width, bar.y, bar.width, bar.height);
                        ctx.restore();
                    });
                });
            }
        }
    ]
});
@endif
</script>
    <!-- Evacuee List -->
 <div class="col-lx-11 mb-5">
            <div class="card shadow-sm border-0 h-50">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Registered Evacues</h5>
                </div>
                <div class="card-body p-0">
                    @if($evacuees->isEmpty())
                        <p class="text-center p-3 text-muted">No evacuees registered yet.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-striped mb-0" id="evacueeTable">
                                <thead>
                                    <tr>

                               <th>#</th>
                                        <th>Household Head</th>
                                        <th>Barangay</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($evacuees as $index => $evacuee)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $evacuee->last_name }}, {{ $evacuee->first_name }}</td>
                                            <td>{{ $evacuee->barangay ?? 'N/A' }}</td>
                                            <td>
                                                @if($evacuee->is_evacuated)
                                                    <span class="badge bg-success">Evacuated</span>
                                                @else
                                                    <span class="badge bg-warning text-dark">Not Evacuated</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm remove-row" data-id="{{ $evacuee->id }}">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0"></script> <!-- Data Labels Plugin -->

<script>
    // Delete evacuee via AJAX
    document.querySelectorAll('.remove-row').forEach(function(button) {
        button.addEventListener('click', function() {
            let evacueeId = this.dataset.id;
            if(confirm('Are you sure you want to delete this evacuee?')) {
                fetch(`/evacuees/${evacueeId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    if(response.ok) {
                        this.closest('tr').remove();
                        location.reload(); // Refresh chart
                    }
                });
            }
        });
    });

    // Render Bar Chart
</script>

@endsection