@extends('layouts.user')

@section('title', 'Disaster Tracking - MDRRMO Camalaniugan')

@section('content')
<div class="section">
    <!-- Alert Section -->
    <div style="background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%);
                color: white; 
                padding: 2rem; 
                border-radius: 1rem; 
                margin-bottom: 2rem;">
        <h2 style="font-size: 2rem; margin-bottom: 0.5rem;">
            Relief Camps in Camalaniugan
        </h2>
        <p style="font-size: 1rem; margin-bottom: 0.5rem;">
            Camps established for flood victims in the municipality.
        </p>
        <small style="opacity: 0.8;">{{ now()->format('M j, Y, g:i A') }}</small>
    </div>

    <!-- Map Section -->
    <div style="background: white; 
                padding: 1rem; 
                border-radius: 0.5rem; 
                border: 1px solid #e5e7eb; 
                margin-bottom: 2rem;">
        <h3 style="color: #dc2626; font-size: 1.5rem; margin-bottom: 1rem;">
            Live Disaster Tracking Map
        </h3>
        <div id="map" style="height: 500px; border-radius: 0.5rem; width: 100%;"></div>
        <div style="text-align: right; margin-top: 1rem;">
            <button class="btn btn-primary" 
                    style="background: #dc2626; color: white; padding: 0.75rem 1.5rem; border-radius: 0.5rem;"
                    onclick="trackLocation()">
                Track My Location
            </button>
        </div>
    </div>

    <!-- Status Notifications -->
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem;">
        <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
            <p style="color: #16a34a; margin: 0;">No disasters reported in your vicinity.</p>
        </div>
        <div style="background: #f9fafb; padding: 1rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
            <p style="color: #2563eb; margin: 0;">Location tracked successfully!</p>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    @push('scripts')
    <!-- Leaflet CSS & JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        // Declare map globally so all functions can access it
        var map;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map centered on Camalaniugan
            map = L.map('map').setView([18.2766, 121.6716], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            // Example markers
            L.marker([18.2766, 121.6716]).addTo(map).bindPopup('Camalaniugan Town Center');
            L.marker([18.2800, 121.6800]).addTo(map).bindPopup('Evacuation Center 1');
            L.marker([18.2700, 121.6600]).addTo(map).bindPopup('Evacuation Center 2');
        });

        // Track user location function
        function trackLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;

                        // Add user location marker with popup
                        L.marker([lat, lng]).addTo(map)
                            .bindPopup('<strong>Your Location</strong>')
                            .openPopup();

                        // Pan map to user location
                        map.setView([lat, lng], 15);

                        // Optional: show a notification
                        alert('Location tracked successfully!');
                    },
                    function(error) {
                        alert('Unable to retrieve your location. Please enable location services.');
                    }
                );
            } else {
                alert('Geolocation is not supported by your browser.');
            }
        }
    </script>
@endpush