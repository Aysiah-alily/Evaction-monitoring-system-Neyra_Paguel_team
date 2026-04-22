<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangayController extends Controller
{
    public function index()
    {
        $barangays = DB::table('barangays')->orderBy('id', 'desc')->get();
        return view('AdminPages.barangay', compact('barangays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barangay_name' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'population' => 'required|integer|min:0',
        ]);
        DB::table('barangays')->insert([
            'name' => trim($request->barangay_name),
            'district' => trim($request->district),
            'population' => (int) $request->population,
        ]);
        return redirect()->route('barangay.index')->with('success', 'Barangay added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'barangay_name' => 'required|string|max:100',
            'district' => 'nullable|string|max:100',
            'population' => 'required|integer|min:0',
        ]);
        DB::table('barangays')->where('id', $id)->update([
            'name' => trim($request->barangay_name),
            'district' => trim($request->district),
            'population' => (int) $request->population,
        ]);
        return redirect()->route('barangay.index')->with('success', 'Barangay updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('barangays')->where('id', $id)->delete();
        return redirect()->route('barangay.index')->with('success', 'Barangay deleted successfully.');
    }

    public function edit($id)
    {
        $barangay = DB::table('barangays')->find($id);
        if (!$barangay) abort(404);
        $barangays = DB::table('barangays')->orderBy('id', 'desc')->get();
        return view('AdminPages.barangay', compact('barangays', 'barangay'));
    }
}