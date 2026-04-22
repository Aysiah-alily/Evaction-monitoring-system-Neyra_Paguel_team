<?php

namespace App\Http\Controllers;

use App\Models\Evacuee;
use App\Models\Household;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvacueeController extends Controller
{
    public function create()
    {
        $households = Household::all();
        return view('AdminPages.evacuee.add', compact('households'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'last_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'contact' => 'required|string|max:20',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:Male,Female',
            'address' => 'required|string|max:255',
            'household_id' => 'nullable|exists:households,id',
            'evac_center' => 'required|string|max:100',
        ]);

        $data = $request->only(['last_name', 'first_name', 'middle_name', 'contact', 'age', 'gender', 'address', 'household_id', 'evac_center']);
        $data['date_registered'] = now();

        // Auto-fill matching fields from household
        if ($request->household_id) {
            $household = Household::find($request->household_id);
            if ($household) {
                $data['head_of_family'] = $household->head_of_family;
                $data['barangay'] = $household->barangay;
            }
        } else {
            $data['head_of_family'] = $request->input('head_of_family', '');
            $data['barangay'] = $request->input('barangay', '');
        }

        Evacuee::create($data);

        return redirect()->route('evacuee.list')->with('success', 'Evacuee added successfully.');
    }

    public function edit($id)
    {
        $evacuee = Evacuee::find($id);
        if (!$evacuee) abort(404);
        $households = Household::all();
        return view('AdminPages.evacuee.add', compact('evacuee', 'households'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'last_name' => 'required|string|max:100',
            'first_name' => 'required|string|max:100',
            'middle_name' => 'nullable|string|max:100',
            'contact' => 'required|string|max:20',
            'age' => 'required|integer|min:1',
            'gender' => 'required|in:Male,Female',
            'address' => 'required|string|max:255',
            'household_id' => 'nullable|exists:households,id',
            'evac_center' => 'required|string|max:100',
        ]);

        $evacuee = Evacuee::find($id);
        if (!$evacuee) abort(404);

        $data = $request->only(['last_name', 'first_name', 'middle_name', 'contact', 'age', 'gender', 'address', 'household_id', 'evac_center']);

        // Auto-fill matching fields from household
        if ($request->household_id) {
            $household = Household::find($request->household_id);
            if ($household) {
                $data['head_of_family'] = $household->head_of_family;
                $data['barangay'] = $household->barangay;
            }
        } else {
            $data['head_of_family'] = $request->input('head_of_family', '');
            $data['barangay'] = $request->input('barangay', '');
        }

        $evacuee->update($data);

        return redirect()->route('evacuee.list')->with('success', 'Evacuee updated successfully.');
    }

     public function index()
    {
        $evacuees = DB::table('evacuees')->orderBy('id', 'desc')->get();
        return view('AdminPages.evacuee.list', compact('evacuees'));
    }

    public function destroy($id)
    {
        DB::table('evacuees')->where('id', $id)->delete();
        return redirect()->route('evacuee.list')->with('success', 'Evacuee deleted successfully.');
    }
}