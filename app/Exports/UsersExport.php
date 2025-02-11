<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Font;

class UsersExport implements FromCollection, WithHeadings, WithEvents, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('customers')
            ->select('name', 'email', 'city', 'phone')
            ->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'name',
            'email',
            'city',
            'phone',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('1')
                    ->getFont()
                    ->setSize(16)
                    ->setBold(true);

                $event->sheet->getDelegate()->getStyle('A:D')
                    ->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);

                // Set column width to a larger size
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(25);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(30);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(25);

                    // Make the headings row bold
                $event->sheet->getDelegate()->getStyle('1')
                     ->getFont()
                     ->setBold(true);
            },
        ];
    }

    /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_TEXT,  // Column D (phone) as text
        ];
    }
}
