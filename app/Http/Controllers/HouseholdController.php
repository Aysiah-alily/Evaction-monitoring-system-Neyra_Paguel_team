<?php

namespace App\Http\Controllers;

use App\Models\Household;
use App\Models\FamilyMember;
use App\Models\Purok;
use Illuminate\Http\Request;

class HouseholdController extends Controller
{
    public function index(Request $request)
    {
        $query = Household::with('familyMembers');

        if ($request->purok) {
            $query->where('purok', $request->purok);
        }

        if ($request->priority_status) {
            $query->where('priority_status', $request->priority_status);
        }

        $households = $query->paginate(10);

        return view('BarangayPages.households', compact('households'));
    }

    public function create()
    {
        $puroks = \App\Models\Purok::all();
        return view('BarangayPages.households.create', compact('puroks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'household_name' => 'required|string|max:255',
            'purok' => 'required|string|max:255',
            'barangay_name' => 'required|string|max:255',
            'street_name' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'head_surname' => 'required|string|max:255',
            'head_firstname' => 'required|string|max:255',
            'head_middlename' => 'nullable|string|max:255',
            'gender' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Widowed,Separated',
            'age' => 'required|integer|min:0|max:120',
            'priority_status' => 'required|in:High,Moderate,Low',
            'priority_indicator' => 'nullable|array',
            'priority_indicator.*' => 'string',
            'date_registered' => 'required|date',
            'family_member_name' => 'nullable|array',
            'family_member_relationship' => 'nullable|array',
            'family_member_age' => 'nullable|array',
        ]);

        // ✅ Remove manual JSON encoding - model handles it via $casts
        $household = Household::create($validated);

        if (isset($validated['family_member_name'])) {
            foreach ($validated['family_member_name'] as $index => $name) {
                if (!empty($name)) {
                    $household->familyMembers()->create([
                        'name' => $name,
                        'relationship' => $validated['family_member_relationship'][$index] ?? '',
                        'age' => $validated['family_member_age'][$index] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('households.index')->with('success', 'Household added successfully!');
    }

    public function edit(Household $household)
    {
        $household->load('familyMembers');
        $puroks = \App\Models\Purok::all();
        return view('BarangayPages.households.edit', compact('household', 'puroks'));
    }

    public function update(Request $request, Household $household)
    {
        $validated = $request->validate([
            'household_name' => 'required|string|max:255',
            'purok' => 'required|string|max:255',
            'barangay_name' => 'required|string|max:255',
            'street_name' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'head_surname' => 'required|string|max:255',
            'head_firstname' => 'required|string|max:255',
            'head_middlename' => 'nullable|string|max:255',
            'gender' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Widowed,Separated',
            'age' => 'required|integer|min:0|max:120',
            'priority_status' => 'required|in:High,Moderate,Low',
            'priority_indicator' => 'nullable|array',
            'priority_indicator.*' => 'string',
            'date_registered' => 'required|date',
            'family_member_name' => 'nullable|array',
            'family_member_relationship' => 'nullable|array',
            'family_member_age' => 'nullable|array',
        ]);

        // ✅ Remove manual JSON encoding
        $household->update($validated);

        $household->familyMembers()->delete();
        if (isset($validated['family_member_name'])) {
            foreach ($validated['family_member_name'] as $index => $name) {
                if (!empty($name)) {
                    $household->familyMembers()->create([
                        'name' => $name,
                        'relationship' => $validated['family_member_relationship'][$index] ?? '',
                        'age' => $validated['family_member_age'][$index] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('households.index')->with('success', 'Household updated successfully!');
    }

    public function destroy(Household $household)
    {
        $household->familyMembers()->delete();
        $household->delete();
        return redirect()->route('households.index')->with('success', 'Household deleted successfully!');
    }

    public function filter(Request $request)
    {
        $query = Household::with('familyMembers');

        if ($request->has('search') && !empty($request->search)) {
            $search = strtolower($request->search);
            $query->where(function($q) use ($search) {
                $q->whereRaw('LOWER(household_name) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(head_surname) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(head_firstname) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(barangay_name) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(street_name) LIKE ?', ["%{$search}%"])
                  ->orWhereRaw('LOWER(house_number) LIKE ?', ["%{$search}%"]);
            });
        }

        if ($request->has('purok') && !empty($request->purok)) {
            $query->where('purok', $request->purok);
        }

        if ($request->has('priority_status') && !empty($request->priority_status)) {
            $query->where('priority_status', $request->priority_status);
        }

        $households = $query->orderBy('created_at', 'DESC')->paginate(10);

        return view('BarangayPages.partials.household_rows', compact('households'))->render();
    }

    public function report()
    {
        // ✅ Fixed: Use priority_status instead of non-existent status field
        $totalHouseholds = Household::count();
        $highPriorityCount = Household::where('priority_status', 'High')->count();
        $moderatePriorityCount = Household::where('priority_status', 'Moderate')->count();
        $lowPriorityCount = Household::where('priority_status', 'Low')->count();

        $demographics = [
            'labels' => ['High Priority', 'Moderate Priority', 'Low Priority'],
            'data'   => [$highPriorityCount, $moderatePriorityCount, $lowPriorityCount]
        ];

        $households = Household::with('familyMembers')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('household.report', compact(
            'totalHouseholds', 
            'highPriorityCount', 
            'moderatePriorityCount', 
            'lowPriorityCount', 
            'demographics', 
            'households'
        ));
    }

     public function show(Household $household)
    {
        $puroks = Purok::all();
         return view('BarangayPages.households.show', compact('household', 'puroks'));
    }

    /**
     * Bulk edit households (for index page bulk actions)
     */
    public function bulkEdit(Request $request)
    {
        $householdIds = $request->input('household_ids', []);
        $households = Household::whereIn('id', $householdIds)->get();
        return view('households.bulk-edit', compact('households'));
    }

    /**
     * Bulk delete households
     */
    public function bulkDestroy(Request $request)
    {
        $householdIds = $request->input('household_ids', []);
        
        Household::whereIn('id', $householdIds)->delete();
        
        return redirect()->route('households.index')
            ->with('success', count($householdIds) . ' household(s) deleted successfully!');
    }

    /**
     * Bulk create family members (placeholder)
     */
    public function membersBulkCreate(Request $request)
    {
        $householdIds = $request->input('household_ids', []);
        // Implement bulk family member creation logic here
        return redirect()->route('households.index')
            ->with('success', 'Bulk member creation initiated!');
    }

}