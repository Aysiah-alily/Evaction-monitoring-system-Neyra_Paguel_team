<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Household;
use App\Models\EvacuationCenter;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalCenters = EvacuationCenter::count();
        $totalHouseholds = Household::count();

        $evacuated = Household::where('evacuation_status', 'Evacuated')->count();
        $notEvacuated = Household::where('evacuation_status', 'Not Evacuated')->count();
        $partial = Household::where('evacuation_status', 'Partial')->count();

        $barangays = Household::select('barangay_name')
            ->selectRaw('count(*) as total')
            ->selectRaw("SUM(evacuation_status='Evacuated') as evacuated")
            ->selectRaw("SUM(evacuation_status='Not Evacuated') as not_evacuated")
            ->selectRaw("SUM(evacuation_status='Partial') as partial")
            ->groupBy('barangay_name')
            ->get();

        $centers = EvacuationCenter::all();

        return view('AdminPages.adminDashboard', compact(
            'totalUsers',
            'totalCenters',
            'totalHouseholds',
            'evacuated',
            'notEvacuated',
            'partial',
            'barangays',
            'centers'
        ));
    }
}