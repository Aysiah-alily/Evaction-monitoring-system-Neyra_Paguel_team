<?php

namespace App\Http\Controllers;

use App\Models\BarangayReport;
use App\Models\Evacuee;
use App\Models\CalamityType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;  // For PDF (if installed)
use Maatwebsite\Excel\Facades\Excel;  // For CSV
use App\Exports\BarangayReportExport;  // Import export classes
use App\Exports\CalamityReportExport;
use ZipArchive;  // For ZIP

class ReportController extends Controller
{
    // Your existing methods (unchanged)
    public function reportsByBarangay()
    {
        $data = BarangayReport::with('barangay')->get();
        $labels = $data->pluck('barangay.name')->toArray();
        $counts = $data->pluck('report_count')->toArray();
        return view('AdminPages.reports.by_barangay', compact('labels', 'counts', 'data'));
    }

    public function evacueesByCalamity()
    {
        $data = DB::table('evacuees')
            ->select('calamity_id', DB::raw('count(*) as total'))
            ->groupBy('calamity_id')
            ->get();

        $data = $data->map(function ($row) {
            $row->calamity = CalamityType::find($row->calamity_id);
            return $row;
        });

        $labels = $data->pluck('calamity.name')->toArray();
        $counts = $data->pluck('total')->toArray();
        return view('AdminPages.reports.evacuees_by_calamity', compact('labels', 'counts', 'data'));
    }

    // Export as PDF (requires barryvdh/laravel-dompdf)
public function exportPdf($type)
{
    if (!class_exists(Pdf::class)) {
        abort(500, 'PDF package not installed. Install barryvdh/laravel-dompdf first.');
    }

    if ($type === 'barangay') {
        $data = BarangayReport::with('barangay')->get();
        $totalReports = $data->sum('report_count');
        $highestBarangay = $data->sortByDesc('report_count')->first()->barangay->name ?? 'N/A';

        // Updated path: Use 'AdminPages.reports.pdf.by_barangay'
        $pdf = Pdf::loadView('AdminPages.reports.pdf.by_barangay', compact('data', 'totalReports', 'highestBarangay'));
        return $pdf->download('reports_by_barangay.pdf');
    } elseif ($type === 'calamity') {
        $data = DB::table('evacuees')
            ->select('calamity_id', DB::raw('count(*) as total'))
            ->groupBy('calamity_id')
            ->get();

        $data = $data->map(function ($row) {
            $row->calamity = CalamityType::find($row->calamity_id);
            return $row;
        });

        $totalEvacuees = $data->sum('total');
        $highestCalamity = $data->sortByDesc('total')->first()->calamity->name ?? 'N/A';

        // Updated path: Use 'AdminPages.reports.pdf.by_calamity'
        $pdf = Pdf::loadView('AdminPages.reports.pdf.by_calamity', compact('data', 'totalEvacuees', 'highestCalamity'));
        return $pdf->download('evacuees_by_calamity.pdf');
    }

    abort(404, 'Report type not found');
}

    // Export as CSV (using maatwebsite/excel)
    public function exportCsv($type)
    {
        if ($type === 'barangay') {
            return Excel::download(new BarangayReportExport, 'reports_by_barangay.csv');
        } elseif ($type === 'calamity') {
            return Excel::download(new CalamityReportExport, 'evacuees_by_calamity.csv');
        }

        abort(404, 'Report type not found');
    }

    // Compile Folder (ZIP)
    public function compileFolder($type)
    {
        if ($type === 'barangay') {
            $data = BarangayReport::with('barangay')->get();
            $zipFileName = 'reports_by_barangay.zip';
        } elseif ($type === 'calamity') {
            $data = DB::table('evacuees')
                ->select('calamity_id', DB::raw('count(*) as total'))
                ->groupBy('calamity_id')
                ->get();

            $data = $data->map(function ($row) {
                $row->calamity = CalamityType::find($row->calamity_id);
                return $row;
            });
            $zipFileName = 'evacuees_by_calamity.zip';
        } else {
            abort(404, 'Report type not found');
        }

        $zipPath = storage_path('app/temp/' . $zipFileName);
        if (!file_exists(dirname($zipPath))) {
            mkdir(dirname($zipPath), 0755, true);
        }

        $zip = new ZipArchive;
        if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
            // Add summary PDF if DomPDF is installed
            if (class_exists(Pdf::class)) {
                $view = $type === 'barangay' ? 'AdminPages.reports.pdf.by_barangay' : 'AdminPages.reports.pdf.by_calamity';
                $pdf = Pdf::loadView($view, compact('data'));
                $pdfPath = storage_path('app/temp/summary.pdf');
                $pdf->save($pdfPath);
                $zip->addFile($pdfPath, 'summary.pdf');
            }

            // Add per-item files (e.g., text summaries)
            foreach ($data as $row) {
                if ($type === 'barangay') {
                    $content = "Barangay: {$row->barangay->name}\nReports: {$row->report_count}";
                    $fileName = $row->barangay->name . '.txt';
                } else {
                    $content = "Calamity: {$row->calamity->name}\nTotal Evacuees: {$row->total}";
                    $fileName = $row->calamity->name . '.txt';
                }
                $filePath = storage_path('app/temp/' . $fileName);
                file_put_contents($filePath, $content);
                $zip->addFile($filePath, $fileName);
            }

            $zip->close();
            return response()->download($zipPath)->deleteFileAfterSend(true);
        }

        abort(500, 'Failed to create ZIP file');
    }
}