<?php

namespace App\Http\Controllers;

use App\Models\Evacuation;
use Illuminate\Http\Request;

class EvacuationController extends Controller
{
    public function index()
    {
        $evacuations = Evacuation::latest()->get();
        return view('UserPages.evacuations.index', compact('evacuations'));
    }

    public function create()
    {
        return view('UserPages.evacuations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'people_count' => 'nullable|integer|min:1',
            'urgency' => 'required|string|in:low,medium,high',
            'notes' => 'nullable|string',
        ]);

        $data['status'] = 'pending';

        Evacuation::create($data);

        return redirect()->route('evacuations.create')->with('success', 'Evacuation request submitted.');
    }

    public function dashboard()
    {
        $evacuations = Evacuation::latest()->take(5)->get();
        $totalCount = Evacuation::count();
        $activeCount = Evacuation::where('status', 'pending')->count();
        $highPriority = Evacuation::where('urgency', 'high')->count();
        $peopleAffected = Evacuation::whereNotNull('people_count')->sum('people_count');

        return view('UserPages.UserDashboard', compact('evacuations', 'totalCount', 'activeCount', 'highPriority', 'peopleAffected'));
    }

    public function rescueTeamDashboard()
    {
        // Active rescue operations (pending and in_progress)
        $activeRescues = Evacuation::whereIn('status', ['pending', 'in_progress'])
                                    ->latest()
                                    ->get();
        
        // Completed rescues
        $completedRescues = Evacuation::whereIn('status', ['completed', 'rescued'])
                                       ->latest()
                                       ->take(5)
                                       ->get();
        
        // Statistics for rescue team
        $pendingCount = Evacuation::where('status', 'pending')->count();
        $inProgressCount = Evacuation::where('status', 'in_progress')->count();
        $completedCount = Evacuation::whereIn('status', ['completed', 'rescued'])->count();
        $highPriorityCount = Evacuation::whereIn('status', ['pending', 'in_progress'])
                                       ->where('urgency', 'high')
                                       ->count();
        $peopleToRescue = Evacuation::whereIn('status', ['pending', 'in_progress'])
                                    ->whereNotNull('people_count')
                                    ->sum('people_count');

        return view('AdminPages.rescue-dashboard', compact(
            'activeRescues',
            'completedRescues',
            'pendingCount',
            'inProgressCount',
            'completedCount',
            'highPriorityCount',
            'peopleToRescue'
        ));
    }
}
