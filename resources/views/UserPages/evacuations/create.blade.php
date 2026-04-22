@extends('layouts.user')

@section('title', 'Report Evacuation')

@section('content')
<h1>🚨 Report an Evacuation</h1>

@if(session('success'))
    <div class="alert alert-success">✓ {{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-error">
        <strong>Please fix the following errors:</strong>
        <ul style="margin: 10px 0 0 20px;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('evacuations.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Your Full Name *</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="John Doe" />
        @error('name') <small style="color: #d42800;">{{ $message }}</small> @enderror
    </div>

    <div class="form-group">
        <label for="location">Location / Address *</label>
        <input type="text" id="location" name="location" value="{{ old('location') }}" required placeholder="Building A, Floor 3" />
        @error('location') <small style="color: #d42800;">{{ $message }}</small> @enderror
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
        <div class="form-group" style="margin-bottom: 0;">
            <label for="people_count">Number of People (optional)</label>
            <input type="number" id="people_count" name="people_count" value="{{ old('people_count') }}" min="1" placeholder="0" />
            @error('people_count') <small style="color: #d42800;">{{ $message }}</small> @enderror
        </div>

        <div class="form-group" style="margin-bottom: 0;">
            <label for="urgency">Urgency Level *</label>
            <select id="urgency" name="urgency" required>
                <option value="">-- Select --</option>
                <option value="low" {{ old('urgency') === 'low' ? 'selected' : '' }}>Low Priority</option>
                <option value="medium" {{ old('urgency') === 'medium' ? 'selected' : '' }}>Medium Priority</option>
                <option value="high" {{ old('urgency') === 'high' ? 'selected' : '' }}>High Priority</option>
            </select>
            @error('urgency') <small style="color: #d42800;">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="form-group">
        <label for="notes">Additional Notes</label>
        <textarea id="notes" name="notes" placeholder="Provide any additional details...">{{ old('notes') }}</textarea>
        @error('notes') <small style="color: #d42800;">{{ $message }}</small> @enderror
    </div>

    <div style="margin-top: 2rem;">
        <button type="submit" class="btn">📤 Submit Evacuation Request</button>
        <a href="{{ route('evacuations.index') }}" class="btn btn-secondary" style="margin-left: 0.5rem; text-decoration: none;">View Requests</a>
    </div>
</form>
@endsection
