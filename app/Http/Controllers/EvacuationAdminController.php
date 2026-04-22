<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DafacRegistration;
use App\Models\DafacFamilyMember;
use App\Models\DafacAssistanceRecord;
use Illuminate\Support\Facades\DB;
use App\Models\Household;
use App\Models\Evacuee;
use App\Models\EvacuationCenter;



class EvacuationAdminController extends Controller
{
    // Dashboard page
  

public function dashboard()
{
    // Count total families from DAFAC registrations
    $totalFamilies = DafacRegistration::count();
    $totalEvacuees = DafacFamilyMember::count(); // Or use distinct family IDs if needed

    // Pass to view
    return view('EvacPages.EvacAdmin', [
        'totalFamilies' => $totalFamilies,
        'totalEvacuees' => $totalEvacuees,
        // Other stats you might pass
        
    ]);
}
    // Registration list page
    

public function Registration()
{
    // Fetch all registrations, latest first
    $submissions = DafacRegistration::orderBy('created_at', 'desc')->get();

    // Pass to view
    return view('EvacPages.EvacRegistration', compact('submissions'));
}

    // Show DAFAC Form
    public function DAFACForm()
    {
        $regions = []; // Example: Region::all();
        return view('EvacPages.DAFACForm', compact('regions'));
    }

    // Store DAFAC form submission
public function storeDaFac(Request $request)
{
    // 1️⃣ Validate the main registration and nested arrays
    $validated = $request->validate([
        // Registration fields
        'region_id' => 'required',
        'province_id' => 'required',
        'city_muni_id' => 'required',
        'barangay_id' => 'required',
        'surname' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'middlename' => 'nullable|string|max:255',
        'gender' => 'required|string',
        'date_of_birth' => 'required|date',
        'age' => 'required|integer',
        'date_registered' => 'required|date',

        // Optional arrays
        'housing_status' => 'nullable|array',
        'vulnerable_group' => 'nullable|array',
        'housing_condition' => 'nullable|array',
        'casualty' => 'nullable|array',
        'health_condition' => 'nullable|array',

        // Family members validation
        'family_members' => 'required|array|min:1',
        'family_members.*.name' => 'required|string|max:255',
        'family_members.*.relationship' => 'required|string|max:255',
        'family_members.*.age' => 'required|integer',
        'family_members.*.gender' => 'required|string',
        'family_members.*.education' => 'nullable|string|max:255',
        'family_members.*.occupation' => 'nullable|string|max:255',
        'family_members.*.remarks' => 'nullable|string|max:255',

        // Assistance validation (optional)
        'assistance' => 'nullable|array',
        'assistance.*.date' => 'required_with:assistance|date',
        'assistance.*.family_member' => 'required_with:assistance|string',
        'assistance.*.type' => 'required_with:assistance|string',
        'assistance.*.quantity' => 'required_with:assistance|numeric',
        'assistance.*.cost' => 'required_with:assistance|numeric',
        'assistance.*.provider' => 'required_with:assistance|string',
        'assistance.*.signature' => 'nullable|string',
    ]);

    // 2️⃣ Wrap DB operations in a transaction
    DB::transaction(function () use ($request) {
        // Save registration
        $registration = DafacRegistration::create([
            'region_id' => $request->region_id,
            'province_id' => $request->province_id,
            'city_muni_id' => $request->city_muni_id,
            'barangay_id' => $request->barangay_id,
            'surname' => $request->surname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'housing_status' => $request->housing_status,
            'vulnerable_group' => $request->vulnerable_group,
            'housing_condition' => $request->housing_condition,
            'casualty' => $request->casualty,
            'health_condition' => $request->health_condition,
            'date_registered' => $request->date_registered,
        ]);

        // 3️⃣ Save family members
        foreach ($request->input('family_members') as $member) {
            DafacFamilyMember::create([
                'dafac_registration_id' => $registration->id,
                'name' => $member['name'],
                'relationship' => $member['relationship'],
                'age' => $member['age'],
                'gender' => $member['gender'],
                'education' => $member['education'] ?? null,
                'occupation' => $member['occupation'] ?? null,
                'remarks' => $member['remarks'] ?? null,
            ]);
        }

        // 4️⃣ Save assistance records (if any)
        if ($request->has('assistance')) {
            foreach ($request->assistance as $record) {
                DafacAssistanceRecord::create([
                    'dafac_registration_id' => $registration->id,
                    'date' => $record['date'],
                    'family_member' => $record['family_member'],
                    'type' => $record['type'],
                    'quantity' => $record['quantity'],
                    'cost' => $record['cost'],
                    'provider' => $record['provider'],
                    'signature' => $record['signature'] ?? null,
                ]);
            }
        }
    });

    // 5️⃣ Redirect back with success message
    return redirect()->route('EvacAdmin.Registration')
                     ->with('success', 'DAFAC Registration saved successfully!');
}


public function monitorProgress()
{
    // Load evacuees along with their household and evacuation center
    $evacuees = Evacuee::with(['household', 'evacuationCenter', 'familyMembers'])->get();

    // Count evacuees per barangay, include nulls as 'N/A'
    $barangayCounts = Evacuee::select(DB::raw("IFNULL(barangay, 'N/A') as barangay"))
                              ->selectRaw('COUNT(*) as total')
                              ->groupBy('barangay')
                              ->get();

    // Pass both evacuees and barangayCounts to the view
    return view('EvacPages.monitor-progress', compact('evacuees', 'barangayCounts'));
}
public function getLatestEvacuees()
{
    return Household::withCount('familyMembers')->latest()->get();
}
public function evacuationTracking()
{
    $centers = EvacuationCenter::with(['barangay'])
        ->withCount('evacuees')
        ->get();

    return view('EvacPages.evacuation-tracking', compact('centers'));
}
    
}