@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Evacuation Center Tracking</h4>

    <div class="table-responsive">
        <table class="table table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Center Name</th>
                    <th>Barangay</th>
                    <th>Address</th>
                    <th>Capacity</th>
                    <th>Evacuees</th>
                    <th>Available</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($centers as $index => $center)
                @php
                    $capacity = $center->capacity ?? 0;
                    $current = $center->evacuees_count;
                    $available = $capacity - $current;
                @endphp

                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $center->name }}</td>

                    <!-- Barangay from relationship -->
                    <td>{{ $center->barangay->name ?? 'N/A' }}</td>

                    <td>{{ $center->address }}</td>
                    <td>{{ $capacity }}</td>
                    <td>{{ $current }}</td>
                    <td>{{ $available }}</td>

                    <td>
                        @if(!$center->is_active)
                            <span class="badge bg-secondary">Inactive</span>
                        @elseif($current >= $capacity)
                            <span class="badge bg-danger">Full</span>
                        @elseif($current >= ($capacity * 0.7))
                            <span class="badge bg-warning">Nearly Full</span>
                        @else
                            <span class="badge bg-success">Available</span>
                        @endif
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection