<?php

namespace App\Http\Controllers;

use App\Models\BarangayEvacuee;
use App\Models\Household;
use Illuminate\Http\Request;
use App\Models\Purok;
use App\Models\Evacuee;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class BarangayEvacController extends Controller
{
    public function index()
    {
        $evacuees = BarangayEvacuee::all();
        $potentialEvacuees = Household::where('priority_status', '=', 'High')
                                    ->orWhere('priority_status', '=', 'Moderate')
                                    ->orderByRaw("FIELD(priority_status, 'High', 'Moderate', 'Low')")
                                    ->limit(10)
                                    ->get();
        
        return view('BarangayPages.evacuation.dashboard', [
            'evacueeCount' => $evacuees->count(),
            'potentialCount' => $potentialEvacuees->count(),
        ]);
    }

    public function register()
    {
        $evacuees = BarangayEvacuee::all();
        $potentialEvacuees = Household::where('priority_status', '=', 'High')
                                    ->orWhere('priority_status', '=', 'Moderate')
                                    ->orderByRaw("FIELD(priority_status, 'High', 'Moderate', 'Low')")
                                    ->limit(10)
                                    ->get();
        
        // Get all puroks for the dropdown
        $puroks = Purok::select('purok_name')->distinct()->get();
        
        return view('BarangayPages.evacuation.register', [
            'evacueeCount' => $evacuees->count(),
            'potentialCount' => $potentialEvacuees->count(),
            'puroks' => $puroks,
        ]);
    }

   public function list()
    {
        $evacuees = BarangayEvacuee::latest()->get();
        $potentialEvacuees = Household::where('priority_status', '=', 'High')
                                    ->orWhere('priority_status', '=', 'Moderate')
                                    ->orderByRaw("FIELD(priority_status, 'High', 'Moderate', 'Low')")
                                    ->limit(10)
                                    ->get();
        
        return view('BarangayPages.evacuation.list', [
            'evacuees' => $evacuees,
            'evacueeCount' => $evacuees->count(),
            'potentialCount' => $potentialEvacuees->count(),
        ]);
    }

    public function potential()
    {
        $evacuees = BarangayEvacuee::all();
        
        // Get households with High and Moderate priority
        $potentialEvacuees = Household::potentialEvacuees()
                                    ->with('familyMembers')
                                    ->get();
        
        return view('BarangayPages.evacuation.potential', [
            'potentialEvacuees' => $potentialEvacuees,
            'evacueeCount' => $evacuees->count(),
            'potentialCount' => $potentialEvacuees->count(),
        ]);
    }

    public function destroyPotential($id)
    {
        try {
            $household = Household::findOrFail($id);
            $household->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Potential evacuee removed successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to remove potential evacuee: ' . $e->getMessage()
            ], 500);
        }
    }

    public function inventory()
    {
        $supplies = \App\Models\InventorySupply::all();
        $evacuees = BarangayEvacuee::all();
        $potentialEvacuees = Household::where('priority_status', '=', 'High')
                                    ->orWhere('priority_status', '=', 'Moderate')
                                    ->orderByRaw("FIELD(priority_status, 'High', 'Moderate', 'Low')")
                                    ->limit(10)
                                    ->get();
        
        return view('BarangayPages.evacuation.inventory', [
            'supplies' => $supplies,
            'evacueeCount' => $evacuees->count(),
            'potentialCount' => $potentialEvacuees->count(),
        ]);
    }
    public function updateEvacuee(Request $request, $id)
    {
        // ✅ DEBUG: Log incoming data
        \Log::info('Update request data:', $request->all());
        
        $evacuee = BarangayEvacuee::findOrFail($id);
        
        // ✅ FIX: Handle FormData + JSON family_members
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'nullable|integer|min:0|max:120',
            'gender' => 'required|in:Male,Female',
            'purok' => 'nullable|string|max:100',
            'medical_condition' => 'nullable|string|max:100',
            'center_assignment' => 'nullable|string|max:100',
            'status' => 'required|in:Registered,Pending',
            // ✅ Family members are optional
            'family_members' => 'nullable|array',
            'family_members.*.name' => 'nullable|string|max:255',
            'family_members.*.age' => 'nullable|integer|min:0|max:120',
            'family_members.*.relationship' => 'nullable|string|max:100',
            'family_members.*.medical_condition' => 'nullable|string|max:100',
        ]);
        
        try {
            // ✅ Update MAIN evacuee
            $evacuee->update([
                'name' => $validated['name'],
                'age' => $validated['age'],
                'gender' => $validated['gender'],
                'purok' => $validated['purok'],
                'medical_condition' => $validated['medical_condition'] ?? 'None',
                'center_assignment' => $validated['center_assignment'],
                'status' => $validated['status']
            ]);
            
            // ✅ Handle family members (store as JSON)
            if (isset($validated['family_members'])) {
                $evacuee->update(['family_members' => $validated['family_members']]);
            }
            
            $evacuee->refresh();
            
            return response()->json([
                'success' => true,
                'message' => 'Evacuee updated successfully!',
                'data' => $evacuee
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed: ' . json_encode($e->errors())
            ], 422);
        } catch (\Exception $e) {
            \Log::error('Update failed: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Update failed: ' . $e->getMessage()
            ], 500);
        }
    }
    public function registerPotential($id)
    {
        try {
            $potentialHousehold = PotentialEvacuee::findOrFail($id);
            
            $requestData = $request->all();
            $familyMembers = json_decode($request->family_members, true);
            
            // Create evacuee record
            $evacuee = Evacuee::create([
                'head_name' => $request->head_name,
                'purok' => $request->purok,
                'full_address' => $request->full_address,
                'contact_number' => $request->contact_number,
                'family_members' => $familyMembers,
                'pregnant_count' => $request->pregnant_count ?? 0,
                'elderly_count' => $request->elderly_count ?? 0,
                'pwd_count' => $request->pwd_count ?? 0,
                'special_medical_needs' => $request->special_medical_needs,
                'evacuation_date' => $request->evacuation_date,
                'arrival_time' => $request->arrival_time,
                'priority_status' => $potentialHousehold->priority_status,
                // ... other fields
            ]);
            
            // Remove from potential list
            $potentialHousehold->delete();
            
            return response()->json([
                'success' => true,
                'evacuee_id' => $evacuee->id,
                'message' => 'Household registered successfully!'
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0|max:120',
            'gender' => 'required|in:Male,Female',
            'purok' => 'required|string|max:100',
            'center_assignment' => 'required|string|max:100',
            'medical_condition' => 'nullable|in:None,Hypertension,Diabetes,Respiratory,Pregnant,Other',
            'family_members' => 'required|array|min:1',
            'family_members.*.name' => 'required|string|max:255',
            'family_members.*.relationship' => 'required|string|max:100',
            'family_members.*.age' => 'nullable|integer|min:0|max:120',
            'family_members.*.medical_condition' => 'nullable|string|max:100',
        ]);

        // ✅ Transform family data to JSON
        $familyData = array_map(function($member) {
            return [
                'name' => $member['name'],
                'age' => (int)($member['age'] ?? 0),
                'relationship' => $member['relationship'],
                'medical_condition' => $member['medical_condition'] ?? 'None',
            ];
        }, $validated['family_members']);

        // ✅ Single insert - PERFECT!
        $evacuee = BarangayEvacuee::create([
            'name' => $validated['name'],
            'age' => $validated['age'],
            'gender' => $validated['gender'],
            'purok' => $validated['purok'],
            'center_assignment' => $validated['center_assignment'],
            'medical_condition' => $validated['medical_condition'] ?? 'None',
            'status' => 'Registered',
            'family_members' => $familyData, // ✅ JSON magic!
        ]);

        return response()->json([
            'success' => true,
            'message' => "Family registered! ID: {$evacuee->id} (" . count($familyData) . " members)",
        ]);
    }

    public function addInventory(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'unit' => 'nullable|string|max:50',
            'notes' => 'nullable|string',
        ]);

        try {
            $status = 'Good';
            if ($validated['quantity'] <= 5) {
                $status = 'Critical';
            } elseif ($validated['quantity'] <= 10) {
                $status = 'Low';
            }

            $supply = \App\Models\InventorySupply::create([
                'item_name' => $validated['item_name'],
                'quantity' => $validated['quantity'],
                'unit' => $validated['unit'] ?? '',
                'status' => $status,
                'notes' => $validated['notes'] ?? '',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Supply added successfully',
                'supply' => $supply,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error adding supply: ' . $e->getMessage(),
            ], 500);
        }

    }

    public function destroy($id)
    {
        // ✅ Use YOUR model
        $evacuee = BarangayEvacuee::findOrFail($id);
        $evacuee->delete();

        return response()->json([
            'success' => true,
            'message' => 'Evacuee removed successfully!'
        ]);
    }
    // Add this method to your controller
   public function stats()
    {
        $evacuees = BarangayEvacuee::all();
        
        return response()->json([
            'evacueeCount' => $evacuees->count(),
            'potentialCount' => Household::whereIn('priority_status', ['High', 'Moderate'])->count(),
            'medicalPriority' => $evacuees->where('medical_condition', '!=', 'None')->count(),
            'totalMembers' => $evacuees->sum(fn($e) => $e->family_size),
            'occupancy' => 95 // Your logic here
        ]);
    }

    public function storeInventory(Request $request)
    {
        $request->validate([
            'item_name' => 'required',
            'quantity' => 'required|integer',
            'unit' => 'nullable|string',
            'status' => 'required|in:Good,Low,Critical',
            'notes' => 'nullable|string',
        ]);

        DB::table('inventory_supplies')->insert([
            'item_name' => $request->item_name,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'status' => $request->status,
            'notes' => $request->notes,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Inventory added successfully!');
    }

}