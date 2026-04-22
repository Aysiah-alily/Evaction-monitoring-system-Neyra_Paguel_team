@foreach($households as $household)
    <tr class="household-rows" 
        data-search="{{ strtolower($household->household_name . ' ' . $household->head_of_family) }}" 
        data-barangay="{{ $household->barangay->name ?? '' }}" 
        data-status="{{ $household->status }}">
        <td>
            <div style="display: flex; align-items: center; gap: 0.75rem;">
                <div style="width: 36px; height: 36px; background: linear-gradient(135deg, #dc2626 0%, #991b1b 100%); border-radius: 0.5rem; display: flex; align-items: center; justify-content: center;">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="white"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                </div>
                <span style="font-weight: 600;">{{ $household->household_name }}</span>
            </div>
        </td>
        <td>{{ $household->head_of_family }}</td>
        <td>
            @if($household->barangay)
                <span style="display: inline-block; padding: 0.375rem 0.75rem; background: #f1f5f9; border-radius: 0.5rem; font-size: 0.85rem;">{{ $household->barangay->name }}</span>
            @else
                <span style="color: #94a3b8; font-style: italic;">Not assigned</span>
            @endif
        </td>
        <td>
            @php
                $statusClass = '';
                if($household->status == 'Evacuated') $statusClass = 'status-evacuated';
                elseif($household->status == 'Returned') $statusClass = 'status-returned';
                elseif($household->status == 'Missing') $statusClass = 'status-missing';
                else $statusClass = 'status-not';
            @endphp
            <span class="status-badge {{ $statusClass }}">{{ $household->status }}</span>
        </td>
        <td>{{ $household->created_at->format('M d, Y') }}</td>
        <td>
            <div style="display: flex; gap: 0.5rem; justify-content: center;">
                <a href="{{ route('households.show', $household->id) }}" class="action-btn view" title="View" style="display: inline-flex; align-items: center; gap: 0.25rem; padding: 0.5rem 0.75rem; font-size: 0.8rem; font-weight: 500; border-radius: 0.5rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: rgba(14, 165, 233, 0.1); color: #0ea5e9;">
                    <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/></svg>
                </a>
                <a href="{{ route('households.edit', $household->id) }}" class="action-btn edit" title="Edit" style="display: inline-flex; align-items: center; gap: 0.25rem; padding: 0.5rem 0.75rem; font-size: 0.8rem; font-weight: 500; border-radius: 0.5rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: rgba(220, 38, 38, 0.1); color: #dc2626;">
                    <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>
                </a>
                <form method="POST" action="{{ route('households.destroy', $household->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="action-btn delete" title="Delete" onclick="return confirm('Are you sure you want to delete this household?')" style="display: inline-flex; align-items: center; gap: 0.25rem; padding: 0.5rem 0.75rem; font-size: 0.8rem; font-weight: 500; border-radius: 0.5rem; text-decoration: none; transition: all 0.3s ease; border: none; cursor: pointer; background: rgba(239, 68, 68, 0.1); color: #ef4444;">
                        <svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor"><path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/></svg>
                    </button>
                </form>
            </div>
        </td>
    </tr>
@endforeach