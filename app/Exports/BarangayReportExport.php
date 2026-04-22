<?php

namespace App\Exports;

use App\Models\BarangayReport;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BarangayReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BarangayReport::with('barangay')->get()->map(function ($item) {
            return [
                'Barangay' => $item->barangay->name ?? 'N/A',
                'Reports' => $item->report_count,
            ];
        });
    }

    public function headings(): array
    {
        return ['Barangay', 'Reports'];
    }
}