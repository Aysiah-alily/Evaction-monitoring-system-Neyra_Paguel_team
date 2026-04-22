<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get data for the Home/Dashboard page
        $evacuations = \App\Models\Evacuation::latest()->take(10)->get();
        $activeCount = \App\Models\Evacuation::where('status', 'in_progress')->count();
        $highPriority = \App\Models\Evacuation::where('urgency', 'high')->count();
        $totalCount = \App\Models\Evacuation::count();
        $peopleAffected = \App\Models\Evacuation::sum('people_count');

        return view('UserPages.home', compact(
            'evacuations', 'activeCount', 'highPriority', 'totalCount', 'peopleAffected'
        ));
    }

    public function disasterTracking()
    {
        return view('UserPages.disaster-tracking');
    }

    public function alerts()
    {
        $alerts = \App\Models\Evacuation::where('status', 'in_progress')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('UserPages.alerts', compact('alerts'));
    }

    public function firstaid()
    {
        return view('UserPages.firstaid');
    }
}