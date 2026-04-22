<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evacuation; // Assuming you have an Evacuation model

class DashboardController extends Controller
{
    /**
     * Display the user dashboard with relevant evacuation data.
     */
    public function index()
    {
        // Fetch statistics for the dashboard
        $activeCount = Evacuation::where('status', 'in_progress')->count(); // Active evacuations (adjust 'status' field as needed)
        $highPriority = Evacuation::where('urgency', 'high')->count(); // High priority evacuations
        $totalCount = Evacuation::count(); // Total evacuation requests
        $peopleAffected = Evacuation::sum('people_count'); // Total people affected (sum of people_count)

        // Fetch recent evacuations (limit to 10 for display; adjust as needed)
        $evacuations = Evacuation::latest()->take(10)->get();

        // Pass data to the view
        return view('UserPages.UserDashboard', compact('activeCount', 'highPriority', 'totalCount', 'peopleAffected', 'evacuations'));
    }
}