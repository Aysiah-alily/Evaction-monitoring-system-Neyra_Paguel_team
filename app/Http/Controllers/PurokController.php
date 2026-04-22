<?php

namespace App\Http\Controllers;

use App\Models\Purok;
use Illuminate\Http\Request;

class PurokController extends Controller
{
    // ✅ ADD THIS - Main table view
    public function index()
    {
        $puroks = Purok::latest()->get();
        $totalHouseholds = Purok::sum('household_count');
        return view('BarangayPages.puroks.create', compact('puroks', 'totalHouseholds'));
    }

    // Keep your existing methods (store, edit, update, destroy)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barangay_name' => 'required|string|max:255',
            'purok_name' => 'required|string|max:255',
            'captain_name' => 'required|string|max:255',
            'household_count' => 'required|integer|min:1',
        ]);

        Purok::create($validated);

        return response()->json(['success' => true]);  // ✅ JSON for AJAX
    }

    public function edit(Purok $purok)
    {
        return response()->json($purok);
    }

    public function update(Request $request, Purok $purok)
    {
        $purok->update($request->validate([
            'barangay_name' => 'required|string|max:255',
            'purok_name' => 'required|string|max:255',
            'captain_name' => 'required|string|max:255',
            'household_count' => 'required|integer|min:1',
        ]));
        
        return response()->json(['success' => true]);
    }

    public function destroy(Purok $purok)
    {
        $purok->delete();
        return response()->json(['success' => true]);
    }
}