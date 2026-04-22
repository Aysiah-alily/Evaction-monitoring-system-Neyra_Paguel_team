<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\CalamityType;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CalamityReportExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $data = DB::table('evacuees')
            ->select('calamity_id', DB::raw('count(*) as total'))
            ->groupBy('calamity_id')
            ->get();

        return $data->map(function ($row) {
            $calamity = CalamityType::find($row->calamity_id);
            return [
                'Calamity' => $calamity->name ?? 'N/A',
                'Total Evacuees' => $row->total,
            ];
        });
    }

    public function headings(): array
    {
        return ['Calamity', 'Total Evacuees'];
    }
}