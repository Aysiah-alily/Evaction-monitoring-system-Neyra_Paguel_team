@extends('layouts.user')

@section('title', 'Evacuation Requests')

@section('content')
<h1>📋 Evacuation Requests</h1>

<p style="color: #706f6c; margin-bottom: 2rem;">Total Requests: <strong>{{ $evacuations->count() }}</strong></p>

@if($evacuations->isEmpty())
    <div style="text-align: center; padding: 3rem; background: #f9f9f9; border-radius: 4px;">
        <p style="font-size: 1.1rem; color: #706f6c;">No evacuation requests yet.</p>
        <p><a href="{{ route('evacuations.create') }}" class="btn" style="margin-top: 1rem; text-decoration: none;">📤 Report One Now</a></p>
    </div>
@else
    <ul>
        @foreach($evacuations as $evacuation)
            <li>
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <div style="font-weight: 600; font-size: 1.1rem;">{{ $evacuation->name }}</div>
                        <div style="font-size: 0.9rem; color: #706f6c;">📍 {{ $evacuation->location }}</div>
                    </div>
                    <div style="text-align: right;">
                        <span class="badge badge-{{ strtolower($evacuation->urgency) }}">{{ ucfirst($evacuation->urgency) }}</span>
                        <br />
                        <span class="badge badge-pending" style="margin-top: 0.5rem;">{{ ucfirst($evacuation->status) }}</span>
                    </div>
                </div>
                <div style="margin-top: 1rem;">
                    <div style="font-size: 0.9rem;">
                        <strong>👥 People:</strong> {{ $evacuation->people_count ?? 'Not specified' }} &nbsp; | &nbsp;
                        <strong>📅 Reported:</strong> {{ $evacuation->created_at->format('M d, Y \a\t h:i A') }}
                    </div>
                    @if($evacuation->notes)
                        <div style="margin-top: 0.75rem; font-size: 0.9rem; color: #706f6c;">
                            <strong>Notes:</strong> {{ Str::limit($evacuation->notes, 150) }}
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
@endif

<div style="margin-top: 2rem;">
    <a href="{{ route('evacuations.create') }}" class="btn">+ Report New Evacuation</a>
</div>
@endsection
