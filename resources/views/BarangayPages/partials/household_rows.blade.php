@if($households->count() > 0)
    @foreach($households as $household)
        <tr class="household-rows" 
            data-search="{{ strtolower($household->household_name . ' ' . $household->head_surname . ' ' . $household->head_firstname . ' ' . ($household->barangay_name ?? '') . ' ' . ($household->street_name ?? '') . ' ' . ($household->house_number ?? '')) }}" 
            data-purok="{{ $household->purok ?? '' }}" 
            data-priority="{{ $household->priority_status ?? '' }}">
            
            <!-- ✅ NEW: Checkbox Column (Added as FIRST column) -->
            <td class="select-col text-center">
                <input type="checkbox" 
                       name="household_ids[]" 
                       value="{{ $household->id }}" 
                       class="form-check-input household-checkbox"
                       style="width: 18px; height: 18px; cursor: pointer;">
            </td>

            <!-- 1. ID Column (Shifted right) -->
            <td class="text-center fw-bold text-muted">{{ $household->id }}</td>

            <!-- 2. Household Name -->
            <td>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                    <span style="font-weight: 600;">{{ $household->household_name }}</span>
                </div>
            </td>

            <td>
                <div style="font-weight: 500;">{{ $household->head_surname }}, {{ $household->head_firstname }}</div>
                @if($household->head_middlename)
                    <div style="font-size: 0.85rem; color: #6b7280;">{{ $household->head_middlename }}</div>
                @endif
            </td>

            <td>
                <div style="font-size:0.85rem; color:#6b7280;">
                    {{ $household->barangay_name ?? '' }} {{ $household->street_name ?? '' }} {{ $household->house_number ?? '' }}
                </div>
            </td>

            <td>
                @if($household->purok)
                    <span style="display: inline-block; padding: 0.375rem 0.75rem; background: #f1f5f9; border-radius: 0.5rem; font-size: 0.85rem;">{{ $household->purok }}</span>
                @else
                    <span style="color: #94a3b8; font-style: italic;">Not assigned</span>
                @endif
            </td>

            <td>
                @php
                    $priorityClass = '';
                    if($household->priority_status == 'High') $priorityClass = 'priority-high';
                    elseif($household->priority_status == 'Moderate') $priorityClass = 'priority-moderate';
                    else $priorityClass = 'priority-low';
                @endphp
                <span class="priority-badge {{ $priorityClass }}">{{ $household->priority_status }}</span>
            </td>

            <td>{{ $household->date_registered->format('M d, Y') }}</td>

            <td>
                <div class="action-buttons">
                    <button class="action-btn btn-view" onclick="callHousehold({{ $household->id }})" title="Call">
                        <i class="fas fa-phone"></i>
                    </button>

                    <button class="action-btn btn-view" onclick="emailHousehold({{ $household->id }})" title="Email">
                        <i class="fas fa-envelope"></i>
                    </button>

                    <div class="dropdown">
                        <button class="action-btn btn-view" data-bs-toggle="dropdown" title="More">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('households.edit', $household->id) }}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{ route('households.show', $household->id) }}">View</a></li>
                            <li><a class="dropdown-item text-danger" href="#" onclick="deleteHousehold({{ $household->id }})">Delete</a></li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="9" class="text-center text-muted" style="padding: 2rem;"> <!-- ✅ Changed to 9 columns -->
            <i class="fas fa-inbox" style="font-size: 2rem; color: #94a3b8; margin-bottom: 0.5rem;"></i>
            <p style="margin: 0;">No households found.</p>
        </td>
    </tr>
@endif