<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\EvacuationCenter;  // ✅ ADD THIS
use App\Models\Barangay;

class EvacuationCenterController extends Controller
{

    public function index(Request $request)
    {
        // ✅ Use Eloquent Model (not raw query)
        $centers = EvacuationCenter::with('barangay')
            ->orderBy('id', 'desc')
            ->get();
        
        $barangays = Barangay::orderBy('name')->get();
        
        // Edit mode
        $editCenter = null;
        if ($request->has('edit')) {
            $editCenter = EvacuationCenter::find($request->edit);
        }
        
        return view('AdminPages.evacuation_center', compact('centers', 'barangays', 'editCenter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'center_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'capacity' => 'required|integer|min:0',
            'barangay_id' => 'required|integer|exists:barangays,id',
        ]);

        DB::table('evacuation_centers')->insert([
            'name' => trim($request->center_name),
            'address' => trim($request->address),
            'capacity' => (int) $request->capacity,
            'barangay_id' => (int) $request->barangay_id,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('evacuation_center.index')->with('success', 'Evacuation center added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'center_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'capacity' => 'required|integer|min:0',
            'barangay_id' => 'required|integer|exists:barangays,id',
        ]);

        DB::table('evacuation_centers')
            ->where('id', $id)
            ->update([
                'name' => trim($request->center_name),
                'address' => trim($request->address),
                'capacity' => (int) $request->capacity,
                'barangay_id' => (int) $request->barangay_id,
                'updated_at' => now(),
            ]);

        return redirect()->route('evacuation_center.index')->with('success', 'Evacuation center updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('evacuation_centers')->where('id', $id)->delete();
        return redirect()->route('evacuation_center.index')->with('success', 'Evacuation center deleted successfully.');
    }

    public function edit($id)
    {
        $center = DB::table('evacuation_centers')->find($id);
        if (!$center) abort(404);

        // Fetch centers and barangays for the view
        $centers = DB::table('evacuation_centers')
            ->join('barangays', 'evacuation_centers.barangay_id', '=', 'barangays.id')
            ->select('evacuation_centers.*', 'barangays.name as barangay_name')
            ->orderBy('evacuation_centers.id', 'desc')
            ->get();
        $barangays = DB::table('barangays')->orderBy('name')->get();

        return view('AdminPages.evacuation_center', compact('centers', 'barangays', 'center'));
    }
}