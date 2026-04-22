<?php

namespace App\Http\Controllers;

use App\Models\CalamityType;
use App\Models\Household;
use App\Models\Purok;
use App\Models\BarangayEvacuee;
use App\Models\FamilyMember;
use App\Models\InventorySupply;
use App\Models\EvacuationCenter;
use App\Models\Calamity;
use App\Models\Barangay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangayReportController extends Controller
{
    public function index()
    {
        // Get household statistics
        $totalHouseholds = Household::count();
        $highPriorityHouseholds = Household::where('priority_status', 'High')->count();
        $moderatePriorityHouseholds = Household::where('priority_status', 'Moderate')->count();
        $lowPriorityHouseholds = Household::where('priority_status', 'Low')->count();

        // Get purok distribution
        $purokDistribution = $this->getPurokDistribution();

        // Get family member demographics
        $familyDemographics = $this->getFamilyDemographics();

        // Get evacuee breakdown (renamed for view compatibility)
        $evacueeBreakdown = $this->getEvacueeBreakdown();

        // Get barangay information
        $barangayInfo = $this->getBarangayInfo();

        // Get supply inventory
        $supplyStats = $this->getSupplyStats();

        // Get evacuation centers
        $centerStats = $this->getCenterStats();

        // Get recent calamities
        $calamityStats = $this->getCalamityStats();

        // Get evacuation progress
        $evacuationProgress = $this->getEvacuationProgress();

        // Get detailed evacuee information per purok (for click-to-reveal feature)
        $evacueeDetails = $this->getEvacueeDetails();

        return view('BarangayPages.reports.index', compact(
            'totalHouseholds',
            'highPriorityHouseholds',
            'moderatePriorityHouseholds',
            'lowPriorityHouseholds',
            'purokDistribution',
            'familyDemographics',
            'evacueeBreakdown',
            'evacuationProgress',
            'evacueeDetails',
            'barangayInfo',
            'supplyStats',
            'centerStats',
            'calamityStats'
        ));
    }

    public function evacuees()
    {
        // Get registered evacuees
        $evacuees = BarangayEvacuee::with('familyMembers')->latest()->get();

        // Get potential evacuees (high and moderate priority households)
        $potentialEvacuees = Household::whereIn('priority_status', ['High', 'Moderate'])
            ->with('familyMembers')
            ->orderByRaw("FIELD(priority_status, 'High', 'Moderate')")
            ->get();

        return view('BarangayPages.reports.barangayreport', compact('evacuees', 'potentialEvacuees'));
    }

    private function getPurokDistribution()
    {
        $puroks = Purok::select('puroks.purok_name', 'puroks.barangay_name', DB::raw('count(*) as household_count'))
            ->join('households', 'households.purok', '=', 'puroks.purok_name')
            ->groupBy('puroks.purok_name', 'puroks.barangay_name')
            ->orderBy('household_count', 'desc')
            ->get();

        return [
            'labels' => $puroks->pluck('purok_name')->toArray(),
            'data' => $puroks->pluck('household_count')->toArray(),
            'barangays' => $puroks->pluck('barangay_name')->toArray()
        ];
    }

    private function getFamilyDemographics()
    {
        $demographics = FamilyMember::select('relationship', DB::raw('count(*) as count'))
            ->groupBy('relationship')
            ->orderBy('count', 'desc')
            ->get();

        return [
            'labels' => $demographics->pluck('relationship')->toArray(),
            'data' => $demographics->pluck('count')->toArray()
        ];
    }

    private function getEvacueeStats()
    {
        $stats = BarangayEvacuee::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        return [
            'labels' => $stats->pluck('status')->toArray(),
            'data' => $stats->pluck('count')->toArray()
        ];
    }

    private function getEvacueeBreakdown()
    {
        $breakdown = BarangayEvacuee::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        // Calculate percentages
        $total = $breakdown->sum('count');
        $percentages = $breakdown->map(function($item) use ($total) {
            return $total > 0 ? round(($item->count / $total) * 100) : 0;
        })->toArray();

        return [
            'labels' => $breakdown->pluck('status')->toArray(),
            'data' => $breakdown->pluck('count')->toArray(),
            'percentages' => $percentages
        ];
    }

    private function getBarangayInfo()
    {
        $barangay = DB::table('barangays')->first();
        return [
            'name' => $barangay->name ?? 'N/A',
            'population' => $barangay->population ?? 0,
            'area' => $barangay->area ?? 0,
            'registered_date' => $barangay->created_at ? date('F d, Y', strtotime($barangay->created_at)) : 'N/A'
        ];
    }

    private function getSupplyStats()
    {
        $stats = InventorySupply::select('item_name', DB::raw('count(*) as count'), DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('item_name')
            ->get();

        return [
            'labels' => $stats->pluck('item_name')->toArray(),
            'data' => $stats->pluck('total_quantity')->toArray(),
            'count' => $stats->pluck('count')->toArray()
        ];
    }

    private function getCenterStats()
    {
        $stats = EvacuationCenter::select('name', DB::raw('capacity as max_capacity'))
            ->get();

        return [
            'labels' => $stats->pluck('name')->toArray(),
            'capacity' => $stats->pluck('max_capacity')->toArray()
        ];
    }

    private function getCalamityStats()
    {
        $stats = CalamityType::select('name', DB::raw('count(*) as count'))
            ->groupBy('name')
            ->orderBy('count', 'desc')
            ->get();

        return [
            'labels' => $stats->pluck('name')->toArray(),
            'data' => $stats->pluck('count')->toArray()
        ];
    }

private function getEvacuationProgress()
{
    // Get all puroks with evacuees
    $progress = DB::table('barangay_evacuees')
        ->select(
            'purok',
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(CASE WHEN status = "Evacuated" THEN 1 ELSE 0 END) as evacuated')
        )
        ->whereNotNull('purok')
        ->groupBy('purok')
        ->orderBy('purok')
        ->get();

    return $progress->map(function($item) {
        return [
            'purok' => $item->purok,
            'total' => $item->total,
            'evacuated' => $item->evacuated
        ];
    })->toArray();
}

// Add this to your controller
public function getProgress()
{
    $progress = $this->getEvacuationProgress();
    $details = $this->getEvacueeDetails();
    
    return response()->json([
        'success' => true,
        'progress' => $progress,
        'details' => $details
    ]);
}
   private function getEvacueeDetails()
{
    // Get all evacuees from barangay_evacuees table
    $evacuees = DB::table('barangay_evacuees')
        ->select(
            'purok',
            'id',
            'name',
            'age',
            'gender',
            'status',
            'medical_condition',
            'center_assignment',
            'created_at'
        )
        ->get();

    // Group by purok name
    $details = [];
    foreach ($evacuees as $evacuee) {
        $purokName = $evacuee->purok ?: 'Unassigned';
        if (!isset($details[$purokName])) {
            $details[$purokName] = [];
        }
        $details[$purokName][] = [
            'household_id' => $evacuee->id,
            'head_of_family' => $evacuee->name,
            'category' => $evacuee->medical_condition === 'None' ? 'General' : 'Medical',
            'status' => $evacuee->status,
            'remarks' => $evacuee->center_assignment ? "Assigned to: {$evacuee->center_assignment}" : 'No assignment',
            'registered_date' => $evacuee->created_at ? date('M d, Y', strtotime($evacuee->created_at)) : 'N/A'
        ];
    }

    return $details;
}
public function households()
{
    $households = Household::with('familyMembers')->latest()->paginate(20);
    return view('BarangayPages.reports.households', compact('households'));
}

public function puroks()
{
    $puroks = Purok::withCount('households')->get();
    return view('BarangayPages.reports.puroks', compact('puroks'));
}
}