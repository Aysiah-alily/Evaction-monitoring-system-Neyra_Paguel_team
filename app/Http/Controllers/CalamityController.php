<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalamityController extends Controller
{
    public function index()
    {
        $calamities = DB::table('calamity_types')->orderBy('id', 'desc')->get();
        return view('AdminPages.calamity', compact('calamities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'calamity_name' => 'required|string|max:100',
            'calamity_description' => 'required|string|max:255'
        ]);
        DB::table('calamity_types')->insert([
            'name' => trim($request->calamity_name),
            'description' => trim($request->calamity_description)
        ]);
        return redirect()->route('calamity.index')->with('success', 'Calamity added successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'calamity_name' => 'required|string|max:100',
            'calamity_description' => 'required|string|max:255'
        ]);
        DB::table('calamity_types')->where('id', $id)->update([
            'name' => trim($request->calamity_name),
            'description' => trim($request->calamity_description)
        ]);
        return redirect()->route('calamity.index')->with('success', 'Calamity updated successfully.');
    }

    public function destroy($id)
    {
        DB::table('calamity_types')->where('id', $id)->delete();
        return redirect()->route('calamity.index')->with('success', 'Calamity deleted successfully.');
    }

    public function edit($id)
    {
        $calamity = DB::table('calamity_types')->find($id);
        if (!$calamity) abort(404);
        $calamities = DB::table('calamity_types')->orderBy('id', 'desc')->get();
        return view('AdminPages.calamity', compact('calamities', 'calamity'));
    }
}